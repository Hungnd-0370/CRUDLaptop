<?php

	function arrayEmptyValidate ($array) {
		if (in_array("", $array)) {
			return false;
		}

		return true;
	}

	function emptyAttributeValidate($object) {

		if (!is_array($object) && !is_object($object)) {
			throw new Exception('Input is not an array or object.');
		}

		foreach ($object as $key => $value) {
			if ($value === '') {
				return true;
			}
		}

		return false;
	}

	function emailValidate($email) {
		if(!filter_var($data['userEmail'], FILTER_VALIDATE_EMAIL)) {
			return false;
		}

		return true;
	}