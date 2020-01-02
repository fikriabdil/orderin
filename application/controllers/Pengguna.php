<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pengguna');
        $this->load->model('Model_kategori_pengguna');
        $this->load->model('Model_kategori_curhat');
        $this->load->library('form_validation');

        if ($this->session->user['id_kategori_pengguna'] != 'admin') redirect('curhat');
    }

    public function index()
    {
        $data['user'] = $this->Model_pengguna->get_all();
        $data['session'] = $this->session->user;
        $this->load->view('manajemen/pengguna/list', $data);
    }

    public function cek_duplikat($nik, $id)
    {
        return $this->Model_pengguna->check_duplicate($nik, $id);
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Model_pengguna->delete(['id' => $id])) {
            $this->session->set_flashdata('success', 'Berhasil menghapus akun pengguna');
            redirect('manajemen/pengguna');
        } else {
            $this->session->set_flashdata('danger', 'Gagal menghapus akun pengguna');
            redirect('manajemen/pengguna');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules($this->Model_pengguna->form_rules());
        $this->form_validation->set_error_delimiters('<div class="text-danger py-1">', '</div>');

        if ($this->form_validation->run()) {
            $post = $this->input->post();

            $insert = [
                'nik' => $post['nik'],
                'kata_sandi' => password_hash($post['kata_sandi'], PASSWORD_DEFAULT),
                'nama' => $post['nama'],
                'alamat' => $post['alamat'],
                'email' => $post['email'],
                'no_hp' => $post['no_hp'],
                'id_kategori_pengguna' => $post['id_kategori_pengguna'] != '' ? $post['id_kategori_pengguna'] : NULL,
                'id_kategori_curhat' => ($post['id_kategori_curhat'] != '' && $post['id_kategori_pengguna'] == 'mitra') ? $post['id_kategori_curhat'] : NULL,
            ];

            $this->Model_pengguna->insert($insert);
            $this->session->set_flashdata('success', 'Berhasil menambahkan pengguna baru');
            redirect('manajemen/pengguna');
        }

        $data = [
            'action' => 'Tambah',
            'model' => [
                'nik' => set_value('nik'),
                'nama' => set_value('nama'),
                'alamat' => set_value('alamat'),
                'email' => set_value('email'),
                'no_hp' => set_value('no_hp'),
                'id_kategori_pengguna' => set_value('id_kategori_pengguna'),
                'id_kategori_curhat' => set_value('id_kategori_curhat'),
            ],
            'dropdown' => [
                'id_kategori_pengguna' => $this->Model_kategori_pengguna->get_all(),
                'id_kategori_curhat' => $this->Model_kategori_curhat->get_all(),
            ],
            'session' => $this->session->user
        ];

        $this->load->view('manajemen/pengguna/form', $data);
    }

    public function ubah($id = null)
    {
        $model = $this->Model_pengguna->get_one(['where' => ['id' => $id]]);

        if (empty($model)) show_404();

        $this->form_validation->set_rules($this->Model_pengguna->form_rules('update', $id));
        $this->form_validation->set_error_delimiters('<div class="text-danger py-1">', '</div>');

        if ($this->form_validation->run()) {
            $post = $this->input->post();

            $update = [
                'nik' => $post['nik'],
                'nama' => $post['nama'],
                'alamat' => $post['alamat'],
                'email' => $post['email'],
                'no_hp' => $post['no_hp'],
                'id_kategori_pengguna' => $post['id_kategori_pengguna'] != '' ? $post['id_kategori_pengguna'] : NULL,
                'id_kategori_curhat' => ($post['id_kategori_curhat'] != '' && $post['id_kategori_pengguna'] == 'mitra') ? $post['id_kategori_curhat'] : NULL,
            ];

            if (!empty($post['kata_sandi'])) {
                $update['kata_sandi'] = password_hash($post['kata_sandi'], PASSWORD_DEFAULT);
            }

            $this->Model_pengguna->update($update, ['id' => $id]);
            $this->session->set_flashdata('success', 'Berhasil mengubah data pengguna');
            redirect('manajemen/pengguna');
        }

        $data = [
            'action' => 'Ubah',
            'model' => [
                'nik' => set_value('nik', $model['nik']),
                'nama' => set_value('nama', $model['nama']),
                'alamat' => set_value('alamat', $model['alamat']),
                'email' => set_value('email', $model['email']),
                'no_hp' => set_value('no_hp', $model['no_hp']),
                'id_kategori_pengguna' => set_value('id_kategori_pengguna', $model['id_kategori_pengguna']),
                'id_kategori_curhat' => set_value('id_kategori_curhat', $model['id_kategori_curhat']),
            ],
            'dropdown' => [
                'id_kategori_pengguna' => $this->Model_kategori_pengguna->get_all(),
                'id_kategori_curhat' => $this->Model_kategori_curhat->get_all(),
            ],
            'session' => $this->session->user
        ];

        $this->load->view('manajemen/pengguna/form', $data);
    }

    public function cek_nik()
    {
        $nik = $this->input->post('nik');
        $data = $this->Model_pengguna->get_one(['where' => ['nik' => $nik]]);

        echo json_encode($data);
    }
}
