<?php
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace with your actual database or user authentication logic
    // For this example, let's use hardcoded credentials
    $valid_username = 'user123';
    $valid_password = 'password123';

    // Check if the input matches
    if ($username === $valid_username && $password === $valid_password) {
        // Successful login, set session
        $_SESSION['username'] = $username;
        header("Location: confirmation.html"); // Redirect to confirmation or dashboard
        exit;
    } else {
        // Failed login
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TripPlanner</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>TripPlanner</h1>
            </div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="search.html">Flights</a></li>
                <li><a href="search.html">Hotels</a></li>
                <li><a href="search.html">Activities</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Login</h2>
        <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </main>

    <footer>
        <p>&copy; 2024 TripPlanner. All rights reserved.</p>
    </footer>
</body>
</html>
