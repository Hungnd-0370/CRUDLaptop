<?php
require_once __DIR_ROOT.'/core/Controller.php';
require_once __DIR_ROOT.'/app/models/product/mappers/ProductMapper.php';
require_once __DIR_ROOT.'/helpers/session_helper.php';
require_once __DIR_ROOT.'/app/models/product/entities/Product.php';

class ShowDetailProductController extends Controller {

    private $productMapper;

    public function __construct() {
        $this->productMapper = new ProductMapper();
    }

    public function detail($id) {

        $product = $this->productMapper->getProductDetail($id);

		if (!empty($product)) {
            $data = [];
            $data['subContent']['product'] = $product;
            $data['content'] = 'product/detail';

            $this->render('layouts/layout', $data);

        }else {
			require_once __DIR_ROOT.'/app/errors/404.php';
		}
	}
}