<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "tourism";

   
    $conn = mysqli_connect($host, $user, $pass, $db);
    
    
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    
    $sql = "INSERT INTO contact_queries (name, email, subject, message, submitted_at) VALUES (?, ?, ?, ?, NOW())";
    
    
    $stmt = $conn->prepare($sql);
    
   
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    
   
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    
    
    if ($stmt->execute()) {
        echo "<p style='color: green;'>Your message has been submitted successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }


    $stmt->close();
    $conn->close();
}
?>


