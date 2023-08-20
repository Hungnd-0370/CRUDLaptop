<?php
require_once __DIR_ROOT.'/core/Controller.php';
require_once __DIR_ROOT.'/app/models/product/entities/Product.php';
require_once __DIR_ROOT.'/app/models/product/mappers/ProductMapper.php';
require_once __DIR_ROOT.'/helpers/session_helper.php';
require_once __DIR_ROOT.'/app/models/product/entities/Product.php';

class ShowDetailProductController extends Controller {

    private $productMapper;

    public function __construct() {
        $this->productMapper = new ProductMapper();
    }

    public function detail($id) {

        $productData = $this->productMapper->getProductDetail($id)[0];

        if ($productData) {

            $productId = $productData->product_id;
            $productName = $productData->product_name;
            $productVersion = $productData->product_version;
            $productColor = $productData->product_color;
            $productPrice = $productData->product_price;
            $productDescription = $productData->product_description;

            $product = new Product($productId, $productName, $productVersion, $productColor, $productPrice, $productDescription);

            $data = [];
            $data['subContent']['product'] = $product;
            $data['content'] = 'product/detail';

            $this->render('layouts/layout', $data);

        }else {
            require_once __DIR_ROOT.'/app/errors/404.php';
        }
    }
}