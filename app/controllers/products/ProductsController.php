<?php

require __DIR_ROOT.'/app/models/product/mappers/ProductMapper.php';

class ProductsController extends Controller{

	private $data = [];
	
	public function index() {

		$productMapper = new ProductMapper;
		// $dataJson = json_encode($productMapper->getProductsList());
		// include 'C:\Users\Acer\Documents\workspace\WEB\PHP\MiniProjectPHP\CRUDLaptop\app\views\product\update.php';

		$this->data['subContent']['productsList'] = $productMapper->getProductsList();
		
		$this->data['content'] = 'products/index';
	
		$this->render('layouts/layout', $this->data);
	}
}