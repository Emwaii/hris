<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends CI_Model
{
    private $_table = "gaji";

    public $id;
    public $jenis_gaji;
    public $jumlah;
    
    public function rules()
    {
        return [
            ['field' => 'jngaji',
            'label' => 'Jenis gaji',
            'rules' => 'required']
 
        ];
    }

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
        $this->jenis_gaji = $post["jngaji"];
		$this->jumlah = $post["jumlah"];
		$this->db->insert($this->_table, $this);
    }

    public function update($id = null)
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->jenis_gaji = $post["jngaji"];
		$this->jumlah = $post["jumlah"];
	
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {		
        return $this->db->delete($this->_table, array("id" => $id));
	}

}
