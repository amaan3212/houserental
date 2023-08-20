<?php
    $con = new mysqli("dwellspot","root","root","dwellspot");
    if ($con->connect_error) {
        die("Failed to connect to MYSQL : ". $con->connect_errno);
    }
    $sql="CREATE TABLE contactus (name varchar(200) ,email varchar(225),phone varchar(20),message varchar(10000))";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST["phone"];
    $message = $_POST['message'];
    $sql = "INSERT INTO contactus (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
     if ($con->query($sql) === True) {
        include 'main.html';
        echo " ";
    }
?>