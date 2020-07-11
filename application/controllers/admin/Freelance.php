<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Freelance extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("freelance_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}

	public function translator()
	{	
		$trans = $this->freelance_model->translator();
        $data=['translator'=>$trans];
        $this->load->view("admin/freelance/translator", $data);
	}
	public function interpreter()
	{	
		$inter = $this->freelance_model->interpreter();
        $data=['interpreter'=>$inter];
        $this->load->view("admin/freelance/interpreter", $data);
	}
	public function dtp()
	{	
		$dtp = $this->freelance_model->dtp();
        $data=['dtp'=>$dtp];
        $this->load->view("admin/freelance/dtp", $data);
	}
	public function graphic()
	{	
		$graphic = $this->freelance_model->graphic();
        $data=['graphic'=>$graphic];
        $this->load->view("admin/freelance/graphic", $data);
	}
	public function subtitler()
	{	
		$sub = $this->freelance_model->subtitler();
        $data=['subtitler'=>$sub];
        $this->load->view("admin/freelance/subtitler", $data);
	}
	public function transcriber()
	{	
		$transcriber = $this->freelance_model->transcriber();
        $data=['transcriber'=>$transcriber];
        $this->load->view("admin/freelance/transcriber", $data);
	}


	
}
