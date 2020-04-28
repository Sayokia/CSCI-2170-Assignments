<?php
	
	$debug = false;
	
	/*
	 * @file: db.php
	 * @author: Raghav V. Sampangi
	 * @year: 2020
	 * @desc: CSCI 2170 (Winter 2020): This is part of the task for A3.
	 */

	$db_host = "localhost";
	$db_username = "root";
	$db_password = "root";
	$db_name = "2170";

	$conn = new mysqli ($db_host, $db_username, $db_password, $db_name);

	if ($conn->connect_error) {
		die ("Error connecting to the DB.<br>" . $conn->connect_error);
	}
	/* For debug purposes only. This is otherwise not required. */
	else {
		if ($debug) {
			echo "Connected!";
		}
	}
	

?>