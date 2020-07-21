<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{    
    private $_table = "karyawan";

    public $karyawan_id;
    public $nama_lengkap;
    public $tanggal_masuk;
    public $pendidikan;
    public $universitas;
    public $ttl;
    public $tgl_lahir;
    public $id_card;
    public $nama_ayah;
    public $nama_ibu;
    public $nama_ss;
    public $no_pasport;
    public $no_bpjs;
    public $no_npwp;
    public $alamat;
    public $city;
    public $state;
    public $zip;
    public $alamat_now;
    public $city_now;
    public $state_now;
    public $zip_now;
    public $email_kantor;
    public $email_pribadi;
    public $jenis_kelamin;
    public $jabatan_id;
    public $fktp;
    public $cv = "default.docx";
    public $kontrak_kerja = "default.docx";
    public $image = "default.jpg";
    
    
    public function rules(){
        return [
            ['field' => 'nama_lengkap',
            'label' => 'Full Name',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'alamat_now',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'tanggal_masuk',
            'label' => 'Date Started',
            'rules' => 'required'],

            ['field' => 'pendidikan',
            'label' => 'Pendidikan',
            'rules' => 'required'],

            ['field' => 'univ',
            'label' => 'Universitas',
            'rules' => 'required'],

            ['field' => 'tempat_lahir',
            'label' => 'Tempat Lahir',
            'rules' => 'required'],

            ['field' => 'tgl_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'required'],

            ['field' => 'no_ktp',
            'label' => 'KTP',
            'rules' => 'required'],

            ['field' => 'nama_ayah',
            'label' => 'Ayah',
            'rules' => 'required'],

            ['field' => 'email_pribadi',
            'label' => 'Email Pribadi',
            'rules' => 'required'],

            ['field' => 'email_kantor',
            'label' => 'Email Kantor',
            'rules' => 'required'],
 
            ['field' => 'nama_ibu',
            'label' => 'ibu',
            'rules' => 'required']
          
        ];
    }

    public function getAll(){
        // return $this->db->get($this->_table)->result();
        return $this->db->query("SELECT 
        karyawan.karyawan_id, 
        karyawan.nama_lengkap as namakr, 
        karyawan.tanggal_masuk, 
        karyawan.pendidikan,
        karyawan.universitas,
        karyawan.ttl,
        karyawan.tgl_lahir,
        karyawan.id_card,
        karyawan.nama_ayah,
        karyawan.nama_ibu,
        karyawan.nama_ss,
        karyawan.no_pasport,
        karyawan.no_bpjs,
        karyawan.no_npwp, 
        karyawan.alamat,
        karyawan.city, 
        karyawan.state, 
        karyawan.zip,
        karyawan.alamat_now,
        karyawan.city_now, 
        karyawan.state_now, 
        karyawan.zip_now, 
        karyawan.email_kantor, 
        karyawan.email_pribadi, 
        karyawan.jenis_kelamin,
        karyawan.jabatan_id as kj,         
        karyawan.cv,
        karyawan.jenis_karyawan,
        karyawan.tgl_habis,
        karyawan.kontrak_kerja,
        karyawan.image,  
        karyawan.fktp,
        jabatan.jabatan_id,
        jabatan.jabatan_name as jn,
        jabatan.gajipokok as gp  
        FROM karyawan left join jabatan on karyawan.jabatan_id = jabatan.jabatan_id")->result();
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
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->pendidikan = $post["pendidikan"];
        $this->universitas = $post["univ"];
        $this->ttl = $post["tempat_lahir"];
        $this->tgl_lahir=$post["tgl_lahir"];
        $this->id_card = $post["no_ktp"];
        $this->nama_ayah = $post["nama_ayah"];
        $this->nama_ibu = $post["nama_ibu"];
        $this->nama_ss = $post["nama_ss"];
        $this->no_pasport = $post["no_paspor"];
        $this->no_bpjs = $post["no_bpjs"];
        $this->no_npwp = $post["no_npwp"];
        $this->alamat = $post["alamat"];
        $this->city = $post["city"];
        $this->state = $post["state"];
        $this->zip = $post["zip"];
        $this->alamat_now = $post["alamat_now"];
        $this->city_now = $post["city_now"];
        $this->state_now = $post["state_now"];
        $this->zip_now = $post["zip_now"];
        $this->email_kantor = $post["email_kantor"];
        $this->email_pribadi = $post["email_pribadi"];
        $this->jabatan_id = $post["jbtn"];
        $this->jenis_kelamin = $post["jenis_kelamin"];


        if($post["jenis_karyawan"] == "tetap"){
            $this->jenis_karyawan = $post["jenis_karyawan"];
            $this->tgl_habis = null;
        }else{
            $this->jenis_karyawan = $post["jenis_karyawan"];
            $this->tgl_habis = $post["tanggal_habis"];
        }

        $this->image = $this->_uploadImage();
        $this->cv = $this->_cv();
        $this->kontrak_kerja = $this->_kontrak();
        $this->fktp = $this->_uploadfktp();
                 
        $this->db->insert($this->_table, $this);
        //$this->db->_error_message();
        //$this->db->error();
    }

    public function update()
    {
       $post  = $this->input->post();
        $this->karyawan_id = $post["id"];
        $this->nama_lengkap = $post["nama_lengkap"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->pendidikan = $post["pendidikan"];
        $this->universitas = $post["univ"];
        $this->ttl = $post["tempat_lahir"];
        $this->tgl_lahir=$post["tgl_lahir"];
        $this->id_card = $post["no_ktp"];
        $this->nama_ayah = $post["nama_ayah"];
        $this->nama_ibu = $post["nama_ibu"];
        $this->nama_ss = $post["nama_ss"];
        $this->no_pasport = $post["no_paspor"];
        $this->no_bpjs = $post["no_bpjs"];
        $this->no_npwp = $post["no_npwp"];
        $this->alamat = $post["alamat"];
        $this->city = $post["city"];
        $this->state = $post["state"];
        $this->zip = $post["zip"];
        $this->alamat_now = $post["alamat_now"];
        $this->city_now = $post["city_now"];
        $this->state_now = $post["state_now"];
        $this->zip_now = $post["zip_now"];
        $this->email_kantor = $post["email_kantor"];
        $this->email_pribadi = $post["email_pribadi"];
        $this->jabatan_id = $post["jbtn"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->jenis_karyawan = $post["jenis_karyawan"];
        $this->tgl_habis = $post["tanggal_habis"];
        
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }

        if (!empty($_FILES["fktp"]["name"])) {
            $this->fktp = $this->_uploadfktp();
        } else {
            $this->fktp = $post["old_fktp"];
        }
        
		if (!empty($_FILES["cv"]["name"])) {
            $this->cv = $this->_cv();
        } else {
            $this->cv = $post["old_cv"];
        }
        
        if (!empty($_FILES["kontrak_kerja"]["name"])) {
            $this->kontrak_kerja = $this->_kontrak();
        } else {
            $this->kontrak_kerja = $post["old_kontrak"];
        }
       
        $this->db->update($this->_table, $this, array('karyawan_id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        $this->_deletecv($id);
        $this->_deletekontrak($id);                               // delete belum
        return $this->db->delete($this->_table, array("karyawan_id" => $id));
	}
    
    
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/karyawan/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        // $config['file_name']            = $karyawan->nama_lengkap."";
        $config['encrypt_name']         = true;
        $config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
        }
        
		//print_r($this->upload->display_errors());
		return "default.jpg";
    }
    
    private function _uploadfktp()
	{
		$config['upload_path']          = './upload/karyawan/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        // $config['file_name']            = $karyawan->nama_lengkap."";
        $config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('fktp')) {
			return $this->upload->data("file_name");
        }
        
		//print_r($this->upload->display_errors());
		return "default.jpg";
	}
    
    private function _cv()
	{   
		$config['upload_path']          = './upload/karyawan/';
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

    private function _kontrak()
	{   
		$config['upload_path']          = './upload/karyawan/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
		//$config['file_name']            = $config;
        $config['overwrite']			  = true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
       
        $this->load->library('upload', $config);
        
		if ($this->upload->do_upload('kontrak_kerja')) {
			return $this->upload->data("file_name");
        }        		
		return "default.docx";
    }

    
	private function _deleteImage($id)
	{
		$karyawan = $this->getById($id);
		if ($karyawan->image != "default.jpg") {
			$filename = explode(".", $karyawan->image)[0];
			return array_map('unlink', glob(FCPATH."upload/karyawan/$filename.*"));
		}
    }

    private function _deletefktp($id)
	{
		$karyawan = $this->getById($id);
		if ($karyawan->fktp != "default.jpg") {
			$filename = explode(".", $karyawan->fktp)[0];
			return array_map('unlink', glob(FCPATH."upload/karyawan/$filename.*"));
		}
    }

    private function _deletecv($id)
	{
		$karyawan = $this->getById($id);                                        // belum
		if ($karyawan->cv != "default.docx") {
			$filename = explode(".", $karyawan->cv)[0];
			return array_map('unlink', glob(FCPATH."upload/karyawan/$filename.*"));
		}

    } 
    private function _deletekontrak($id)
	{
		$karyawan = $this->getById($id);                                        // belum
		if ($karyawan->kontrak_kerja != "default.docx") {
			$filename = explode(".", $karyawan->kontrak_kerja)[0];
			return array_map('unlink', glob(FCPATH."upload/karyawan/$filename.*"));
		}

    }           

    public function get($id = null)
    {
        $this->db->from('karyawan');
        if($id != null) {
            $this->db->where('karyawan_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
