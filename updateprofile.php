<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the user is logged in
    if (!isset($_SESSION['username'])) {
        $_SESSION['message'] = "Please log in to update your profile.";
        header("Location: myprofile.html");
        exit;
    }

    // Get user ID from the session
    $username = $_SESSION['username'];

    // Retrieve data from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform data validation (you should perform more thorough validation)
    if (empty($username) || empty($email)) {
        $_SESSION['message'] = "Name and email are required fields.";
        header("Location: myprofile.html");
        exit;
    }

    // Update the user's profile in the database
    $conn = mysqli_connect("dwellspot", "root", "root", "dwellspot");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "UPDATE users SET username='$username', email='$email', password='$password WHERE username='$username'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Profile updated successfully.";
    } else {
        $_SESSION['message'] = "Error updating profile: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    // Redirect back to profile page
    header("Location: myprofile.html");
    exit;
} else {
    // Redirect if accessed directly without a POST request
    header("Location: myprofile.html");
    exit;
}
?>