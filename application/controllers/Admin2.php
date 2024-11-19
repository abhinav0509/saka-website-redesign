<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin2 extends CI_Controller {
     
	var $globaldata;
	function __construct()
	{
		 parent::__construct();
		//   $this->load->library("Pdf");
		$var=$this->session->userdata;
		   if(isset($var['login_user']))
		 {
		 
		 $this->globaldata=array(
		 'userdata'=>$var['login_user']
	);
	  }

  }
    
    public function index()
	{
		if($this->session->userdata("loginType")){
			if($this->session->userdata("loginType")=="Student"){
				redirect('Student/Home');
			}
			if($this->session->userdata("loginType")=="Admin"){
				redirect('Admin/Home');
			}
			if($this->session->userdata("loginType")=="Franchisee"){
				redirect('Franchisee/Home');
			}
			if($this->session->userdata("loginType")=="Employee"){
				redirect('Employee/Home');
			}
		}else{
			$this->load->view('Login');		
		}
	}

    public function Home()
	{
		
		$this->load->view('header1');
		$this->load->view('Home');		
		$this->load->view('footer1');
	}
	public function Dashboard1()
	{
		
		$this->load->view('cms/header');
		$this->load->view('cms/home');		
		$this->load->view('cms/footer');
	}

   }

	

