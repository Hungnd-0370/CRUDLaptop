<?php

require_once __DIR_ROOT.'/core/Database.php';
require_once __DIR_ROOT.'/app/models/product/entities/Product.php';

class ProductMapper {

	private $db;

	public function __construct() {
        $this->db = new Database;
    }

	function getProductsList() {

		$this->db->query('SELECT * FROM product;');
		$productsList = $this->db->resultSet();

		return $productsList;
	}

    function createProduct(Product $product) {

        $this->db->query('INSERT INTO product (product_id, product_name, product_version, product_color, product_price, product_description)
			VALUES (:product_id, :product_name, :product_version, :product_color, :product_price, :product_description)');

        $this->db->bind(':product_id', $product->getProductId());
        $this->db->bind(':product_name', $product->getProductName());
        $this->db->bind(':product_version', $product->getProductVersion());
        $this->db->bind(':product_color', $product->getProductColor());
        $this->db->bind(':product_price', $product->getProductPrice());
        $this->db->bind(':product_description', $product->getProductDescription());

        if ($this->db->execute()) {
			
            return true;
        } else {
            return false;
        }
    }

    function updateProduct(Product $product) {

        $this->db->query('UPDATE product SET product_name = :name, product_version = :version, product_color = :color, product_price = :price, product_description = :description WHERE product_id  = :id');
        $this->db->bind(':id', $product->getProductId());
        $this->db->bind(':name', $product->getProductName());
        $this->db->bind(':version', $product->getProductVersion());
        $this->db->bind(':color', $product->getProductColor());
        $this->db->bind(':price', $product->getProductPrice());
        $this->db->bind(':description', $product->getProductDescription());

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function getProductDetail($productId){
        $this->db->query('SELECT * FROM product WHERE product_id = :product_id');
        $this->db->bind(':product_id', $productId);
        $detailProduct = $this->db->resultSet();// chuyen thanh mang doi tuong

        return $detailProduct;
    }
    function deleteProduct($id){
        $this->db->query('DELETE FROM product WHERE product_id = :id');
        $this->db->bind(':id', $id);    
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }
}