<?php
require 'dbconfig.php';
/** @var PDO $pdo */

// Delete only the selected record
$stmt = $pdo->prepare("DELETE FROM applications WHERE application_id = :id");
$stmt->execute([':id' => $_POST['application_id'] ?? 0]);

header('Location: index.php?msg=' . urlencode('Application deleted.'));