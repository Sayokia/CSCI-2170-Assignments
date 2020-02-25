<?php include "includes/header.php"; ?>
<?php include "includes/functions.php";
?>
<!-- this form takes user input and send to login_validation.php page to check identity-->
<main class="container text-center">
    <div class="mx-auto col-4">
    <form class="form-signin" action="login_validation.php" method="post">
        <img class="mb-4" src="images/logo.jpg" alt="logo" >
        <h2 class="form-signin-heading">Please Login</h2>
        <br>
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus >
        <br>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
        <br>
        <button class="btn btn-primary btn-block" type="submit" >Submit</button>
    </form>
    </div>
    <?php
    // if error message is sent by the header of login_validation, an error message should be displayed
    if (isset($_GET['error'])){
        if ($_GET['error'] = 1){
            echo "<br><h2 style='color: red;'>Incorrect username or password! Please Try again!</h2>";
        }
        }
    ?>
</main>







<?php include "includes/footer.php"; ?>

