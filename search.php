<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destination = $_POST['destination'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    // Search for flights, hotels, and activities
    $sql = "SELECT * FROM flights WHERE destination = ? AND departure_date BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $destination, $startDate, $endDate);
    $stmt->execute();
    $flights = $stmt->get_result();

    // Repeat the process for hotels and activities...
}
?>
<!-- Search form -->
<form method="POST" action="search.php">
    <input type="text" name="destination" placeholder="Enter Destination" required>
    <input type="date" name="start_date" required>
    <input type="date" name="end_date" required>
    <input type="submit" value="Search">
</form>

<!-- Results -->
<div class="search-results">
    <?php while ($flight = $flights->fetch_assoc()): ?>
        <p><?php echo $flight['flight_number'] . " - $" . $flight['price']; ?></p>
    <?php endwhile; ?>
</div>
