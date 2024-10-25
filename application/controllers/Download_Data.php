<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_Data extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function Insert()
	{
		$up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/Download/';
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
					'Download_Name' => $this->input->post('nm'),
					'Role' => $this->input->post('role')
					);
					}
					else
					{
					$data = array(
					'Download_Name' => $this->input->post('nm'),
					'Role' => $this->input->post('role'),
					'Image' => $b
					);
					}
					
			    	$this->load->model('download');
					$res=$this->download->Update_Data($data,$up_id);
					redirect('Admin/Download');
			    	 
	    }
	    else
	    {
	    $data = array(
		'Download_Name' => $this->input->post('nm'),
		'Role' => $this->input->post('role'),
		'Image' => $b
		);
		$this->load->model('download');
		$res=$this->download->Insert_Data($data);
		if($res==true)
		{
		redirect('Admin/Download');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/Download');
		}
		}
	}
	
	 public function record()
    {
    	
        $this->load->model('mymodel');
        //$this->mymodel->disp();

        
       $this->load->view('main1');
        $this->load->view('disp_records',$data);

    }
	
	
	
	
public function Delete()
 {
 	$a= $_POST['D_id'];
	//echo $a;
	//die("Stop");
	 $data = array(
		
		'Download_Name' => $this->input->post('nm'),
		'Image' => $this->input->post('upload'),
		'Role' => $this->input->post('role')
		);
	$this->load->model('download');
	$res=$this->download->dele($data,$a);
				if($res==true)
				{
				redirect('Admin/Download');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/Download');
				}
 	 }
}