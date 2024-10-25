<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense extends CI_Controller {
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
		'particular' => $this->input->post('parti'),
		'naration' => $this->input->post('naration'),
		'edate' => $str1,
		'amount' => $this->input->post('amout')
		);
		
		        $this->load->model('expense_data');
				$res=$this->expense_data->Insert_Data($data1);
				if($res==true)
				{
					redirect('Franchisee/Expense');
					echo "Your Data Is Inserted Successfully";
				}
				else
				{
					echo "Your Data Is Not Inserted";
					redirect('Franchisee/Expense');
				}
		
	}
	
	
public function Update_Expense()
{
					$up_id = $this->input->post('bid');
					$endt=$this->input->post('pcontt');
					$arr =explode("/",$endt); 
					$arr=array_reverse($arr);
					$str =implode($arr,"/");
					$str1=str_replace("/","-",$str);

					$data1 = array(
					'particular' => $this->input->post('parti'),
					'naration' => $this->input->post('naration'),
					'amount' => $this->input->post('amout'),
					'edate'=>$str1
					
		            );
					$this->load->model('expense_data');
					$res=$this->expense_data->Update_Expense($data1,$up_id);
					redirect('Franchisee/Expense');
			    	
}

	public function Expense_Delete()
     {
     	$id=$_POST['id'];
     	$this->load->model('expense_data');
     	$result=$this->expense_data->Del_Expense($id);
     	if($result)
     	{
     		$data['res']="success";

     	}
     	else
     	{
     		$data['res']="False";
     	}

     } 

public function get_stud_name()
 {
	$name=$this->input->post('term');
 	$this->load->Model('rerecipt_data');
	$this->rerecipt_data->get_name_stud($name);
 }
 
public function get_stud_name1()
 {
	$name=$this->input->post('term');
 	$this->load->Model('rerecipt_data');
	$this->rerecipt_data->get_name_stud1($name);
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
				echo "Your Data Is Not Inserted";
				redirect('Franchisee/placement');
				}

}
		
public function Delete1()
 {
 	$a= $_POST['id'];
    $this->load->Model('expense_data');
	$res=$this->expense_data->Delete1($a);
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
?>
	