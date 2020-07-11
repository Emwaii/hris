<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        $this->load->model("client_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["products"] = $this->product_model->getAll();
        $this->load->view("admin/project/list", $data);
    }

    public function add()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan..');
            redirect('admin/project');
        }
        $client = $this->client_model->getAll();
        $data = ['client' => $client];
        $this->load->view("admin/project/new_form",$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/project');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil diubah..');
            redirect('admin/project');
        }
        $client = $this->client_model->getAll();
        $data =['client' => $client, 'project' => $product->getById($id)];
        if (!$data["project"]) show_404();
        
        $this->load->view("admin/project/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus..');
            redirect(site_url('admin/project'));
        }
    }
}
