<?php

require_once __DIR_ROOT.'/core/Database.php';

class ProductMapper {

	private $db;

	public function __construct() {    
        $this->db = new Database;
    }

	function getProductsList() {

		$this->db->query('SELECT * FROM product');
		$productsList = $this->db->resultSet();

		return $productsList;
	}
}