<?php
require __DIR__ . '/../includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_with_anchor('../index.php#contact');
}

$input = [
    'contact_name' => trim($_POST['name'] ?? ''),
    'contact_email' => trim($_POST['email'] ?? ''),
    'subject' => trim($_POST['subject'] ?? ''),
    'contact_message' => trim($_POST['message'] ?? ''),
];
set_old(array_merge($_SESSION['old'] ?? [], $input));

if (!verify_csrf($_POST['csrf_token'] ?? null)) {
    respond(false, 'contact_error', 'Sesiunea formularului a expirat. Reîncarcă pagina și încearcă din nou.', '../index.php#contact');
}

$errors = [];
if (mb_strlen($input['contact_name']) < 2) $errors[] = 'Introdu numele tău.';
if (!filter_var($input['contact_email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Introdu un email valid.';
if (mb_strlen($input['subject']) < 3) $errors[] = 'Adaugă un subiect.';
if (mb_strlen($input['contact_message']) < 10) $errors[] = 'Mesajul este prea scurt.';

if ($errors) {
    respond(false, 'contact_error', implode(' ', $errors), '../index.php#contact');
}

save_submission('contacts', $input, $config['storage_path']);
append_csv(
    'contacts.csv',
    ['submitted_at', 'name', 'email', 'subject', 'message'],
    [date('c'), $input['contact_name'], $input['contact_email'], $input['subject'], $input['contact_message']],
    $config['storage_path']
);

if (!empty($config['send_emails'])) {
    $body = "Mesaj nou de contact\n\n" .
        "Nume: {$input['contact_name']}\n" .
        "Email: {$input['contact_email']}\n" .
        "Subiect: {$input['subject']}\n\n" .
        "Mesaj:\n{$input['contact_message']}\n";
    send_basic_email($config['contact_email'], 'Mesaj nou - MilloCafe', $body, $input['contact_email']);
}

clear_old();
respond(true, 'contact_success', 'Mesajul a fost trimis cu succes. Datele au fost salvate pe server.', '../index.php#contact');
