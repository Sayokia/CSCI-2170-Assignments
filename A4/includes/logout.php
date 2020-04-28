<?php

// solution referred to Prof.'s slide, retrieved from https://www.php.net/manual/en/function.session-destroy.php


// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: ../login.php");
exit;
?>
