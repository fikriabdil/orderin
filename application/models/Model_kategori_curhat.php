<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori_curhat extends CI_Model
{
    private $_table = 'kategori_curhat';

    public function check_duplicate($field_value, $id)
    {
        $where = array('profesi' => $field_value);
        $row = $this->db->get_where($this->_table, $where);
        $data = $row->result_array();
        if ($row->num_rows() > 0) {
            if ($data[0]['id'] != $id) {
                $this->form_validation->set_message('cek_duplikat_profesi', '{field} ' . $field_value . ' sudah digunakan');
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
                'field' => 'profesi',
                'label' => 'Profesi',
                'rules' => 'required|max_length[32]|callback_cek_duplikat_profesi[' . $id . ']'
            ]
        ];
    }

    public function get_all($options = [])
    {
        if (isset($options['where'])) {
            $this->db->where($options['where']);
        }
        $this->db->order_by('profesi', 'ASC');
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
