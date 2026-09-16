<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$config = require __DIR__ . '/config.php';
date_default_timezone_set($config['timezone'] ?? 'Europe/Chisinau');

if (!is_dir($config['storage_path'])) {
    mkdir($config['storage_path'], 0775, true);
}

function e(?string $value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf(?string $token): bool {
    return is_string($token) && isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function flash_set(string $key, string $message): void {
    $_SESSION['flash'][$key] = $message;
}

function flash_get(string $key): ?string {
    if (!isset($_SESSION['flash'][$key])) {
        return null;
    }
    $message = $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);
    return $message;
}

function old(string $key, string $default = ''): string {
    return $_SESSION['old'][$key] ?? $default;
}

function set_old(array $values): void {
    $_SESSION['old'] = $values;
}

function clear_old(): void {
    unset($_SESSION['old']);
}

function redirect_with_anchor(string $location): never {
    header('Location: ' . $location);
    exit;
}

/**
 * Un formular clasic (fără JS) trimite POST normal și așteaptă un redirect.
 * Formularele cu AJAX (vezi main.js) trimit header-ul X-Requested-With, ca să
 * primească înapoi JSON în loc de redirect. Aceeași logică de validare/salvare
 * servește ambele moduri — doar răspunsul final diferă.
 */
function is_ajax_request(): bool {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

/**
 * Trimite fie un răspuns JSON (pentru AJAX), fie un redirect clasic cu mesaj flash.
 */
function respond(bool $ok, string $flashKey, string $message, string $redirectTo): never {
    if (is_ajax_request()) {
        header('Content-Type: application/json; charset=UTF-8');
        http_response_code($ok ? 200 : 422);
        echo json_encode(['ok' => $ok, 'message' => $message], JSON_UNESCAPED_UNICODE);
        exit;
    }
    flash_set($flashKey, $message);
    redirect_with_anchor($redirectTo);
}

function save_submission(string $type, array $payload, string $storagePath): void {
    $timestamp = date('c');
    $record = [
        'type' => $type,
        'submitted_at' => $timestamp,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
        'payload' => $payload,
    ];

    file_put_contents(
        $storagePath . '/' . $type . '.log.jsonl',
        json_encode($record, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL,
        FILE_APPEND | LOCK_EX
    );
}

function append_csv(string $filename, array $headers, array $row, string $storagePath): void {
    $path = $storagePath . '/' . $filename;
    $isNew = !file_exists($path);
    $handle = fopen($path, 'ab');
    if ($handle === false) {
        return;
    }
    if ($isNew) {
        fputcsv($handle, $headers);
    }
    fputcsv($handle, $row);
    fclose($handle);
}

function send_basic_email(string $to, string $subject, string $body, string $replyTo = ''): bool {
    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: MilloCafe Website <no-reply@localhost>',
    ];
    if ($replyTo !== '') {
        $headers[] = 'Reply-To: ' . $replyTo;
    }
    return @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, implode("\r\n", $headers));
}
