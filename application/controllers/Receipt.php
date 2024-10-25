<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Receipt extends CI_Controller {
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

		$up_id = $this->input->post('bid');
		$data=$this->globaldata['userdata'];
		$endt=$this->input->post('pcontt');
		$arr =explode("/",$endt); 
		$arr=array_reverse($arr);
		$str =implode($arr,"/");
		$str1=str_replace("/","-",$str);
		$fran_id=$data->fran_id;
		$fid=$data->cus_id;
		
		$data1 = array(
		'f_id' => $fid,
		'r_id' => $this->input->post('mid'),
		'particular' => $this->input->post('sname'),
		'adate' => $str1,
		'installment' => $this->input->post('install'),
		'current_pay' => $this->input->post('camt'),
		'total_fee' => $this->input->post('amt'),
		'type'=>'Income'
		);
		
		        $this->load->model('rerecipt_data');
				$res=$this->rerecipt_data->Insert_Data($data1);
				if($res==true)
				{
					redirect('Franchisee/Receipt');
					//echo "Your Data Is Inserted Successfully";
				}
				else
				{
					//echo "Your Data Is Not Inserted";
					redirect('Franchisee/Receipt');
				}
		
	}
	
	
public function Update_Receipt()
{
					$up_id = $this->input->post('bid');
					$endt=$this->input->post('pcontt');
					$arr =explode("/",$endt); 
					$arr=array_reverse($arr);
					$str =implode($arr,"/");
					$str1=str_replace("/","-",$str);

					$data1 = array(
					'particular' => $this->input->post('sname'),
					'adate' => $str1,
					'installment' => $this->input->post('install'),
					'current_pay' => $this->input->post('camt'),
					'total_fee' => $this->input->post('amt'),
		            );
		            
					$this->load->model('rerecipt_data');
					$res=$this->rerecipt_data->Fran_Data_Enquiry_Update($data1,$up_id);
					redirect('Franchisee/Receipt');
			}

	public function Receipt_Delete()
     {
     	$id=$_POST['id'];
		$this->load->model('rerecipt_data');
     	$result=$this->rerecipt_data->Del_Receipt($id);
     	if($result)
     	{
     		$data['res']="success";
			print_r(json_encode($data));
     	}
     	else
     	{
     		$data['res']="False";
			print_r(json_encode($data));
     	}

     } 

public function get_stud_name()
 {
	$name=$this->input->post('term');
 	$this->load->Model('rerecipt_data');
	$this->rerecipt_data->get_name_stud($name,$this->globaldata['userdata']);
 }
 
public function get_stud_name1()
 {
	$name=$this->input->post('term');
 	$this->load->Model('rerecipt_data');
	$this->rerecipt_data->get_name_stud1($name,$this->globaldata['userdata']);
 }
public function getname()
{
$name=$_POST['name'];
//echo $name;
	$this->load->model('rerecipt_data');
	$res=$this->rerecipt_data->get($name);
				if($res==true)
				{
				redirect('Franchisee/placement');
				}
				else
				{
				//echo "Your Data Is Not Inserted";
				redirect('Franchisee/placement');
				}

}
	 
	 
public function getadmissionsinglepdf()
{
    $id=$_GET['id'];
    $this->load->model("rerecipt_data");
    $this->rerecipt_data->getaddsinglepdf($id);
}


		
public function Delete1()
 {
 	$a= $_POST['id'];
    $this->load->Model('rerecipt_data');
	$res=$this->rerecipt_data->Delete1($a);
	if($res)
	{
		 $data['message']="Expense Deleted.....!";
		 print_r(json_encode($data));
	}
	else
	{
		 $data['message']="Error In Deleting Expense.....!";
		 print_r(json_encode($data));
	}
 }	 
}	