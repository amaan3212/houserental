<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: dbsignin.html"); // Redirect to login page if not logged in
    exit();
}

// Retrieve user data from the session or database
$userID = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

// Display the edit profile form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myprofile.css">
    <title>Edit Profile</title>
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="updateprofile.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $username; ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            
            <input type="submit" value="Save Changes">
        </form>
        <a href="myprofile.php">Back to Dashboard</a>
    </div>
</body>
</html>
