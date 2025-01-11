<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'health_tracker');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch emergency contacts
$sql = "SELECT * FROM emergency_contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Contacts</title>
    <link rel="stylesheet" href="css/healthcare_style.css">
</head>
<body>
    <h2>Emergency Contacts</h2>

    <h3>Hospitals & Pharmacies</h3>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Location</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></td>
            <td><a href="https://www.google.com/maps?q=<?php echo urlencode($row['name']); ?>" target="_blank">View on Map</a></td>
        </tr>
        <?php } ?>
    </table>

    <h3>Emergency Numbers</h3>
    <ul>
        <li>Ambulance: 101</li>
        <li>Fire Department: 102</li>
        <li>Police: 103</li>
    </ul>

    <button onclick="getNearestHospital()">Find Nearest Hospital</button>
    <button onclick="window.location.href='tel:9801234567'">Call Ambulance</button>

    <script>
        function getNearestHospital() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;

                    // Send user's location to the backend
                    fetch(`find_hospital.php?lat=${userLat}&lng=${userLng}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const hospital = data.hospital;
                                alert(`Nearest Hospital: ${hospital.name}, Address: ${hospital.address}, Phone: ${hospital.phone}`);
                            } else {
                                alert('No hospital found nearby.');
                            }
                        });
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }
    </script>
<a href="appointments.php">Appointments</a>

</body>
</html>

<?php
$conn->close();
?>
