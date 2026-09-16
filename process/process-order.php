<?php
require __DIR__ . '/../includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_with_anchor('../index.php#book-a-table');
}

$input = [
    'name' => trim($_POST['name'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'phone' => trim($_POST['phone'] ?? ''),
    'date' => trim($_POST['date'] ?? ''),
    'time' => trim($_POST['time'] ?? ''),
    'people' => trim($_POST['people'] ?? ''),
    'message' => trim($_POST['message'] ?? ''),
];
set_old(array_merge($_SESSION['old'] ?? [], $input));

if (!verify_csrf($_POST['csrf_token'] ?? null)) {
    respond(false, 'order_error', 'Sesiunea formularului a expirat. Reîncarcă pagina și încearcă din nou.', '../index.php#book-a-table');
}

$errors = [];
if (mb_strlen($input['name']) < 2) $errors[] = 'Introdu numele tău.';
if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Introdu un email valid.';
if (mb_strlen($input['phone']) < 6) $errors[] = 'Introdu un număr de telefon valid.';
if ($input['date'] === '') $errors[] = 'Selectează data comenzii.';
if ($input['time'] === '') $errors[] = 'Selectează ora comenzii.';
if (!ctype_digit($input['people']) || (int) $input['people'] < 1 || (int) $input['people'] > 20) {
    $errors[] = 'Numărul de persoane trebuie să fie între 1 și 20.';
}
if (mb_strlen($input['message']) < 5) $errors[] = 'Introdu detaliile comenzii.';

if ($errors) {
    respond(false, 'order_error', implode(' ', $errors), '../index.php#book-a-table');
}

save_submission('orders', $input, $config['storage_path']);
append_csv(
    'orders.csv',
    ['submitted_at', 'name', 'email', 'phone', 'date', 'time', 'people', 'message'],
    [date('c'), $input['name'], $input['email'], $input['phone'], $input['date'], $input['time'], $input['people'], $input['message']],
    $config['storage_path']
);

if (!empty($config['send_emails'])) {
    $body = "Comandă nouă\n\n" .
        "Nume: {$input['name']}\n" .
        "Email: {$input['email']}\n" .
        "Telefon: {$input['phone']}\n" .
        "Data: {$input['date']}\n" .
        "Ora: {$input['time']}\n" .
        "Persoane: {$input['people']}\n\n" .
        "Detalii:\n{$input['message']}\n";
    send_basic_email($config['contact_email'], 'Comandă nouă - MilloCafe', $body, $input['email']);
}

clear_old();
respond(true, 'order_success', 'Comanda a fost trimisă cu succes. Datele au fost salvate pe server.', '../index.php#book-a-table');
