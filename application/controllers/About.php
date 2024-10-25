<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function about()
	{
	    $up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/About/';
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
					$data1 = array(
					'About_Content' => $this->input->post('content1'),
					'mission' => $this->input->post('mission'),
					'vission' => $this->input->post('vission'),
					'values' => $this->input->post('values')					
					);
					}
					else
					{
			    	 $data1 = array(
					'About_Content' => $this->input->post('content1'),
					'mission' => $this->input->post('mission'),
					'vission' => $this->input->post('vission'),
					'values' => $this->input->post('values'),
					'image' => $b
					);
					}
			    	$this->load->model('insert_about');
					$res=$this->insert_about->Update_Data($data1,$up_id);
					redirect('Admin/about');
			    	 
	    }
	    else
	    {
			    $data = array(
				'About_Content' => $this->input->post('content1'),
				'mission' => $this->input->post('mission'),
				'vission' => $this->input->post('vission'),
				'values' => $this->input->post('values'),
				'image' => $b
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
	}
public function Delete()
 {
 	$a= $_POST['id'];
	$data = array(
				'About_Content' => $this->input->post('content1'),
				'mission' => $this->input->post('mission'),
				'vission' => $this->input->post('vission'),
				'values' => $this->input->post('values')
				);
	$this->load->model('insert_about');
	$res=$this->insert_about->dele($data,$a);
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
	
}