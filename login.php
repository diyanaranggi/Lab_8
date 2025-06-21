<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php
require('db.php');
session_start();

// Show errors if any
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the login form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {

    // Sanitize and escape input
    $username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));
    $hashed_password = md5($password); // match your stored hash

    // Query to check if the user exists
    $query = "SELECT * FROM `users` WHERE username='$username' AND password='$hashed_password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) === 1) {
        // Login success
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        // Login failed
        echo "<div class='form'>
                <h3>Invalid username or password.</h3>
                <br/>Click here to <a href='login.php'>Login</a> again.
              </div>";
    }
}
?>

<!-- Login Form -->
<div class="form">
    <h1>Log In</h1>
    <form action="" method="post" name="login">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="submit" name="submit" value="Login" />
    </form>
    <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>

</body>
</html>
