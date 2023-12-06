<?php
session_start(); // Start the session

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to homepage.php
header("Location: homepage.php");
exit;
?>
