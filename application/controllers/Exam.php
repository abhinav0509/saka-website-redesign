<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	 
	 public function save_exame()
	 {
	 	 $data=array(
 				
	 	 		'course'=>$this->input->post('course'),
 				'quiz_cat_name'=>$this->input->post('exam'),
 				'questions'=>$this->input->post('tques'),
 				'duration'=>$this->input->post('duration'),
 				'pass_marks'=>$this->input->post('pmarks')
	 	 	);

	 	$this->load->Model('exam_data');
	 	$res=$this->exam_data->Insert_Data($data);  
	 	if($res)
	 	{
	 		$mess="New Exam Created.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/Exam_Module');
	 	}
	 	else
	 	{
	 		$mess="Exam Already Exists Or Error In Creating Exam.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/Exam_Module');
	 	}
	 }

	 public function save_exame1()
	 {
	 	 $data=array(
 				
	 	 		'course'=>$this->input->post('course'),
 				'quiz_cat_name'=>$this->input->post('exam'),
 				'questions'=>$this->input->post('tques'),
 				'duration'=>$this->input->post('duration'),
 				'pass_marks'=>$this->input->post('pmarks')
	 	 	);

	 	$this->load->Model('exam_data');
	 	$res=$this->exam_data->Insert_Data($data);  
	 	if($res)
	 	{
	 		$mess="New Exam Created.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Employee/Exam_Module');
	 	}
	 	else
	 	{
	 		$mess="Exam Already Exists Or Error In Creating Exam.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Employee/Exam_Module');
	 	}
	 }
	 
	 public function update_exam()	
	 {
	 	$up_id=$this->input->post('bid');
	 	$data=array(
 				
	 	 		'course'=>$this->input->post('course'),
 				'quiz_cat_name'=>$this->input->post('exam'),
 				'questions'=>$this->input->post('tques'),
 				'duration'=>$this->input->post('duration'),
 				'pass_marks'=>$this->input->post('pmarks')
	 	 	);

	 	$this->load->Model('exam_data');
	 	$res=$this->exam_data->Update_Data($data,$up_id);  
	 	if($res)
	 	{
	 		$mess="Exam Updated.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/Exam_Module');
	 	}
	 	else
	 	{
	 		$mess="Error In Updating Exam.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/Exam_Module');
	 	}

	 }

	 public function Delete()
	 {
	 	 $id=$_POST['id'];
	 	 $this->load->Model('exam_data');
	 	$res=$this->exam_data->Delete_question($id);  
	 	if($res)
	 	{
	 		$data['message']="Record Deleted.....!";
	 		print_r(json_encode($data));
	 	}
	 	else
	 	{
	 		$data['message']="Error In Deleting The Record.....!";
	 		print_r(json_encode($data));
	 	}
	 }

	 public function update_exam1()	
	 {
	 	$up_id=$this->input->post('bid');
	 	$data=array(
 				
	 	 		'course'=>$this->input->post('course'),
 				'quiz_cat_name'=>$this->input->post('exam'),
 				'questions'=>$this->input->post('tques'),
 				'duration'=>$this->input->post('duration'),
 				'pass_marks'=>$this->input->post('pmarks')
	 	 	);

	 	$this->load->Model('exam_data');
	 	$res=$this->exam_data->Update_Data($data,$up_id);  
	 	if($res)
	 	{
	 		$mess="Exam Updated.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Employee/Exam_Module');
	 	}
	 	else
	 	{
	 		$mess="Error In Updating Exam.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Employee/Exam_Module');
	 	}

	 }

	 public function Delete_exam()
	 {
	 	$id=$_POST['qid'];
	 	$this->load->Model('exam_data');
	 	$res=$this->exam_data->dele($id);
	 	if($res)
	 	{
	 		 $data['message']="Record Deletedt Succesfully.....!";
	 		 print_r(json_encode($data));
	 	}
	 	else
	 	{
	 		$data['message']="Error In Deleting The Record.....!";
	 		 print_r(json_encode($data));
	 	}
	 }
}