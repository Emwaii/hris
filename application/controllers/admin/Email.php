<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');

        $this->load->model("email_model");

		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["email"] = $this->email_model->getAll();
        $this->load->view("admin/email_company", $data);
    }

    // public function add()
    // {
    //     $gaji = $this->gaji_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($gaji->rules());

    //     if ($validation->run()) {
    //         $gaji->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan..');
    //         redirect('admin/tunjangan');

    //     }

    //     //$this->load->view("admin/payroll/new_form");
    // }

    
    public function edit($id = null)
    {
        //if (!isset($id)) redirect('admin/gaji');
        $email = $this->email_model;
        $validation = $this->form_validation;
        $validation->set_rules($email->rules());

        if ($validation->run()) {
            $email->update();
            $this->session->set_flashdata('success', 'Berhasil diubah..');
        }

        $data["email"] = $email->getAll();
        // if (!$data["email"]) show_404();
        
        $this->load->view("admin/email_company", $data);
    }

    // public function delete($id=null)
    // {
    //     if (!isset($id)) show_404();
        
    //     if ($this->gaji_model->delete($id)) {
    //         $this->session->set_flashdata('success', 'Berhasil dihapus..');
    //         redirect(site_url('admin/tunjangan'));
    //     }
    // }
}