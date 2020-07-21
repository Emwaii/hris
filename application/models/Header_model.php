<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Header_model extends CI_Model
{
    private $_table = "lowongan";

    public $id;
    public $nama_lowongan;
    public $header;
    public $keterangan;
    public $is_active;
    public $text_color;

    public function rules()
    {
        return [
            ['field' => 'namal',
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
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id = null;
        $this->nama_lowongan = $post["namal"];
        $this->header = $this->_uploadimage();
        $this->keterangan = $post["keterangan"];
        $this->is_active = $post["active"];
		$this->text_color = $post["text"];
		$this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama_lowongan = $post["namal"];
        $this->header = $this->_uploadimage();
        $this->keterangan = $post["keterangan"];
        $this->is_active = $post["active"];
		$this->text_color = $post["text"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {		
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
    private function _uploadimage()	{   
		$config['upload_path']          = './assets/img/guest/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
		//$config['file_name']            = $nama_cv;        
        $config['overwrite']			 = true;
		$config['max_size']             = 2048; // 1MB
		// $configig['max_width']            = 1024;
		// $configig['max_height']           = 768;
       
        $this->load->library('upload', $config);
        
		if ($this->upload->do_upload('cv')) {
			return $this->upload->data("file_name");
        }   
        //print_r($this->upload->display_errors());     		
		return "default.docx";
    }

}