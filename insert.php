<?php
require 'dbconfig.php';
/** @var PDO $pdo */

$data = [
    ':first_name'       => trim($_POST['first_name'] ?? ''),
    ':last_name'        => trim($_POST['last_name'] ?? ''),
    ':email'            => trim($_POST['email'] ?? ''),
    ':phone_number'     => trim($_POST['phone_number'] ?? ''),
    ':position_applied' => $_POST['position_applied'] ?? '',
    ':years_experience' => trim($_POST['years_experience'] ?? ''),
    ':certification'    => $_POST['certification'] ?? '',
];

// Reject empty fields, a bad email, or non-numeric experience
if (in_array('', $data, true)
    || !filter_var($data[':email'], FILTER_VALIDATE_EMAIL)
    || !ctype_digit($data[':years_experience'])) {
    header('Location: index.php?msg=' . urlencode('Please fill in all fields correctly.'));
    exit;
}

$stmt = $pdo->prepare("INSERT INTO applications
    (first_name, last_name, email, phone_number, position_applied, years_experience, certification)
    VALUES (:first_name, :last_name, :email, :phone_number, :position_applied, :years_experience, :certification)");
$stmt->execute($data);

header('Location: index.php?msg=' . urlencode('Application added.'));