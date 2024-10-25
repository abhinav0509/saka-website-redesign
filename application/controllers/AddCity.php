<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddCity extends CI_Controller 
{
	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	 
	 
	
	public function Insert()
	{
		 $up_id = $this->input->post('bid');
		 $up_id1 = $this->input->post('stat');
		 //echo $up_id1;
		 //die();
		 if($up_id!="")
	    {
				$data1 = array(
					'name' => $this->input->post('cit'),
					
					);
			    	$this->load->model('new_city');
					$res=$this->new_city->Update_Data($data1,$up_id);
					redirect('Admin/city1');
				
		}
		else
		{
		 	$data1 = array(
			
			'name' => $this->input->post('cit'),
			'state_id'=>$up_id1
		);
			$this->load->model('new_city');
			$res=$this->new_city->Insert_Data($data1);
			if($res==true)
			{
			redirect('Admin/city1');
			}
			else
			{
			echo "Your Data Is Not Inserted";
			redirect('Admin/city1');
			}
		
		}
	}
public function Delete()
 {
 	$a= $_POST['id'];
	$this->load->model('new_city');
	$res=$this->new_city->dele($a);
				if($res==true)
				{
				redirect('Admin/city1');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/city1');
				}
 	
 }
	
}
	
