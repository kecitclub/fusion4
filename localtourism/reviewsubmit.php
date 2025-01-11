<?php
// Database connection
include 'dbforbook.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $rating = (int) $_POST['rating'];

    // Insert review into the database
    $sql = "INSERT INTO reviews (destination, name, message, rating)
            VALUES ('$destination', '$name', '$message', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
