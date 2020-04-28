<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php?error=1");
    exit;
}

if (!isset($_SESSION['user_type']) || $_SESSION['user_type']!=0){
    header("location: dashboard.php");
    exit;
}

require_once "db/db.php";



require "includes/processform.php";
require "includes/header.php";
require "includes/nav.php";
?>

<main>

    <h1 class="text-center">User Information Table</h1>

    <table class="table table-sm text-center">
        <thead style="color: purple">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Full Name</th>
            <th scope="col">Email Address</th>
        </tr>
        </thead>
        <tbody style="color: green">
        <?php

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['users_id']}</td>";
                echo "<td> {$row['users_fname']} {$row['users_lname']}  </td>";
                echo "<td> {$row['users_email']}</td>";
                echo "</tr>";
            }
        }
        else {
            echo "No user stored in the database";

        }
        ?>
        </tbody>
    </table>

</main>


<?php
require "includes/footer.php";
?>

