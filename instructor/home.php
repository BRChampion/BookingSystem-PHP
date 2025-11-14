<?php
require_once __DIR__ . '/../db.php';

$iid = isset($_GET['iid']) ? (int)$_GET['iid'] : 0;

// optional: fetch instructor name for display
$stmt = $pdo->prepare("SELECT name FROM Instructor WHERE iid = ?");
$stmt->execute([$iid]);
$instructor = $stmt->fetchColumn();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Instructor Home</title>
</head>
<body>
<h1>Instructor Portal</h1>
<p>Logged in as: <?= htmlspecialchars($instructor) ?> (ID <?= $iid ?>)</p>

<ul>
    <li><a href="rooms.php?iid=<?= $iid ?>">View available rooms</a></li>
    <li><a href="new_booking.php?iid=<?= $iid ?>">Submit booking request</a></li>
    <li><a href="bookings.php?iid=<?= $iid ?>">View / cancel my bookings</a></li>
</ul>

<p><a href="../index.php">Back to role selection</a></p>
</body>
</html>

