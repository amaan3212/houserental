<?php
session_start(); // Start the session

if (!isset($_SESSION['phno'])) {
    header("Location: dbsignin.html"); // Redirect to login page if not logged in
    exit();
}

// Retrieve user data from the session or database
$phno = $_SESSION['phno'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];

// Display the dashboard
include "myprofile.html";
?>
