<section class="content">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Level</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($user as $u) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $u['name'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td><?= ($u['level'] == 1) ? 'Superuser' : (($u['level'] == 2) ? 'admin' : 'user') ?></td>
                    <td>
                        <a href="<?= base_url('admin/user/edit_user/' . $u['user_id']); ?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('admin/user/delete_user/' . $u['user_id']); ?>" class="badge badge-danger">Delete</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
    </table>

</section>