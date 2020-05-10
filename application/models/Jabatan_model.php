<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    private $_table = "jabatan";

    public $jabatan_id;
    public $jabatan_name;


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["jabatan_id" => $id])->row();
    }

}
