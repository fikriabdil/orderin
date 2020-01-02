<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iklan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_kategori_pengguna');
        $this->load->library('form_validation');

        if ($this->session->user['id_kategori_pengguna'] != 'admin') redirect('curhat');
    }

    public function index()
    {
        $data['user'] = $this->Model_kategori_pengguna->get_all();
        $data['session'] = $this->session->user;
        $data['konten'] = 'app/iklan/list';
        $this->load->view('layout/main', $data);
    }

    public function cek_duplikat_kategori($kategori, $id)
    {
        return $this->Model_kategori_pengguna->check_duplicate($kategori, $id);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Model_kategori_pengguna->delete(['id' => $id])) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data kategori pengguna');
            redirect('manajemen/kategori_pengguna');
        } else {
            $this->session->set_flashdata('danger', 'Gagal menghapus data kategori pengguna');
            redirect('manajemen/kategori_pengguna');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules($this->Model_kategori_pengguna->form_rules());
        $this->form_validation->set_error_delimiters('<div class="text-danger py-1">', '</div>');

        if ($this->form_validation->run()) {
            $input = $this->input->post();

            $insert = [
                'kategori' => $input['kategori'],
                'id' => strtolower($input['kategori']),
            ];

            $this->Model_kategori_pengguna->insert($insert);
            $this->session->set_flashdata('success', 'Berhasil menambahkan kategori baru untuk pengguna');
            redirect('manajemen/kategori_pengguna');
        }

        $data = [
            'action' => 'Tambah',
            'model' => [
                'kategori' => set_value('kategori')
            ]
        ];
        $data['session'] = $this->session->user;

        $this->load->view('manajemen/kategori_pengguna/form', $data);
    }

    public function ubah($id = null)
    {
        $model = $this->Model_kategori_pengguna->get_one(['where' => ['id' => $id]]);

        if (empty($model)) show_404();

        $this->form_validation->set_rules($this->Model_kategori_pengguna->form_rules($id));
        $this->form_validation->set_error_delimiters('<div class="text-danger py-1">', '</div>');


        if ($this->form_validation->run()) {
            $input = $this->input->post();

            $update = [
                'kategori' => $input['kategori'],
            ];

            $this->Model_kategori_pengguna->update($update, ['id' => $id]);
            $this->session->set_flashdata('success', 'Berhasil mengubah data kategori pengguna');
            redirect('manajemen/kategori_pengguna');
        }

        $data = [
            'action' => 'Ubah',
            'model' => [
                'kategori' => set_value('kategori', $model['kategori']),
            ]
        ];
        $data['session'] = $this->session->user;

        $this->load->view('manajemen/kategori_pengguna/form', $data);
    }
}
