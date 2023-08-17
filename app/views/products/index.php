<?php 
	require_once __DIR_ROOT.'/helpers/format.php';
?>

<h1 class="header">Products</h1>
<div class="products-container">
	<div style="display: flex; justify-content:flex-start; margin-bottom: 20px">
		<button class="add-button" id="create-product-modal-button">Add Product</button>
	</div>
	<div class="products-grid-container">
		<?php foreach ($productsList as $index=>$product): ?>
			<div class="product-card">
			<img class="product-image" src="public/images/macbook<?php echo $index%5 + 1 ?>.jpeg" alt="A macbook"" width="100%" height="50%">

			<div class="product-info">
				<!-- <div class="product-id">
					<?php echo "Mã sản phẩm: ".($product->product_id) ?>
				</div> -->
				<div class="product-name">
					<?php echo $product->product_name ?>
				</div>
				<div class="product-version">
					<?php echo $product->product_version ?>
				</div>
				<div class="product-color">
					<?php echo $product->product_color ?>
				</div>
				<div class="product-price">
					<?php echo addCommasToMoney($product->product_price) ?> đ
				</div>
			</div>
			<div class="operations">
				<button >
					<a href="/product/update/<?php echo $product->product_id ?>" >
                        Modify
                    </a>
				</button>
				<button>
					<a href="/product/delete/<?php echo $product->product_id ?>" >
                        Remove
                    </a>
				</button>
				<button type="button">
                    <a href="/product/detail/<?php echo $product->product_id ?>" >
                        Detail
                    </a>
                </button>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php
    $this->render('product/create');
?>

