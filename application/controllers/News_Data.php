<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_Data extends CI_Controller 
{
	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	/*public function Insert()
	{
		$up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/News/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$b="";
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
					$originalDate = $this->input->post('publish');
				    $newDate = date("Y-m-d", strtotime($originalDate));	
					$data1 = array(
					'Title' => $this->input->post('course'),
					'Description' => $this->input->post('Desc'),
					'Publish_Date' => $newDate
					);
					}
					else
					{
			    	 $data1 = array(
					'Title' => $this->input->post('course'),
					'Description' => $this->input->post('Desc'),
					'Publish_Date' => $this->input->post('publish'),
					'image' => $b
					);
					}
			    	$this->load->model('News');
					$res=$this->News->Update_Data($data1,$up_id);
					redirect('Admin/News');
		}
	    else
	    {
	    	$originalDate = $this->input->post('publish');
	    	echo $originalDate;
	    	//die();
			echo $newDate = date("Y-m-d", strtotime($originalDate));	
			die();
	    $data1 = array(
		'Title' => $this->input->post('course'),
		'Description' => $this->input->post('Desc'),
		'Publish_Date' => $newDate,
		'image' => $b
		);
		$this->load->model('News');
		$res=$this->News->Insert_Data($data1);
		if($res==true)
		{
		redirect('Admin/News');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/News');
		}
		}
	}*/


public function Insert()
	{
		$up_id = $this->input->post('bid');
		$originalDate = $this->input->post('pcont');
		$b="";
		$farr=array();
		$farr =explode("/",$originalDate); 
		$farr=array_reverse($farr);
		$newfdate1 =implode($farr,"/");
		$pub_dt=str_replace("/","-",$newfdate1);

		$config['upload_path'] = './uploads/News/';
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
					$originalDate = $this->input->post('publish');
				    $newDate = date("Y-m-d", strtotime($originalDate));	
					$data1 = array(
					'Title' => $this->input->post('course'),
					'Description' => $this->input->post('Desc'),
					'Publish_Date' => $pub_dt
					);
					}
					else
					{
			    	 $data1 = array(
					'Title' => $this->input->post('course'),
					'Description' => $this->input->post('Desc'),
					'Publish_Date' => $pub_dt,
					'image' => $b
					);
					}
			    	$this->load->model('news');
					$res=$this->news->Update_Data($data1,$up_id);
					redirect('Admin/News');
		}
	    else
	    {
	   
	    $data1 = array(
		'Title' => $this->input->post('course'),
		'Description' => $this->input->post('Desc'),
		'Publish_Date' => $pub_dt,
		'image' => $b
		);
		$this->load->model('news');
		$res=$this->news->Insert_Data($data1);
		if($res==true)
		{
		redirect('Admin/News');
		}
		else
		{
			echo "Your Data Is Not Inserted";
			redirect('Admin/News');
		}
		}
	}



public function Delete()
 {
 	$a= $_POST['id'];
	$data = array(
				'Title' => $this->input->post('course'),
				'Description' => $this->input->post('Desc'),
				'Publish_Date' => $this->input->post('publish')				
				);
	$this->load->model('news');
	$res=$this->news->dele($data,$a);
				if($res==true)
				{
				redirect('Admin/News');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/News');
				}
 	
 }
	
}
	
