<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->user)) redirect('login');

        $this->load->model('Model_kategori_pengguna');
        $this->load->model('Model_kategori_curhat');
        $this->load->library('form_validation');
        $this->load->model('Model_pengguna');
    }

    public function index()
    {
        $data['session'] = $this->session->user;
        $data['session']['kategori_pengguna'] = $this->Model_kategori_pengguna->get_one(['where' => ['id' => $data['session']['id_kategori_pengguna']]]);
        $data['session']['mitra'] = $data['session']['id_kategori_curhat'] ? $this->Model_kategori_curhat->get_one(['where' => ['id' => $data['session']['id_kategori_curhat']]]) : '';
        $this->ubah_kata_sandi($data['session']);

        $this->load->view('app/profil', $data);
    }

    public function ubah_kata_sandi($session)
    {
        $this->form_validation->set_rules('kata_sandi_lama', 'Kata sandi lama', 'required|min_length[8]');
        $this->form_validation->set_rules('kata_sandi_baru', 'Kata sandi baru', 'required|min_length[8]');
        $this->form_validation->set_error_delimiters('<div class="text-danger py-1">', '</div>');

        $button = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        if ($this->form_validation->run()) {
            $user = $this->Model_pengguna->get_one(['where' => ['id' => $session['id']]]);
            if ($user) {
                $post = $this->input->post();
                if (password_verify($post['kata_sandi_lama'], $user['kata_sandi'])) {
                    $this->Model_pengguna->update(['kata_sandi' => password_hash($post['kata_sandi_baru'], PASSWORD_DEFAULT)], ['id' => $user['id']]);
                    $this->session->set_flashdata('messages', '<div class="alert alert-success">Berhasil mengubah kata sandi' . $button . '</div>');
                } else {
                    $this->session->set_flashdata('messages', '<div class="alert alert-danger">Kata sandi lama kamu kurang tepat' . $button . '</div>');
                }
            }
        }
    }
}
