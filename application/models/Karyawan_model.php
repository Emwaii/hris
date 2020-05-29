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
        karyawan.nama_lengkap, 
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
        karyawan.kontrak_kerja,
        karyawan.image,  
        jabatan.jabatan_id,
        jabatan.jabatan_name as jn 
        FROM karyawan,jabatan where karyawan.jabatan_id = jabatan.jabatan_id")->result();
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
        $this->image = $this->_uploadImage();
        $this->cv = $this->_cv();
        $this->kontrak_kerja = $this->_kontrak();
                 
        $this->db->insert($this->_table, $this);
        //$this->db->_error_message();
        //$this->db->error();
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

        if (!empty($files["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
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
		$config['upload_path']          = './upload/karyawan/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        $config['file_name']            = $this->karyawan_id;
        $config['encrypt_name']         = true;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		//print_r($this->upload->display_errors());
		return "default.jpg";
	}

    
    private function _cv()
	{           
		$config['upload_path']          = './upload/karyawan/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
		$config['file_name']            = $this->karyawan_id;
        $config['encrypt_name']         = true;
        $config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
       
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
		$config['file_name']            = $this->karyawan_id;
        $config['encrypt_name']         = true;
        $config['overwrite']			= true;
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
			$filename = explode(".", $karyawan->foto)[0];
			return array_map('unlink', glob(FCPATH."upload/karyawan/$filename.*"));
		}
    }
    private function _deleteDoc($id)
	{
		$karyawan = $this->getById($id);                                        // belum
		if ($karyawan->image != "default.docx") {
			$filename = explode(".", $karyawan->dokumen)[0];
			return array_map('unlink', glob(FCPATH."upload/file/$filename.*"));
		}

    }           

}
