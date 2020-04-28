<?php
require "includes/function.php";
require "db/db.php";


// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php?error=1");
    exit;
}

require "includes/header.php";
require "includes/nav.php";

if (isset($_POST["name"])) {
  $name = purgeCharacter($_POST["name"]);
  if (empty($name)) {
      $id = $_SESSION["user_id"];
      $name = "My List ".getTODOid($id);
  }

if (addTODOList($name,$_SESSION["user_id"])) {
  header("Location: dashboard.php");
}else{
  $error_tips = "Add new TODO List failed, please try again.";
}

}


?>
<main>
    <div class="container">
        <h1 class="text-center">Add New TODO</h1>
        <form class="text-center" method="post" action="newList.php">
            <div class="row">
                <div class="col-12">
              <input type="text" class="form-control" placeholder="Please type the TODO List name" name="name" aria-label="Name" aria-describedby="Please type the TODO List name">
              <span class="invalid-feedback" style="color: red"><?php echo $error_tips; ?></span>


                    <div class="row">
                        <input type="submit" class="btn btn-primary col-5" value="Save the list">
                        <div class="col-2"></div>
                        <input class="btn btn-secondary col-5" value=" Discard the list" onclick="location.href='dashboard.php';">
                    </div>
            </div>

        </form>
        </div>

    </div>
</main>

<?php
require "includes/footer.php"
?>
