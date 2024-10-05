<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM bookings WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $userId);
$stmt->execute();
$bookings = $stmt->get_result();
?>
<h2>Your Bookings</h2>
<div class="bookings">
    <?php while ($booking = $bookings->fetch_assoc()): ?>
        <p><?php echo "Booking ID: " . $booking['id'] . " - " . $booking['details']; ?></p>
    <?php endwhile; ?>
</div>
