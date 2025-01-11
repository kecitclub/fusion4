<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'health_tracker');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch providers
$sql = "SELECT * FROM providers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teleconsultation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Teleconsultation - Connect with Local Healthcare Providers</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Specialization</th>
            <th>Contact</th>
            <th>Availability</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['specialization']; ?></td>
            <td><a href="tel:<?php echo $row['contact']; ?>"><?php echo $row['contact']; ?></a></td>
            <td><?php echo $row['availability']; ?></td>
            <td>
                <a href="<?php echo $row['meeting_link']; ?>" target="_blank">Start Consultation</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php
// Handle appointment booking
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id']; // Ensure user is logged in
    $provider_id = $_POST['provider_id'];
    $appointment_time = $_POST['appointment_time'];

    $sql = "INSERT INTO appointments (user_id, provider_id, appointment_time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iis', $user_id, $provider_id, $appointment_time);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!-- Add Appointment Form -->
<form action="providers.php" method="POST">
    <label for="provider_id">Choose Provider:</label>
    <select name="provider_id" id="provider_id">
        <?php
        $providers = $conn->query("SELECT id, name FROM providers");
        while ($provider = $providers->fetch_assoc()) {
            echo "<option value='{$provider['id']}'>{$provider['name']}</option>";
        }
        ?>
    </select>
    <br>
    <label for="appointment_time">Choose Time:</label>
    <input type="datetime-local" name="appointment_time" required>
    <br>
    <button type="submit">Book Appointment</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
