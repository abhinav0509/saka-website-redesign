<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Placement_Data extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function Insert()
	{
		$up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/Placement/';
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
			    	 $data = array(
					'Stud_Name' => $this->input->post('Name'),
					'Stud_Cont' => $this->input->post('Cont1'),
					'Course_Name' => $this->input->post('Course'),
					'Company_Name' => $this->input->post('comp'),
					'Designation' => $this->input->post('Desi'),
					'Sallary' => $this->input->post('sall'),
					'Job_Description' => $this->input->post('Desc')
					);
			    	$this->load->model('placement');
					$res=$this->placement->Update_Data($data,$up_id);
					redirect('Admin/Placement');
			    	 
	    }
	    else
	    {
	    $data = array(
		'Stud_Name' => $this->input->post('Name'),
		'Stud_Cont' => $this->input->post('Cont1'),
		'Course_Name' => $this->input->post('Course'),
		'Company_Name' => $this->input->post('comp'),
		'Designation' => $this->input->post('Desi'),
		'Sallary' => $this->input->post('sall'),
		'Job_Description' => $this->input->post('Desc'),
		'Image' => $b
		);
		$this->load->model('placement');
		$res=$this->placement->Insert_Data($data);
		if($res==true)
		{
		redirect('Admin/Placement');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/Placement');
		}
		}
	}
	
public function Delete()
 {
 	$a= $_POST['Pl_id'];
	//echo $a;
	//die("Stop");
	 $data = array(
		'Stud_Name' => $this->input->post('Name'),
		'Stud_Cont' => $this->input->post('Cont1'),
		'Course_Name' => $this->input->post('Course'),
		'Company_Name' => $this->input->post('comp'),
		'Designation' => $this->input->post('Desi'),
		'Sallary' => $this->input->post('sall'),
		'Job_Description' => $this->input->post('Desc')
		);
	$this->load->model('placement');
	$res=$this->placement->dele($data,$a);
				if($res==true)
				{
				redirect('Admin/Placement');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/Placement');
				}
 	 }
}