<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fran_del extends CI_Controller {
	
    

     public function enquiry_del()
     {
     	$id=$_POST['id'];
     	$this->load->model('dele_fran');
     	$result=$this->dele_fran->del_enquiry($id);
     	if($result)
     	{
     		$data['res']="success";

     	}
     	else
     	{
     		$data['res']="False";
     	}

     } 



 }