<div id="update-product-modal" class="modal" >
    <div class="modal-content">
        <span class="close" id="close-modalUpdate-btn">&times;</span>
        <h2 style="text-align: center; margin-bottom: 50px">Update a product</h2>
        
        <?php flash('updateProduct') ?>
        
        <form id="formUpdateProduct" method="post" action="/product/update">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" readonly>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" >

            <label for="version">Version:</label>
            <input type="text" id="version" name="version" >

            <label for="color">Color:</label>
            <input type="text" id="color" name="color">

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" >

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" cols="68" ></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
    <script>
        const openModalUpdateBtn = document.querySelectorAll('.BtnUpdate');
        const closeModalUpdateBtn = document.getElementById('close-modalUpdate-btn');
        const updateProductModal = document.getElementById('update-product-modal');
        const formUpdate = document.getElementById('formUpdateProduct');
        
        var dataJson = <?php echo $dataJson ?>;

		const showProductDetail = (product) => {

			var idInput  =  document.getElementById('id');
                   idInput.value = product.product_id;
                   var nameInput  =  document.getElementById('name');
                   nameInput.value = product.product_name;
                   var versionInput  =  document.getElementById('version');
                   versionInput.value = product.product_version;
                   var colorInput  =  document.getElementById('color');
                   colorInput.value = product.product_color;
                   var priceInput  =  document.getElementById('price');
                   priceInput.value = product.product_price;
                   var depInput  =  document.getElementById('description');
                   depInput.value = product.product_description;
		}

        openModalUpdateBtn.forEach(btn => btn.addEventListener('click', () => {

            updateProductModal.style.display = 'block';

            var idUpdateBtn = btn.getAttribute('id');

            dataJson.forEach(product => {
                if(product.product_id == idUpdateBtn){
                 	showProductDetail(product);
					localStorage.setItem('updatedProduct', JSON.stringify(product));
                }
            })
        }));

		const updateFormMessageRed = document.querySelector('.form-message-red.updateProduct');

        closeModalUpdateBtn.addEventListener('click', () => {
            updateProductModal.style.display = 'none';
			updateFormMessageRed.style.display = 'none';
        });


		if (updateFormMessageRed) {
      updateProductModal.style.display = 'block';
			var updatedProduct = localStorage.getItem("updatedProduct");

			if (updatedProduct) {
				var retrievedObject = JSON.parse(updatedProduct);

				showProductDetail(retrievedObject);
			} 
        }
        //validate
    </script>
        
    </script>
</div>