<?php
require 'dbconfig.php';
/** @var PDO $pdo */

// Load the record to edit
$stmt = $pdo->prepare("SELECT * FROM applications WHERE application_id = :id");
$stmt->execute([':id' => $_GET['id'] ?? 0]);
$app = $stmt->fetch();

if (!$app) {
    header('Location: index.php?msg=' . urlencode('Application not found.'));
    exit;
}

// Values for the pre-filled form in form.php
$action = 'update.php';
$button = 'Save Changes';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Application</title>
    <style>
        body { font-family: Arial, sans-serif; color: #222; max-width: 600px; margin: 40px auto; padding: 0 16px; }
        h2 { font-weight: 600; }
    </style>
</head>
<body>
    <h2>Edit Application #<?= $app['application_id'] ?></h2>
    <?php include 'form.php'; ?>
    <p><a href="index.php">Cancel</a></p>
</body>
</html>