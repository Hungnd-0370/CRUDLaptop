<?php

require_once 'ShowProductController.php';
require_once 'CreateProductController.php';

class ProductController extends Controller {
	
	public function list() {
		
	}
	
	public function detail() {

		$showProductController = new ShowProductController;
		$showProductController->showProduct();
	}

    public function create(){
        $createProduct = new CreateProductController();
        $createProduct->create();
    }
}