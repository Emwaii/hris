<?php

class Fungsi {
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
        
    }

    function user_login() {
        $this->ci->load->model('user_model');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_model->get($user_id)->row();
        return $user_data;
    }

    function menu_active() {
        $this->ci->load->model('menu_model');
        // $menu_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_model->geta($user_id)->row();
        return $user_data;  
    }

   
    public function count_free(){
        $this->ci->load->model('freelance_model');
        return $this->ci->freelance_model->get()->num_rows();
        
    }

    public function count_in(){
        $this->ci->load->model('inhouse_model');
        return $this->ci->inhouse_model->get()->num_rows();
        
    }

    public function name(){
        $this->ci->load->model('inhouse_model');
        return $this->ci->inhouse_model->gett()->row();
        
    }

    public function count_proj(){
        $this->ci->load->model('product_model');
        return $this->ci->product_model->get()->num_rows();
        
    }
    public function count_kar(){
        $this->ci->load->model('karyawan_model');
        return $this->ci->karyawan_model->get()->num_rows();
        
    }
    public function count_cli(){
        $this->ci->load->model('client_model');
        return $this->ci->client_model->get()->num_rows();
        
    }
    public function count_user(){
        $this->ci->load->model('user_model');
        return $this->ci->user_model->get()->num_rows();
        
    }
} 