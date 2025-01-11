<?php
// Start session and check login
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'health_tracker');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle appointment booking
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['provider_id']) && isset($_POST['appointment_time'])) {
    $user_id = $_SESSION['user_id'];
    $provider_id = $_POST['provider_id'];
    $appointment_time = $_POST['appointment_time'];

    // Insert the appointment request into the database
    $sql = "INSERT INTO appointments (user_id, provider_id, appointment_time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iis', $user_id, $provider_id, $appointment_time);

    if ($stmt->execute()) {
        $message = "Appointment booked successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch providers for the dropdown
$providers = $conn->query("SELECT id, name, specialization FROM providers");

// Fetch appointment history for the user
$sql = "SELECT a.id, p.name AS provider_name, p.specialization, a.appointment_time, a.status, p.meeting_link 
        FROM appointments a
        JOIN providers p ON a.provider_id = p.id
        WHERE a.user_id = ? 
        ORDER BY a.appointment_time DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$appointments = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="css/healthcare_style.css">
</head>
<body>
    <h2>Book an Appointment</h2>

    <!-- Display success/error message -->
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <form action="appointments.php" method="POST">
        <label for="provider_id">Choose Provider:</label>
        <select name="provider_id" id="provider_id" required>
            <?php while ($provider = $providers->fetch_assoc()) { ?>
                <option value="<?php echo $provider['id']; ?>">
                    <?php echo $provider['name'] . " (" . $provider['specialization'] . ")"; ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <label for="appointment_time">Choose Time:</label>
        <input type="datetime-local" name="appointment_time" required>
        <br>
        <button type="submit">Book Appointment</button>
    </form>

    <h2>Your Appointment History</h2>
    <table border="1">
        <tr>
            <th>Provider</th>
            <th>Specialization</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($appointment = $appointments->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $appointment['provider_name']; ?></td>
            <td><?php echo $appointment['specialization']; ?></td>
            <td><?php echo $appointment['appointment_time']; ?></td>
            <td><?php echo $appointment['status']; ?></td>
            <td>
                <a href="<?php echo $appointment['meeting_link']; ?>" target="_blank">Join Video Call</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h3>Chat with Your Provider</h3>
    <div id="chat-box">
        <div id="messages"></div>
        <form id="chat-form">
            <input type="hidden" name="appointment_id" id="appointment_id" value="">
            <input type="text" id="chat-message" placeholder="Type a message" required>
            <button type="submit">Send</button>
        </form>
    </div>

    <script>
    // Listen for form submission to send a message
    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const message = document.getElementById('chat-message').value;
        const appointmentId = document.getElementById('appointment_id').value;

        fetch('chat_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `appointment_id=${appointmentId}&message=${encodeURIComponent(message)}`
        }).then(() => {
            document.getElementById('chat-message').value = '';
            loadMessages(appointmentId);
        });
    });

    // Load messages for the selected appointment
    function loadMessages(appointmentId) {
        fetch(`chat_handler.php?appointment_id=${appointmentId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const messagesDiv = document.getElementById('messages');
                    messagesDiv.innerHTML = '';
                    data.messages.forEach(msg => {
                        messagesDiv.innerHTML += `<p><strong>${msg.sender}:</strong> ${msg.message} <em>${msg.sent_at}</em></p>`;
                    });
                }
            });
    }

    // When the user clicks on a specific appointment, set the appointment_id
    function setAppointmentId(appointmentId) {
        document.getElementById('appointment_id').value = appointmentId;
        loadMessages(appointmentId);
    }
    </script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
