<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hlowongan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("lowongan_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $plus=$this->plus();
        $lowongan=$this->lowongan_model->getAll();
        $data=["lowongan"=>$lowongan,"plus"=>$plus];
        $this->load->view("admin/settings/slideshow", $data);
    }

    public function add()
    {
        $lowongan = $this->lowongan_model;
        $validation = $this->form_validation;
        $validation->set_rules($lowongan->rules());

        if ($validation->run()) {
            $lowongan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/hlowongan');

        }

        $this->load->view("admin/hlowongan");
    }

    public function edit($id = null)
    {
        // if (!isset($id)) redirect('admin/projects_status');
       
        $lowongan = $this->lowongan_model;
        $validation = $this->form_validation;
        $validation->set_rules($lowongan->rules());

        if ($validation->run()) {
            $lowongan->update();
            $this->session->set_flashdata('success', 'Berhasil diubah..');
            redirect('admin/hlowongan');

        }

        $data["lowongan"] = $lowongan->getById($id);
        // if (!$data["jabatan"]) show_404();
        
        $this->load->view("admin/hlowongan", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->lowongan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus..');
            redirect(site_url('admin/hlowongan'));
        }
    }

    public function plus(){
        return $this->db->query("SELECT max(id) as maxid from lowongan ")->result();
    }
}