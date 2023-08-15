<?php

require_once 'ShowProductController.php';

class Product {
	
	public function list() {
		
	}
	
	public function detail() {

		$showProductController = new ShowProductController;
		$showProductController->showProduct();
	}


}