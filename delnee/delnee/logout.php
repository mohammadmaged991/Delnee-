<?php
// Start the session
session_start();

// Destroy the session
session_unset();  // Remove all session variables
session_destroy();  // Destroy the session

// Redirect the user to the login page (or home page)
header("Location: index.php");
exit();
?>
