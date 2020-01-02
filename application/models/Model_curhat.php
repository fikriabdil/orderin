<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_curhat extends CI_Model
{
    private $_table = 'curhat';

    public function rules()
    {
        return [
            [
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'required|numeric|exact_length[16]'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|max_length[100]'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'no_hp',
                'label' => 'No HP',
                'rules' => 'required|numeric|min_length[10]|max_length[15]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'valid_email|max_length[30]'
            ],
            [
                'field' => 'id_mitra',
                'label' => 'Mitra Curhat',
                'rules' => 'required'
            ],
            [
                'field' => 'isi_curhat',
                'label' => 'Curhat',
                'rules' => 'required'
            ]
        ];
    }

    public function get_all($options = [], $limit, $offset)
    {
        if (isset($options['where'])) {
            $this->db->where($options['where']);
        }
        $this->db->select('curhat.*, pengguna.id_kategori_pengguna id_kategori_pengguna, pengguna.nama nama, kategori_curhat.profesi profesi');
        $this->db->join('pengguna', 'curhat.id_pengguna = pengguna.id', 'left');
        $this->db->join('kategori_curhat', 'curhat.id_kategori_curhat = kategori_curhat.id', 'left');
        $this->db->order_by('updated_at desc');
        return $this->db->get($this->_table, $limit, $offset)->result_array();
    }

    public function get_one($options = [])
    {
        if (isset($options['where'])) {
            $this->db->where($options['where']);
        }

        return $this->db->get($this->_table)->row_array();
    }

    public function insert($data)
    {
        $this->db->set('id', 'UUID()', FALSE);
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function update($data, $where)
    {

        if ($data['action'] == 'done') {
            $data = array_slice($data, 1, 2);
            $this->db->set('is_done', 1);
            $data['done_at'] = date('Y-m-d H:i:s');
        }

        return $this->db->update($this->_table, $data, $where);
    }

    public function delete($where)
    {
        return $this->db->delete($this->_table, $where);
    }
}
