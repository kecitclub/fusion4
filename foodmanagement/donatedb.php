<?php
session_start();
$host = 'localhost';
$db = 'food_management';
$user = 'root';
$pw = '';

$conn = mysqli_connect($host, $user, $pw, $db);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $locate = htmlspecialchars($_POST['location']);
    $food_type = $_POST['type'];

    if ($food_type === 'others') {
        $food_type = htmlspecialchars($_POST['other_food_type']);
    }

    $quantity = htmlspecialchars($_POST['quantity']);
    $expire = htmlspecialchars($_POST['expire']);

    $stmt = $conn->prepare("INSERT INTO food_donation (location, food_type, quantity, expire) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssis", $locate, $food_type, $quantity, $expire);

        if ($stmt->execute()) {
            echo "Thank you! Your donation has been recorded.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing the SQL statement: " . $conn->error;
    }

    $conn->close();
}
?>
