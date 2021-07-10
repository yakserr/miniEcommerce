<section class="content">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Desc</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($category as $c) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $c['category_name'] ?></td>
                    <td><?= $c['category_description'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/productcategory/edit_category/' . $c['product_category_id']); ?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('admin/productcategory/delete_category/' . $c['product_category_id']); ?>" class="badge badge-danger">Delete</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
    </table>

</section>