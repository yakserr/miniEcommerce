<section class="content">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Photo</th>
                <th scope="col">Product Code</th>
                <th scope="col">Product Category</th>
                <th scope="col">Product Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Product Owner</th>
                <th scope="col">Posting Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($product as $p) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td class="text-center"><img style="width:50%;" src="<?= base_url('assets/uploads/') . $p['image'] ?>" alt="gambar"></td>
                    <td><?= $p['product_code'] ?></td>
                    <td><?= $p['product_category'] ?></td>
                    <td><?= $p['product_name'] ?></td>
                    <td><?= $p['stock'] ?></td>
                    <td><?= $p['product_owner'] ?></td>
                    <td><?= $p['posting_date'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/product/edit_product/' . $p['product_id']); ?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('admin/product/delete_product/' . $p['product_id']); ?>" class="badge badge-danger">Delete</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
    </table>

</section>