<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}

// Connect to your database
$servername = "dwellspot";
$username = "root";
$password = "root";
$dbname = "dwellspot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve updated user information from the form
$name = $_POST['name'];
$email = $_POST['email'];

$phno = $_SESSION['phno'];
$role = $_SESSION['role'];

// Update the user's profile information based on the user type
if ($userType == "user") {
    $query = "UPDATE users SET username='$name', email='$email' WHERE phno='$phno'";
} elseif ($userType == "owner") {
    $query = "UPDATE owners SET username='$name', email='$email' WHERE phno='$phno'";
}

if ($conn->query($query) === TRUE) {
    $_SESSION['username'] = $name; // Update the session with the new name
    $_SESSION['email'] = $email;   // Update the session with the new email
    header("Location: myprofile.php?success=1");
} else {
    echo "Error updating profile: " . $conn->error;
}

$conn->close();
?>
