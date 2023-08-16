<?php

class App {

	private $__controller, $__action, $__params;

	function __construct() {

		global $routes;

		$this->__controller = $routes['default_controller'];
		$this->__action = $routes['default_action'];
		$this->__params = [];

		$this->handleUrl();
	}
	
	function getUrl() {
		if(!empty($_SERVER['PATH_INFO'])) {
			$url = $_SERVER['PATH_INFO'];
		} else {
			$url = '/';
		}
		return $url;
	}

	public function handleUrl() {

		$url = $this->getUrl();
		$urlArr = array_filter(explode('/', $url));
		$urlArr = array_values($urlArr);
    
		if (!empty($urlArr[0])) {
			if (strcmp($urlArr[0], 'signup') == 0) {
	
				$this->__controller = 'SignupController';
				$controllerFolder = 'user';
				
			} elseif (strcmp($urlArr[0], 'login') == 0) {
	
				$this->__controller = 'LoginController';
				$controllerFolder = 'user';
	
			} elseif (strcmp($urlArr[0], 'logout') == 0) {
	
				require_once 'app/controllers/user/LogoutController.php';
				call_user_func_array([new LogoutController, 'logout'], []);
			} elseif(strcmp($urlArr[0], 'product') == 0) {

				$controllerFolder = $urlArr[0];
				$this->__controller = ucfirst($urlArr[0]).'Controller';
			}elseif(strcmp($urlArr[0], 'products') == 0) {

				$controllerFolder = $urlArr[0];
				$this->__controller = ucfirst($urlArr[0]).'Controller';
			}else{
				$controllerFolder = 'product';
				$this->__controller = $urlArr[0];
			}

		} else {

			redirect(_WEB_ROOT.'/home');
		}

		if(file_exists('app/controllers/'.$controllerFolder.'/'.($this->__controller).'.php')) {

			require_once 'app/controllers/'.$controllerFolder.'/'.($this->__controller).'.php';
			$this->__controller = new $this->__controller();

		} else {
			$this->loadError();
		}
		unset($urlArr[0]);

		if (!empty($urlArr[1])) {
			$this->__action = $urlArr[1];

		} else {

			$this->__action = 'index';
		}

		unset($urlArr[1]);

		$this->__params = array_values($urlArr);

		if(method_exists($this->__controller, $this->__action)) {	
			call_user_func_array([$this->__controller, $this->__action], $this->__params);
		} else {
			$this->loadError();
		}
	}

	public function loadError($name = '404') {
		require_once 'errors/'.$name.'.php';
	}
}
