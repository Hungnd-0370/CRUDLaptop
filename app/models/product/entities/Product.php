<?php

class Product {

	private $productId;
    private $productName;
    private $productVersion;
    private $productColor;
    private $productPrice;
    private $productDescription;

	public function __construct($productId, $productName, $productVersion, $productColor, $productPrice, $productDescription) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productVersion = $productVersion;
        $this->productColor = $productColor;
        $this->productPrice = $productPrice;
        $this->productDescription = $productDescription;
	}

	public function getProductId() {
		return $this->productId;
	}

	public function setProductId($productId) {
		$this->productId = $productId;
	}

	public function getProductName() {
		return $this->productName;
	}

	public function setProductName($productName) {
		$this->productName = $productName;
	}

	public function getProductVersion() {
		return $this->productVersion;
	}

	public function setProductVersion($productVersion) {
		$this->productVersion = $productVersion;
	}
	
	public function getProductColor() {
		return $this->productColor;
	}

	public function setProductColor($productColor) {
		$this->productColor = $productColor;
	}

	public function getProductPrice() {
		return $this->productPrice;
	}

	public function setProductPrice($productPrice) {
		$this->productPrice = $productPrice;
	}

	public function getProductDescription() {
		return $this->productDescription;
	}

	public function setProductDescription($productDescription) {
		$this->productDescription = $productDescription;
	}
}