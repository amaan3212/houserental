<?php
session_start();


if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === 'user') {
        $userData = $_SESSION['userData'];
    
    } elseif ($_SESSION['userType'] === 'owner') {
        $ownerData = $_SESSION['ownerData'];
       
    }
} else {
    
    header("Location: dbsignin1.html");
    exit(); 
}
?>


