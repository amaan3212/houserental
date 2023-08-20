<?php
session_start();

if (!$_SESSION['owner']) {
    $userId = $_SESSION['username'];
    $conn = mysqli_connect("dwellspot", "root", "root", "dwellspot");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM users WHERE id = $username";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="profile-details">
            <h2><?php echo $row['username']; ?>'s Profile</h2>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Password:</strong> <?php echo $row['password']; ?></p>
        </div>
        <?php
    } else {
        echo "User not found.";
    }

    mysqli_close($conn);
} else {
    echo "Access denied.";
}
?>