<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan_model extends CI_Model
{
    private $_table = "lowongan";

    public $id;
    public $nama_lowongan;
    public $header;
    public $keterangan;
    public $is_active;
   
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id = null;
        $this->nama_lowongan = $post["lname"];
        $this->header = $post["header"];
        $this->keterangan = $post["keterangan"];
        $this->is_active = $post["active"];
		
		$this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama_lowongan = $post["lname"];
        $this->header = $post["header"];
        $this->keterangan = $post["keterangan"];
        $this->is_active = $post["active"];
	
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
    public function active_lowongan(){
        return $this->db->query("SELECT `id`, `nama_lowongan`, `header`, `keterangan`, `is_active` FROM `lowongan` WHERE is_active = 1")->result();
    }

}