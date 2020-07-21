<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ilowongan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ilowongan_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        // $plus=$this->plus(); "plus"=>$plus
        $lowongan=$this->ilowongan_model->getAll();
        $data=["lowongan"=>$lowongan];
        $this->load->view("admin/settings/ilowongan", $data);
    }

    public function add()
    {
        $lowongan = $this->ilowongan_model;
        $validation = $this->form_validation;
        $validation->set_rules($lowongan->rules());

        if ($validation->run()) {
            $lowongan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/ilowongan');

        }

        $this->load->view("admin/ilowongan");
    }

    public function edit($id = null)
    {
        // if (!isset($id)) redirect('admin/projects_status');
       
        $lowongan = $this->ilowongan_model;
        $validation = $this->form_validation;
        $validation->set_rules($lowongan->rules());

        if ($validation->run()) {
            $lowongan->update();
            $this->session->set_flashdata('success', 'Berhasil diubah..');
            redirect('admin/ilowongan');

        }

        $data["lowongan"] = $lowongan->getById($id);
        // if (!$data["jabatan"]) show_404();
        
        $this->load->view("admin/ilowongan", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->ilowongan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus..');
            redirect(site_url('admin/ilowongan'));
        }
    }

    public function plus(){
        return $this->db->query("SELECT `id_ilowongan`, `ilowongan_name`, `ilowongan_alias`, `is_active` FROM `ilowongan` WHERE is_active = 1")->result();
    }
}