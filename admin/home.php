<?php
require_once __DIR__ . '/../db.php';

$aid = isset($_GET['aid']) ? (int)$_GET['aid'] : 0;

$stmt = $pdo->prepare("SELECT name FROM Administrator WHERE aid = ?");
$stmt->execute([$aid]);
$admin = $stmt->fetchColumn();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Administrator Home</title>
</head>
<body>
<h1>Administrator Portal</h1>
<p>Logged in as: <?= htmlspecialchars($admin) ?> (ID <?= $aid ?>)</p>

<ul>
    <li><a href="list_bookings.php?aid=<?= $aid ?>">View all bookings</a></li>
    <li><a href="pending.php?aid=<?= $aid ?>">Approve / reject booking requests</a></li>
    <li><a href="rooms.php?aid=<?= $aid ?>">Update room availability and features</a></li>
</ul>

<p><a href="../index.php">Back to role selection</a></p>
</body>
</html>

