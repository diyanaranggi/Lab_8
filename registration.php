<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db.php'); // Make sure db.php contains $con = mysqli_connect(...);

// If form submitted, insert values into the database.
if (isset($_POST['username'])) {
    // Clean user input
    $username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
    $email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
    $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));
    $trn_date = date("Y-m-d H:i:s");

    // Hash the password using md5 (consider upgrading to password_hash() for better security)
    $hashed_password = md5($password);

    // SQL insert query
    $query = "INSERT INTO users (username, email, password, trn_date)
              VALUES ('$username', '$email', '$hashed_password', '$trn_date')";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<div class='form'>
                <h3>You are registered successfully.</h3>
                <br/>Click here to <a href='login.php'>Login</a>
              </div>";
    } else {
        echo "<div class='form'>
                <h3>Error occurred during registration.</h3>
              </div>";
    }
} else {
?>
    <div class="form">
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>
    </div>
<?php 
}
?>
</body>
</html>
