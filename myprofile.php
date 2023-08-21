<?php
session_start(); // Start the session

if (!isset($_SESSION['user_id'])) {
    header("Location: dbsignin.html"); // Redirect to login page if not logged in
    exit();
}

// Retrieve user data from the session or database
$userID = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$userType = $_SESSION['user_type'];

// Display the dashboard
include "myprofile.html";
?>
