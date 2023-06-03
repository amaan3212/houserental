<?php
    $con = new mysqli("dwellspot","root","root","login");
    if ($con->connect_error) {
        die("Failed to connect to MYSQL : ". $con->connect_errno);
    }
    $sql="create table users(username varchar(200),password varchar(20),role radio)";
    $msql="create table owners(username varchar(200),password varchar(20),role radio)";
    if($res=$con->query($sql)){
        echo "login database used";
    }
    if($res=$con->query($msql)){
        echo "login database used";
    }
    $username = $_POST['username'];
    $password = $_POST["password"];
    $role = $_POST['role'];
    if ($role === 'user') {
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
      } elseif ($role === 'owner') {
        $sql = "INSERT INTO owners (username, password, role) VALUES ('$username', '$password', '$role')";
      } else {
        echo "Invalid role.";
        exit;
      } 
?>