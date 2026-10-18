<?php
require 'dbconfig.php';
/** @var PDO $pdo */

// Read all applications, newest first
$applications = $pdo->query("SELECT * FROM applications ORDER BY date_added DESC")->fetchAll();

// Values for the empty form in form.php
$action = 'insert.php';
$button = 'Submit Application';
$app = [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cybersecurity Job Application</title>
    <style>
        body { font-family: Arial, sans-serif; color: #222; max-width: 1000px; margin: 40px auto; padding: 0 16px; }
        h2 { font-weight: 600; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; margin-top: 20px; }
        th { text-align: left; border-bottom: 2px solid #222; padding: 10px 8px; }
        td { border-bottom: 1px solid #e5e5e5; padding: 10px 8px; }
        .msg { color: #555; }
        form.inline { display: inline; }
    </style>
</head>
<body>
    <h2>Cybersecurity Job Application</h2>

    <?php if (isset($_GET['msg'])): ?>
        <p class="msg"><?= htmlspecialchars($_GET['msg']) ?></p>
    <?php endif; ?>

    <?php include 'form.php'; ?>

    <h2>Applications</h2>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Position</th>
            <th>Years</th><th>Certification</th><th>Date Added</th><th>Actions</th>
        </tr>
        <?php foreach ($applications as $row): ?>
        <tr>
            <td><?= $row['application_id'] ?></td>
            <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone_number']) ?></td>
            <td><?= htmlspecialchars($row['position_applied']) ?></td>
            <td><?= $row['years_experience'] ?></td>
            <td><?= htmlspecialchars($row['certification']) ?></td>
            <td><?= date('M d, Y', strtotime($row['date_added'])) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['application_id'] ?>">Edit</a>
                <form class="inline" method="post" action="delete.php"
                      onsubmit="return confirm('Delete this application?');">
                    <input type="hidden" name="application_id" value="<?= $row['application_id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>