<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
    <link rel="stylesheet" href="allprofiles.css">
</head> <center><form>
        <p align="center">
            <input type="search" placeholder="Search Here">
            <button type="submit">Search</button>
        </p>
</center>
</form>
<body>
<?php
session_start();

if (isset($_SESSION['userType'])) {
    include 'dbcon.php';

    // Delete Profile Logic

    $sql = "SELECT * FROM contactus";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $profiles[] = $row;
        }
    }

    echo '<div class="profile-container">';

    foreach ($profiles as $profile) {
        echo "<div class='profile'>";
        echo "<h1>".$profile['name'] . "'s Profile</h1>";
        echo "<p>Username: " . $profile['name'] . "</p>";
        echo "<p>Email: " . $profile['email'] . "</p>";
        echo "<p>Phone Number: " . $profile['phone'] . "</p>";
        echo "<p>Message: " . $profile['message'] . "</p>";
        echo '<form action="delete1.php" method="post">';
        echo "<button type='submit' name='delete' value='".$profile['name']."'>Delete</button>";
        echo "</form>";
        echo "</div>";
    }

} else {
    header("Location: contactus.html");
    exit();
}
?>

</body>
<script>
window.onpopstate = function() {
    window.location.href = "adminmain.html";
};
</script>
</html>
