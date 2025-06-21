

<?php
// auth.php - used to protect secure pages

session_start(); // important: starts the session

if (!isset($_SESSION['username'])) {
    // Not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>
