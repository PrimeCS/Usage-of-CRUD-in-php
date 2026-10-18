<?php
// Shared form used by index.php (new) and edit.php (existing record)
// Expects: $action, $button, and $app (empty array for a new application)
$positions = ['Security Analyst', 'SOC Analyst', 'Penetration Tester', 'Security Engineer', 'Incident Responder'];
$certs     = ['None', 'CompTIA Security+', 'CEH', 'CISSP', 'OSCP', 'CISM'];
$v = fn($key) => htmlspecialchars($app[$key] ?? '');
?>
<form method="post" action="<?= $action ?>">
    <?php if (!empty($app['application_id'])): ?>
        <input type="hidden" name="application_id" value="<?= $app['application_id'] ?>">
    <?php endif; ?>

    First name: <input type="text" name="first_name" value="<?= $v('first_name') ?>" required><br><br>
    Last name: <input type="text" name="last_name" value="<?= $v('last_name') ?>" required><br><br>
    Email: <input type="text" name="email" value="<?= $v('email') ?>" required><br><br>
    Phone number: <input type="text" name="phone_number" value="<?= $v('phone_number') ?>" required><br><br>

    Position applied:
    <select name="position_applied" required>
        <option value="">-- Select --</option>
        <?php foreach ($positions as $p): ?>
            <option value="<?= $p ?>" <?= ($app['position_applied'] ?? '') === $p ? 'selected' : '' ?>><?= $p ?></option>
        <?php endforeach; ?>
    </select><br><br>

    Years of experience: <input type="text" name="years_experience" value="<?= $v('years_experience') ?>" required><br><br>

    Certification:
    <select name="certification" required>
        <?php foreach ($certs as $c): ?>
            <option value="<?= $c ?>" <?= ($app['certification'] ?? '') === $c ? 'selected' : '' ?>><?= $c ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit"><?= $button ?></button>
</form>