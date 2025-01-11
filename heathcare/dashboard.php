<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');  // Redirect to login if not logged in
    exit();
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'health_tracker');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to log health data
if (isset($_POST['log_health'])) {
    $user_id = $_SESSION['user_id'];
    $date = date('Y-m-d');  // Use current date
    $water_ml = $_POST['water_ml'];
    $calories = $_POST['calories'];
    $workout_minutes = $_POST['workout_minutes'];
    $sleep_hours = $_POST['sleep_hours'];

    // Insert the health log into the database
    $sql = "INSERT INTO health_logs (user_id, date, water_ml, calories, workout_minutes, sleep_hours)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issiii', $user_id, $date, $water_ml, $calories, $workout_minutes, $sleep_hours);
    
    if ($stmt->execute()) {
        echo "Health data logged successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch user's health logs
$sql = "SELECT * FROM health_logs WHERE user_id = ? ORDER BY date DESC LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// Arrays to store the data for the chart
$dates = [];
$water_ml = [];
$calories = [];
$workout_minutes = [];
$sleep_hours = [];

// Populate the arrays with data from the database
while ($row = $result->fetch_assoc()) {
    $dates[] = $row['date'];
    $water_ml[] = $row['water_ml'];
    $calories[] = $row['calories'];
    $workout_minutes[] = $row['workout_minutes'];
    $sleep_hours[] = $row['sleep_hours'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/healthcare_style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php">Logout</a>
    
    <h3>Log Your Health Data</h3>
    <form action="dashboard.php" method="POST">
        <label for="water_ml">Water Intake (ml):</label>
        <input type="number" id="water_ml" name="water_ml" required><br>
        
        <label for="calories">Calories Consumed:</label>
        <input type="number" id="calories" name="calories" required><br>
        
        <label for="workout_minutes">Workout (minutes):</label>
        <input type="number" id="workout_minutes" name="workout_minutes" required><br>
        
        <label for="sleep_hours">Sleep (hours):</label>
        <input type="number" step="0.1" id="sleep_hours" name="sleep_hours" required><br>
        
        <button type="submit" name="log_health">Log Data</button>
    </form>
    <a href="register.php">Register Here</a>


    <h3>Your Recent Health Logs</h3>
    <table border='1'>
        <tr>
            <th>Date</th>
            <th>Water (ml)</th>
            <th>Calories</th>
            <th>Workout (mins)</th>
            <th>Sleep (hours)</th>
        </tr>

        <?php foreach ($dates as $key => $date) { ?>
        <tr>
            <td><?php echo $date; ?></td>
            <td><?php echo $water_ml[$key]; ?></td>
            <td><?php echo $calories[$key]; ?></td>
            <td><?php echo $workout_minutes[$key]; ?></td>
            <td><?php echo $sleep_hours[$key]; ?></td>
        </tr>
        <?php } ?>
    </table>

    <h3>Your Health Data Visualization</h3>
    <canvas id="healthChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('healthChart').getContext('2d');
        var healthChart = new Chart(ctx, {
            type: 'line',  // Line chart type
            data: {
                labels: <?php echo json_encode($dates); ?>,  // Dates for x-axis
                datasets: [{
                    label: 'Water Intake (ml)',
                    data: <?php echo json_encode($water_ml); ?>,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    fill: false
                },
                {
                    label: 'Calories Consumed',
                    data: <?php echo json_encode($calories); ?>,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    fill: false
                },
                {
                    label: 'Workout Time (minutes)',
                    data: <?php echo json_encode($workout_minutes); ?>,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false
                },
                {
                    label: 'Sleep (hours)',
                    data: <?php echo json_encode($sleep_hours); ?>,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    fill: false
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
