<?php

require_once 'DetailProductController.php';
require_once 'CreateProductController.php';

class ProductController extends Controller {
	
	public function list() {
		
	}
	
	public function detail($id) {
		$showProductController = new DetailProductController;
		$showProductController->detail($id);
	}

    public function create(){
        $createProduct = new CreateProductController();
        $createProduct->create();
    }

}