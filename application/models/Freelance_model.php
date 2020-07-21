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
    public $deleted;

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
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 0 and rfreelance.id_job = 1")->result();
    }
    
    public function deltranslator(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 1 and rfreelance.id_job = 1")->result();
    }

    public function interpreter(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 0 and rfreelance.id_job = 2")->result();
    }
    
    public function delinterpreter(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 1 and rfreelance.id_job = 2")->result();
    }
    
    public function dtp(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 0 and rfreelance.id_job = 3")->result();
    }

    public function deldtp(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 1 and rfreelance.id_job = 3")->result();
    }

    public function graphic(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 0 and rfreelance.id_job = 4")->result();
    }

    public function delgraphic(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 1 and rfreelance.id_job = 4")->result();
    }

    public function subtitler(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 0 and rfreelance.id_job = 5")->result();
    }

    public function delsubtitler(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 1 and rfreelance.id_job = 5")->result();
    }

    public function transcriber(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 0 and rfreelance.id_job = 6")->result();
    }

    public function deltranscriber(){
        return $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal,rfreelance.deleted FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where COALESCE(rfreelance.deleted,0) = 1 and rfreelance.id_job = 6")->result();
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
		return "default.pdf";
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
		return "default.pdf";
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
		if ($rfreelance->cv_freelance != "default.pdf") {
			$filename = explode(".", $rfreelance->cv_freelance)[0];
			return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
		}
    }

    private function _deleteporto($id)
	{
		$rfreelance = $this->getById($id);
		if ($rfreelance->portofolio_freelance != "default.pdf") {
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

    public function update($id)
    {   
        // $this->db->from('rinhouse');
        // $this->db->query("UPDATE `rinhouse` SET `approve` = '1' WHERE `rinhouse`.`id_inhouse` = $id");
        // $query= $this->db->set();
        // return $query;
        $this->db->set('approve','1');
        $this->db->where('id_freelance', $id);
        $this->db->update('rfreelance');
        // $this->approve = "1";
        // $this->db->update($this->_table, $this, array('id_inhouse' => $id));
    }

    
    public function cancel($id)
    {   
        $this->db->set('approve','0');
        $this->db->where('id_freelance', $id);
        $this->db->update('rfreelance');
        
    }

    ######################## trash function ###################################

    public function trash($id)
    {   
        $this->db->set('deleted','1');
        $this->db->where('id_freelance', $id);
        $this->db->update('rfreelance');
    }

    public function restore($id)
    {   
        $this->db->set('deleted','0');
        $this->db->where('id_freelance', $id);
        $this->db->update('rfreelance');
    }

    // ################### delete permanent between translator ##############################
    // ---------------------------------------translator-------------------------------------
    public function deletev(){
        $this->delcts();
        $this->delvts();
        $this->permanentts();
    }

    public function getidts()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 and `id_job` = 1 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function delvts()	{

        $ffile=$this->getidts();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function delcts(){
        
        $ffile=$this->getidts();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function movets(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 1 WHERE 
        COALESCE(`deleted`,0) = 0 and `id_job` = 1 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function permanentts(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 
        and `id_job` = 1 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ------------------------------------deltranslator-------------------------------------

    public function ddeletev(){
        $this->ddelcts();
        $this->ddelvts();
        $this->delpermanentts();
    }

    public function dgetidts()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 and `id_job` = 1 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function ddelvts()	{

        $ffile=$this->dgetidts();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function ddelcts(){
        
        $ffile=$this->dgetidts();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function delmovets(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 0 WHERE 
        COALESCE(`deleted`,0) = 1 and `id_job` = 1 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function delpermanentts(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 
        and `id_job` = 1 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ################### delete permanent between dtp ##############################
    // ---------------------------------------dtp-------------------------------------
    public function deletedtp(){
        $this->delcdtp();
        $this->delvdtp();
        $this->permanentdtp();
    }

    public function getiddtp()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 and `id_job` = 3 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function delvdtp()	{

        $ffile=$this->getiddtp();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function delcdtp(){
        
        $ffile=$this->getiddtp();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function movedtp(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 1 WHERE 
        COALESCE(`deleted`,0) = 0 and `id_job` = 3 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function permanentdtp(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 
        and `id_job` = 3 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ------------------------------------deldtp-------------------------------------

    public function ddeletedtp(){
        $this->ddelcts();
        $this->ddelvts();
        $this->delpermanentdtp();
    }

    public function dgetiddtp()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 and `id_job` = 3 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function ddelvdtp()	{

        $ffile=$this->dgetiddtp();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function ddelcdtp(){
        
        $ffile=$this->dgetiddtp();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function delmovedtp(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 0 WHERE 
        COALESCE(`deleted`,0) = 1 and `id_job` = 3 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function delpermanentdtp(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 
        and `id_job` = 3 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

     // ################### delete permanent between gp ##############################
    // ---------------------------------------gp-------------------------------------
    public function deletegp(){
        $this->delcgp();
        $this->delvgp();
        $this->permanentgp();
    }

    public function getidgp()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 and `id_job` = 4 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function delvgp()	{

        $ffile=$this->getidgp();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function delcgp(){
        
        $ffile=$this->getidgp();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function movegp(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 1 WHERE 
        COALESCE(`deleted`,0) = 0 and `id_job` = 4 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function permanentgp(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 
        and `id_job` = 4 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ------------------------------------delgp-------------------------------------

    public function ddeletegp(){
        $this->ddelcgp();
        $this->ddelvgp();
        $this->delpermanentgp();
    }

    public function dgetidgp()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 and `id_job` = 4 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function ddelvgp()	{

        $ffile=$this->dgetidgp();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function ddelcgp(){
        
        $ffile=$this->dgetidgp();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function delmovegp(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 0 WHERE 
        COALESCE(`deleted`,0) = 1 and `id_job` = 4 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function delpermanentgp(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 
        and `id_job` = 4 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ################### delete permanent between in ##############################
    // ---------------------------------------in-------------------------------------
    public function deletein(){
        $this->delcin();
        $this->delvin();
        $this->permanentin();
    }

    public function getidin()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 and `id_job` = 2 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function delvin()	{

        $ffile=$this->getidin();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function delcin(){
        
        $ffile=$this->getidin();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function movein(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 1 WHERE 
        COALESCE(`deleted`,0) = 0 and `id_job` = 2 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function permanentin(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 
        and `id_job` = 2 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ------------------------------------delin-------------------------------------

    public function ddeletein(){
        $this->ddelcin();
        $this->ddelvin();
        $this->delpermanentin();
    }

    public function dgetidin()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 and `id_job` = 2 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function ddelvin()	{

        $ffile=$this->dgetidin();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function ddelcin(){
        
        $ffile=$this->dgetidin();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function delmovein(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 0 WHERE 
        COALESCE(`deleted`,0) = 1 and `id_job` = 2 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function delpermanentin(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 
        and `id_job` = 2 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ################### delete permanent between sub ##############################
    // ---------------------------------------sub-------------------------------------
    public function deletesub(){
        $this->delcsub();
        $this->delvsub();
        $this->permanentsub();
    }

    public function getidsub()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 and `id_job` = 5 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function delvsub()	{

        $ffile=$this->getidsub();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function delcsub(){
        
        $ffile=$this->getidsub();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function movesub(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 1 WHERE 
        COALESCE(`deleted`,0) = 0 and `id_job` = 5 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function permanentsub(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 
        and `id_job` = 5 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ------------------------------------delsub-------------------------------------

    public function ddeletesub(){
        $this->ddelcsub();
        $this->ddelvsub();
        $this->delpermanentsub();
    }

    public function dgetidsub()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 and `id_job` = 5 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function ddelvsub()	{

        $ffile=$this->dgetidsub();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function ddelcsub(){
        
        $ffile=$this->dgetidsub();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function delmovesub(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 0 WHERE 
        COALESCE(`deleted`,0) = 1 and `id_job` = 5 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function delpermanentsub(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 
        and `id_job` = 5 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ################### delete permanent between tr ##############################
    // ---------------------------------------tr-------------------------------------
    public function deletetr(){
        $this->delctr();
        $this->delvtr();
        $this->permanenttr();
    }

    public function getidtr()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 and `id_job` = 6 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function delvtr()	{

        $ffile=$this->getidtr();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function delctr(){
        
        $ffile=$this->getidtr();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function movetr(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 1 WHERE 
        COALESCE(`deleted`,0) = 0 and `id_job` = 6 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function permanenttr(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 0 
        and `id_job` = 6 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ------------------------------------deltr-------------------------------------

    public function ddeletetr(){
        $this->ddelctr();
        $this->ddelvtr();
        $this->delpermanenttr();
    }

    public function dgetidtr()
    {
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_freelance`, `cv_freelance`, `portofolio_freelance`
        FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 and `id_job` = 6 and date(`tanggal`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function ddelvtr()	{

        $ffile=$this->dgetidtr();
        
        foreach($ffile as $rf){
            if ($rf->cv_freelance != "default.pdf") {
                $filename = explode(".", $rf->cv_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function ddelctr(){
        
        $ffile=$this->dgetidtr();
        
        foreach($ffile as $rf){
            if ($rf->portofolio_freelance != "default.pdf") {
                $filename = explode(".", $rf->portofolio_freelance)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rfreelance/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function delmovetr(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("UPDATE `rfreelance` SET `deleted`= 0 WHERE 
        COALESCE(`deleted`,0) = 1 and `id_job` = 6 and date(`tanggal`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function delpermanenttr(){
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rfreelance` WHERE COALESCE(`deleted`,0) = 1 
        and `id_job` = 6 and date(`tanggal`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }
}