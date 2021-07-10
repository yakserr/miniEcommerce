<form action="<?= base_url('admin/product/edit_product/' . $product['product_id']); ?>" method="POST" enctype='multipart/form-data'>
    <div class="modal-body">
        <div class="form-group">
            <label for="product_code">Product Code</label>
            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Product Code Ex. F-001..." value="<?= $product['product_code']; ?>">
            <?= form_error('product_code', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="product_category">Prodcut Category</label>
            <select class="form-control" id="product_category" name="product_category">
                <option>Choose one</option>
                <?php foreach ($category as $c) : ?>
                    <option value="<?= $c['product_category_id']; ?>"><?= $c['category_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('product_category', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name..." value="<?= $product['product_name']; ?>">
            <?= form_error('product_name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="price">Product Name</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Product Name..." value="<?= $product['price']; ?>">
            <?= form_error('price', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" value="<?= $product['stock']; ?>">
            <?= form_error('stock', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" value="<?= $product['image']; ?>">
            <?= form_error('image', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
        <button type="submit" class="btn btn-primary">Update data</button>
    </div>
</form>