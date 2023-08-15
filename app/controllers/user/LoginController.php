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

	public function sendRequest() {  // signup/sendRequest

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'login') {

			$data=[
				'name/email' => trim($_POST['name/email']),
				'userPassword' => trim($_POST['userPassword'])
			];

			$this->validate($data);

			$loggedInUser = $this->userMapper->login($data['name/email'], $data['userPassword']);
				
			if($loggedInUser){
					
				$this->rememberMe();
				$this->createUserSession($loggedInUser);
			}else{
				invalidLoginNotify();
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

		if (isset($_POST['remember-me'])) {

			setcookie("remembered_email", $_POST['name/email'], time() + (30 * 24 * 60 * 60), "/");
			setcookie("remembered_password", $_POST['userPassword'], time() + (30 * 24 * 60 * 60), "/");

		} else {
			// If "Remember Me" is unchecked, clear the remembered values
			setcookie("remembered_email", "", time() - 3600, "/");
			setcookie("remembered_password", "", time() - 3600, "/");
		}
	}

	public function validate($data) {
		if (!arrayEmptyValidate($data)) {
			anyFieldEmptyNotify();
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