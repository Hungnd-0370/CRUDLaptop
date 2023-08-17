<?php

require_once 'ShowDetailProductController.php';
require_once 'CreateProductController.php';
require_once 'DeleteProductController.php';
require_once 'UpdateProductController.php';

class ProductController extends Controller {
	
	public function detail($id) {

		$showProductController = new ShowDetailProductController();
		$showProductController->detail($id);
	}

    public function create(){

        $createProduct = new CreateProductController();
        $createProduct->create();
    }

	public function delete($id){

        $deleteProduct = new DeleteProductController();
        $deleteProduct->handleBtnDelete($id);
    }
	public function update(){
        $updateProduct = new UpdateProductController();
        $updateProduct->update();
    }
}
