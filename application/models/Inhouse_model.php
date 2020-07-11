<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inhouse_model extends CI_Model
{
    private $_table = "rinhouse";

    public $id_inhouse;
    public $fullname;
    public $ttl;
    public $umur;
    public $domisili;
    public $nowa;
    public $image_inhouse;
    public $cv_inhouse;
    public $porto_inhouse;
    public $alasan;
    public $gaji;
    public $id_ilowongan;

    public function rules(){
        return [
            ['field' => 'fullname',
            'label' => 'Full Name',
            'rules' => 'required']
        ];
    }
    public function getAll(){
        return $this->db->query("SELECT rinhouse.id_inhouse, rinhouse.fullname as namai,
        rinhouse.ttl, rinhouse.umur, rinhouse.domisili, rinhouse.nowa, 
        rinhouse.image_inhouse as image, rinhouse.cv_inhouse as cv, 
        rinhouse.porto_inhouse as porto, rinhouse.alasan, rinhouse.gaji, 
        rinhouse.id_ilowongan,ilowongan.id_ilowongan,ilowongan.ilowongan_name as inama 
        FROM rinhouse join ilowongan on rinhouse.id_ilowongan = ilowongan.id_ilowongan")->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_inhouse = null;
        $this->fullname = $post["fullname"];
        $this->ttl = $post["ttl"];
        $this->nowa= $post["nowa"];
        $this->umur = $post["age"];
        $this->domisili = $post["domisili"];
        $this->image_inhouse= $this->uploadimage();
        $this->cv_inhouse= $this->_uploadcv();
        $this->porto_inhouse= $this->uploadporto();
        $this->alasan = $post["alasan"];
        $this->gaji = $post["gaji"];
        $this->id_ilowongan= $post["jname"];
       
        // if($post["lname"]=="Choose One..."){
        //     $this->id_lang = NULL;
        // }else{
        //     $this->id_lang = $post["lname"];

        // }
        
        $this->db->insert($this->_table, $this);
    }
    
     
    private function _uploadcv()
	{
        
		$config['upload_path']          = './upload/rinhouse/';
		$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        $config['file_name']            = $this->input->post('fullname');
        $config['overwrite']			= true;
        $config['encrypt_name']         = true;
		$config['max_size']             = 5000; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('cv')) {
			return $this->upload->data("file_name");
        }
        
        
		//print_r($this->upload->display_errors());
		return "default.pdf";
	}
    
    protected function uploadporto()
	{
		$cfg['upload_path']          = './upload/rinhouse/';
		$cfg['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        $cfg['file_name']            = $this->input->post('fullname').substr(md5(time()), 0, 4);
        $cfg['overwrite']			 = true;
        $cfg['encrypt_name']         = true;
		$cfg['max_size']             = 5000; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $cfg);

		if ($this->upload->do_upload('portofolio')) {
			return $this->upload->data("file_name");
        }
        
		//print_r($this->upload->display_errors());
		return "default.pdf";
    }

    protected function uploadimage()
	{
		$cfg['upload_path']          = './upload/rinhouse/';
		$cfg['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        $cfg['file_name']            = $this->input->post('fullname').substr(md5(time()), 0, 4);
        $cfg['overwrite']			 = true;
        $cfg['encrypt_name']         = true;
		$cfg['max_size']             = 5000; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $cfg);

		if ($this->upload->do_upload('foto')) {
			return $this->upload->data("file_name");
        }
        
		//print_r($this->upload->display_errors());
		return "default.jpg";
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_inhouse" => $id])->row();
    }

    public function delete($id)
    {	
        $this->_deletecv($id);
        $this->_deleteporto($id);
        $this->deleteimage($id);
        return $this->db->delete($this->_table, array("id_inhouse" => $id));
    }
    
    private function _deletecv($id)
	{
		$rinhouse = $this->getById($id);
		if ($rinhouse->cv_inhouse != "default.pdf") {
			$filename = explode(".", $rinhouse->cv_inhouse)[0];
			return array_map('unlink', glob(FCPATH."upload/rinhouse/$filename.*"));
		}
    }
    private function _deleteimage($id)
	{
		$rinhouse = $this->getById($id);
		if ($rinhouse->image_inhouse != "default.pdf") {
			$filename = explode(".", $rinhouse->image_inhouse)[0];
			return array_map('unlink', glob(FCPATH."upload/rinhouse/$filename.*"));
		}
    }
    private function _deleteporto($id)
	{
		$rinhouse = $this->getById($id);
		if ($rinhouse->porto_inhouse != "default.pdf") {
			$filename = explode(".", $rinhouse->porto_inhouse)[0];
			return array_map('unlink', glob(FCPATH."upload/rinhouse/$filename.*"));
		}

    }

    public function get($id = null)
    {
        $this->db->from('rinhouse');
        if($id != null) {
            $this->db->where('id_inhouse', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function gett($id = null)
    {
        
        $this->db->from('rinhouse');
        $this->db->query('SELECT * FROM rinhouse ORDER BY id_inhouse DESC limit 1');
        $query = $this->db->get();
        return $query;
    }

    public function showlast(){
        return $this->db->query("SELECT * FROM `rinhouse` ORDER BY id_inhouse DESC limit 1")->result();
    }
}