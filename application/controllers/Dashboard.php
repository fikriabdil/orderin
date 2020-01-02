<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->user)) redirect('login');

        $this->load->model('Model_curhat');
        $this->load->model('Model_kategori_curhat');
        $this->load->model('Model_pengguna');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $options = [
            'where' => ['id_pengguna' => $this->session->user['id']],
        ];

        $config = $this->pagination();
        $config['base_url'] = site_url('curhat');
        $config['total_rows'] = $this->db->select('id')->from('curhat')->where($options['where'])->count_all_results();

        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['pagination'] = $this->pagination->create_links();
        $data['curhat'] = $this->Model_curhat->get_all($options, $config["per_page"], $data['page']);
        $data['session'] = $this->session->user;

        $dari = $data["page"] + 1;
        $sampai = ($data["page"] + $config["per_page"]) > $config["total_rows"] ? $config["total_rows"] : ($data["page"] + $config["per_page"]);

        $data['keterangan_data_tampil'] = 'Menampilkan ' . $dari . ' sampai ' . $sampai . ' dari  ' . $config["total_rows"] . ' total curhat';
        $data['konten'] = 'app/dashboard';
        $this->load->view('layout/main', $data);
    }

    public function balas()
    {
        $session = $this->session->user;
        $options = [];

        switch ($session['id_kategori_pengguna']) {
            case 'masyarakat':
                redirect(site_url('curhat'));
                break;
            case 'mitra':
                $options = [
                    'where' => ['curhat.id_kategori_curhat' => $this->session->user['id_kategori_curhat']],
                ];
                break;
            default:
                break;
        }

        $config = $this->pagination();
        $config['base_url'] = site_url('curhat/balas');
        $config['total_rows'] = isset($options['where']) ? $this->db->select('id')->from('curhat')->where($options['where'])->count_all_results() : $this->db->count_all('curhat');

        $this->pagination->initialize($config);

        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['pagination'] = $this->pagination->create_links();
        $data['curhat'] = $this->Model_curhat->get_all($options, $config["per_page"], $data['page']);
        $data['session'] = $session;
        $dari = $data["page"] + 1;
        $sampai = ($data["page"] + $config["per_page"]) > $config["total_rows"] ? $config["total_rows"] : ($data["page"] + $config["per_page"]);

        $data['keterangan_data_tampil'] = 'Menampilkan ' . $dari . ' sampai ' . $sampai . ' dari  ' . $config["total_rows"] . ' total curhat';

        $this->load->view('app/curhat/balas', $data);
    }

    public function lihat($id, $kategori = null)
    {
        if (!isset($id)) show_404();

        $data['curhat'] = $this->Model_curhat->get_one(['where' => ['id' => $id]]);

        if (!$data['curhat']) show_404();

        $data['curhat']['profesi'] = $this->Model_kategori_curhat->get_one(['where' => ['id' => $data['curhat']['id_kategori_curhat']]])['profesi'];
        $data['curhat']['pengguna'] = $this->Model_pengguna->get_one(['where' => ['id' => $data['curhat']['id_pengguna']]]);
        $data['curhat']['mitra'] = $this->Model_pengguna->get_one(['where' => ['id' => $data['curhat']['id_mitra']]]);
        $data['session'] = $this->session->user;

        $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

        if ($this->form_validation->run()) {
            $input = $this->input->post();

            $data = [
                'action' => 'done',
                'id_mitra' => $data['session']['id'],
                'tanggapan' => $input['tanggapan'],
            ];

            $this->Model_curhat->update($data, ['id' => $id]);

            $this->session->set_flashdata('message', 'Tanggapan tersimpan');
            redirect(site_url('curhat/lihat/' . $id . '/balas'));
        }

        $kategori == 'balas' ? $this->load->view('app/curhat/lihat_balas', $data) : $this->load->view('app/curhat/lihat', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('isi_curhat', 'Curhat', 'required');
        $this->form_validation->set_rules('id_mitra', 'Kategori curhat', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger py-1">', '</div>');

        if ($this->form_validation->run()) {
            $input = $this->input->post();

            $data_curhat = [
                'id_pengguna' => $this->session->user['id'],
                'isi' => $input['isi_curhat'],
                'id_kategori_curhat' => $input['id_mitra']
            ];

            $this->Model_curhat->insert($data_curhat);
            $this->session->set_flashdata('message', '<span class="font-weight-semibold">Yey, curhatmu tersampaikan!</span> Sabar dulu ya, curhatmu akan segera dibalas paling lama 2x24 jam!');
            redirect(site_url('curhat'));
        }

        $data = [
            'model' => [
                'id_mitra' => set_value('id_mitra'),
                'isi_curhat' => set_value('isi_curhat')
            ],
            'dropdown' => [
                'id_mitra' => $this->Model_kategori_curhat->get_all(),
            ],
            'session' => $this->session->user
        ];

        $this->load->view('app/curhat/tambah', $data);
    }

    public function pagination()
    {
        $config['per_page']         = 6;

        $config['first_link']       = '<i class="fas fa-angle-double-left"></i>';
        $config['last_link']        = '<i class="fas fa-angle-double-right"></i>';
        $config['next_link']        = '<i class="fas fa-angle-right"></i>';
        $config['prev_link']        = '<i class="fas fa-angle-left"></i>';
        $config['full_tag_open']    = '<nav><ul class="mt-3 pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        return $config;
    }
}
