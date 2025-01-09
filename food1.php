<?php
session_start();
    if ($_SERVER['REQUEST METHOF']==='POST' && $_SESSION['role']==='donor'){
        $foodtype = $_POST['food_type'];
        $foodname = $_POST['food_name'];
        $quantity = $_POST['quantity'];
        $expiration = $_POST['expiry_date'];
        $location = $_POST['location'];

    }
    
?>