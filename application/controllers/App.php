<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!empty($this->session->user)) {
            redirect('dashboard');
        } else {
            redirect('login');
        }
    }
}
