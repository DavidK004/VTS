<?php
session_start();    // Start or resume session
session_unset();    // Remove all session variables
session_destroy();  // Destroy the session completely

// Optionally redirect to login page or homepage
header("Location: login.php");
exit;
?>
