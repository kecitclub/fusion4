<?php
$servername = "localhost"; // Hostname (e.g., "localhost")
$username = "root";        // Database username
$password = "";            // Database password (leave empty for default)
$dbname = "website";  // Database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
