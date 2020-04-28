<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to index page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

// Include config file
require_once "db/db.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// check if variables are empty
if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }


    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Make sure there is not error before execute the query
    if(empty($username_err) && empty($password_err)){
        // prepare a select statement
        $sql = "SELECT login_id, login_uname, login_pswd FROM login WHERE login_uname = ?";

        if($stmt = $conn->prepare($sql)){
            // bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $stmt->store_result();
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){
                    // Bind result variables
                    $stmt->bind_result($login_id, $username, $login_pswd);
                    if($stmt->fetch()){
                        if(password_verify($password, $login_pswd)){
                            // Password is correct, so start a new session
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $login_id;
                            $_SESSION["username"] = $username;
                            $_SESSION['user_pswd'] = $password;

                            $userQuery = "SELECT users_type FROM users where users_id = {$login_id}";
                            $result = $conn->query($userQuery);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    $_SESSION['user_type'] = $row['users_type'];
                                }
                            }

                            else{
                                header("location: login.php?error=2");
                            }

                            header("location: dashboard.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password does not match the user!";
                        }
                    }
                } else{
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        $stmt->close();
    }


    $conn->close();
}
?>

<?php
require "includes/header.php";
?>


<body class="login">


<main>
    <div>
        <div class="d-flex justify-content-center">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h3 class="text-center">Please Login</h3>

                <hr style="margin: 20px auto;">
                <div class="form-group row ">
                    <label class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Enter your username">
                        <span class="invalid-feedback" style="color: red"><?php echo $username_err; ?></span>
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Enter your password">
                        <span class="invalid-feedback" style="color: red"><?php echo $password_err; ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login" style="width: 80%;margin-left: 10%;">
                </div>
            </form>
        </div>
        <?php
        if (isset($_GET['error']) && $_GET['error']==1){
            echo "<p class='text-center' style='color: red'>You need to login to use the features of this site! </p>";
        }
        ?>
    </div>
</main>

</body>
</html>
