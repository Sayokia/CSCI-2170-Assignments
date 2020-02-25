<?php
session_start();
$_SESSION = array();
session_destroy();
echo "<a href='index.php'>You have successfully log out. Click here to go back to course list.</a>"
?>
