<?php
require_once __DIR_ROOT.'/app/models/user/mappers/UserMapper.php';

class LogoutController {

	private $userMapper;

	public function __construct() {
		$this->userMapper = new UserMapper;
	}

	public function logout() {

		$this->clearUserSession();
	}

	public function clearUserSession() {

		$this->userMapper->removeRememberMeToken($_SESSION['userId']);

		unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);

		if (isset($_COOKIE['member_login'])) {

			unset($_COOKIE['member_login']); 

			setcookie('member_login', '', -1, '/'); 

			redirect(_WEB_ROOT.'/login');
		} 
		
		session_destroy();

		redirect(_WEB_ROOT.'/login');
	}
}