<?php

require_once 'ShowDetailProductController.php';
require_once 'CreateProductController.php';
require_once 'DeleteProductController.php';
require_once 'UpdateProductController.php';

class ProductController extends Controller {
	
	public function detail($id) {
		
		if(isset($_SESSION['userId'])) {
			$showProductController = new ShowDetailProductController();
			$showProductController->detail($id);
		} else {
			redirect(__DIR_ROOT.'/app/errors/404');
		}
	}

    public function create(){

		if(isset($_SESSION['userId'])) {
			$createProduct = new CreateProductController();
			$createProduct->create();
		} else {
			redirect(__DIR_ROOT.'/app/errors/404');
		}
    }

	public function delete(){
		
		if(isset($_SESSION['userId'])) {

			$deleteProduct = new DeleteProductController();
			$deleteProduct->delete();
		} else {
			redirect(__DIR_ROOT.'/app/errors/404');
		}
    }
	public function update(){

		if(isset($_SESSION['userId'])) {
			$updateProduct = new UpdateProductController();
			$updateProduct->update();
		} else {
			redirect(__DIR_ROOT.'/app/errors/404');
		}
    }
}
