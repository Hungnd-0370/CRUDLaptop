<div id="delete-product-modal" class="modal" >
    <div class="modal-content">
        <span class="close" id="close-delete-modal-btn">&times;</span>
        <h2 style="text-align: center; margin-bottom: 30px">Delete a product</h2>
        <form id="formDeleteProduct" method="post" action="/product/delete">
            <h3 style="margin-bottom: 20px; text-align: center">Are you sure to remove product with Id: <span id="toRemoveId" style="color: red"></span></h3>
            <div style="display: none">
                <input type="text" id="idDelete" name="id" readonly >
            </div>
			<div style="text-align: center" class="operations">
				<button type="submit">
					YES
				</button>
				<button type="button" id="not-remove-btn">
					NO
				</button>
			</div>
        </form>
    </div>
</div>
<script>
    const openDeleteModalBtn = document.querySelectorAll('.delete-btn');

    const closeDeleteModalBtn = document.getElementById('close-delete-modal-btn');

    const deleteProductModal = document.getElementById('delete-product-modal');

	const notRemoveBtn = document.getElementById('not-remove-btn');
    
    var dataJson = <?php echo $dataJson ?>;

    openDeleteModalBtn.forEach(btn => btn.addEventListener('click', () => {

        deleteProductModal.style.display = 'block';

        const product_id = btn.getAttribute('product_id');

        dataJson.forEach(product => {

            if(product.product_id == product_id){

                const toRemoveElement  =  document.getElementById('toRemoveId');

                toRemoveElement.innerText = product.product_id;

                const idInput  =  document.getElementById('idDelete');

                idInput.value = product.product_id;
            }
        })
    }));

    closeDeleteModalBtn.addEventListener('click', () => {

        deleteProductModal.style.display = 'none';
    });

	notRemoveBtn.addEventListener('click', () => {

		deleteProductModal.style.display = 'none';
	});

</script>