<?php
session_start();

//include db config
require_once "db.php";

// Define variables and initialize with empty values
$username = $password = "";

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);


$query = "SELECT  login_pswd,login_user_id from a3login where login_uname='{$username}'";

$result = $conn ->query($query);

if ($result->num_rows>0){
    $row = $result->fetch_assoc();
    if ($password==$row['login_pswd']){
        $_SESSION["loggedin"] = true;
        $_SESSION['username']= $username;
        $ID = $row['login_user_id'];

        $sql = "select * from a3users where users_id = '{$ID}'";
        $userInfo = $conn->query($sql);
        $userRow = $userInfo->fetch_assoc();
        $firsName = $userRow['users_fname'];
        $lastName = $userRow['users_lname'];
        $_SESSION['fullName'] = $firsName." ".$lastName;
        header("location:../index.php");
    }
    else{
        header("location:../index.php?error=0");
    }
}
else{
    header("location:../index.php?error=1");
}


