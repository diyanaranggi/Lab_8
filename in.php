<?php
session_start(); // Required to use $_SESSION
// include("auth.php"); // optional: use this if you want to restrict access
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "dyan "; ?>!</p>
        <p>This is a secure area.</p>
        <p><a href="dashboard.php">Dashboard</a></p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
