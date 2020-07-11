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

	public function index()
	{	
		$lisn = $this->listrin();
		// $in = $this->inhouse_model->getAll();
		$il = $this->ilowongan_model->getAll();
        $data=['ilowongan'=>$il, 'lisn'=>$lisn];
        $this->load->view("admin/inhouse/list", $data);
	}
	
	
	public function listrin(){
		// $jb = $this->input->post('lname',TRUE);
        // $date = str_replace('/', '-', $date);
        // $bulan = date('F', strtotime($date));
        // $tahun = date('Y', strtotime($date));
		$id = $this->input->get('id');

        // die($bulan);
		return $this->db->query("SELECT rinhouse.id_inhouse, rinhouse.fullname as namai, rinhouse.ttl, rinhouse.umur, rinhouse.domisili, 
		rinhouse.nowa, rinhouse.image_inhouse, rinhouse.cv_inhouse, rinhouse.porto_inhouse, rinhouse.alasan, 
		rinhouse.gaji, ilowongan.ilowongan_name as inama FROM rinhouse JOIN ilowongan ON ilowongan.id_ilowongan = rinhouse.id_ilowongan 
		WHERE ilowongan.id_ilowongan = $id")->result();
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
}
