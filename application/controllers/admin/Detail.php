<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
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
        $this->load->view("admin/detail_karyawan", $data);
	}
	
	function donlodcv($id)
	{
		$data = $this->db->get_where('karyawan',['karyawan_id'=>$id])->row();
		force_download('upload/karyawan/'.$data->cv,NULL);
	}
	function donlodkontrak($id)
	{
		$data = $this->db->get_where('karyawan',['karyawan_id'=>$id])->row();
		force_download('upload/karyawan/'.$data->kontrak_kerja,NULL);
	}
	function donlodgambar($id)
	{
		$data = $this->db->get_where('karyawan',['karyawan_id'=>$id])->row();
		force_download('upload/karyawan/'.$data->image,NULL);
	}
	function donlodktp($id)
	{
		$data = $this->db->get_where('karyawan',['karyawan_id'=>$id])->row();
		force_download('upload/karyawan/'.$data->fktp,NULL);
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
		
		return $this->db->query('SELECT DISTINCT karyawan.karyawan_id, karyawan.nama_lengkap as namakr, 
		karyawan.tanggal_masuk, karyawan.pendidikan,karyawan.universitas, karyawan.ttl,
		karyawan.tgl_lahir, karyawan.id_card,karyawan.nama_ayah,karyawan.nama_ibu, 
		karyawan.nama_ss,karyawan.no_pasport, karyawan.no_bpjs,karyawan.no_npwp, 
		karyawan.alamat, karyawan.city, karyawan.state, karyawan.zip, karyawan.alamat_now, 
		karyawan.city_now, karyawan.state_now, karyawan.zip_now, karyawan.email_kantor, 
		karyawan.email_pribadi,karyawan.jenis_kelamin,karyawan.jabatan_id as kj,karyawan.cv, 
		karyawan.kontrak_kerja,karyawan.image, jabatan.jabatan_id, jabatan.jabatan_name as jn,
		jabatan.gajipokok as gp FROM karyawan join jabatan on karyawan.jabatan_id = jabatan.jabatan_id 
		where karyawan.karyawan_id = "'.$id.'"')->result();
	}
}
