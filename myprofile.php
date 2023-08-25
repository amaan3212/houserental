<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="myprofile.css">
</head>
<body>
    <div class="profile-container">
    <?php
    session_start();
    
    if (isset($_SESSION['userType'])) {
        if ($_SESSION['userType'] === 'user') {
            $userData = $_SESSION['userData'];
            
            echo "<h1>Welcome! <br>". $userData['username']."</h1>";
            echo "<p>Username: " . $userData['username'] . "</p>";
            echo "<p>Phone Number: " . $userData['phno'] . "</p>";
            echo "<p>Email: " . $userData['email'] . "</p>";
            echo "<p>Role: " . $userData['role'] . "</p>";
             
            echo '<form action="editprofile.php" method="post">';
            echo '<button type="submit">Edit Profile</button>';
            echo '</form><br>';
            
            echo '<form action="logout.php" method="post">';
            echo '<button type="submit">Logout</button>';
            echo '</form>';

        } elseif ($_SESSION['userType'] === 'owner') {
            $ownerData = $_SESSION['ownerData'];
            echo "<h1>Welcome! <br>". $ownerData['username']."</h1>";
            echo "<p>Username: " . $ownerData['username'] . "</p>";
            echo "<p>Phone Number: " . $ownerData['phno'] . "</p>";
            echo "<p>Email: " . $ownerData['email'] . "</p>";
            echo "<p>Role: " . $ownerData['role'] . "</p>";
            
            echo '<form action="editprofile.php" method="post">';
            echo '<button type="submit">Edit Profile</button>';
            echo '</form><br>';
            
            echo '<form action="logout.php" method="post">';
            echo '<button type="submit">Logout</button>';
            echo '</form>';
            
        }
    } else {
        
        header("Location: main2.html");
        exit(); 
    }
    ?>
    </div>

</body>
</html>
