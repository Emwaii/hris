<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jabatan_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["jabatan"] = $this->jabatan_model->getAll();
        // $this->load->view("admin/client/list", $data);
    }

    public function add()
    {
        $jabatan = $this->jabatan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        // if ($validation->run()) {
        //     $client->save();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }

        // $this->load->view("admin/client/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/projects_status');
       
        $jabatan = $this->jabatan;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        // if ($validation->run()) {
        //     $client->update();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }

        $data["jabatan"] = $jabatan->getById($id);
        if (!$data["jabatan"]) show_404();
        
        // $this->load->view("admin/client/edit_form", $data);
    }

    // public function delete($id=null)
    // {
    //     if (!isset($id)) show_404();
        
    //     if ($this->jabatan_model->delete($id)) {
    //         redirect(site_url('admin/projects_status'));
    //     }
    // }
}