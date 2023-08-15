<?php
require_once __DIR_ROOT.'/core/Controller.php';
require_once __DIR_ROOT.'/app/models/user/mappers/UserMapper.php';
require_once __DIR_ROOT.'/helpers/session_helper.php';

class LoginController extends Controller{

	private $userMapper;

	public function __construct() {

		$this->userMapper = new UserMapper;
	}

	public function index() {
		$this->render('user/login');
	}

	public function sendRequest() {

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'login') {

			$data=[
				'name/email' => trim($_POST['name/email']),
				'userPassword' => trim($_POST['userPassword'])
			];

			if(empty($data['name/email']) || empty($data['userPassword'])){
				flash("login", "Please fill out all inputs");
				redirect(_WEB_ROOT.'/login');
				exit();
			}

			//Check for user/email
			if($this->userMapper->findUserByEmailOrUsername($data['name/email'], $data['name/email'])){

				$loggedInUser = $this->userMapper->login($data['name/email'], $data['userPassword']);
				
				if($loggedInUser){
					$this->createUserSession($loggedInUser);
				}else{
					flash("login", "Password Incorrect");
					redirect(_WEB_ROOT.'/login');
				}
			}else{
				flash("login", "No user found");
				redirect(_WEB_ROOT.'/login');
			}
		}
	}

	public function createUserSession($user){
		
        $_SESSION['userId'] = $user->userId;
        $_SESSION['userName'] = $user->userName;
        $_SESSION['userEmail'] = $user->userEmail;

        redirect(_WEB_ROOT.'/home');
    }

	public function rememberMe() {
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'remember-me') {
			echo "remembered";
		}
	}

}