<div id="sidebar" class="vh-100 bg-primary text-white p-5 d-flex flex-column justify-content-between sticky-top">
    <div class="d-flex flex-column gap-4">
        <h2 class="text-center">
            <a href="<?= BASEURL; ?>/home" class="text-decoration-none text-white">Toko ABC</a>
        </h2>
        <div>
            <ul class="m-0 p-0">
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :
                    echo
                    '<li class="d-flex flex-column">
                        <button class="btn btn-primary w-100 d-flex justify-content-start align-items-center gap-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-people-fill fs-4"></i>
                            <span class="ms-1 d-none d-sm-inline fw-bold fs-5">Users</span>
                        </button>
                        <div class="collapse" id="collapseExample">
                            <ul class="m-0 p-0 ps-3">
                                <li class="d-flex">
                                    <a href=" ' . BASEURL . '/user" class="btn btn-primary w-100 d-flex justify-content-start align-items-center gap-3">
                                        <i class="bi bi-person-fill-gear fs-4"></i>
                                        <span class="ms-1 d-none d-sm-inline fw-bold fs-5">Manage User</span>
                                    </a>
                                </li>
                                <li class="d-flex">
                                    <a href="' . BASEURL . '/user/addUser" class="btn btn-primary w-100 d-flex justify-content-start align-items-center gap-3">
                                        <i class="bi bi-person-fill-add fs-4"></i>
                                        <span class="ms-1 d-none d-sm-inline fw-bold fs-5">Add User</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>';
                endif; ?>
            </ul>
        </div>
    </div>
    <div class="btn-group dropup">
        <button type="button" class="btn btn-secondary dropdown-toggle fs-5" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
            <span>
                <?= isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>
            </span>
        </button>
        <ul class="dropdown-menu w-100">
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/user/profile/<?= $_SESSION['id']; ?>">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/auth/logout">Logout</a></li>
        </ul>
    </div>
</div>