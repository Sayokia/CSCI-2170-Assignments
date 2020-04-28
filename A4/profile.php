<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php?error=1");
    exit;
}

require_once "db/db.php";



require "includes/function.php";
require "includes/header.php";
require "includes/nav.php";

$sql = "SELECT * FROM users WHERE users_id = {$_SESSION['user_id']}";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fname = $row['users_fname'];
        $lname = $row['users_lname'];
        $email = $row['users_email'];
        $phone = $row['users_phone'];
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
// Define variables and initialize with empty values
    $newEmail = $newPhone = $newFname = $newLname = $newPassword = "";
    $email_err = $phone_err = "";

    if (isset($_POST['email'])) {
        $newEmail = $_POST['email'];
        if (!validateData(2, $newEmail)) {
            $email_err = "Invalid Email format!";
        }
    }
    else{
        $newEmail = $email;
    }
    if (isset($_POST['phone'])) {
        $newPhone = $_POST['phone'];
        if (!validateData(1, $newPhone)) {
            $phone_err = "Invalid format! Please organize your phone number with '-'(e.g. (###)-(###)-(####)) ";
        }
    }
    else{
        $newPhone = $phone;
    }
    if (isset($_POST['fname'])) {
        $newFname = $_POST['fname'];
    }
    else{
        $newFname = $fname;
    }
    if (isset($_POST['lname'])) {
        $newLname = $_POST['lname'];
    }
    else{
        $newLname = $lname;
    }
    if (isset($_POST['pswd'])) {
        $newPassword = $_POST['pswd'];
    }
    else{
        $newPassword = $_SESSION['user_pswd'];
    }


// Make sure there is not error before execute the query
    if (empty($username_err) && empty($password_err)) {
        $hashPSWD = password_hash($newPassword, PASSWORD_DEFAULT);

        $sql1 = "UPDATE users SET users_fname = '$newFname', users_lname = '$newLname', users_phone = '$newPhone', users_email = '$newEmail'
                 WHERE users_id = {$_SESSION['user_id']}";
        if (!$conn->query($sql1)) {
            die ("Nooooooooo!" . $conn->error);
        }
        $sql2 = "UPDATE `login` SET `login_pswd` = '$hashPSWD' WHERE `login_id` = {$_SESSION['user_id']}";
        if (!$conn->query($sql2)) {
            die ("Nooooooooo!" . $conn->error);
        }
        // page refresh solution is inspired by cg20 https://blog.csdn.net/cg20/article/details/78589178?depth_1-utm_source=distribute.pc_relevant.none-task-blog-BlogCommendFromBaidu-2&utm_source=distribute.pc_relevant.none-task-blog-BlogCommendFromBaidu-2
        echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    }
}



?>
<main>
    <div class="container">
        <h1 class="text-center">Your Profile</h1>
        <form class="text-center" method="post" action="profile.php">
            <div class="row">
                <img src="img/defaultprofile.png" class="col-6">
                <div class="col-6">
                    <label>Name</label>
                    <input type="text" id="fname" name="fname" class="form-control " value="<?php echo $fname?>" disabled>
                    <input type="text" id="lname" name = "lname" class="form-control " value="<?php echo $lname?>" disabled>

                    <label for="email">Email Address</label>
                    <input type="email" id="email" name = "email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email?>" disabled>
                    <span class="invalid-feedback" style="color: red"><?php echo $email_err; ?></span>
                    <label for="username">Username</label>
                    <input type="text"  id="username" name = "username" class="form-control " value="<?php echo $_SESSION['username']?>" disabled>

                    <label for="pswd" >Password</label>
                    <input type="password"  id="pswd" name="pswd" class="form-control " value="<?php echo $_SESSION['user_pswd']?>" disabled>

                    <label for="phone">Phone number</label>
                    <input type="text"  id="phone" name = "phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone?>" disabled>
                    <span class="invalid-feedback" style="color: red"><?php echo $phone_err; ?></span>

                    <input type="button" class="btn btn-outline-primary" value="Edit" onclick="removeDisable()">
                    <div class="row">
                        <input type="submit" class="btn btn-primary col-5" value="Submit">
                        <div class="col-2"></div>
                        <input class="btn btn-primary col-5" value="Cancel" onclick="location.href='profile.php';">
                    </div>
            </div>

        </form>
        </div>

    </div>
</main>

<?php
require "includes/footer.php"
?>
