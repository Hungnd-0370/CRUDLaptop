<?php 
	require_once __DIR_ROOT.'/helpers/format.php';
	$product = $product[0] 
?>

<div class="product-detail">
    <img class="product-detail-image" src="/public/images/macbook4.jpeg" alt="A macbook" width="100%">

    <div class="product-info">
        <div class="product-detail-id">
            <?php echo $product->product_id ?>
        </div>
        <div class="product-detail-name">
            <?php echo $product->product_name ?>
        </div>
        <div class="product-detail-version">
            <?php echo $product->product_version ?>
        </div>
        <div class="product-detail-color">
            <?php echo $product->product_color ?>
        </div>
        <div class="product-detail-price">
            <?php echo addCommasToMoney($product->product_price) ?> <p style="text-decoration: underline;">đ</p>
        </div>
        <div class="product-detail-description">
            <?php echo $product->product_description ?>
        </div>
    </div>
</div>
