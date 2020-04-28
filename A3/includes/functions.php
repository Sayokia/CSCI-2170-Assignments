<?php

	include "constants.php";

	/*
	 * @function: 	getWebsiteName()
	 * @return:		Name of the website to store in the header of the page, and in the page title.
	 */

	function getWebsiteName() {
		return WEBSITENAME;
	}


	/*
	 * @function: 	validateData()
	 * @desc:		Validates the data input through forms using trim(), stripslashes() and htmlspecialchars()
	 * @return:		Valid string to be submitted to the DB.
	 */

	function validateData($data) {
		$returnValue = trim($data);
		$returnValue = stripslashes($returnValue);
		$returnValue = htmlspecialchars($returnValue);

		return $returnValue;
	}


?>