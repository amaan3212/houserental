<?php
$con = new mysqli("dwellspot", "root", "root", "dwellspot");
if ($con->connect_error) {
    die("Failed to connect to MYSQL: " . $con->connect_errno);
}

$username = $_POST['username'];
$password = $_POST["password"];
$role = $_POST['role'];

if ($role === 'user') {
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
} else {
    $sql = "SELECT * FROM owners WHERE username='$username' AND password='$password' AND role='$role'";
}
$result = $con->query($sql);
if ($result) {
    if ($result->num_rows > 0) {
        include 'main1.html';
        echo "";
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo "Invalid password.";
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid password.";
}
$con->close();
?>