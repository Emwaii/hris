<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    private $_table = "karyawan";

    public $karyawan_id;
    public $nama_lengkap;
    public $jenis_kelamin;
    public $alamat;
    public $jabatan;
    public $jenis_karyawan;
    public $tanggal_masuk;
    public $dokumen;
    public $foto;

    
    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required'],
            
            ['field' => 'mulai',
            'label' => 'Date Started',
            'rules' => 'required'],

            ['field' => 'selesai',
            'label' => 'Date Ended',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["karyawan_id" => $id])->row();
    }

    public function save()
    {
        $name = '';
        if(isset($_POST['fname'])){
            $name .= $_POST['fname'];
        }
        if(isset($_POST['lname'])){
            //add a space before
            $name .= ' ' .$_POST['lname'];
        }
       
        $post = $this->input->post();
        $this->karyawan_id = uniqid();
        $this->nama_lengkap = $post["fname"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->alamat= $post["alamat"]; //["city"]["state"]["zip"]
        $this->jabatan = $post["jabatan"];
        $this->jenis_karyawan = $post["jenis_karyawan"];
        $this->tanggal_masuk = $post["tgl_masuk"];
        $this->dokumen = $this->_uploadDoc();
        $this->foto = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
        
    }

    public function update()
    {
        $post = $this->input->post();
        $this->karyawan_id = $post["id"];                             //update belum
        $this->nama_lengkap = $post["fname"]["lname"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->alamat= $post["alamat"]["city"]["state"]["zip"];
        $this->jabatan = $post["jabatan"];
        $this->jenis_karyawan = $post["jenis_karyawan"];
        $this->tanggal_masuk = $post["tgl_masuk"];
		
		if (!empty($_FILES["dokumen"]["name"])) {
            $this->dokumen = $this->_uploadDoc();
        } else {
            $this->dokumen = $post["old_doc"];
		}

        if (!empty($_FILES["foto"]["name"])) {
            $this->foto = $this->_uploadImage();
        } else {
            $this->foto = $post["old_image"];
		}
  
        $this->db->update($this->_table, $this, array('karyawan_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);                               // delete belum
        return $this->db->delete($this->_table, array("karyawan_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/images/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->product_id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
    }
    
    private function _uploadDoc()
	{
		$config['upload_path']          = './upload/dokumen/';
		$config['allowed_types']        = 'pdf|doc|docx';
		$config['file_name']            = $this->product_id;
		$config['overwrite']			= true;
		$config['max_size']             = 10240; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('dokumen')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$product = $this->getById($id);
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."upload/images/$filename.*"));
		}
    }
    private function _deleteDoc($id)
	{
		$product = $this->getById($id);
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."upload/images/$filename.*"));
		}
	}

}