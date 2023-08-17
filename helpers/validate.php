<?php

	function arrayEmptyValidate ($array) {
		if (in_array("", $array)) {
			return false;
		}

		return true;
	}

	function emailValidate($email) {
		if(!filter_var($data['userEmail'], FILTER_VALIDATE_EMAIL)) {
			return false;
		}

		return true;
	}