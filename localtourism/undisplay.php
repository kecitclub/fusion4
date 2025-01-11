<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'website'; // Replace with your database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT place_name, location, description,location, submitted_by, created_at FROM unexplored_places ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unexplored Places</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        .place-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .place-card h3 {
            color: #333;
        }

        .place-card p {
            margin: 5px 0;
        }

        .submitted-by {
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Unexplored Places</h1>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="place-card">
                <h3><?php echo htmlspecialchars($row['place_name']); ?></h3>
                <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                <p class="submitted-by">Submitted by: <?php echo htmlspecialchars($row['submitted_by']); ?> on <?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No unexplored places have been submitted yet.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
</body>
</html>
