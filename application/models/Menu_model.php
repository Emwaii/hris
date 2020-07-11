<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    private $_table = "menu";

    public $id;
    public $menu_name;
    public $is_active;

    // public function rules()
    // {
    //     return [
    //         ['field' => 'jname',
    //         'label' => 'Nama Jabatan',
    //         'rules' => 'required']
 
    //     ];
    // }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function get($id = null)
    {
        $this->db->from('menu');
        if($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function geta($id = null)
    {
        $this->db->from('menu_access');
        if($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
}