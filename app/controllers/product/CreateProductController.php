<?php
require_once __DIR_ROOT.'/core/Controller.php';
require_once __DIR_ROOT.'/app/models/product/mappers/ProductMapper.php';
require_once __DIR_ROOT.'/helpers/session_helper.php';
require_once __DIR_ROOT.'/app/models/product/entities/Product.php';
require_once __DIR_ROOT.'/helpers/validate.php';

class CreateProductController extends Controller {

    private $productMapper;

    public function __construct(){
        $this->productMapper = new ProductMapper();
    }

    public function create(){

		$productId = trim($_POST['id']);
		$productName = trim($_POST['name']);
		$productVersion = trim($_POST['version']);
		$productColor = trim($_POST['color']);
		$productPrice = trim($_POST['price']);
		$productDescription = trim($_POST['description']);
		
		if(strlen($productId) > 8) {
			$this->fieldTooLongNotify("Product ID", 8);

		}else if (strlen($productName) > 128){
            $this->fieldTooLongNotify("Product Name", 128);

        }else if (strlen($productVersion) > 128 ){
            $this->fieldTooLongNotify("Product Version", 128);

        }else if (strlen($productColor) > 128 ){
            $this->fieldTooLongNotify("Product Color", 128);

        }else if (strlen($productPrice) > 128 ){
            $this->fieldTooLongNotify("Product Price", 128);
			
        }else if (strlen($productDescription) > 128 ){
            $this->fieldTooLongNotify("Product Description", 128);
        }

        if (!empty($this->productMapper->getProductDetail($productId))){
            $this->duplicateProductID();
        }

        if(!arrayEmptyValidate([$productId, $productName, $productVersion, $productColor, $productPrice, $productDescription])){
           $this->anyFieldEmptyNotify();
        }

		if(!isPositiveNumberValidate($productPrice)) {
			$this->invalidPriceFormatNotify();
		}
		
        $product = new Product($productId, $productName, $productVersion, $productColor, $productPrice, $productDescription);
		
        if ($this->productMapper->createProduct($product)){
            redirect(_WEB_ROOT.'/products');

        }else{
            die("Something went wrong");
        }
    }
	
	public function anyFieldEmptyNotify() {
		flash("createProduct", "Please fill out all inputs");
        redirect(_WEB_ROOT.'/products');
		exit();
	}

	public function invalidPriceFormatNotify() {
		flash("createProduct", "The price has invalid format. Please check ");
        redirect(_WEB_ROOT.'/products');
        exit();
	}

	public function fieldTooLongNotify($field, $numberCharacter) {
		flash("createProduct", "The ". $field . " is too long. Maximum length is " . $numberCharacter ." characters ");
        redirect(_WEB_ROOT.'/products');
        exit();
	}

    public function duplicateProductID(){
        flash("createProduct", "Product ID already exists. Please check");
        redirect(_WEB_ROOT.'/products');
        exit();
    }
}