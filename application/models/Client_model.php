<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model
{
    private $_table = "client";

    public $client_id;
    public $id_card;
    public $nama;
    public $no_telp;
    public $email;
    public $perusahaan;
    public $alamat;
    public $image = "default.jpg";
    
    
    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'idc',
            'label' => 'ID Card',
            'rules' => 'required'],
            
            ['field' => 'notlp',
            'label' => 'Phone Number',
            'rules' => 'required'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["client_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->client_id = uniqid();
        $this->id_card = $post['idc'];
        $this->nama = $post["name"];
        $this->no_telp = $post["notlp"];
        $this->email= $post["email"];
        $this->perusahaan = $post["industri"];
        $this->alamat = $post["alamat"];
        $this->image = $this->_uploadImage();
        
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->client_id = $post["id"];
        $this->id_card = $post['idc'];
        $this->nama = $post["name"];
        $this->no_telp = $post["notlp"];
        $this->email= $post["email"];
        $this->perusahaan = $post["industri"];
        $this->alamat = $post["alamat"];

		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}
        
        $this->db->update($this->_table, $this, array('client_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("client_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/client/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->client_id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$client = $this->getById($id);
		if ($client->image != "default.jpg") {
			$filename = explode(".", $client->image)[0];
			return array_map('unlink', glob(FCPATH."upload/client/$filename.*"));
		}
	}

}
