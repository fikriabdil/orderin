<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    public function index()
    {
        $data['session'] = $this->session->user;
        $data['konten'] = 'app/penjualan/list';
        $this->load->view('layout/main', $data);
    }
}

/* End of file Penjualan.php */
