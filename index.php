<?php
require_once __DIR__ . '/db.php';

// Fetch instructors from instructor table
$instructors = $pdo->query("SELECT iid, name FROM Instructor ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

// Fetch administrators from admin table
$admins = $pdo->query("SELECT aid, name FROM Administrator ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Room Booking System</title>
</head>
<body>

<h1>CP3520 Booking System</h1>
<p>Select a role to continue:</p>

<!-- Instructor selection -->
<form action="instructor/home.php" method="get" style="margin-bottom: 1.5rem;">
    <label for="iid">Continue as Instructor:</label>
    <select name="iid" id="iid" required>
        <option value="">-- Select Instructor --</option>
        <?php foreach ($instructors as $i): ?>
            <option value="<?= htmlspecialchars($i['iid']) ?>">
                <?= htmlspecialchars($i['name']) ?> (<?= $i['iid'] ?>)
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Go</button>
</form>

<!-- Administrator selection -->
<form action="admin/home.php" method="get">
    <label for="aid">Continue as Administrator:</label>
    <select name="aid" id="aid" required>
        <option value="">-- Select Administrator --</option>
        <?php foreach ($admins as $a): ?>
            <option value="<?= htmlspecialchars($a['aid']) ?>">
                <?= htmlspecialchars($a['name']) ?> (<?= $a['aid'] ?>)
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Go</button>
</form>

</body>
</html>
