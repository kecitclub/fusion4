<?php
// Start session to get user ID
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'health_tracker');
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// Handle saving chat messages (POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $sender_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    // Insert the message into the chat table
    $sql = "INSERT INTO chats (appointment_id, sender_id, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iis', $appointment_id, $sender_id, $message);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => $stmt->error]);
    }
    $stmt->close();
    exit();
}

// Handle retrieving chat messages (GET)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $appointment_id = $_GET['appointment_id'];

    // Query to get the chat messages for this appointment
    $sql = "SELECT c.message, c.sent_at, u.name AS sender 
            FROM chats c 
            JOIN users u ON c.sender_id = u.id 
            WHERE c.appointment_id = ? 
            ORDER BY c.sent_at ASC";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $appointment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode(['success' => true, 'messages' => $messages]);
    $stmt->close();
    exit();
}

// Close the database connection
$conn->close();
?>
