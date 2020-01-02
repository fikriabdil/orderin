<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_jadwal_mitra extends CI_Model
{
    private $_table = 'jadwal_mitra';


    // public function check_duplicate_input_field($field_value, $id)
    // {
    //     $where = array('profesi' => $field_value);
    //     $row = $this->db->get_where($this->_table, $where);
    //     $data = $row->result_array();
    //     if ($row->num_rows() > 0) {
    //         if ($data[0]['id'] != $id) {
    //             $this->form_validation->set_message('cek_duplikat_profesi', '{field} ' . $field_value . ' sudah digunakan');
    //             return FALSE;
    //         }
    //     }
    //     return TRUE;
    // }

    public function check_duplicate($hari = '', $mitra = '')
    {
        $where = array('hari' => $hari, 'id_mitra' => $mitra);
        $row = $this->db->get_where($this->_table, $where);
        if ($row->num_rows() > 0) {
            return FALSE;
        }
        return TRUE;
    }

    public function delete($where)
    {
        return $this->db->delete($this->_table, $where);
    }

    public function form_rules()
    {
        return [
            [
                'field' => 'hari',
                'label' => 'Hari',
                'rules' => 'required'
            ],
            [
                'field' => 'kategori_curhat',
                'label' => 'Kategori Curhat',
                'rules' => 'required'
            ],
            [
                'field' => 'mitra',
                'label' => 'Mitra Curhat',
                'rules' => 'required'
            ]
        ];
    }

    public function get_all($options = [])
    {
        if (isset($options['where'])) {
            $this->db->where($options['where']);
        }

        $this->db->select('nama');
        $this->db->join('pengguna', 'jadwal_mitra.id_mitra = pengguna.id', 'left');

        return $this->db->get($this->_table)->result_array();
    }

    public function get_one($options = [])
    {
        if (isset($options['where'])) {
            $this->db->where($options['where']);
        }

        return $this->db->get($this->_table)->row_array();
    }

    public function get_days()
    {
        return [
            [
                'id' => '1',
                'label' => 'Senin',
            ],
            [
                'id' => '2',
                'label' => 'Selasa',
            ],
            [
                'id' => '3',
                'label' => 'Rabu',
            ],
            [
                'id' => '4',
                'label' => 'Kamis',
            ],
            [
                'id' => '5',
                'label' => 'Jumat',
            ],
            [
                'id' => '6',
                'label' => 'Sabtu',
            ],
            [
                'id' => '7',
                'label' => 'Minggu',
            ]
        ];
    }

    public function insert($data)
    {
        $this->db->set('id', 'UUID()', false);
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
