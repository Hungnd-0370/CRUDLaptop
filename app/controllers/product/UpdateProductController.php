<?php
require_once __DIR_ROOT.'/core/Controller.php';
require_once __DIR_ROOT.'/app/models/product/mappers/ProductMapper.php';
require_once __DIR_ROOT.'/helpers/session_helper.php';
require_once __DIR_ROOT.'/app/models/product/entities/Product.php';
class UpdateProductController extends Controller{
    private $productMapper;

    public function __construct()
    {
        $this->productMapper = new ProductMapper();
    }
    public function openModal($id){
        $product = $this->productMapper->detailProduct($id);

		if (!empty($product)){
            $data = [];
            $data['subContent']['productInfo'] = $product;
            $data['content'] = 'product/modify';

            $this->render('layouts/layout', $data);
        }else require_once __DIR_ROOT.'/app/errors/404.php';
    }
    public function update(){
        $product = new Product(trim($_POST['id']), trim($_POST['name']), trim($_POST['version']),
            trim($_POST['color']), trim($_POST['price']), trim($_POST['description']));

        if(empty($product->getProductId()) || empty($product->getProductName()) || empty($product->getProductVersion()) ||
            empty($product->getProductColor()) || empty($product->getProductPrice()) || empty($product->getProductDescription())){
            flash("updateProduct", "Please fill out all inputs");
            redirect(_WEB_ROOT.'/products');
            exit();
        }

        if ($this->productMapper->updateProduct($product)){
            redirect(_WEB_ROOT.'/products');
        }else{
            die("Something went wrong");
        }
    }
}

?>