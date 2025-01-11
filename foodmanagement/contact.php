<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include 'navbar.html'; ?>
    </header>
    <main>
        <h2>Get in Touch</h2>
        <form method="POST" action="dbcontact.php">
            <div class="row">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required> <br> <br>
            </div>
            <div class="row">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea> <br> <br>
            </div>
            <button type="submit">Send</button>
            
        </form>
    </main> 
    <?php include 'foot.html'; ?> 
    
</body>
</html>
