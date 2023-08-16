<?php

require_once 'ShowDetailProductController.php';
require_once 'CreateProductController.php';

class ProductController extends Controller {
	
	public function detail($id) {

		$showProductController = new ShowDetailProductController;

		$showProductController->getProductDetail($id);
	}

    public function create(){

        $createProduct = new CreateProductController();

        $createProduct->create();
    }
}