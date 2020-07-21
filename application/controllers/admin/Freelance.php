<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Freelance extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		$this->load->library('form_validation');
		$this->load->model("freelance_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));

	}
    public function index(){
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
	public function translator()
	{	
		$trans = $this->freelance_model->translator();
        $data=['translator'=>$trans];
        $this->load->view("admin/freelance/translator", $data);
	}

	public function deltranslator()
	{	
		$trans = $this->freelance_model->deltranslator();
        $data=['deltranslator'=>$trans];
        $this->load->view("admin/deleted/translator", $data);
	}
	
	public function interpreter()
	{	
		$inter = $this->freelance_model->interpreter();
        $data=['interpreter'=>$inter];
        $this->load->view("admin/freelance/interpreter", $data);
    }
    
    public function delinterpreter()
	{	
		$inter = $this->freelance_model->delinterpreter();
        $data=['delinterpreter'=>$inter];
        $this->load->view("admin/deleted/interpreter", $data);
    }
    
	public function dtp()
	{	
		$dtp = $this->freelance_model->dtp();
        $data=['dtp'=>$dtp];
        $this->load->view("admin/freelance/dtp", $data);
    }
    
    public function deldtp()
	{	
		$dtp = $this->freelance_model->deldtp();
        $data=['deldtp'=>$dtp];
        $this->load->view("admin/deleted/dtp", $data);
    }
    
	public function graphic()
	{	
		$graphic = $this->freelance_model->graphic();
        $data=['graphic'=>$graphic];
        $this->load->view("admin/freelance/graphic", $data);
    }
    
    public function delgraphic()
	{	
		$graphic = $this->freelance_model->delgraphic();
        $data=['delgraphic'=>$graphic];
        $this->load->view("admin/deleted/graphic", $data);
    }
    
	public function subtitler()
	{	
		$sub = $this->freelance_model->subtitler();
        $data=['subtitler'=>$sub];
        $this->load->view("admin/freelance/subtitler", $data);
    }
    
    public function delsubtitler()
	{	
		$sub = $this->freelance_model->delsubtitler();
     $data=['delsubtitler'=>$sub];
     $this->load->view("admin/deleted/subtitler", $data);
    }
    
	public function transcriber()
	{	
		$transcriber = $this->freelance_model->transcriber();
        $data=['transcriber'=>$transcriber];
        $this->load->view("admin/freelance/transcriber", $data);
    }
    
    public function deltranscriber()
	{	
		 $transcriber = $this->freelance_model->deltranscriber();
         $data=['deltranscriber'=>$transcriber];
         $this->load->view("admin/deleted/transcriber", $data);
    }

	public function approve($id=null)
    {
            
            $this->freelance_model->update($id); 
            $this->session->set_flashdata('success', 'Applicant has been marked..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        
	}
	
	public function cancel($id=null)
    {
            
            $this->freelance_model->cancel($id); 
            $this->session->set_flashdata('success', 'Applicant has been canceled..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        
    }
	
	//  ####################################

	public function trash6($id=null)
    {
		
        $this->freelance_model->trash($id);
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect('admin/freelance/translator');
		
		$this->translator();
    }
    
	public function trash1($id=null)
    {
		
        $this->freelance_model->trash($id);
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect('admin/freelance/dtp');
		
		$this->dtp();
    }

    public function trash2($id=null)
    {
		
        $this->freelance_model->trash($id);
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect('admin/freelance/graphic');
		
		$this->graphic();
    }

    public function trash3($id=null)
    {
		
        $this->freelance_model->trash($id);
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect('admin/freelance/interpreter');
		
		$this->interpreter();
    }

    public function trash4($id=null)
    {
		
        $this->freelance_model->trash($id);
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect('admin/freelance/subtitler');
		
		$this->subtitler();
    }

    public function trash5($id=null)
    {
		
        $this->freelance_model->trash($id);
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect('admin/freelance/transcriber');
		
		$this->transcriber();
    }
    
	public function restore6($id=null)
    {
		
        $this->freelance_model->restore($id);
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect('admin/freelance/deltranslator');

		$this->deltranslator();
    }

    public function restore1($id=null)
    {
		
        $this->freelance_model->restore($id);
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect('admin/freelance/deldtp');
		
		
		$this->deldtp();
    }

    public function restore2($id=null)
    {
		
        $this->freelance_model->restore($id);
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect('admin/freelance/delgraphic');
		
		
		$this->delgraphic();
    }
    
    public function restore3($id=null)
    {
		
        $this->freelance_model->restore($id);
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect('admin/freelance/delinterpreter');
		
		
		$this->delinterpreter();
    }

    public function restore4($id=null)
    {
		
        $this->freelance_model->restore($id);
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect('admin/freelance/delsubtitler');
		
		
		$this->delsubtitler();
    }

    public function restore5($id=null)
    {
		
        $this->freelance_model->restore($id);
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect('admin/freelance/deltranscriber');
		
		
		$this->deltranscriber();
    }
    ######################## export function ###################################

	public function exp_dtp()
	{		
        $this->load->view("admin/export_excel/export_dtp");
	}
	public function exp_ts()
	{		
        $this->load->view("admin/export_excel/export_ts");
	}
	public function exp_gp()
	{		
        $this->load->view("admin/export_excel/export_gp");
	}
	public function exp_in()
	{		
        $this->load->view("admin/export_excel/export_in");
	}
	public function exp_sub()
	{		
        $this->load->view("admin/export_excel/export_sub");
	}
	public function exp_tr()
	{		
        $this->load->view("admin/export_excel/export_tr");
	}

    // ######################## delete function ###################################

	public function delete1($id=null)
    {
            
        if ($this->freelance_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted permanently..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            // redirect(site_url('admin/freelance/dtp'));
        }
    }

    public function delete2($id=null)
    {
            
        if ($this->freelance_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted permanently..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            // redirect(site_url('admin/freelance/graphic'));
        }
    }

    public function delete3($id=null)
    {
            
        if ($this->freelance_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted permanently..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            // redirect(site_url('admin/freelance/interpreter'));
        }
    }

    public function delete4($id=null)
    {
            
        if ($this->freelance_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted permanently..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            // redirect(site_url('admin/freelance/subtitler'));
        }
    }

    public function delete5($id=null)
    {
            
        if ($this->freelance_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted permanently..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            // redirect(site_url('admin/freelance/transcriber'));
        }
    }

    
    public function delete6($id=null)
    {
            
        if ($this->freelance_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data has been deleted permanently..');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            // redirect(site_url('admin/freelance/translator'));
		}
		
		// $this->freelance_model->restore($id);
		// $this->session->set_flashdata('success', 'Data has been deleted permanently..');
		// redirect(site_url('admin/freelance/translator'));
		
		
		// $this->translator();
    }

    public function delete7()
    {       
            $this->freelance_model->deletev();
            $this->session->set_flashdata('success', 'Data has been deleted permanently..');
            redirect(site_url('admin/freelance/translator'));
            
            $this->translator();
    }

    // ######################### interval translator ###############################
    
    public function movetrashts(){
        $this->freelance_model->movets();
        
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect(site_url('admin/freelance/translator'));
		
		$this->translator();
    }

    public function retorets(){

        $this->freelance_model->delmovets();
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect(site_url('admin/freelance/deltranslator'));
				
		$this->deltranslator();
    }
    
    public function permats(){

        $this->freelance_model->deletev();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/translator'));
            
        $this->translator();
    }

    public function delpermats(){

        $this->freelance_model->ddeletev();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/deltranslator'));
            
        $this->deltranslator();
    }

    // ######################### interval dtp ###############################
    
    public function movetrashdtp(){
        $this->freelance_model->movedtp();
        
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect(site_url('admin/freelance/dtp'));
		
		$this->dtp();
    }

    public function retoredtp(){

        $this->freelance_model->delmovedtp();
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect(site_url('admin/freelance/deldtp'));
				
		$this->deldtp();
    }
    
    public function permadtp(){

        $this->freelance_model->deletedtp();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/dtp'));
            
        $this->dtp();
    }

    public function delpermadtp(){

        $this->freelance_model->ddeletedtp();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/deldtp'));
            
        $this->deldtp();
    }

    // ######################### interval graphic ###############################
    
    public function movetrashgp(){
        $this->freelance_model->movegp();
        
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect(site_url('admin/freelance/graphic'));
		
		$this->graphic();
    }

    public function retoregp(){

        $this->freelance_model->delmovegp();
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect(site_url('admin/freelance/delgraphic'));
				
		$this->delgraphic();
    }
    
    public function permagp(){

        $this->freelance_model->deletegp();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/graphic'));
            
        $this->graphic();
    }

    public function delpermagp(){

        $this->freelance_model->ddeletegp();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/delgraphic'));
            
        $this->delgraphic();
    }

    // ######################### interval interpreter ###############################
    
    public function movetrashin(){
        $this->freelance_model->movein();
        
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect(site_url('admin/freelance/interpreter'));
		
		$this->interpreter();
    }

    public function retorein(){

        $this->freelance_model->delmovein();
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect(site_url('admin/freelance/delinterpreter'));
				
		$this->delinterpreter();
    }
    
    public function permain(){

        $this->freelance_model->deletein();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/interpreter'));
            
        $this->interpreter();
    }

    public function delpermain(){

        $this->freelance_model->ddeletein();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/delinterpreter'));
            
        $this->delinterpreter();
    }

    // ######################### interval subtitler ###############################
    
    public function movetrashsub(){
        $this->freelance_model->movesub();
        
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect(site_url('admin/freelance/subtitler'));
		
		$this->subtitler();
    }

    public function retoresub(){

        $this->freelance_model->delmovesub();
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect(site_url('admin/freelance/delsubtitler'));
				
		$this->delsubtitler();
    }
    
    public function permasub(){

        $this->freelance_model->deletesub();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/subtitler'));
            
        $this->subtitler();
    }

    public function delpermasub(){

        $this->freelance_model->ddeletesub();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/delsubtitler'));
            
        $this->delsubtitler();
    }

    // ######################### interval transcriber ###############################
    
    public function movetrashtr(){
        $this->freelance_model->movetr();
        
        $this->session->set_flashdata('success', 'Data has been moved to the trash..');
        redirect(site_url('admin/freelance/transcriber'));
		
		$this->transcriber();
    }

    public function retoretr(){

        $this->freelance_model->delmovetr();
        $this->session->set_flashdata('success', 'Data has been restored..');
        redirect(site_url('admin/freelance/deltranscriber'));
				
		$this->deltranscriber();
    }
    
    public function permatr(){

        $this->freelance_model->deletetr();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/transcriber'));
            
        $this->transcriber();
    }

    public function delpermatr(){

        $this->freelance_model->ddeletetr();
        $this->session->set_flashdata('success', 'Data has been deleted permanently..');
        redirect(site_url('admin/freelance/deltranscriber'));
            
        $this->deltranscriber();
    }
    // ------------------------------------------------------
    
    
}
