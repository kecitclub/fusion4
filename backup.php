<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "Susamaj";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_service'])) {
        $service_name = $conn->real_escape_string($_POST['service_name']);
        $description = $conn->real_escape_string($_POST['description']);

        $sql = "INSERT INTO services (name, description) VALUES ('$service_name', '$description')";

        if ($conn->query($sql) === true) {
            $message = "Service added successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }

    if (isset($_POST['delete_service'])) {
        $service_id = (int)$_POST['service_id'];

        $sql = "DELETE FROM services WHERE id = $service_id";

        if ($conn->query($sql) === true) {
            $message = "Service deleted successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }
}

$services = $conn->query("SELECT * FROM services");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Admin Portal</h1>

    <h2>Manage Services</h2>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <form method="POST">
        <label for="service_name">Service Name:</label>
        <input type="text" name="service_name" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <button type="submit" name="add_service">Add Service</button>
    </form>

    <h3>Existing Services</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $services->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="service_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_service">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <a href="logout.php">Logout</a>

</body>
</html>

<?php
$conn->close();
?>





