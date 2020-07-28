<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("payroll_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        $this->load->model("karyawan_model");
        $this->load->model("absen_model");
        $this->load->model("gaji_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {   
        $show = $this->show();
        $payrol= $this->payroll_model;
        $karyawan = $this->karyawan_model->getAll();
        // $absen = $this->absen_model->hitung_absen();
        $gaji = $this->gaji_model->getAll();
        $data=['karyawan'=>$karyawan, 'gaji'=>$gaji,'show'=>$show, 'payrol'=>$payrol->getall()];
        $this->load->view("admin/payroll/list", $data);
    }

    public function add()
    {
        $payroll = $this->payroll_model;
        $validation = $this->form_validation;
        $validation->set_rules($payroll->rules());

        if ($validation->run()) {
            $payroll->save();
            $this->session->set_flashdata('success', 'Data has been saved');
            redirect('admin/payroll');

        }

        $this->load->view("admin/payroll/");
    }
    

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/payroll');
       
        $payroll = $this->payroll_model;
        $validation = $this->form_validation;
        $validation->set_rules($payroll->rules());

        if ($validation->run()) {
            $payroll->update();
            $this->session->set_flashdata('success', 'Data has been changed');
            redirect('admin/payroll');
        }

        $data["payroll"] = $payroll->getById($id);
        if (!$data["payroll"]) show_404();
        
        $this->load->view("admin/payroll/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->payroll_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted');
            redirect(site_url('admin/payroll'));
        }
    }

    public function show() 
	{
		$id = $this->input->get('id');
		
		return $this->db->query('SELECT distinct karyawan.karyawan_id,karyawan.nama_lengkap as nl,karyawan.city_now as cn,
		karyawan.id_card as idcard,jabatan.jabatan_name as jjn,jabatan.gajipokok as jgp,payroll.payroll_id as pid,
		payroll.jumlah as pj, payroll.tanggal as tglp,payroll.status as stat FROM karyawan JOIN jabatan JOIN payroll
		ON karyawan.jabatan_id=jabatan.jabatan_id AND karyawan.karyawan_id=payroll.karyawan_id 
		WHERE karyawan.karyawan_id=payroll.karyawan_id')->result();
	}
}
