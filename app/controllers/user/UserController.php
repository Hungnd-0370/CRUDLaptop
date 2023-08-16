<?php

require_once 'LoginController.php';
require_once 'LogoutController.php';
require_once 'SignupController.php';

class UserController {

	public function login() {
		$loginController = new LoginController;
		$loginController->login();
	}

	public function logout() {
		$logoutController = new LogoutController;
		$logoutController->logout();
	}

	public function signup() {
		$signupController = new SignupController;
		$signupController->signup();
	}
}