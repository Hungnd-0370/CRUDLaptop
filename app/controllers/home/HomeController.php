<?php

class HomeController extends Controller{

	public $model;

	function __construct() {
		// $this->model = $this->model('ModelHome');
	}

	public function index() {
		$this->render('home/index');
	}
}