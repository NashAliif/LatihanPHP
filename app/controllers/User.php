<?php

class User extends Controller
{

    public function __construct()
    {
        $this->admin();
    }

    public function index()
    {
        $data['title'] = 'Manage User';
        $data['users'] = !empty(trim($_POST['keyword'] ?? '')) ? UserModel::search($_POST) : UserModel::getAllUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function profile($id)
    {
        $data['title'] = 'Profile User';
        $data['user'] = UserModel::getUserById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/profile', $data);
        $this->view('templates/footer');
    }

    public function addUser()
    {
        $data['title'] = 'Create User';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/add-user', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $registered = UserModel::register($_POST);
        if ($registered) {
            header('Location: ' . BASEURL . '/user');
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        } else {
            header('Location: ' . BASEURL . '/user/addUser');
            Flasher::setFlash('berhasil', 'ditambahkan', 'danger');
        }
    }

    public function update()
    {
        $updated = UserModel::updateUser($_POST);
        if ($updated) {
            header('Location: ' . BASEURL . '/user');
            Flasher::setFlash('berhasil', 'diupdate', 'success');
        }
        header('Location: ' . BASEURL . '/user');
        Flasher::setFlash('berhasil', 'diupdate', 'danger');
    }

    public function delete($id)
    {
        $deleted = UserModel::deleteUser($id);
        if ($deleted) {
            header('Location: ' . BASEURL . '/user');
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        }
        header('Location: ' . BASEURL . '/user');
        Flasher::setFlash('berhasil', 'dihapu', 'danger');
    }
}
