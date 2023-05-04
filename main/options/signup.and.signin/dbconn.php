<?php
    $con = new mysqli("dwellspot","root","root","login");
    if ($con->connect_error) {
        die("Failed to connect to MYSQL : ". $con->connect_errno);
    }
    $sql="create table data(username varchar(200),password varchar(20))";
    if($res=$con->query($sql)){
        echo "login database used";
    }
    $username = $_GET['username'];
    $password = $_GET["password"];
    $sql="INSERT INTO data (username,password) VALUES ('$username', '$password')";
    if($res=$con->query($sql)){
        echo "inserted";
    }
?>
