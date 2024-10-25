<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_Data extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function Insert()
	{
	
		$b="";
		$up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/Courses/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if ( !$this->upload->do_upload('upload'))
		{
			$error = array('error' => $this->upload->display_errors());
		} 
		else
		{
			 $data = array('upload_data' => $this->upload->data());
			 foreach($data as $d)
			 {
			    $b= $d['file_name'];
			 }
		}
	    if($up_id!="")
	    {
					if($b!="")
					{
					$data1 = array(
					'Course_Name' => $this->input->post('course'),
					'Duration' => $this->input->post('duration'),
					'Fair' => $this->input->post('charge'),
					'Description' => $this->input->post('Desc'),
					'Book' => $this->input->post('book'),
					'Exam' => $this->input->post('Exam'),
					'Content' => $this->input->post('Cont'),
					'image' => $b
					);
					}
					else
					{
					$data1 = array(
					'Course_Name' => $this->input->post('course'),
					'Duration' => $this->input->post('duration'),
					'Fair' => $this->input->post('charge'),
					'Description' => $this->input->post('Desc'),
					'Book' => $this->input->post('book'),
					'Exam' => $this->input->post('Exam'),
					'Content' => $this->input->post('Cont')
					
					);
		
		}
			    	$this->load->model('course_module_data');
					$res=$this->course_module_data->Update_Data($data1,$up_id);
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
			    	 
	    
	    else
	    {           
	    	        if($b!="")
					{
					$data1 = array(
					'Course_Name' => $this->input->post('course'),
					'Duration' => $this->input->post('duration'),
					'Fair' => $this->input->post('charge'),
					'Description' => $this->input->post('Desc'),
					'Book' => $this->input->post('book'),
					'Exam' => $this->input->post('Exam'),
					'Content' => $this->input->post('Cont'),
					'image' => $b
					);
					}
					else
					{
					$data1 = array(
					'Course_Name' => $this->input->post('course'),
					'Duration' => $this->input->post('duration'),
					'Fair' => $this->input->post('charge'),
					'Description' => $this->input->post('Desc'),
					'Book' => $this->input->post('book'),
					'Exam' => $this->input->post('Exam'),
					'Content' => $this->input->post('Cont')
					
					);
				   }
					$this->load->model('course');
					$res=$this->course->Insert_Data($data1);
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
	}
	
public function Delete()
 {
 	$a= $_POST['id'];
	//echo $a;
	//die("Stop");
	 $data = array(
		'Course_Name' => $this->input->post('course'),
		'Duration' => $this->input->post('duration'),
		'Fair' => $this->input->post('charge'),
		'Description' => $this->input->post('Desc'),
		'Book' => $this->input->post('book'),
		'Exam' => $this->input->post('Exam'),
		'Content' => $this->input->post('Cont')
		);
	$this->load->model('course_module_data');
	$res=$this->course_module_data->dele($data,$a);
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
}