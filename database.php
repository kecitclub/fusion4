<?php
    $host= 'localhost';
    $db= 'fooddb';
    $user= 'root';
    $pw= '';
        $conn = mysqli_connect($host, $user, $pw, $db);
        if(!$conn){
            die("Connection Failed: ".mysqli_connect_error());
        }
    $conn->close();
    
?>