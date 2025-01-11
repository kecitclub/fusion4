<?php
// Database connection
include 'dbforbook.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $place_name = mysqli_real_escape_string($conn, $_POST['place_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $submitted_by = mysqli_real_escape_string($conn, $_POST['submitted_by']);

    // Insert unexplored place into the database
    $sql = "INSERT INTO unexplored_places (place_name, description, location, submitted_by)
            VALUES ('$place_name', '$description', '$location', '$submitted_by')";

    if ($conn->query($sql) === TRUE) {
        echo "Place submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
