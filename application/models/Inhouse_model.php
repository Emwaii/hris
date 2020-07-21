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
        rinhouse.id_ilowongan,rinhouse.approve,ilowongan.id_ilowongan,ilowongan.ilowongan_name as inama, rinhouse.tanggal_submit     
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
        // $cfg['file_name']            = $this->input->post('fullname').substr(md5(time()), 0, 4);
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
        $this->_deleteimage($id);
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

    public function update($id)
    {   
        // $this->db->from('rinhouse');
        // $this->db->query("UPDATE `rinhouse` SET `approve` = '1' WHERE `rinhouse`.`id_inhouse` = $id");
        // $query= $this->db->set();
        // return $query;
        $this->db->set('approve','1');
        $this->db->where('id_inhouse', $id);
        $this->db->update('rinhouse');
        // $this->approve = "1";
        // $this->db->update($this->_table, $this, array('id_inhouse' => $id));
    }

    public function cancel($id)
    {   
        $this->db->set('approve','0');
        $this->db->where('id_inhouse', $id);
        $this->db->update('rinhouse');
        
    }

    public function trash($id)
    {   
        $this->db->set('deleted','1');
        $this->db->where('id_inhouse', $id);
        $this->db->update('rinhouse');
    }

    public function restore($id)
    {   
        $this->db->set('deleted','0');
        $this->db->where('id_inhouse', $id);
        $this->db->update('rinhouse');
    }

    public function move(){
        $id = $this->input->get('id');
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        //  die($id);
        // die($sampai);
        return $this->db->query("UPDATE `rinhouse` SET `deleted`= 1 WHERE 
        COALESCE(`deleted`,0) = 0 and `id_ilowongan` = $id and date(`tanggal_submit`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    public function drestore(){
        $id = $this->input->get('id');
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        //  die($id);
        // die($sampai);
        return $this->db->query("UPDATE `rinhouse` SET `deleted`= 0 WHERE 
        COALESCE(`deleted`,0) = 1 and `id_ilowongan` = $id and date(`tanggal_submit`) BETWEEN 
        STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')");
    }

    // ########################## permanent ########################
    public function permanent(){
        $this->delc();
        $this->delv();
        $this->deli();
        $this->dpermanent();
    }

    public function getid()
    {
        $id = $this->input->get('id');
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_inhouse`, `cv_inhouse`, `porto_inhouse`, `image_inhouse`
        FROM `rinhouse` WHERE COALESCE(`deleted`,0) = 0 and `id_ilowongan` = $id and date(`tanggal_submit`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function delv()	{

        $ffile=$this->getid();
        
        foreach($ffile as $rf){
            if ($rf->cv_inhouse != "default.pdf") {
                $filename = explode(".", $rf->cv_inhouse)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rinhouse/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function delc(){
        
        $ffile=$this->getid();
        
        foreach($ffile as $rf){
            if ($rf->porto_inhouse != "default.pdf") {
                $filename = explode(".", $rf->porto_inhouse)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rinhouse/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function deli(){
        
        $ffile=$this->getid();
        
        foreach($ffile as $rf){
            if ($rf->image_inhouse != "default.jpg") {
                $filename = explode(".", $rf->image_inhouse)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rinhouse/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function dpermanent(){
        $id = $this->input->get('id');
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rinhouse` WHERE COALESCE(`deleted`,0) = 0 
        and `id_ilowongan` = $id and date(`tanggal_submit`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

     // ########################## dpermanent ########################
     public function depermanent(){
        $this->dedelc();
        $this->dedelv();
        $this->dedeli();
        $this->dedpermanent();
    }

    public function degetid()
    {
        $id = $this->input->get('id');
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("SELECT `id_inhouse`, `cv_inhouse`, `porto_inhouse`, `image_inhouse`
        FROM `rinhouse` WHERE COALESCE(`deleted`,0) = 1 and `id_ilowongan` = $id and date(`tanggal_submit`) 
        BETWEEN STR_TO_DATE('$dari','%d %M %Y') and STR_TO_DATE('$sampai','%d %M %Y')")->result();

    }
    
    private function dedelv()	{

        $ffile=$this->degetid();
        
        foreach($ffile as $rf){
            if ($rf->cv_inhouse != "default.pdf") {
                $filename = explode(".", $rf->cv_inhouse)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rinhouse/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function dedelc(){
        
        $ffile=$this->degetid();
        
        foreach($ffile as $rf){
            if ($rf->porto_inhouse != "default.pdf") {
                $filename = explode(".", $rf->porto_inhouse)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rinhouse/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    private function dedeli(){
        
        $ffile=$this->degetid();
        
        foreach($ffile as $rf){
            if ($rf->image_inhouse != "default.jpg") {
                $filename = explode(".", $rf->image_inhouse)[0];
                // return array_map('unlink', glob(FCPATH."upload/rfreelance/$filename.*"));
                $files = glob(FCPATH."upload/rinhouse/$filename.*"); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file
                }
            }
        }
    }

    public function dedpermanent(){
        $id = $this->input->get('id');
        $dari = $this->input->post('dari',TRUE);
        $sampai = $this->input->post('sampai',TRUE);
        // die($dari);
        // die($sampai);
        return $this->db->query("DELETE FROM `rinhouse` WHERE COALESCE(`deleted`,0) = 1 
        and `id_ilowongan` = $id and date(`tanggal_submit`) BETWEEN STR_TO_DATE('$dari','%d %M %Y') 
        and STR_TO_DATE('$sampai','%d %M %Y')");
    }

}