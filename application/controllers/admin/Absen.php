<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("absen_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        $this->load->model("karyawan_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        //$karyawan = $this->karyawan_model->getAll();
        //$orderab = $this->input->post('tgl',TRUE);
        //die($orderab);
        $orde = $this->listabsen(); 
        //$absen = $this->absen_model->getAll(); ,'absen'=>$absen
        $data=['orde' => $orde];
        $this->load->view("admin/absen/list", $data);
    }

    public function indexxx(){
       
        $lcuti = $this->listcuti(); 
        //$absen = $this->absen_model->getAll(); ,'absen'=>$absen
        $data=['lcuti' => $lcuti];
        $this->load->view("admin/cuti/list", $data);

    }

    public function add()
    {
        $absen = $this->absen_model;
        $validation = $this->form_validation;
        $validation->set_rules($absen->rules());

        if ($validation->run()) {
            $absen->save();
            $this->session->set_flashdata('success','Data successfully saved');
            //redirect('admin/absen');

        }

        $karyawan = $this->karyawan_model->getAll();
        $data = ['karyawan' => $karyawan];
        $this->load->view("admin/absen/new_form",$data);
    }

    
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/absen');
       
        $absen = $this->absen_model;
        $validation = $this->form_validation;
        $validation->set_rules($absen->rules());

        if ($validation->run()) {
            $absen->update();
            $this->session->set_flashdata('success', 'Data successfully changed');
            redirect('admin/absen');
        }

        $karyawan = $this->karyawan_model->getAll();
        $data =['karyawan' => $karyawan, 'absen' => $absen->getById($id)];
        if (!$data["absen"]) show_404();
        
        $this->load->view("admin/absen/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->absen_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data successfully deleted');
            redirect(site_url('admin/absen'));
        }
    }

    public function rekap(){
        $absen=$this->absen_model; 
        $karyawan = $this->karyawan_model->getAll();
       //$all["absen"] = $this->absen_model->getAll();
        $data =['karyawan'=>$karyawan,'absen' => $absen->hitung_absenn()];
        //$data = ["absen"=>$ht, "absen"=>$bas];
        //$data["absen"] = $this->absen_model->hitung_absen();
        $this->load->view("admin/absen/rekap", $data);
    }
    
    // public function list(){
    //     $listb = $this->listabsen();
    //     $data = ['listb' => $listb];
    //     $this->load->view("admin/absen/list",$data);

    // }
    public function listabsen(){
        $date = $this->input->post('tgl',TRUE);
        $date = str_replace('/', '-', $date);
        $bulan = date('F', strtotime($date));
        $tahun = date('Y', strtotime($date));
        
        // die($bulan);
        //die($tahun);
        
        return $this->db->query("SELECT absen.tanggal,absen.absensi,absen.absensi_id,absen.karyawan_id,karyawan.nama_lengkap as namakr
        from absen join karyawan ON absen.karyawan_id = karyawan.karyawan_id 
        where monthname(STR_TO_DATE(absen.tanggal,'%d-%m-%Y'))='$bulan' 
        AND year(STR_TO_DATE(absen.tanggal,'%d-%m-%Y'))='$tahun' Order by absen.tanggal")->result();

        // $absen = $this->absen_model->getAll();
        // $data =['absen' => $absen];
        // $this->load->view("admin/absen/list",$data);
    }

    public function listcuti(){
        $date = $this->input->post('tgl',TRUE);
        $date = str_replace('/', '-', $date);
        $bulan = date('F', strtotime($date));
        $tahun = date('Y', strtotime($date));
        
        // die($bulan);
        //die($tahun);
        
        return $this->db->query("SELECT cuti.tanggal,cuti.jenis_cuti,cuti.id,cuti.karyawan_id,karyawan.nama_lengkap as namakr
        from cuti join karyawan ON cuti.karyawan_id = karyawan.karyawan_id 
        where monthname(STR_TO_DATE(cuti.tanggal,'%d-%m-%Y'))='$bulan' 
        AND year(STR_TO_DATE(cuti.tanggal,'%d-%m-%Y'))='$tahun'")->result();

        
    }
    
}
