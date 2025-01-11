<?php
// Fetch reviews from the database
$sql = "SELECT * FROM reviews WHERE destination = 'Kathmandu' ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='review'>";
        echo "<h4>" . $row['name'] . " (Rating: " . $row['rating'] . "/5)</h4>";
        echo "<p>" . $row['message'] . "</p>";
        echo "<small>Reviewed on: " . $row['created_at'] . "</small>";
        echo "</div>";
    }
} else {
    echo "No reviews yet.";
}
?>

