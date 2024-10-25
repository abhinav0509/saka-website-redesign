<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial_Data extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function Insert()
	{
		$up_id = $this->input->post('bid');
		$b="";
		$config['upload_path'] = './uploads/Testimonial/';
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
					if($b==null)
					{
			    	 $data = array(
					'Name' => $this->input->post('nm'),
					'Content' => $this->input->post('testo')
					);
					}
					else
					{
					$data = array(
					'Name' => $this->input->post('nm'),
					'Content' => $this->input->post('testo'),
					'Image' => $b
					);
					}
			    	$this->load->model('testimonial');
					$res=$this->testimonial->Update_Data($data,$up_id);
					redirect('Admin/Testimonial');
			    	 
	    }
	    else
	    {
	    $data = array(
		'Name' => $this->input->post('nm'),
		'Content' => $this->input->post('testo'),
		'Image' => $b
		);
		$this->load->model('testimonial');
		$res=$this->testimonial->Insert_Data($data);
		if($res==true)
		{
		redirect('Admin/Testimonial');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/Testimonial');
		}
		}
	}
	
public function Delete()
 {
 	$a= $_POST['T_id'];
	//echo $a;
	//die("Stop");
	 $data = array(
		'Name' => $this->input->post('nm'),
		'Content' => $this->input->post('testo')
		);
	$this->load->model('testimonial');
	$res=$this->testimonial->dele($data,$a);
				if($res==true)
				{
				redirect('Admin/Testimonial');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/Testimonial');
				}
 	 }


public function GetTesto()
	{	
	  
	    $name= $this->input->post('term');	
	    $this->load->model('testimonial');	
	    $this->testimonial->getdata1($name);
	
	}



}