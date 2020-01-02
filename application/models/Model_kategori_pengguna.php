<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori_pengguna extends CI_Model
{
    private $_table = 'kategori_pengguna';

    public function check_duplicate($field_value, $id)
    {
        $where = array('kategori' => $field_value);
        $row = $this->db->get_where($this->_table, $where);
        $data = $row->result_array();
        if ($row->num_rows() > 0) {
            if ($data[0]['id'] != $id) {
                $this->form_validation->set_message('cek_duplikat_kategori', '{field} ' . $field_value . ' sudah digunakan');
                return FALSE;
            }
        }
        return TRUE;
    }

    public function delete($where)
    {
        return $this->db->delete($this->_table, $where);
    }

    public function form_rules($id = null)
    {
        return [
            [
                'field' => 'kategori',
                'label' => 'Kategori',
                'rules' => 'required|max_length[20]|callback_cek_duplikat_kategori[' . $id . ']'
            ]
        ];
    }

    public function get_all($options = [])
    {
        if (isset($options['where'])) {
            $this->db->where($options['where']);
        }
        $this->db->order_by('kategori', 'ASC');
        return $this->db->get($this->_table)->result_array();
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
