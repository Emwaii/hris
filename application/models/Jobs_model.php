<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends CI_Model
{
    private $_table = "jobs";

    public $id_job;
    public $jobs_name;

   
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_job" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id_job = null;
        $this->jobs_name = $post["jname"];
		
		$this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_job = $post["id"];
        $this->jobs_name = $post["jname"];
	
        $this->db->update($this->_table, $this, array('id_job' => $post['id']));
    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("id_job" => $id));
	}

}