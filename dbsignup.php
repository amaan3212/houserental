<?php
    $con = new mysqli("dwellspot","root","root","dwellspot");
    if ($con->connect_error) {
        die("Failed to connect to MYSQL : ". $con->connect_errno);
    }
    $sql="CREATE TABLE users (username varchar(200) primary key,email varchar(225),password varchar(20),role ENUM('user','owner'),phno varchar(20)";
    $msql="CREATE TABLE owners (username varchar(200) primary key,email varchar(225),password varchar(20),role ENUM('user','owner'),phno varchar(20)";
    if($res=$con->query($sql)){
        echo "login database used";
    }
    if($res=$con->query($msql)){
        echo "login database used";
    }
    $username = $_POST['username'];
    $email = $_POST['mail'];
    $password = $_POST["password"];
    $phno = $_POST['phno'];
    $role = $_POST['role'];
    if ($role === 'user') {
        $sql = "INSERT INTO users (username, email, password, role, phno) VALUES ('$username', '$email', '$password', '$role', '$phno')";
      } elseif ($role === 'owner') {
        $sql = "INSERT INTO owners (username, email, password, role, phno) VALUES ('$username','$email', '$password', '$role', '$phno')";
      } else {
        echo "Invalid role.";
        exit;
      } 
      if ($con->query($sql) === True) {
        include 'main1.html';
        echo " ";
    }
?>