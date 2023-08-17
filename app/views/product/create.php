<div id="create-product-modal" class="modal">

    <div class="modal-content">
        <span class="close" id="close-modal-button">&times;</span>
        <h2 style="text-align: center; margin-bottom: 50px">Create a product</h2>

        <?php flash('createProduct') ?>
        <form id="create-product-form" method="post" action="/product/create">

            <label for="id">ID:</label>
            <input type="text" id="id" name="id" >

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" >

            <label for="version">Version:</label>
            <input type="text" id="version" name="version" >

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" >

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" >

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" cols="68"></textarea>

            <button type="submit" name="submit" style="cursor:pointer" class="create-product-submit-button">Submit</button>
        </form>
    </div>
    <script>

        const openModalBtn = document.getElementById('create-product-modal-button');
        const closeModalBtn = document.getElementById('close-modal-button');
        const createProductModal = document.getElementById('create-product-modal');
        const form = document.getElementById('create-product-form');

        openModalBtn.addEventListener('click', () => {
            createProductModal.style.display = 'block';
        });

		const formMessageRed = document.querySelector('.form-message-red');

        closeModalBtn.addEventListener('click', () => {
            createProductModal.style.display = 'none';
			formMessageRed.style.display = 'none';
        });

        if (formMessageRed) {
            createProductModal.style.display = 'block';
        }
    </script>
</div>