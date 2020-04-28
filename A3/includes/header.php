<?php 
    session_start();
	require "includes/db.php";
	require "includes/functions.php"; 

?><!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo getWebsiteName(); ?></title>
		<meta charset="utf-8">
		<!-- Bootstrap core CSS -->
		<!-- Used from https://www.getbootstrap.com, 29 January 2019 -->
		<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

		<!-- Custom CSS styles -->
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>

		<header>
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<a class="navbar-brand" href="index.php"><?php echo getWebsiteName(); ?></a>
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="theforce.php">The Force</span></a>
						</li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                // Check if the user is already logged in
                                if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                                    echo "Login";
                                }
                                else{
                                    echo $_SESSION['fullName'];
                                }
                                ?>
                            </a>
                            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px;">
                            <?php
                                if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                                    echo <<<login
                                <form class="form-horizontal" method="post" action="includes/login.php">    
                                    <label class="col-form-label">Username: </label>
                                    <input class="form-control login" type="text" name="username" placeholder="Username" required>
                                    <br>
                                    <label class="col-form-label">Password: </label>
                                    <input class="form-control login" type="password" name="password" placeholder="Password" required>
                                    <br>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                                </form>
login;
                                }
                                else{
                                    echo "<a class=\"btn btn-outline-primary\" href='includes/logout.php'> Logout</a>";
                                }

                                    ?>
                            </div>
                        </li>
                        <li class="nav-item" >
                            <?php
                            if (isset($_GET['error'])){
                            if ($_GET['error']==0){
                            echo "<a class=\"nav-link\" style='color: red'>Invalid username or password</a>";
                            }
                            if ($_GET['error']==1){
                                echo "<a class=\"nav-link\" style='color: red'>User does not exist</a>";
                            }
                            if ($_GET['error']==2){
                                echo "<a class=\"nav-link\" style='color: red'>You must login before go to the force page</a>";
                            }


                            }
                            ?></li>
					</ul>
				</nav>


					<!-- jQuery and Bootstrap JavaScript links -->
					<!-- Used from https://www.getbootstrap.com, 29 January 2019 -->
					<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
					<script src="js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
			</div>

			<div class="container">
				<div class="jumbotron">
					<h1 class="display-3 text-center">Record your observations, 3PO!</h1>
				</div>
			</div>
		</header>

