<?php
require_once __DIR_ROOT.'/core/Controller.php';
require_once __DIR_ROOT.'/helpers/session_helper.php';
require_once __DIR_ROOT.'/app/models/user/mappers/UserMapper.php';

class SignupController extends Controller{

	private $userMapper;

	public function __construct(){
		$this->userMapper = new UserMapper;
	}

	public function index () {
		$this->render('user/signup');
	}

	public function processUserRegistration() {
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'register') {
			$data = [
				'userName' => trim($_POST['userName']),
				'userEmail' => trim($_POST['userEmail']),
				'userId' => trim($_POST['userId']),
				'userPassword' => trim($_POST['userPassword']),
				'pwdRepeat' => trim($_POST['pwdRepeat'])
			];

			$this->validate($data);

			//hash password
			$data['userPassword'] = password_hash($data['userPassword'], PASSWORD_DEFAULT);

			if($this->userMapper->register($data)){
				redirect(_WEB_ROOT.'/login');
			}else{
				die("Something went wrong");
			}
		}
	}

	public function validate ($data) {

		if (!arrayEmptyValidate($data)) {
			flash("register", "Please fill out all inputs");
			redirect(_WEB_ROOT.'/signup');
		}

		if(!userNameValidate($data['userId'])){
			flash("register", "Invalid username. Please choose another");
			redirect(_WEB_ROOT.'/signup');
		}

		if(!emailValidate($data['userEmail'])){
			flash("register", "Invalid email");
			redirect(_WEB_ROOT.'/signup');
		}

		if(strlen($data['userPassword']) < 6){
			flash("register", "Invalid password");
			redirect(_WEB_ROOT.'/signup');

		} 
		
		if($data['userPassword'] !== $data['pwdRepeat']){
			flash("register", "Passwords don't match. Please check");
			redirect(_WEB_ROOT.'/signup');
		}

		if(!duplicateValidate($data)){
			flash("register", "Username or email already taken");
			redirect(_WEB_ROOT.'/signup');
		}
	}

	public function userNameValidate($username) {

		$pattern = '/^[a-zA-Z_][a-zA-Z0-9_]*$/';
	
		if (preg_match($pattern, $username)) {
			return true; // Valid username
		} else {
			return false; // Invalid username
		}
	}

	public function duplicateValidate($data) {

		if($this->userMapper->findUserByEmailOrUsername($data['userEmail'], $data['userId'])) {
			return false;
		}
		return true;
	}
}