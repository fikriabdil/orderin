<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengguna extends CI_Model
{
    private $_table = 'pengguna';

    public function check_duplicate($field_value, $id)
    {
        $where = array('nik' => $field_value);
        $row = $this->db->get_where($this->_table, $where);
        $data = $row->result_array();
        if ($row->num_rows() > 0) {
            if ($data[0]['id'] != $id) {
                $this->form_validation->set_message('cek_duplikat', '{field} ' . $field_value . ' sudah digunakan');
                return FALSE;
            }
        }
        return TRUE;
    }

    public function delete($where)
    {
        return $this->db->delete($this->_table, $where);
    }

    public function form_rules($action = 'default', $id = null)
    {
        return [
            [
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'required|numeric|exact_length[16]|callback_cek_duplikat[' . $id . ']'
            ],
            [
                'field' => 'kata_sandi',
                'label' => 'Kata sandi',
                'rules' => ($action == 'default') ? 'required|min_length[8]' : '',
            ],
            [
                'field' => 'nama',
                'label' => 'Nama lengkap',
                'rules' => 'required|max_length[32]'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'no_hp',
                'label' => 'Nomor HP',
                'rules' => 'required|numeric|min_length[10]|max_length[15]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'valid_email|max_length[30]'
            ],
            [
                'field' => 'id_kategori_pengguna',
                'label' => 'Kategori pengguna',
                'rules' => 'required'
            ]
        ];
    }

    public function get_all($options = [])
    {
        if (isset($options['where'])) {
            $this->db->where($options['where']);
        }

        $this->db->select('pengguna.*, kategori_pengguna.kategori kategori, kategori_curhat.profesi profesi');
        $this->db->join('kategori_pengguna', 'pengguna.id_kategori_pengguna = kategori_pengguna.id', 'left');
        $this->db->join('kategori_curhat', 'pengguna.id_kategori_curhat = kategori_curhat.id', 'left');

        return $this->db->get($this->_table)->result_array();
    }

    public function get_one($options = [])
    {

        if (isset($options['select'])) {
            $this->db->select($options['select']);
        }

        if (isset($options['where'])) {
            $this->db->where($options['where']);
        }

        return $this->db->get($this->_table)->row_array();
    }

    public function insert($data)
    {
        $this->db->set('id', 'UUID()', FALSE);
        $this->db->set('created_at', 'NOW()', FALSE);
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function update($data, $where)
    {
        $this->db->set('updated_at', 'NOW()', FALSE);
        return $this->db->update($this->_table, $data, $where);
    }
}
