<form action="<?= base_url('admin/productcategory/edit_category/' . $category['product_category_id']); ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" value="<?= $category['category_name']; ?>">
            <?= form_error('category_name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="category_description">category Description</label>
            <input type="text" class="form-control" id="category_description" name="category_description" placeholder="Category description" value="<?= $category['category_description']; ?>">
            <?= form_error('category_description', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
        <button type="submit" class="btn btn-primary">Update data</button>
    </div>
</form>