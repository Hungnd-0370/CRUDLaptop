<?php 
    $product = $productInfo[0];
    
?>
<div id="update-product-modal" class="modalUpdate">
    <div class="modal-content">
        <span class="close" id="close-modal-btn">&times;</span>
        <h2 style="text-align: center; margin-bottom: 50px">Update a product</h2>
        <?php flash('updateProduct') ?>
        <form id="formUpdateProduct" method="post" action="/UpdateProductController/update">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" value="<?php echo $product->product_id ?>" readonly>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $product->product_name ?>">

            <label for="version">Version:</label>
            <input type="text" id="version" name="version" value="<?php echo $product->product_version ?>">

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="<?php echo $product->product_color ?>">

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $product->product_price ?>">

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" cols="68" ><?php echo $product->product_description ?></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
    <script>
        const closeUpdateModalBtn = document.getElementById('close-modal-btn');
        const updateProductModal = document.getElementById('update-product-modal');
        const updateProductForm = document.getElementById('formUpdateProduct');

        closeUpdateModalBtn.addEventListener('click', () => {
			console.log("run")
            updateProductModal.style.display = 'none';
        });

        const formMessageRed = document.querySelector('.form-message-red');

        if (formMessageRed) {
            updateProductModal.style.display = 'block';
        }

    </script>
</div>