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
    ':application_id'   => $_POST['application_id'] ?? '',
];

if (in_array('', $data, true)
    || !filter_var($data[':email'], FILTER_VALIDATE_EMAIL)
    || !ctype_digit($data[':years_experience'])) {
    header('Location: index.php?msg=' . urlencode('Please fill in all fields correctly.'));
    exit;
}

// WHERE limits the change to one record
$stmt = $pdo->prepare("UPDATE applications SET
    first_name = :first_name, last_name = :last_name, email = :email,
    phone_number = :phone_number, position_applied = :position_applied,
    years_experience = :years_experience, certification = :certification
    WHERE application_id = :application_id");
$stmt->execute($data);

header('Location: index.php?msg=' . urlencode('Application updated.'));