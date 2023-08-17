<?php
require_once __DIR_ROOT.'/core/Controller.php';
require_once __DIR_ROOT.'/app/models/product/mappers/ProductMapper.php';
require_once __DIR_ROOT.'/helpers/session_helper.php';
require_once __DIR_ROOT.'/helpers/validate.php';
require_once __DIR_ROOT.'/app/models/product/entities/Product.php';

class UpdateProductController extends Controller{

    private $productMapper;

    public function __construct() {
        $this->productMapper = new ProductMapper();
    }

    public function update(){
        
		$productId = trim($_POST['id']);
		$productName = trim($_POST['name']);
		$productVersion = trim($_POST['version']);
		$productColor = trim($_POST['color']);
		$productPrice = trim($_POST['price']);
		$productDescription = trim($_POST['description']);
		
        $product = new Product($productId, $productName, $productVersion, $productColor, $productPrice, $productDescription);

        if ($this->productMapper->updateProduct($product)){
            redirect(_WEB_ROOT.'/products');
        }else{
            die("Something went wrong");
        }
    }

}

?>