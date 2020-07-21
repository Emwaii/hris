<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inhouse extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("inhouse_model");
		$this->load->model("ilowongan_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}

    public function index(){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
 
    }

	public function list()
	{	
		$lisn = $this->listrin();
		// $in = $this->inhouse_model->getAll();
		$il = $this->ilowongan_model->getAll();
        $data=['ilowongan'=>$il, 'lisn'=>$lisn];
        $this->load->view("admin/inhouse/list", $data);
    }
    
    public function delinhouse()
	{	
		$lisn = $this->dlistrin();
		// $in = $this->inhouse_model->getAll();
		$il = $this->ilowongan_model->getAll();
        $data=['ilowongan'=>$il, 'lisn'=>$lisn];
        $this->load->view("admin/inhouse/dellist", $data);
	}
	
	
	public function listrin(){
		// $jb = $this->input->post('lname',TRUE);
        // $date = str_replace('/', '-', $date);
        // $bulan = date('F', strtotime($date));
        // $tahun = date('Y', strtotime($date));
		$id = $this->input->get('id');

        // die($bulan);
		return $this->db->query("SELECT rinhouse.id_inhouse, rinhouse.fullname as namai, 
        rinhouse.ttl, rinhouse.umur, rinhouse.domisili, rinhouse.nowa, rinhouse.image_inhouse, 
        rinhouse.cv_inhouse, rinhouse.porto_inhouse, rinhouse.alasan, rinhouse.approve, rinhouse.gaji, 
        ilowongan.ilowongan_name as inama, rinhouse.tanggal_submit, rinhouse.deleted FROM rinhouse JOIN ilowongan 
        ON ilowongan.id_ilowongan = rinhouse.id_ilowongan WHERE COALESCE(rinhouse.deleted,0) = 0 and 
        ilowongan.id_ilowongan = $id")->result();
    }
    
    public function dlistrin(){
		// $jb = $this->input->post('lname',TRUE);
        // $date = str_replace('/', '-', $date);
        // $bulan = date('F', strtotime($date));
        // $tahun = date('Y', strtotime($date));
		$id = $this->input->get('id');

        // die($bulan);
		return $this->db->query("SELECT rinhouse.id_inhouse, rinhouse.fullname as namai, 
        rinhouse.ttl, rinhouse.umur, rinhouse.domisili, rinhouse.nowa, rinhouse.image_inhouse, 
        rinhouse.cv_inhouse, rinhouse.porto_inhouse, rinhouse.alasan, rinhouse.approve, rinhouse.gaji, 
        ilowongan.ilowongan_name as inama, rinhouse.tanggal_submit, rinhouse.deleted FROM rinhouse JOIN ilowongan 
        ON ilowongan.id_ilowongan = rinhouse.id_ilowongan WHERE COALESCE(rinhouse.deleted,0) = 1 and 
        ilowongan.id_ilowongan = $id")->result();
	}

	function viewfilecv($id){
        $lisn = $this->inhouse_model->getAll();
        $data = $this->db->get_where('rinhouse',['id_inhouse'=>$id])->row();
        $filename = 'upload/rinhouse/'.$data->cv_inhouse;
		
        header("Content-type: application/pdf"); 
        header("Content-Length: " . filesize($filename)); 
        readfile($filename); 
	}
	
	function viewimage($id){
        $lisn = $this->inhouse_model->getAll();
        $data = $this->db->get_where('rinhouse',['id_inhouse'=>$id])->row();
		$filename = 'upload/rinhouse/'.$data->image_inhouse;
		
		//$new = fopen($filename, "r");
		header("Content-Type: image/jpg");
		header("Content-Length: " . filesize($filename)); 
		// echo fread($new, filesize($filename));
		
		readfile($filename);
    }

    function viewfileporto($id){
		$lisn = $this->inhouse_model->getAll();
        $data = $this->db->get_where('rinhouse',['id_inhouse'=>$id])->row();
        $filename = 'upload/rinhouse/'.$data->porto_inhouse;

        header("Content-type: application/pdf"); 
        header("Content-Length: " . filesize($filename)); 
        readfile($filename); 
	}
	
	public function delete($id=null)
    {
            
        if ($this->inhouse_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted permanently..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
	}
	
	public function approve($id=null)
    {
            
            $this->inhouse_model->update($id); 
            $this->session->set_flashdata('success', 'Applicant has been marked..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        
	}
	
	public function cancel($id=null)
    {
            
            $this->inhouse_model->cancel($id); 
            $this->session->set_flashdata('success', 'Applicant has been canceled..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        
    }

    public function exp_inhouse()
	{		
        $lisn = $this->listrin();
		$il = $this->ilowongan_model->getAll();
        $data=['ilowongan'=>$il, 'lisn'=>$lisn];
        $this->load->view("admin/export_excel/export_inhouse",$data);
    }
    
    public function trash($id=null)
    {
        $this->inhouse_model->trash($id);
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
		// $this->listrin();
    }

    public function restore($id=null)
    {	
        $this->inhouse_model->restore($id);
        $this->session->set_flashdata('success', 'Data has been restored..');
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }

    public function movetrash($id=null)
    {
        $this->inhouse_model->move();
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function drestore($id=null)
    {
        $this->inhouse_model->drestore();
        $this->session->set_flashdata('success', 'Data has been restored..');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function permanent($id=null)
    {
        $this->inhouse_model->permanent();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    public function dpermanent($id=null)
    {
        $this->inhouse_model->depermanent();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
