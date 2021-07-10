<form action="<?= base_url('admin/user/edit_user/' . $user['user_id']); ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?= $user['username']; ?>" readonly>
            <?= form_error('username', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $user['name']; ?>">
            <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= $user['email']; ?>" readonly>
            <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" class="form-control" id="level" name="level" placeholder="level" value="<?= $user['level']; ?>">
            <?= form_error('level', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
        <button type="submit" class="btn btn-primary">Update data</button>
    </div>
</form>