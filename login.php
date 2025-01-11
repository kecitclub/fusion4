<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate admin credentials
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
    $stmt->execute([':username' => $username, ':password' => $password]);
    $admin = $stmt->fetch();

    if ($admin) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>