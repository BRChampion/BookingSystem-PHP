<?php

require_once __DIR__ . '/../db.php';

$sql = "SELECT b.bid, b.requestedDate, b.status,
               i.name AS instructor,
               r.location AS room
        FROM Booking b    
        JOIN Instructor i ON b.iid = i.iid
        JOIN Room r ON b.rid = r.rid
        WHERE b.status = 'PND'
        ORDER BY b.requestedDate";
$stmt = $pdo->query($sql);
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><title>Pending Bookings</title></head>
<body>
<h1> Pending Bookings</h1>
<table border="1">
    <tr>
        <th>Booking ID</th>
        <th>Requested Date</th>
        <th>Room Number</th>
        <th>Instructor Name</th>
        <th>Booking Status</th>
    </tr>
    <?php foreach ($bookings as $b): ?>
        <tr>
            <td><?= htmlspecialchars($b['bid']) ?></td>
            <td><?= htmlspecialchars($b['requestedDate']) ?></td>
            <td><?= htmlspecialchars($b['room']) ?></td>
            <td><?= htmlspecialchars($b['instructor']) ?></td>
            <td><?= htmlspecialchars($b['status']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="home.php">Back to admin menu></a>
</body>
</html>
