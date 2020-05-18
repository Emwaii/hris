<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    
    private $_table = "karyawan";

    public $karyawan_id;
    public $no_karyawan;
    public $nama_lengkap;
    public $jenis_kelamin;
    public $email;
    public $alamat;
    public $city;
    public $state;
    public $zip;
    public $jabatan_id;
    public $jenis_karyawan;
    public $tanggal_masuk;
    public $foto = "default.jpg";
    public $dokumen1;
    public $dokumen2;
    public $dokumen3;
    public $dokumen4;
    public $dokumen5;
    
    public function rules()
    {
        return [
            ['field' => 'nama_lengkap',
            'label' => 'Full Name',
            'rules' => 'required'],

            ['field' => 'jenis_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'],
            
            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'tanggal_masuk',
            'label' => 'Date Started',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'foto',
            'label' => 'Foto',
            'rules' => 'required'],

            ['field' => 'no_karyawan',
            'label' => 'No Karyawan',
            'rules' => 'required']
          
        ];
    }

    public function getAll()
    {
        // return $this->db->get($this->_table)->result();
        return $this->db->query("SELECT karyawan.karyawan_id, karyawan.no_karyawan, karyawan.nama_lengkap, 
        karyawan.jenis_kelamin, karyawan.email, karyawan.alamat, karyawan.city, karyawan.state, karyawan.zip, 
        karyawan.jabatan_id as kj, karyawan.jenis_karyawan, karyawan.tanggal_masuk, karyawan.foto, karyawan.dokumen1,
        karyawan.dokumen2,karyawan.dokumen3,karyawan.dokumen4, karyawan.dokumen5,jabatan.jabatan_id,
        jabatan.jabatan_name as jn FROM karyawan,jabatan where karyawan.jabatan_id = jabatan.jabatan_id")->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["karyawan_id" => $id])->row();
    }

    public function save()
    {   
           
        $post = $this->input->post();
        $this->karyawan_id = uniqid();
        $this->nama_lengkap = $post["nama_lengkap"];
        $this->no_karyawan = $post["no_karyawan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->email = $post["email"];
        $this->alamat = $post["alamat"];
        $this->city = $post["city"];
        $this->state = $post["state"];
        $this->zip = $post["zip"];
        $this->jabatan_id = $post["jbtn"];
        $this->jenis_karyawan = $post["jenis_karyawan"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->foto = $this->_uploadImage();
        $this->dokumen1 = $this->doc1();
        $this->db->insert($this->_table, $this);
        
    }

    public function update()
    {
        $post = $this->input->post();
        $this->karyawan_id = $post["id"];                             //update belum
        $this->nama_lengkap = $post["nama_lengkap"];
        $this->no_karyawan = $post["no_karyawan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->email = $post["email"];
        $this->alamat= $post["alamat"];
        $this->city = $post["city"];
        $this->state = $post["state"];
        $this->zip = $post["zip"];
        $this->jabatan_id = $post["jbtn"];
        $this->jenis_karyawan = $post["jenis_karyawan"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
		
		// if (!empty($files["dokumen"]["name"])) {
        //     $this->dokumen = $this->_uploadDoc();
        // } else {
        //     $this->dokumen = $post["old_doc"];
		// }

        if (!empty($files["foto"]["name"])) {
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
        
        $config['upload_path']          = './upload/file/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
		$config['file_name']            = $this->karyawan_id;
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
    
    private function doc1()
	{   
        
		$config['upload_path']          = './upload/file/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
		$config['file_name']            = $this->karyawan_id;
		$config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

        
        $this->load->library('upload', $config);
        

		if ($this->upload->do_upload('dokumen1')) {
			return $this->upload->data("file_name");
        }        		
		return "default.docx";
    }
    private function doc2()
	{   
        
		$config['upload_path']          = './upload/file/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
		$config['file_name']            = $this->karyawan_id;
		$config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('dokumen2')) {
			return $this->upload->data("file_name");
        }        		
		return "default.docx";
	}

	private function _deleteImage($id)
	{
		$karyawan = $this->getById($id);
		if ($karyawan->image != "default.jpg") {
			$filename = explode(".", $karyawan->foto)[0];
			return array_map('unlink', glob(FCPATH."upload/images/$filename.*"));
		}
    }
    private function _deleteDoc($id)
	{
		$karyawan = $this->getById($id);
		if ($karyawan->image != "default.docx") {
			$filename = explode(".", $karyawan->dokumen)[0];
			return array_map('unlink', glob(FCPATH."upload/dokumen/$filename.*"));
		}

    }

           

}
