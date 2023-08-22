<?php
    if(isset($username) || isset($mail) || isset($password) || isset($role)){
    $username = $_POST['username'];
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $role = $_POST['role'];
     
    $con = new mysqli("dwellspot","root","root","dwellspot");
    if ($con->connect_error) {
        die("Failed to connect to MYSQL : ". $con->connect_errno);
    }

    if($res=$con->query($sql)){
        echo "login database used";
    }
    if($res=$con->query($msql)){
        echo "login database used";
    }

    if ($role === 'user') {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
      } elseif ($role === 'owner') {
        $msql = "INSERT INTO owners (username, email, password) VALUES ('$username','$email', '$password')";
      } else {
        echo "Invalid role.";

      } 
      if ($con->query($sql) === True) {
        header('Location: main1.html');
        exit;
    }
    }
?>
