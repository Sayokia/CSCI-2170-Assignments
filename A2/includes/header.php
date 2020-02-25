<?php
	/*
	 *	header.php
	 *	Starter header file created for Assignment 2 in CSCI 2170, Winter 2020.
	 *	File created by Raghav Sampangi (raghav@cs.dal.ca) using Bootstrap example template.
	 *
	 * 	File updated by Yanlin Zhu (yn842496@dal.ca).
	 */
session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Home</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/product/">

	<!-- Bootstrap core CSS, used from BootstrapCDN.com, accessed on 24 January 2020 -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

	<!-- Custom styles for this template -->
	<link href="css/styles.css" rel="stylesheet">

    <!-- INCLUDES Bootstrap-table-expandable project of Welsiton Ferreira, retrieved from https://github.com/desenvolvedorindie/bootstrap-table-expandable
     Accessed on Feb 10, 2020-->
    <link rel="stylesheet" href="css/bootstrap-table-expandable.css">
</head>

<body>
	<nav class="site-header sticky-top py-1">
		<div class="container d-flex flex-column flex-md-row justify-content-between">
			<a class="py-2" href="index.php" aria-label="Product">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false">
					<title>Time Table</title>
					<circle cx="12" cy="12" r="10" />
					<path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
				</svg>
			</a>
            <?php
			// Get student's name by session
                if (isset($_SESSION['loginStatus'])){
                    $studentName = $_SESSION['studentName'];
                    echo "<a class=\"py-2 d-none d-md-inline-block\" href=\"student_profile.php\"> $studentName's Profile </a>";
                    echo "<a class=\"py-2 d-none d-md-inline-block\" href=\"logout.php\">Log Out</a>";
                }
                else{
                    echo "<a class=\"py-2 d-none d-md-inline-block\" href=\"#\">View Schedule</a>
			<a class=\"py-2 d-none d-md-inline-block\" href=\"login.php\">Login</a>";
                }
            ?>


		</div>
	</nav>
