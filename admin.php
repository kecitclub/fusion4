<?php
session_start(); // Start session management

// Database connection
$host = 'localhost';
$dbName = 'admin';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Unable to connect to database: " . $e->getMessage());
}

// Helper function to check if admin is logged in
function checkAdminLoggedIn() {
    if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
        header('Location: login.php');
        exit;
    }
}

?>

<?php
include 'login.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <form method="post" action="login.php">
        <h2>Admin Login</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
</body>
</html>

<!-- File: dashboard.php -->
<?php
require 'common.php'; // Database and session setup
checkAdminLoggedIn();

// Fetch some example data, e.g., number of users
$userCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Portal</h1>
    <p>Total Registered Users: <?php echo $userCount; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>

<!-- File: logout.php -->
<?php
session_start();
$_SESSION = []; // Clear all session variables
session_destroy(); // Destroy session
header('Location: login.php'); // Redirect to login
exit;
?>
