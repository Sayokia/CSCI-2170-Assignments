<?php
include "includes/functions.php";
// start session
session_start();

//check if all login information is sent
if (isset($_POST['username']) && isset($_POST['password'])) {
    //receive the user information submitted
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // call validation function to check if the information submitted is valid
    if (validation($username, $password,"db/up_login.csv")) {
        // if it is valid, set Sessions and redirect user to student_profile page
        $_SESSION['username'] = $username;
        $_SESSION['studentName'] = studentName($username,"db/up_login.csv");
        $_SESSION['loginStatus'] = true;
        $_SESSION['codeTaken'] = array();
        header('location:student_profile.php');
    } else {
        // if validation did not pass, return user to login page and sent error to display error message
        header('location:login.php?error=1');
    }
}




?>