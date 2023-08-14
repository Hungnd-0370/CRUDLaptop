<?php

class Home extends Controller{

	public $model;

	function __construct() {
		// $this->model = $this->model('ModelHome');
	}

	public function index() {
		$this->render('home/index');
	}
}