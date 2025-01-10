<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if(!$conn) {
    echo "Database connection failed: " . mysqli_connect_error();
} 

echo "Connected successfully<br>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debug: Check incoming data
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Sanitize and validate inputs
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<p style='color: red;'>All fields are required. Please fill out the form completely.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red;'>Invalid email format. Please enter a valid email.</p>";
    } else {
        // Use prepared statements to securely insert data
      
       $sql="INSERT INTO contact_queries (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

$conn->close();
?>
