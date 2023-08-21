<?php
$con = new mysqli("dwellspot", "root", "root", "dwellspot");
if ($con->connect_error) {
    die("Failed to connect to MYSQL: " . $con->connect_errno);
}

$username = $_POST['username'];
$password = $_POST["password"];
$phno = $_POST['phno']
$role = $_POST['role'];

if ($role === 'user') {
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role' AND phno='$phno'";
} else {
    $sql = "SELECT * FROM owners WHERE username='$username' AND password='$password' AND role='$role' AND phno='$phno'";
}
$result = $con->query($sql);
if ($result) {
    if ($result->num_rows > 0) {
        include 'main1.html';
        echo "";
    } else {
        include 'signin.html';
        echo '<script>alert("Invalid Password!")</script>';
    }
} else {
    //include 'signin.html';
    echo '<script>alert("Invalid Password!")</script>';
}
//include 'signin.html';
// $con->goto('signin.html');
?>