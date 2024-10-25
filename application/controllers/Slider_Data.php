<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_Data extends CI_Controller {

	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	
     }
	public function Insert()
	{
		$up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/Slider/';
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
					'Caption' => $this->input->post('cap')
					);
					}
					else
					{
			    	 $data = array(
					'Caption' => $this->input->post('cap'),
					'Image' => $b
					);
					}
			    	$this->load->model('silder');
					$res=$this->silder->Update_Data($data,$up_id);
					redirect('Admin/Slider');
			    	 
	    }
	    else
	    {
			if($b==null)
			{
				$b=
				$data1 = array(
				'Caption' => $this->input->post('cap')
				);
			
			}
			else
			{
			$data1 = array(
			'Caption' => $this->input->post('cap'),
			'Image' => $b
			);
			}
		$this->load->model('silder');
		$res=$this->silder->Insert_Data($data1);
		if($res==true)
		{
		redirect('Admin/Slider');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/Slider');
		}
		}
	}
	
	public function Delete()
	{
 	$a= $_POST['id'];
	$data = array(
		'Caption' => $this->input->post('cap'),
		'Image' => $this->input->post('upload')
		);
		$this->load->model('silder');
		$res=$this->silder->dele($data,$a);
		if($res==true)
		{
		redirect('Admin/Slider');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/Slider');
		}
 	
 }

  public function GetSlider()
	{	
	  
	    $name= $this->input->post('term');	
	    $this->load->model('silder');	
	    $this->silder->getslide($name);
	
	}

}