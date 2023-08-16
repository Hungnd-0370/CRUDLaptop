<?php 
    $product = $productInfo[0];
?>

<div class="product-card">
    <img src="public/images/macbook3.jpeg" alt="A macbook" width="100%" height="50%">
    <div class="product-info">
        <h3>Bạn có chắc muốn xóa sản phầm : </h3>
        <div class="product-id">
            <?php echo "Mã sản phẩm: " . ($product->product_id) ?>
        </div>
        <div class="product-name">
            <?php echo "Tên sản phẩm: " . ($product->product_name) ?>
        </div>
        <div class="product-version">
            <?php echo "Phiên bản:" . ($product->product_version) ?>
        </div>
        <button type="button" formaction="/test">
            <a href="/DeleteProductController/delete/<?php echo $product->product_id ?>" >
                YES
            </a>
        </button>
        <button type="button" formaction="/test">
            <a href="/products" >
                NO
            </a>
        </button>
    </div>
    </div>
</div>
