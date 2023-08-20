<?php
require_once __DIR_ROOT.'/core/Controller.php';
require_once __DIR_ROOT.'/app/models/user/mappers/UserMapper.php';
require_once __DIR_ROOT.'/helpers/session_helper.php';

class LoginController extends Controller{

	private $userMapper;

	public function __construct() {
		$this->userMapper = new UserMapper;
	}

	public function index() {  // /signup/
		$this->render('user/login');
	}

	public function sendRequest() {  // login/sendRequest

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'login') {

			$data=[
				'name/email' => trim($_POST['name/email']),
				'userPassword' => trim($_POST['userPassword'])
			];

			$this->validate($data);

			$loggedInUser = $this->userMapper->login($data['name/email'], $data['userPassword']);
				
			if($loggedInUser){

				if ($_POST['remember-me'] === 'remember-me') {
					
					$token =  $this->userMapper->getRemeberMeToken($loggedInUser->userId);
			
					setcookie("member_login", $data['name/email'] . ':' . $token->rememberMeToken, time() + (30 * 24 * 60 * 60), "/");
				}

				$this->createUserSession($loggedInUser);

			}else{

				$this->invalidLoginNotify();
			}
		} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'autologin' && !isset($_SESSION['userId']) && isset($_COOKIE["member_login"])) {
						
			list($identifier, $token) = explode(':', $_COOKIE["member_login"]);
	
			if ($this->userMapper->checkRememberMeToken($identifier, $token)) {

				$user = $this->userMapper->findUserByEmailOrUsername($identifier, $identifier);

				$this->createUserSession($user);
			}
		}
	}

	public function createUserSession($user){
		
        $_SESSION['userId'] = $user->userId;
        $_SESSION['userName'] = $user->userName;
        $_SESSION['userEmail'] = $user->userEmail;
		
        redirect(_WEB_ROOT.'/home');
    }


	public function validate($data) {
		if (!arrayEmptyValidate($data)) {
			$this->anyFieldEmptyNotify();
		}
	}

	public function invalidLoginNotify() {
		flash("login", "Username/email or password are incorrect");
		redirect(_WEB_ROOT.'/login');
	}

	public function anyFieldEmptyNotify() {
		flash("login", "Please fill out all inputs");
		redirect(_WEB_ROOT.'/login');
	}
}