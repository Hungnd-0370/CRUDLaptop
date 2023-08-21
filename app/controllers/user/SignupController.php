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
		
		$this->feildLongValidate($data);

		if(!$this->userNameValidate($data['userId'])){
			flash("register", "Username only contains digits, character, '_' and can't start with digit ");
			redirect(_WEB_ROOT.'/signup');
		}

		if(!emailValidate($data['userEmail'])){
			flash("register", "Invalid email");
			redirect(_WEB_ROOT.'/signup');
		}

		if(strlen($data['userPassword']) < 6){
			flash("register", "Passwords must have more than or equal 6 characters");
			redirect(_WEB_ROOT.'/signup');

		} 
		
		if($data['userPassword'] !== $data['pwdRepeat']){
			flash("register", "Passwords don't match. Please check");
			redirect(_WEB_ROOT.'/signup');
		}

		if(!$this->duplicateValidate($data)){
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
	public function feildLongValidate($data) {
		
		if (array_key_exists('userPassword', $data)) {
			unset($data['userPassword']);
		} 
		if (array_key_exists('pwdRepeat', $data)) {
			unset($data['pwdRepeat']);
		} 
		$feildTooLong  = [];
		foreach($data as $key => $value){
			if(strlen($value) > 128) {
				array_push($feildTooLong, $key);
			}
		}
		if(!empty($feildTooLong)){
			$mess =implode(',', $feildTooLong);
			$this->fieldTooLongNotify($mess, 128);
		}
	}
	public function fieldTooLongNotify($field, $numberCharacter) {
		flash("register", "The ". $field . " is too long. Maximum length is " . $numberCharacter ." characters ");
        redirect(_WEB_ROOT.'/signup');
        exit();
	}
}
