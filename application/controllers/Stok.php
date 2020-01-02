<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_kategori_curhat');
        $this->load->library('form_validation');

        if ($this->session->user['id_kategori_pengguna'] != 'admin') redirect('curhat');
    }

    public function index()
    {
        $data['user'] = $this->Model_kategori_curhat->get_all();
        $data['session'] = $this->session->user;
        $data['konten'] = 'app/stok/list';
        $this->load->view('layout/main', $data);
    }

    public function cek_duplikat_profesi($profesi, $id)
    {
        return $this->Model_kategori_curhat->check_duplicate($profesi, $id);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Model_kategori_curhat->delete(['id' => $id])) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data kategori curhat');
            redirect('manajemen/kategori_curhat');
        } else {
            $this->session->set_flashdata('danger', 'Gagal menghapus data kategori curhat');
            redirect('manajemen/kategori_curhat');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules($this->Model_kategori_curhat->form_rules());
        $this->form_validation->set_error_delimiters('<div class="text-danger py-1">', '</div>');

        if ($this->form_validation->run()) {
            $input = $this->input->post();

            $insert = [
                'profesi' => $input['profesi'],
            ];

            $this->Model_kategori_curhat->insert($insert);
            $this->session->set_flashdata('success', 'Berhasil menambahkan kategori curhat baru');
            redirect('manajemen/kategori_curhat');
        }

        $data = [
            'action' => 'Tambah',
            'model' => [
                'profesi' => set_value('profesi')
            ]
        ];
        $data['session'] = $this->session->user;
        $this->load->view('manajemen/kategori_curhat/form', $data);
    }

    public function ubah($id = null)
    {
        $model = $this->Model_kategori_curhat->get_one(['where' => ['id' => $id]]);

        if (empty($model)) show_404();

        $this->form_validation->set_rules($this->Model_kategori_curhat->form_rules($id));
        $this->form_validation->set_error_delimiters('<div class="text-danger py-1">', '</div>');


        if ($this->form_validation->run()) {
            $input = $this->input->post();

            $update = [
                'profesi' => $input['profesi'],
            ];

            $this->Model_kategori_curhat->update($update, ['id' => $id]);
            $this->session->set_flashdata('success', 'Berhasil mengubah data kategori curhat');
            redirect('manajemen/kategori_curhat');
        }

        $data = [
            'action' => 'Ubah',
            'model' => [
                'profesi' => set_value('profesi', $model['profesi']),
            ]
        ];
        $data['session'] = $this->session->user;

        $this->load->view('manajemen/kategori_curhat/form', $data);
    }
}
