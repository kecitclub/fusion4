<?php
// Include database connection
include 'dbforbook.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // SQL query to insert data into bookings table
    $sql = "INSERT INTO bookings (name, email, phone, address, destination, price)
            VALUES ('$name', '$email', '$phone', '$address', '$destination', '$price')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Booking saved successfully!</h1>";
        
        // Redirect to confirmation page after saving data
       
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

