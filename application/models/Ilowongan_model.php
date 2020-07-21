<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ilowongan_model extends CI_Model
{
    private $_table = "ilowongan";

    public $id_ilowongan;
    public $ilowongan_name;
    public $ilowongan_alias;
    public $is_active;

    public function rules()
    {
        return [
            ['field' => 'lname',
            'label' => 'Nama lowongan',
            'rules' => 'required']
        ];
    }
   
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_ilowongan" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id_ilowongan= null;
        $this->ilowongan_name = $post["lname"];
        $this->ilowongan_alias = $post["aname"];
		$this->is_active = $post["active"];
		$this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_ilowongan = $post["id"];
        $this->ilowongan_name = $post["lname"];
        $this->ilowongan_alias = $post["aname"];
        $this->is_active = $post["active"];
        $this->db->update($this->_table, $this, array('id_ilowongan' => $post['id']));
    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("id_ilowongan" => $id));
	}

}