<?php


class LogoutController {

	public function logout() {

		echo "Run here";
		$this->clearUserSession();
	}

	public function clearUserSession() {

		unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);
		session_destroy();

		redirect(_WEB_ROOT.'/login');
	}
}