<h1 class="header">Products</h1>

<div class="products-container">
	<div class="products-grid-container">
		<?php foreach ($productsList as $index=>$product): 

		?>
			<div class="product-card">
			<img src="public/images/macbook3.jpeg" alt="A macbook"" width="100%" height="50%">
			<div class="product-info">
				<div class="product-id">
					<?php echo "Mã sản phẩm: ".($product->product_id) ?>
				</div>
				<div class="product-name">
					<?php echo "Tên sản phẩm: ".($product->product_name) ?>
				</div>
				<div class="product-version">
					<?php echo "Phiên bản:".($product->product_version) ?>
				</div>
				<div class="product-color">
					<?php echo "Màu: ".($product->product_color) ?>
				</div>
				<div class="product-price">
					<?php echo "Giá: ".($product->product_price) ?>
				</div>
				<div class="product-description">
					<?php echo $product->product_description ?>
				</div>
			</div>
			<div class="operations">
				<button>Modify</button>
				<button>Remove</button>
				<button>Detail</button>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>