<div id="modalCreateProduct" class="modal">

    <div class="modal-content">
        <span class="close" id="closeModalBtn">&times;</span>
        <h2>Create a product</h2>
        <?php flash('createProduct') ?>
        <form id="formCreateProduct" method="post" action="/product/create">
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

            <button type="submit">Submit</button>
        </form>
    </div>
    <script>
        const openModalBtn = document.getElementById('btnModalCreateProduct');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modal = document.getElementById('modalCreateProduct');
        const form = document.getElementById('formCreateProduct');

        openModalBtn.addEventListener('click', () => {
            modal.style.display = 'block';
        });

        closeModalBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        const formMessageRed = document.querySelector('.form-message-red');
        if (formMessageRed) {
            modal.style.display = 'block';
        }

    </script>
</div>