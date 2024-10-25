<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function about()
	{
	
	    $data = array(
		'Course_Name' => $this->input->post('course'),
		'Duration' => $this->input->post('duration'),
		'Fair' => $this->input->post('charge'),
		'Description' => $this->input->post('Desc')
		);
		$this->load->model('Course_Data');
		$res=$this->Course_Data->Insert_Data($data);
		if($res==true)
		{
		redirect('Admin/Course');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/Course');
		}
	}
	public function dele($data,$a)
{
		$this->load->database();
		$this->db->where('id',$a); 
		$query=$this->db->delete('course');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}	
	
	function Try1()
	{
		echo "fgfgfgf";
		die("Stop");
	}
	
 /* function GetAll()
  {
       
	   $this->load->view('header1');
       $this->load->view('about',$data);
	   $this->load->view('footer1');
	   //redirect('Admin/about');
  }*/
	
	
	
	
	
}