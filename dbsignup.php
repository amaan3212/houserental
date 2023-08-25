<?php
include 'dbcon.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST["password"];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];

    if ($role === 'user' || $role === 'owner') {
        $sql = "INSERT INTO " . ($role === 'user' ? 'users' : 'owners') . " (username, email, password, phno, role) VALUES ('$username', '$email', '$password', '$phno', '$role')";

        if ($con->query($sql) === true) {
            // Set session variables
            if ($role === 'user') {
                $_SESSION['userData'] = [
                    'username' => $username,
                    'phno' => $phno,
                    'email' => $email,
                    'role' => $role
                ];
                $_SESSION['userType'] = 'user';
            } elseif ($role === 'owner') {
                $_SESSION['ownerData'] = [
                    'username' => $username,
                    'phno' => $phno,
                    'email' => $email,
                    'role' => $role
                ];
                $_SESSION['userType'] = 'owner';
            }

            // Redirect to the profile page
            echo '<script>alert("Successfully Signedup!")</script>';
            header("Location: main2.html");
            exit();
        } else {
          echo '<script>alert("UserName/Mail not available!")</alert>';
        }
    } else {
        echo "Invalid role.";
    }
}
?>
