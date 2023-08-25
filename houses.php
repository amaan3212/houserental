<!DOCTYPE html>
<html>
<head>
    <title>All Houses</title>
    <link rel="stylesheet" href="houses.css">
</head>
<body>
    <div class="container">
        <h1>All Houses</h1>
        <?php
        session_start();
        $userType = isset($_SESSION['userType']) ? $_SESSION['userType'] : '';

        if ($userType === 'owner') {
            header("Location: house.html");
            exit();
        } elseif ($userType === 'user') {
            include 'dbcon.php';

            $sql = "SELECT * FROM houses";
            $result = $con->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='house'>";
                    echo "<h2>" . $row['housetype'] . "</h2>";
                    echo "<p>Location: " . $row['location'] . "</p>";
                    echo "<p>Price: $" . $row['price'] . "</p>";
                    echo "<p>Owners Phone Number: " . $row['phno'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No houses available.</p>";
            }
        } else {
            echo "<p>Please sign in or sign up to access this page.</p>";
        }
        ?>
    </div>
</body>
</html>
