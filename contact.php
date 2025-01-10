<?php
echo "<style>
body {
    background-color: #f1f8fc;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    flex-direction: column;
}

/* Navigation bar styling */
nav {
    background-color:rgb(77, 206, 174);
    width: 100%;
    padding: 15px 0;
    text-align: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 10;
}
nav a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    margin: 0 15px;
    padding: 10px;
    transition: background-color 0.3s ease;
}
nav a:hover {
    background-color: #45a049;
    border-radius: 5px;
}

/* Heading and form area */
h1, h2 {
    text-align: center;
    color: black;
    margin-top: 100px; /* Adjust to avoid overlap with navbar */
}

h1 {
    font-size: 2.5em;
    font-weight: bold;
}

h2 {
    font-size: 1em;
    color: black
}

/* Contact form styling */
form {
    background-color:#FBF5E5 ;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    margin: 40px 0;
}

form input, form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

/* Input and button focus states */
form input:focus, form textarea:focus {
    border-color:rgb(57, 174, 197);
    outline: none;
}

/* Submit button styling */
form input[type='submit'] {
    background-color:rgb(73, 190, 205);
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    padding: 15px;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

form input[type='submit']:hover {
    background-color:rgb(128, 210, 132);
}

/* Success and error messages */
p {
    font-size: 16px;
    text-align: center;
}

.success {
    color: green;
}

.error {
    color: red;
}
</style>";

echo "<nav>";
echo "<a href='index.php'>Home</a>";
echo "<a href='about.php'>About</a>";
echo "<a href='contact.php'>Contact</a>";
echo "</nav>";

echo "<div>";
echo "<h1>Contact Us</h1>";
echo "<h2>If you have any questions or suggestions, feel free to reach out to us using the form below:</h2>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<p class='error'>All fields are required. Please fill out the form completely.</p>";
    } else {
        echo "<p class='success'>Thank you, $name. Your message has been received. We will get back to you soon!</p>";
    }
}
?>
<div style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; max-width: 600px;">
    <form action="contact_info.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>
