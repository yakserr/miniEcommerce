<form action="<?= base_url('admin/user/add_user'); ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
            <?= form_error('username', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= set_value('name'); ?>">
            <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
            <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" class="form-control" id="level" name="level" placeholder="Level" value="User" readonly>
            <?= form_error('level', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Close</button>
        <button type="submit" class="btn btn-primary">Add data</button>
    </div>
</form>