<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function Insert()
	{
		$up_id = $this->input->post('bid');
		
		
					if($up_id!="")
					{
				
					$data = array(
						'ftype'=> $this->input->post('type'),
						'fname'=> $this->input->post('name'),
						'Addd' => $this->input->post('add'),
						'Contact' => $this->input->post('cont'),
						'email' => $this->input->post('eml')
						);
				
					
			    	$this->load->model('contact_data');
					$res=$this->contact_data->Update_Data($data,$up_id);
					redirect('Admin/Contact');
			    	 }
	     else
	    {
	    		$data = array(
				'ftype'=> $this->input->post('type'),
				'fname'=> $this->input->post('name'),
				'Addd' => $this->input->post('add'),
				'Contact' => $this->input->post('cont'),
				'email' => $this->input->post('eml')
				);
			$this->load->model('contact_data');
			$res=$this->contact_data->Insert_Data($data);
			if($res==true)
			{
			redirect('Admin/Contact');
			}
			else
			{
			echo "Your Data Is Not Inserted";
			redirect('Admin/Contact');
			}
		}
	}
	
	 public function record()
    {
    	
        $this->load->model('mymodel');
        $this->load->view('main1');
        $this->load->view('disp_records',$data);

    }
	
	
	
	
public function Delete()
 {
 	$a= $_POST['id'];
	$data = array(
				'ftype'=> $this->input->post('type'),
				'fname'=> $this->input->post('name'),
				'Addd' => $this->input->post('add'),
				'Contact' => $this->input->post('cont'),
				'email' => $this->input->post('eml')
				);
	$this->load->model('contact_data');
	$res=$this->contact_data->dele($data,$a);
				if($res==true)
				{
				redirect('Admin/Contact');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/Contact');
				}
 	
 }
}