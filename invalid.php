<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $expectedPassword = "correctpassword"; // Replace with your correct password

    $enteredPassword = $_POST["password"];

    if ($enteredPassword === $expectedPassword) {
        echo "Password is correct.";
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo "Invalid password.";
    }
}
?>
