<?php 
	require_once __DIR_ROOT.'/helpers/format.php';
?>

<div class="product-detail">
    <img class="product-detail-image" src="/public/images/macbook4.jpeg" alt="A macbook" width="100%">

    <div class="product-info">
        <div class="product-detail-id">
            <?php echo $product->getProductId() ?>
        </div>
        <div class="product-detail-name">
            <?php echo $product->getProductName() ?>
        </div>
        <div class="product-detail-version">
            <?php echo $product->getProductVersion() ?>
        </div>
        <div class="product-detail-color">
            <?php echo $product->getProductColor() ?>
        </div>
        <div class="product-detail-price">
            <?php echo addCommasToMoney($product->getProductPrice()) ?> <p style="text-decoration: underline;">đ</p>
        </div>
        <div class="product-detail-description">
            <?php echo $product->getProductDescription() ?>
        </div>
    </div>
</div>
