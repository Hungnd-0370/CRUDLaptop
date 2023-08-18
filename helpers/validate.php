<?php

	function arrayEmptyValidate ($array) {
		if (in_array("", $array)) {
			return false;
		}

		return true;
	}

	function emailValidate($email) {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return false;
		}

		return true;
	}

	function isPositiveNumberValidate($inputString) {
		// Regular expression to match a positive number
		$regex = '/^[+]?\d+(\.\d+)?$/';
	  
		return preg_match($regex, $inputString) === 1;
	}