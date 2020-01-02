<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pengguna');
        $this->load->library('form_validation');
    }

    public function login()
    {
        if (!empty($this->session->user)) {
            redirect('dashboard');
        }

        $post = $this->input->post();

        if ($post) {
            $user = $this->Model_pengguna->get_one(['where' => ['nik' => $post['username']]]);
            var_dump($user);
            if ($user) {
                if (password_verify($post['password'], $user['kata_sandi'])) {
                    $_SESSION['user'] = $user;
                    redirect('dashboard');
                }
            }

            $this->session->set_flashdata('danger', 'username/password salah');
        }

        $data = [
            'model' => [
                'username' => set_value('username'),
            ],
        ];

        $this->load->view('app/login', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
