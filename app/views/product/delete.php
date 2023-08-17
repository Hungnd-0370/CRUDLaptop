<div id="delete-product-modal" class="modal" >
    <div class="modal-content">
        <span class="close" id="close-modalDelete-btn">&times;</span>
        <h2 style="text-align: center; margin-bottom: 50px">Delete a product</h2>
        <form id="formDeleteProduct" method="post" action="/product/delete">
            <h3>Bạn có chắc muốn xóa Sản phẩm <span id="idProduct">ABC</span></h3>
            <div style="display: none">
                <input type="text" id="idDelete" name="id" readonly >
            </div>
            <button type="submit">YES</button>
            <button type="button" formaction="/test">
            <a href="/products" >
                NO
            </a>
        </button>
        </form>
    </div>
</div>
<script>
    const openModalDeleteBtn = document.querySelectorAll('.BtnDelete');
    const closeModalDeleteBtn = document.getElementById('close-modalDelete-btn');
    const deleteProductModal = document.getElementById('delete-product-modal');
    
    var dataJson = <?php echo $dataJson ?>;

    openModalDeleteBtn.forEach(btn => btn.addEventListener('click', () => {
        deleteProductModal.style.display = 'block';
        var id_product = btn.getAttribute('product_id');
        dataJson.forEach(product => {
            if(product.product_id == id_product){
                var idProduct  =  document.getElementById('idProduct');
                idProduct.innerText = product.product_id;
                var idInput  =  document.getElementById('idDelete');
                idInput.value = product.product_id;
            }
        })
    }));

    closeModalDeleteBtn.addEventListener('click', () => {
        deleteProductModal.style.display = 'none';
    });

</script>