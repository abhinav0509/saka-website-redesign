<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailconfig extends CI_Controller {
	var $globaldata;
     function __construct()
     {
     	 parent::__construct();
		 $this->load->library("Pdf");
		 $this->load->database();
		
		 $var=$this->session->userdata;
	   	 if(isset($var['login_user']))
     	 {
          
          $this->globaldata=array(
		  'userdata'=>$var['login_user']
	       );
       }

     }

public function mail_insert()
{
	$data = array(
	'email'=>$this->input->post('email'),
	'paswrd'=>$this->input->post('passw')
	);
	
	$this->load->Model('mail_config');
	$res = $this->mail_config->mail_insert($data);
	if($res)
	{	$mess = "Inserted Successfully";
		$this->session->set_userdata('msg',$mess);
		redirect('Admin/mail_configure');
	}
	else
	{
		$mess = "Error Please try again..";
		$this->session->set_userdata('msg',$mess);
		redirect('Admin/mail_configure');
	}
}

public function mail_update()
{
	$data = array(
	'email'=>$this->input->post('email'),
	'paswrd'=>$this->input->post('passw')
	);
	
	$this->load->Model('mail_config');
	$id = $this->input->post('bid');
	$res = $this->mail_config->mail_update($data,$id);
	if($res)
	{	$mess = "Updated Successfully";
		$this->session->set_userdata('msg',$mess);
		redirect('Admin/mail_configure');
	}
	else
	{
		$mess = "Error Please try again..";
		$this->session->set_userdata('msg',$mess);
		redirect('Admin/mail_configure');
	}
}

public function delete_mailconfig()
{
	$id = $_POST['id'];
	$this->load->Model('mail_config');
	$res = $this->mail_config->delete_mailconfig($id);
	if($res)
	{
		$data['message']="Deleted Successfully";
		print_r(json_encode($data));
	}
	else
	{
		$data['message']="Error Please Try Again";
		print_r(json_encode($data));
	}
}

public function mail_status()
{
	$id = $_POST['id'];
	$str = $_POST['str'];
	$this->load->model('mail_config');
	$res = $this->mail_config->mail_status($id,$str);
	if($res)
	{
		$data['message']="Status Changed Successfully!";
		print_r(json_encode($data));
	}
	else
	{
		$data['message']="Error Please Try Again";
		print_r(json_encode($data));
	}
}
}