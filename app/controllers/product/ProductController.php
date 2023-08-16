<?php

require_once 'DetailProductController.php';
require_once 'CreateProductController.php';
require_once 'DeleteProductController.php';
require_once 'UpdateProductController.php';
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
	public function delete($id){
        $deleteProduct = new DeleteProductController();
        $deleteProduct->handleBtnDelete($id);
    }
	public function update($id){
        $updateProduct = new UpdateProductController();
        $updateProduct->openModal($id);
    }

}