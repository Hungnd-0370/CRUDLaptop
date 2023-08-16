<?php
require_once __DIR_ROOT.'/core/Controller.php';
require_once __DIR_ROOT.'/app/models/product/mappers/ProductMapper.php';
require_once __DIR_ROOT.'/helpers/session_helper.php';
require_once __DIR_ROOT.'/app/models/product/entities/Product.php';
class DeleteProductController extends Controller{
    private $productMapper;
    
    public function __construct()
    {
          $this->productMapper = new ProductMapper();  
    }

    public function handleBtnDelete($id){
        // check xem co ton tai id ko 
        $product = $this->productMapper->getProductDetail($id);
		if (!empty($product)){
            $data = [];
            $data['subContent']['productInfo'] = $product;
            $data['content'] = 'product/delete';

            $this->render('layouts/layout', $data);
        }else require_once __DIR_ROOT.'/app/errors/404.php';
    }
    public function delete($id){
        // check xem co ton tai id ko 
        $product = $this->productMapper->getProductDetail($id);
		if (!empty($product)){
            if ($this->productMapper->deleteProduct($id)){
                redirect(_WEB_ROOT.'/products');
            }else{
                die("Something went wrong");
            }
        }else require_once __DIR_ROOT.'/app/errors/404.php';

    }
}
?>