<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'health_tracker');
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// Get user location from query parameters
if (isset($_GET['lat']) && isset($_GET['lng'])) {
    $userLat = $_GET['lat'];
    $userLng = $_GET['lng'];

    // Query to find the nearest hospital
    $sql = "SELECT name, address, phone, 
        (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) 
        + sin(radians(?)) * sin(radians(latitude)))) AS distance 
        FROM emergency_contacts 
        WHERE type = 'hospital' 
        ORDER BY distance 
        LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ddd', $userLat, $userLng, $userLat);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode(['success' => true, 'hospital' => $row]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No hospital found']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid location parameters']);
}

$conn->close();
?>
