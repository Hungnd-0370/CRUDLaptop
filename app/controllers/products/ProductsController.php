<?php

require __DIR_ROOT.'/app/models/product/mappers/ProductMapper.php';

class ProductsController extends Controller{

	private $data = [];
	
	public function index() {

		$productMapper = new ProductMapper;

		$this->data['subContent']['productsList'] = $productMapper->getProductsList();

		$this->data['content'] = 'products/index';
	
		$this->render('layouts/layout', $this->data);
	}
}