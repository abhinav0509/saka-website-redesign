<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee1 extends CI_Controller {
	 var $globaldata;
     function __construct()
     {
	 
		
     	 parent::__construct();
		 $this->load->library("Pdf");
		 $this->load->database();
		
		 $var=$this->session->userdata;
	   	 if(isset($var['login_user']))
     	 {
          
          $this->globaldata=array(
		  'userdata'=>$var['login_user']
	       );
       }

     }
	 
	 
	 
	public function Save_Data()
	{
		$endt=$this->input->post('doa');
		$arr =explode("/",$endt); 
		$arr=array_reverse($arr);
		$str =implode($arr,"/");
		$str1=str_replace("/","-",$str);
		
		$s=$this->input->post('state');
		$city1=$this->input->post('city');
	    
		$query=$this->db->get_where('state',array('state_id'=>$s));
		$result=$query->result_array();
		$s1=$result[0]['name'];
		
		$query=$this->db->get_where('city',array('city_id'=>$city1));
		$result=$query->result_array();
		$s2=$result[0]['name'];
		$data=$this->globaldata['userdata'];
		$config['upload_path'] = './uploads/Emp/';
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
		
		
		
		$data1 = array(
		'cname' => $this->input->post('cname'),
		'address' => $this->input->post('add1'),
		'name' => $this->input->post('name'),
		'email' => $this->input->post('email'),
		'contact' => $this->input->post('contact'),
		'job_type' => $this->input->post('job'),
		'gender' => $this->input->post('gend'),
		'state' => $s1,
		'city' => $s2,
		'description' => $this->input->post('description'),
		'vacancy' => $this->input->post('vacancy'),
		'edate' => $str1,
		'status' =>'Hide',
		'image' => $b
		);
		
		        $this->load->model('employee_detail');
				$res=$this->employee_detail->Insert_Data($data1);
				if($res)
				{
					$data2['msg']="Record Save Successfully...!";
					print_r(json_encode($data2));
					
				}
				else
				{
					$data2['msg']="Error In Saving Record Please Try Again...!";
					print_r(json_encode($data2));
				}
		
	}
	
	
	public function Save_Admin_Data()
	{
		$endt=$this->input->post('doa');
		$arr =explode("/",$endt); 
		$arr=array_reverse($arr);
		$str =implode($arr,"/");
		$str1=str_replace("/","-",$str);
		
		$data=$this->globaldata['userdata'];
		
		//$up_id = $this->input->post('bid');
				$config['upload_path'] = './uploads/Emp/';
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
		
		
		
		$data1 = array(
		'cname' => $this->input->post('cname'),
		'address' => $this->input->post('add'),
		'name' => $this->input->post('name'),
		'email' => $this->input->post('mail'),
		'contact' => $this->input->post('cont'),
		'state' => $this->input->post('stat'),
		'city' => $this->input->post('city'),
		'vacancy' => $this->input->post('vacancy'),
		'edate' => $str1,
		'image' => $b
		);
		
		        $this->load->model('employee_detail');
				$res=$this->employee_detail->Admin_Insert_Data($data1);
				if($res==true)
				{
					redirect('Admin/EmployeeEnq');
					echo "Your Data Is Inserted Successfully";
				}
				else
				{
					echo "Your Data Is Not Inserted";
					redirect('Admin/EmployeeEnq');
				}
		
	}

public function Admin_Update()
		{
			$b="";
			$arr=array();
			$farr=array();
			$up_id = $this->input->post('bid');
			$config['upload_path'] = './uploads/Emp/';
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
			$endt=$this->input->post('doa');
			$arr =explode("/",$endt); 
			$arr=array_reverse($arr);
			$str =implode($arr,"/");
			$str1=str_replace("/","-",$str);

			$edt=$this->input->post('edt');
			$farr =explode("/",$edt); 
			$farr=array_reverse($farr);
			$strr =implode($farr,"/");
			$str2=str_replace("/","-",$strr);

		if($b!="")
		{
			$data1 = array(
		
						'cname' => $this->input->post('cname'),
						'address' => $this->input->post('add'),
						'name' => $this->input->post('name'),
						'email' => $this->input->post('mail'),
						'contact' => $this->input->post('cont'),
						'state' => $this->input->post('stat'),
						'city' => $this->input->post('city'),
						'description' => $this->input->post('description'),
						'vacancy' => $this->input->post('vacancy'),
						'edate' => $str1,
						'image' => $b
			);
			$this->load->model('employee_detail');
			$res=$this->employee_detail->Update_Admiossion($data1,$up_id);
			redirect('Admin/EmployeeEnq');
		}
		else if($b=="")
		{
			//$b='d.png';
			$data1 = array(
			
						'cname' => $this->input->post('cname'),
						'address' => $this->input->post('add'),
						'name' => $this->input->post('name'),
						'email' => $this->input->post('mail'),
						'contact' => $this->input->post('cont'),
						'state' => $this->input->post('stat'),
						'city' => $this->input->post('city'),
						'description' => $this->input->post('description'),
						'vacancy' => $this->input->post('vacancy'),
						'edate' => $str1
						//'image' => $b
			);

			$this->load->model('employee_detail');
			$res=$this->employee_detail->Update_Admiossion($data1,$up_id);
			redirect('Admin/EmployeeEnq');
		}	
											
	}

	public function Delete()
     {
     	$id=$_POST['id'];
     	$this->load->model('employee_detail');
     	$result=$this->employee_detail->Delete($id);
     	if($result)
     	{
     		$data['res']="success";
 	}
     	else
     	{
     		$data['res']="False";
     	}

     } 
	 
public function get_company_name()
 {
 	$name=$this->input->post('term');
 	$this->load->Model('employee_detail');
 	$this->employee_detail->get_cmp_name($name);
 }

	 
public function Active_Student_list()
 {
 	$name=$this->input->post('term');
 	$this->load->Model('employee_detail');
 	$this->employee_detail->Active_Stud($name);
 }



 
public function Change()
{
	$id=$_POST['id'];
	$name1=$_POST['name'];
	$data1 = array(
		'status' => $name1
		);
						$this->load->model('employee_detail');
						$res=$this->employee_detail->Update_Change($data1,$id);
						redirect('Admin/EmployeeEnq');
	
	
}	
}

	