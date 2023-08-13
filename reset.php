<?php
$servername = "dwellspot";
$username = "root";
$password = "root";
$dbname = "dwellspot";
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $role = $_POST['role'];
}
if ($role === 'user') {
    $sql = "UPDATE users SET password='$password' WHERE email='$email'";
} else {
    $sql = "UPDATE owners SET password='$password' WHERE email='$email'";
}
if($con->query($sql) === True) {
    include 'main.html';
    echo " ";
}
?>
