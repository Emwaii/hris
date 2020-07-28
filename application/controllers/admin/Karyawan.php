<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("karyawan_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        $this->load->model("jabatan_model");
        
        
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["karyawan"] = $this->karyawan_model->getAll();
        $this->load->view("admin/karyawan/list", $data);
    }

    public function add()
    {
        $karyawan = $this->karyawan_model;
       
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        if ($validation->run()) {
            $karyawan->save();
            $this->session->set_flashdata('success', 'Data has been saved');
            redirect('admin/karyawan');
            
        }
        
        $jabatan = $this->jabatan_model->getAll();                
        $data = ['jabatan' => $jabatan];
        
        // $data = ['dokumen' => $upload];
         $this->load->view("admin/karyawan/new_form", $data);
         
         //$this->load->view("admin/karyawan");
    }

    public function edit($id = null)
    {
       
        if (!isset($id)) redirect('admin/karyawan');

        $jabatan = $this->jabatan_model->getAll();
        $data = ['jabatan' => $jabatan];
                
        $karyawan = $this->karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        if ($validation->run()) {
            $karyawan->update();
            $this->session->set_flashdata('success', 'Data has been changed');
            redirect('admin/karyawan');
        }
       
        $data["karyawan"] = $karyawan->getById($id);
        if (!$data["karyawan"]) show_404();

       
        $this->load->view("admin/karyawan/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->karyawan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted');
            redirect(site_url('admin/karyawan'));
        }
    }
    public function exp_pay()
	{		
        $this->load->view("admin/export_excel/export_payroll");
	}
    
}
