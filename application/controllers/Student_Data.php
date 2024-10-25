<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_Data extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	
public function Delete()
 {
 	$a= $_POST['s_id'];
	//echo $a;
	//die("StopMukesh");
	$data = array(
				'name',
				'email',
				'contact',
				'subject',
				'message'
				);
	$this->load->model('student_enquiry');
	$res=$this->student_enquiry->dele($data,$a);
				if($res==true)
				{
				redirect('Admin/Student_Enquiry');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/Student_Enquiry');
				}
 	
 }
 
}
	
