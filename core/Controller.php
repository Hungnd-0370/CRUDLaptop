<?php

class Controller {

	public function render($view, $data=[]) {

		extract($data);
		
		if (file_exists(__DIR_ROOT.'/app/views/'.$view.'.php')) {
			
			require_once __DIR_ROOT.'/app/views/'.$view.'.php';
		};

		$template = new Template;

		$template->run();
	}
}