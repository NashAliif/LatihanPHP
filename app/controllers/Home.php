<?php

class Home extends Controller
{
    public function __construct()
    {
        $this->auth();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location:' . BASEURL . '/auth');
    }
}
