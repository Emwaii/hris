<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends CI_Model
{
    private $_table = "language_pair";

    public $id_lang;
    public $language;

   
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_lang" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id_lang = null;
        $this->language = $post["lname"];
		
		$this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_lang = $post["id"];
        $this->language = $post["lname"];
	
        $this->db->update($this->_table, $this, array('id_lang' => $post['id']));
    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("id_lang" => $id));
	}

}