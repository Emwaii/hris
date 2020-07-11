<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Freelance_model extends CI_Model
{
    private $_table = "rfreelance";

    public $id_freelance;
    public $nama_freelance;
    public $email;
    public $no_wa;
    public $umur;
    public $cv_freelance;
    public $portofolio_freelance;
    public $alasan;
    public $others;
    public $id_job;
    public $id_lang;
    public $tanggal;

    public function rules(){
        return [
            ['field' => 'fullname',
            'label' => 'Full Name',
            'rules' => 'required']
        ];
    }
    public function getAll(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance, 
        rfreelance.email, rfreelance.no_wa, rfreelance.umur, rfreelance.cv_freelance, 
        rfreelance.portofolio_freelance, rfreelance.alasan, rfreelance.others,
        jobs.id_job, jobs.jobs_name,language_pair.id_lang,language_pair.language,
        rfreelance.tanggal FROM rfreelance JOIN jobs JOIN language_pair ON 
        rfreelance.id_job = jobs.id_job and rfreelance.id_lang = language_pair.id_lang")->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_freelance = null;
        $this->nama_freelance = $post["fullname"];
        $this->email = $post["email"];
        $this->no_wa= $post["nowa"];
        $this->umur = $post["age"];
        $this->cv_freelance = $this->_uploadcv();
        $this->portofolio_freelance= $this->uploadporto();
        $this->alasan = $post["alasan"];
        $this->others = $post["others"];
        
        
        if(($post["jname"] == "3") && ($post["lname"]=="Choose One...")){
            $this->id_job= $post["jname"];
            $this->id_lang = null;
        }
        elseif(($post["jname"] == "4") && ($post["lname"]=="Choose One...")){
            $this->id_job= $post["jname"];
            $this->id_lang = null;
        }
        else{
            $this->id_job= $post["jname"];
            $this->id_lang = $post["lname"]; 
        }

        // if($post["lname"]=="Choose One..."){
        //     $this->id_lang = NULL;
        // }else{
        //     $this->id_lang = $post["lname"];

        // }
        
        $this->db->insert($this->_table, $this);
    }
    
    public function translator(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,
        language_pair.language as namal,rfreelance.tanggal FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where rfreelance.id_job = 1")->result();
    }
    public function interpreter(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,
        language_pair.language as namal,rfreelance.tanggal FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where rfreelance.id_job = 2")->result();
    }
    public function dtp(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,
        language_pair.language as namal,rfreelance.tanggal FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where rfreelance.id_job = 3")->result();
    }
    public function graphic(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,
        language_pair.language as namal,rfreelance.tanggal FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where rfreelance.id_job = 4")->result();
    }
    public function subtitler(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,
        language_pair.language as namal,rfreelance.tanggal FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where rfreelance.id_job = 5")->result();
    }
    public function transcriber(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,
        language_pair.language as namal,rfreelance.tanggal FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where rfreelance.id_job = 6")->result();
    }
    
    private function _uploadcv()
	{
        
		$config['upload_path']          = './upload/rfreelance/';
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
		return "default.docx";
	}
    
    protected function uploadporto()
	{
		$cfg['upload_path']          = './upload/rfreelance/';
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
		return "default.docx";
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_freelance" => $id])->row();
    }

    public function delete($id)
    {	
        $this->_deletecv($id);
        $this->_deleteporto($id);
        return $this->db->delete($this->_table, array("id_freelance" => $id));
    }
    
    private function _deletecv($id)
	{
		$rfreelance = $this->getById($id);
		if ($rfreelance->cv_freelance != "default.docx") {
			$filename = explode(".", $rfreelance->cv_freelance)[0];
			return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
		}
    }
    private function _deleteporto($id)
	{
		$rfreelance = $this->getById($id);
		if ($rfreelance->portofolio_freelance != "default.docx") {
			$filename = explode(".", $rfreelance->portofolio_freelance)[0];
			return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
		}

    }

    public function get($id = null)
    {
        $this->db->from('rfreelance');
        if($id != null) {
            $this->db->where('id_freelance', $id);
        }
        $query = $this->db->get();
        return $query;
    }

}