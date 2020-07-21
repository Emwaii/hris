<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan_model extends CI_Model
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
        
        if (!empty($_FILES["header"]["name"])) {
            $this->header = $this->_editimage();
        } else {
            $this->header = $post["old_image"];
        }

        $this->keterangan = $post["keterangan"];
        $this->is_active = $post["active"];
		$this->text_color = $post["text"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {		
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
    public function active_lowongan(){
        return $this->db->query("SELECT `id`, `nama_lowongan`, `header`, `keterangan`, `is_active` FROM `lowongan` WHERE is_active = 1")->result();
    }
    
    private function _uploadimage()	{
        $jum = $this->input->post("max")+1;  
		$config['upload_path']          = './upload/lowongan/';
		$config['allowed_types']        = 'jpg|png|jpeg|gif';
		$config['file_name']            = "header".$jum;        
        $config['overwrite']			 = true;
		$config['max_size']             = 5048; // 1MB
		// $configig['max_width']            = 1024;
		// $configig['max_height']           = 768;
       
        $this->load->library('upload', $config);
        
		if ($this->upload->do_upload('header')) {
			return $this->upload->data("file_name");
        }   
        //print_r($this->upload->display_errors());     		
		return "default.jpg";
    }

    private function _editimage()	{
        $jum = $this->input->post("id");  
		$config['upload_path']          = './upload/lowongan/';
		$config['allowed_types']        = 'jpg|png|jpeg|gif';
		$config['file_name']            = "header".$jum;        
        $config['overwrite']			= true;
		$config['max_size']             = 5048; // 1MB
		// $configig['max_width']            = 1024;
		// $configig['max_height']           = 768;
       
        $this->load->library('upload', $config);
        
		if ($this->upload->do_upload('header')) {
			return $this->upload->data("file_name");
        }   
        //print_r($this->upload->display_errors());     		
		return "default.jpg";
    }
    private function _deleteImage($id)
	{
		$lowongan = $this->getById($id);
		if ($lowongan->header != "default.jpg") {
			$filename = explode(".", $lowongan->header)[0];
			return array_map('unlink', glob(FCPATH."upload/lowongan/$filename.*"));
		}
    }
    
    
}