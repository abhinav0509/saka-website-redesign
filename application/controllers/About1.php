<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function about()
	{
	
	    $data = array(
		'About_Content' => $this->input->post('content'),
		'mission' => $this->input->post('mission'),
		'vission' => $this->input->post('vission'),
		'values' => $this->input->post('values')
		);
		$this->load->model('insert_about');
		$res=$this->insert_about->Insert_Data($data);
		if($res==true)
		{
		redirect('Admin/about');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/about');
		}
	}
	
 /* function GetAll()
  {
       
	   $this->load->view('header1');
       $this->load->view('about',$data);
	   $this->load->view('footer1');
	   //redirect('Admin/about');
  }*/
	
	
	
	
	
}