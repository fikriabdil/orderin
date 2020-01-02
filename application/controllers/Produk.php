<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_kategori_curhat');
        $this->load->model('Model_jadwal_mitra');
        $this->load->model('Model_pengguna');
        $this->load->library('form_validation');

        if ($this->session->user['id_kategori_pengguna'] != 'admin') redirect('curhat');
    }

    public function index()
    {
        $kategori_curhat = $this->Model_kategori_curhat->get_all();

        $data['jadwal'] = array();
        foreach ($kategori_curhat as $kategori) {
            array_push($data['jadwal'], [
                'kategori' => $kategori['profesi'],
                'mitra' => $this->Model_jadwal_mitra->get_all(['where' => ['hari' => date(7), 'jadwal_mitra.id_kategori_curhat' => $kategori['id']]])
            ]);
        }
        $data['session'] = $this->session->user;
        $data['konten'] = 'app/produk/list';
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
        $this->form_validation->set_rules($this->Model_jadwal_mitra->form_rules());
        $this->form_validation->set_error_delimiters('<div class="text-danger py-1">', '</div>');

        if ($this->form_validation->run()) {
            $input = $this->input->post();

            if ($this->Model_jadwal_mitra->check_duplicate($input['hari'], $input['mitra'])) {
                $insert = [
                    'id_mitra' => $input['mitra'],
                    'id_kategori_curhat' => $input['kategori_curhat'],
                    'hari' => $input['hari'],
                ];
                $this->Model_jadwal_mitra->insert($insert);
                $this->session->set_flashdata('success', 'Berhasil menambahkan jadwal');
                redirect('produk');
            } else {
                $this->session->set_flashdata('failed', 'Mitra sudah memiliki jadwal pada hari tersebut');
                redirect('produk/tambah');
            }
        }

        $data = [
            'action' => 'Tambah',
            'dropdown' => [
                'hari' => $this->Model_jadwal_mitra->get_days(),
                'kategori_curhat' => $this->Model_kategori_curhat->get_all()
            ],
            'model' => [
                'hari' => set_value('hari'),
                'kategori_curhat' => set_value('kategori_curhat'),
            ],
            'session' => $this->session->user
        ];

        $data['konten'] = 'app/produk/form';
        $this->load->view('layout/main', $data);
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

        $this->load->view('produk/form', $data);
    }

    public function dropdown_mitra()
    {
        $id_kategori_curhat = $this->input->post('id', TRUE);
        $options = [
            'where' => [
                'id_kategori_pengguna' => 'mitra',
                'id_kategori_curhat' => $id_kategori_curhat,
            ],
        ];

        $data = $this->Model_pengguna->get_all($options);
        echo json_encode($data);
    }
}
