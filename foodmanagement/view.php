<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Listings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include 'navbar.html'; ?>
    </header>
    <main>
        <h2>Available Food Donations</h2><br><br>
        <?php if (empty($donations)): ?>
            <p>No donations available at the moment.</p>
        <?php else: ?>
            <ul>
                <?php 
                    session_start();
                    $donations = isset($_SESSION['donations']) ? $_SESSION['donations'] : [];
                    foreach ($donations as $donation): ?>
                    <li>
                        <strong>Name:</strong> <?= $donation['name'] ?>, <br><br>
                        <strong>Food Type:</strong> <?= $donation['food_type'] ?>, <br><br>
                        <strong>Quantity:</strong> <?= $donation['quantity'] ?>, <br><br>
                        <strong>Pickup Location:</strong> <?= $donation['pickup_location'] ?><br><br>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main> 
    <?php include 'foot.html'; ?> 
</body>
</html>
