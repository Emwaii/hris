<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("payroll_model");
		$this->load->model("karyawan_model");
		$this->load->model("freelance_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
		// load view admin/overview.php
		$januari = $this->januari();
		$februari = $this->februari();
		$maret = $this->maret();
		$april = $this->april();
		$mei = $this->mei();
		$juni = $this->juni();
		$juli = $this->juli();
		$agustus = $this->agustus();
		$september = $this->september();
		$oktober = $this->oktober();
		$november = $this->november();
		$desember = $this->desember();

		$januari1 = $this->januari1();
		$februari1 = $this->februari1();
		$maret1 = $this->maret1();
		$april1 = $this->april1();
		$mei1 = $this->mei1();
		$juni1 = $this->juni1();
		$juli1 = $this->juli1();
		$agustus1 = $this->agustus1();
		$september1 = $this->september1();
		$oktober1 = $this->oktober1();
		$november1 = $this->november1();
		$desember1 = $this->desember1();

		$maxchart = $this->maxchart();
		$thnow = $this->tahunsekarang();
		$payrol = $this->payroll_model->getAll();
		$karyawan = $this->karyawan_model->getAll();
		$free = $this->freelance_model->getAll();
		$list= $this->listkarr();
		$lowongan= $this->lowongan();

		$data=['januari' => $januari, 'februari' => $februari, 'maret' => $maret,
		'april' => $april, 'mei' => $mei, 'juni' => $juni,
		'juli' => $juli, 'agustus' => $agustus, 'september' => $september,
		'oktober' => $oktober, 'november' => $november, 'desember' => $desember,'januari1' => $januari1, 
		'februari1' => $februari1, 'maret1' => $maret1,
		'april1' => $april1, 'mei1' => $mei1, 'juni1' => $juni1,
		'juli1' => $juli1, 'agustus1' => $agustus1, 'september1' => $september1,
		'oktober1' => $oktober1, 'november1' => $november1, 'desember1' => $desember1,
		'maxchart' => $maxchart, 'thnow' => $thnow,'karyawan'=>$karyawan,'lowongan'=>$lowongan,'payrol'=> $payrol,'free'=> $free,'list'=>$list];
        $this->load->view("admin/overview", $data);
	}

	public function januari() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=1")->result();
	}
	public function februari() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=2")->result();
	}
	public function maret() 
	{		
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=3")->result();
	}
	public function april() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=4")->result();
	}
	public function mei() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=5")->result();	
	}
	public function juni() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=6")->result();	
	}
	public function juli() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=7")->result();	
	}
	public function agustus() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=8")->result();	
	}
	public function september() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=9")->result();	
	}
	public function oktober() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=10")->result();	
	}
	public function november() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=11")->result();	
	}
	public function desember() 
	{
		return $this->db->query("SELECT COUNT(id_freelance) as jum from rfreelance WHERE year(`tanggal`)=year(now()) AND month(`tanggal`)=12")->result();	
	}

		 ########################################## inhouse #########################################

	public function januari1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=1")->result();
	}
	public function februari1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=2")->result();
	}
	public function maret1() 
	{		
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=3")->result();
	}
	public function april1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=4")->result();
	}
	public function mei1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=5")->result();
	}
	public function juni1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=6")->result();
	}
	public function juli1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=7")->result();
	}
	public function agustus1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=8")->result();
	}
	public function september1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=9")->result();
	}
	public function oktober1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=10")->result();
	}
	public function november1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=11")->result();
	}
	public function desember1() 
	{
		return $this->db->query("SELECT COUNT(id_inhouse) as ssum from rinhouse WHERE year(`tanggal_submit`)=year(now()) AND month(`tanggal_submit`)=12")->result();
	}

	public function maxchart()
	{
		return $this->db->query("SELECT COUNT(product_id) as jum from products WHERE year(str_to_date(`mulai`,'%d-%m-%Y'))=year(now())")->result();
	}
	public function tahunsekarang()
	{
		return $this->db->query("SELECT year(now()) as tahun")->result();
	}

	public function listkarr(){
        return $this->db->query("SELECT karyawan.nama_lengkap as namakr, karyawan.jenis_karyawan as jk,
        karyawan.tgl_habis,jabatan.jabatan_name as jn FROM karyawan join jabatan on 
        karyawan.jabatan_id = jabatan.jabatan_id where karyawan.jenis_karyawan = 'kontrak' 
        or karyawan.jenis_karyawan = 'probation'")->result();
	}
	
	public function lowongan(){
        return $this->db->query("SELECT `id_ilowongan`, `ilowongan_name`, `ilowongan_alias`, `is_active` FROM `ilowongan`")->result();
    }
}
