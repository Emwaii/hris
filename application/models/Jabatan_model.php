<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    private $_table = "jabatan";

    public $jabatan_id;
    public $jabatan_name;
    public $gajipokok;

    public function rules()
    {
        return [
            ['field' => 'jname',
            'label' => 'Nama Jabatan',
            'rules' => 'required']
 
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["jabatan_id" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->jabatan_id = null;
        $this->jabatan_name = $post["jname"];
		$this->gajipokok = $post["jpokok"];
		$this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->jabatan_id = $post["id"];
        $this->jabatan_name = $post["jname"];
		$this->gajipokok = $post["jpokok"];
	
        $this->db->update($this->_table, $this, array('jabatan_id' => $post['id']));
    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("jabatan_id" => $id));
	}

}