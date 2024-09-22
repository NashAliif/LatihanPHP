<?php

class Auth extends Controller
{
    public function __construct()
    {
        $this->guest();
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('auth/login');
        $this->view('templates/footer', $data);
    }

    public function login()
    {
        $logedIn = UserModel::login($_POST);

        if ($logedIn) {
            header('Location: ' . BASEURL . '/home');
        } else {
            header('Location: ' . BASEURL . '/auth');
        }
    }

    public function indexRegister()
    {
        $data['title'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('auth/register');
        $this->view('templates/footer', $data);
    }

    public function register()
    {
        $registered = UserModel::register($_POST);

        if ($registered) {
            header('Location: ' . BASEURL . '/auth');
        } else {
            header('Location: ' . BASEURL . '/auth/indexRegister');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASEURL . '/auth');
    }
}
