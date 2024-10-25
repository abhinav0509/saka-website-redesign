<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddState extends CI_Controller 
{
	
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
				$data1 = array(
					'name' => $this->input->post('stat'),
					);
			    	$this->load->model('new_state');
					$res=$this->new_state->Update_Data($data1,$up_id);
					redirect('Admin/state1');
				
		}
		else
		{
		 	$data1 = array(
			'name' => $this->input->post('stat'),
		);
			$this->load->model('new_state');
			$res=$this->new_state->Insert_Data($data1);
			if($res==true)
			{
			redirect('Admin/state1');
			}
			else
			{
			echo "Your Data Is Not Inserted";
			redirect('Admin/state1');
			}
		
		}
	}
public function Delete()
 {
 	$a= $_POST['id'];
	$this->load->model('new_state');
	$res=$this->new_state->dele($a);
				if($res==true)
				{
				redirect('Admin/state1');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/state1');
				}
 	
 }
	
}
	
