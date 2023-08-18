<?php 
	require_once __DIR_ROOT.'/helpers/format.php';
?>

<h1 class="header">Products</h1>
<div class="products-container">
	<?php if (isset($_SESSION['userId'])): ?>
	<div style="display: flex; justify-content:flex-start; margin-bottom: 20px">
		<button class="add-button" id="create-product-modal-button">Add Product</button>
	</div>
	<?php endif; ?>
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
				<div class="product-price" style="display: flex; gap: 3px">
					<?php echo addCommasToMoney($product->product_price) ?> <p style="text-decoration: underline">đ</p>
				</div>
			</div>
			<div class="operations">
				<?php if (isset($_SESSION['userId'])): ?>
				<button id = "<?php echo $product->product_id ?>" class="BtnUpdate">		
                        Update
				</button>
				<button product_id = "<?php echo $product->product_id ?>" class="delete-btn">
                        Remove
				</button>
				<?php endif; ?>
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
	$dataJson = json_encode($productsList);
	include __DIR_ROOT.'/app/views/product/update.php';
	include __DIR_ROOT.'/app/views/product/delete.php';
	$this->render('product/create');
    $this->render('product/update');
	$this->render('product/delete');
?>

