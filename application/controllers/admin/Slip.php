<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Slip extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("karyawan_model");
		$this->load->model("payroll_model");
		$this->load->model("gaji_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}

	public function index()
	{	
		$show = $this->show();
		$karyawan = $this->karyawan_model->getAll();
		$gaji = $this->gaji_model->getAll();
		$payrol = $this->payroll_model->getAll();
        $data=['gaji'=>$gaji, 'payrol'=>$payrol,'karyawan'=>$karyawan,'invo'=>$show];
        $this->load->view("admin/slip", $data);
	}

	// public function gajicuy() 
	// {
	// 	$id = $this->input->get('id');
		
	// 	return $this->db->query("SELECT 
    //     karyawan.karyawan_id, 
    //     karyawan.nama_lengkap as namakr, 
    //     jabatan.jabatan_id,
    //     jabatan.jabatan_name as jn,
    //     jabatan.gajipokok as gp,
	// 	gaji.g  
    //     FROM karyawan,jabatan where karyawan.jabatan_id = jabatan.jabatan_id")->result();
	// }

	public function show() 
	{
		$id = $this->input->get('id');
		
		return $this->db->query('SELECT DISTINCT karyawan.nama_lengkap as nl,karyawan.city_now as cn,
		karyawan.id_card as idcard,jabatan.jabatan_name as jjn,jabatan.gajipokok as jgp,payroll.payroll_id as pid,
		payroll.jumlah as pj, payroll.tanggal as tglp FROM karyawan JOIN jabatan JOIN payroll
		ON karyawan.jabatan_id=jabatan.jabatan_id AND karyawan.karyawan_id=payroll.karyawan_id 
		WHERE karyawan.karyawan_id="'.$id.'"')->result();
	}
}
