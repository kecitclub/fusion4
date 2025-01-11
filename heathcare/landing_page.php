<?php
// Start session to check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Health Tracker</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to your CSS file -->
    <style>
        /* Inline styling for specific elements */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 600px;
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #0066cc;
            margin-bottom: 20px;
        }
        .options a {
            display: block;
            text-decoration: none;
            background-color: #0066cc;
            color: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .options a:hover {
            background-color: #004d99;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Health Tracker</h1>
        <p>Select an option below:</p>
        <div class="options">
            <a href="dashboard.php">Dashboard</a>
            <a href="emergency_contacts.php">Emergency Contacts</a>
            <a href="appointments.php">Appointments</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
