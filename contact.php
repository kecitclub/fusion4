<?php
//consistency in the code for navigation bar
echo "<nav>";
echo "<a href='index.php'>Home</a>|";
echo "<a href='about.php'>About</a>|";
echo "<a href='contact.php'>Contact</a>|";
echo "</nav>";
echo "<hr>";

echo "<h1>Contact Us</h1>";
echo "<p>If you have any questions or suggestions, feel free to reach out to us using the form below:</p>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<p style='color: red;'>All fields are required. Please fill out the form completely.</p>";
    } else {
       
        echo "<p style='color: green;'>Thank you, $name. Your message has been received. We will get back to you soon!</p>";
        
    }
}
?>

<form method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="subject">Subject:</label><br>
    <input type="text" id="subject" name="subject" required><br><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" required></textarea><br><br>

    <input type="submit" value="Submit">
