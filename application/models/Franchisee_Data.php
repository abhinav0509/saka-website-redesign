<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Franchisee_Data extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function Insert()
	{
	  $data = array(
	 'Name' =>$this->input->post('fname'),
	 'Inst_name' =>$this->input->post('insname'),
	 'Badd' =>$this->input->post('add'),
	 'State' =>$this->input->post('stat'),
	 'City' =>$this->input->post('cit'),
	 'Email' =>$this->input->post('fmail'),
	 'Contact' =>$this->input->post('cont'),
	 'Mobile' =>$this->input->post('mob'),
	 'Branch' =>$this->input->post('bran'),
	 'Location' =>$this->input->post('loc'),
	 'uname' =>$this->input->post('username'),
	 'password' =>$this->input->post('pwd'),
	 'status' =>$this->input->post('status')
		 );
	
	$data1=array(
			'email' =>$this->input->post('username'),
			'pass' =>$this->input->post('pwd'),
			'user_type' =>'Franchisee',
			'status' =>$this->input->post('status')
		);
		
		
		
		/************To Delete the Record****************************
		$data2 = array(
	 'Name' =>$this->input->post('fname'),
	 'Inst_name' =>$this->input->post('insname'),
	 'Badd' =>$this->input->post('add'),
	 'State' =>$this->input->post('stat'),
	 'City' =>$this->input->post('cit'),
	 'Email' =>$this->input->post('fmail'),
	 'Contact' =>$this->input->post('cont'),
	 'Mobile' =>$this->input->post('mob'),
	 'Applyt_place' =>$this->input->post('place'),
	 'District' =>$this->input->post('dist'),
	 'Call_on' =>$this->input->post('cal_date'),
	 'Call_Time' =>$this->input->post('cal_time'),
	 'No_computer' =>$this->input->post('tot_comp'),
	 'No_emp' =>$this->input->post('tot_emp'),
	 'No_trainer' =>$this->input->post('tot_trainer'),
	 'No_counselor' =>$this->input->post('tot_cons'),
	 'Since_year' =>$this->input->post('since_year'),
	 'To_year' =>$this->input->post('to_year'),
	 'Stud_pass_prev' =>$this->input->post('stud_perv'),
	 'No_year_buis' =>$this->input->post('no_buis'),
	 'Branch' =>$this->input->post('bran'),
	 'Location' =>$this->input->post('loc'),
	 'username' =>$this->input->post('username'),
	 'password' =>$this->input->post('pwd')
	 );
		
		 /*************************************************************/
		$this->load->model('fran_data');
		$res=$this->fran_data->Insert_Data($data,$data1,$data2);
		if($res==true)
		{
		redirect('Admin/Fran_Enquiry');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/Fran_Enquiry');
		}
	 
	}

	public function Delete()
	{
		$id=$_POST['id'];
		$this->db->where('id',$id);
		$query=$this->db->delete('franch_enquiry');
		if($query)
		{
			$data['message']="Record Deleted....!";
			print_r(json_encode($data));
		}
		else
		{
			$data['message']="Error In Deleting The Record....!";
			print_r(json_encode($data));
		}
	}

	
}