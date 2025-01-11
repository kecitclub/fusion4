<?php
    $host= 'localhost';
    $db= 'food_management';
    $user= 'root';
    $pw= '';
        $conn = mysqli_connect($host, $user, $pw, $db);
        if(!$conn){
            die("Connection Failed: ".mysqli_connect_error());
        }   
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
            $msg = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';
            

            if (!empty($email) && !empty($msg)) {
                $stmt = $conn->prepare("INSERT INTO contact (email, msg) VALUES (?, ?)");
                if ($stmt) {
                    $stmt->bind_param("ss", $email, $msg); 
                    if ($stmt->execute()) {
                        echo "Message sent successfully!";
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }
            } else {
                echo "Email and message are required.";
            }
        }
        
        $conn->close();
?>