<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{

    public function index()
    {
        $data['session'] = $this->session->user;
        $data['konten'] = 'app/paket/list';
        $this->load->view('layout/main', $data);
    }
}

/* End of file Paket.php */
