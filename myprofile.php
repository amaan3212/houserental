<?php
session_start();

if (isset($_SESSION['username'])) {
    $userId = $_SESSION['username'];
    $owner = $_SESSION['owner'];

    if ($owner) {
        include 'ownerprofile.php';
    } else {
        include 'userprofile.php';
    }
}
?>