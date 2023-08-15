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

	public function sendRequest() {
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'register') {

			$data = [
				'userName' => trim($_POST['userName']),
				'userEmail' => trim($_POST['userEmail']),
				'userId' => trim($_POST['userId']),
				'userPassword' => trim($_POST['userPassword']),
				'pwdRepeat' => trim($_POST['pwdRepeat'])
			];

			echo $data->userName;

			$this->validate($data);

			//User with the same email or password already exists
			// if($this->modelUser->findUserByEmailOrUsername($data['userEmail'], $data['userName'])){
			// 	flash("register", "Username or email already taken");
			// }

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

		if(empty($data['userName']) || empty($data['userEmail']) || empty($data['userId']) || 
		empty($data['userPassword']) || empty($data['pwdRepeat'])){
			flash("register", "Please fill out all inputs");
			redirect(_WEB_ROOT.'/signup');
		}

		if(!preg_match("/^[a-zA-Z0-9]*$/", $data['userId'])){
			flash("register", "Invalid username");
			redirect(_WEB_ROOT.'/signup');
		}

		if(!filter_var($data['userEmail'], FILTER_VALIDATE_EMAIL)){
			flash("register", "Invalid email");
			redirect(_WEB_ROOT.'/signup');
		}

		if(strlen($data['userPassword']) < 6){
			flash("register", "Invalid password");
			redirect(_WEB_ROOT.'/signup');

		} else if($data['userPassword'] !== $data['pwdRepeat']){
			flash("register", "Passwords don't match");
			redirect(_WEB_ROOT.'/signup');
		}
	}
}