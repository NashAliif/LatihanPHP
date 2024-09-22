<div id="content">
    <div class="vh-100 d-flex flex-column justify-content-center align-items-center gap-5">
        <div class="w-fit border border-2 shadow d-flex flex-column justify-content-center align-items-center p-5 gap-3 rounded-3">
            <h1>Create User</h1>
            <form action="<?= BASEURL; ?>/user/update/<?= $data['user']['id']; ?>" method="post">
                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="username" class="form-control" id="Username" name="username" value="<?= $data['user']['username']; ?>" style="width: 300px;" />
                </div>
                <div class="mb-3">
                    <label for="Role" class="form-label">Role</label>
                    <select class="form-select" id="Role" name="role">
                        <?php
                        if ($data['user']['role'] == 'admin') {
                            echo '<option value="admin" selected>Admin</option>';
                            echo '<option value="user">User</option>';
                        } else {
                            echo '<option value="admin">Admin</option>';
                            echo '<option value="user" selected>User</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Password" name="password" style="width: 300px;" />
                </div>
                <div class="mb-3 d-none">
                    <input type="id" class="form-control" id="Id" name="id" value="<?= htmlspecialchars($data['user']['id']); ?>" />
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>