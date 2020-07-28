<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cuti_model");
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
        
        $lcuti = $this->listcuti(); 
        //$absen = $this->absen_model->getAll(); ,'absen'=>$absen
        $data=['lcuti' => $lcuti];
        $this->load->view("admin/cuti/list", $data);
    }

    public function add()
    {
        $cuti = $this->cuti_model;
        $validation = $this->form_validation;
        $validation->set_rules($cuti->rules());

        if ($validation->run()) {
            $cuti->save();
            $this->session->set_flashdata('success', 'Data has been saved');
            redirect('admin/cuti');

        }

        $karyawan = $this->karyawan_model->getAll();
        $data = ['karyawan' => $karyawan];
        $this->load->view("admin/cuti/new_form",$data);
    }

    
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/cuti');
       
        $cuti = $this->cuti_model;
        $validation = $this->form_validation;
        $validation->set_rules($cuti->rules());

        if ($validation->run()) {
            $cuti->update();
            $this->session->set_flashdata('success', 'Data has been changed');
            redirect('admin/cuti');
        }

        $karyawan = $this->karyawan_model->getAll();
        $data =['karyawan' => $karyawan, 'cuti' => $cuti->getById($id)];
        if (!$data["cuti"]) show_404();
        
        $this->load->view("admin/cuti/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->cuti_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted');
            redirect(site_url('admin/cuti'));
        }
    }

    public function rekap(){
        $cuti=$this->cuti_model; 
        $karyawan = $this->karyawan_model->getAll();
       //$all["absen"] = $this->absen_model->getAll();
        $data =['karyawan'=>$karyawan,'cuti' => $cuti->hitung_cuti()];
        //$data = ["absen"=>$ht, "absen"=>$bas];
        //$data["absen"] = $this->absen_model->hitung_absen();
        $this->load->view("admin/cuti/rekap", $data);
    }
    
    // public function list(){
    //     $listb = $this->listabsen();
    //     $data = ['listb' => $listb];
    //     $this->load->view("admin/absen/list",$data);

    // }

    public function listcuti(){
        $date = $this->input->post('tgl',TRUE);
        $date = str_replace('/', '-', $date);
        $bulan = date('F', strtotime($date));
        $tahun = date('Y', strtotime($date));
        
        // die($bulan);
        //die($tahun);
        
        return $this->db->query("SELECT cuti.tanggal,cuti.jenis_cuti,cuti.id,cuti.karyawan_id,cuti.keterangan,karyawan.nama_lengkap as namakr
        from cuti join karyawan ON cuti.karyawan_id = karyawan.karyawan_id 
        where monthname(STR_TO_DATE(cuti.tanggal,'%d-%m-%Y'))='$bulan' 
        AND year(STR_TO_DATE(cuti.tanggal,'%d-%m-%Y'))='$tahun'")->result();

        
    }
    
}
