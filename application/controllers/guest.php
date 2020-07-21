<?php

class Guest extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("jobs_model");
        $this->load->model("freelance_model");
        $this->load->model("language_model");
        $this->load->model("lowongan_model");
        $this->load->model("ilowongan_model");
        $this->load->model("inhouse_model");
        $this->load->library('form_validation');

    }
    public function index(){
        $lowo= $this->lowongan_model->getAll();
        $data =['lowo'=>$lowo];
        $this->load->view("guest/index.php",$data);
    }
    public function freelance(){
        $free= $this->freelance_model;
        // $free->save();
        $validation = $this->form_validation;
        $validation->set_rules($free->rules());

        if ($validation->run()) {
            $free->save();
            $this->session->set_flashdata('success', 'Data is sucessfully submitted,
            Thank you for registering, please wait for further information');
            redirect('guest/freelance');
            
        }

        $lang= $this->language_model->getAll();
        $job= $this->jobs_model->getAll();
        $data =['jobs'=>$job,'lang'=>$lang];
        $this->load->view("guest/freelance.php",$data);
    }


    
    public function tetap(){
        $inhouse= $this->inhouse_model;
        // $free->save();
        $validation = $this->form_validation;
        $validation->set_rules($inhouse->rules());

        if ($validation->run()) {
            $inhouse->save();
            $this->session->set_flashdata('success', 'Data is sucessfully submitted,
            Thank you for registering, please wait for further information');
            redirect('guest/tetap');
        }

        //$lang= $this->language_model->getAll();
        $ilowo= $this->ilowongan_model->getAll();
        $plus = $this->plus();
        $data =['ilowo'=>$ilowo,'plus'=>$plus];
        $this->load->view("guest/inhouse.php",$data);
        // $this->load->view("guest/inhouse.php");
    }


    // function donlodcv($id)
	// {
    //     $free= $this->freelance_model->getAll();
    //     $data =['free'=>$free];
	// 	$data = $this->db->get_where('rfreelance',['id_freelance'=>$id])->row();
	// 	force_download('upload/rfreelance/'.$data->cv_freelance,NULL);
    // }
    
	// function donlodporto($id)
	// {
    //     $free= $this->freelance_model->getAll();
    //     $data =['free'=>$free];
	// 	$data = $this->db->get_where('rfreelance',['id_freelance'=>$id])->row();
	// 	force_download('upload/rfreelance/'.$data->portofolio_freelance,NULL);
    // }

    function viewfilecv($id){
        $free= $this->freelance_model->getAll();
        $data = $this->db->get_where('rfreelance',['id_freelance'=>$id])->row();
        $filename = 'upload/rfreelance/'.$data->cv_freelance;

        header("Content-type: application/pdf"); 
        header("Content-Length: " . filesize($filename)); 
        readfile($filename); 
    }

    function viewfileporto($id){
        $free= $this->freelance_model->getAll();
        $data = $this->db->get_where('rfreelance',['id_freelance'=>$id])->row();
        $filename = 'upload/rfreelance/'.$data->portofolio_freelance;

        header("Content-type: application/pdf"); 
        header("Content-Length: " . filesize($filename)); 
        readfile($filename); 
    }
    
    public function plus(){
        return $this->db->query("SELECT `id_ilowongan`, `ilowongan_name`, `ilowongan_alias`, `is_active` FROM `ilowongan` WHERE is_active = 1")->result();
    }
}