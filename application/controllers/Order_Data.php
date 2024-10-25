<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_Data extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	public function Insert()
	{
	    //$up_id = $this->input->post('bid');
					 $data = array(
		'Customer_Name' => $this->input->post('fname'),
		'Contact' => $this->input->post('cont'),
		'Book_Name' => $this->input->post('book1'),
		'Quanitity' => $this->input->post('price'),
		//'Status' => $this->input->post('Desc'),
		'Payment_Mode' => $this->input->post('qty'),
		'price' => $this->input->post('pmode')
		//'total' => $this->input->post('Desc')
		);
		$this->load->model('order');
		$res=$this->order->Insert_Data($data);
		if($res==true)
		{
		redirect('Franchisee/Book_Order');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Franchisee/Book_Order');
		}
	}
	
 public function Delete()
 {
 	$a= $_POST['O_Id'];
	$data = array(
				'Customer_Name',
				'Contact',
				'Email',
				'Book_Name',
				'Author_Name',
				'Quanitity',
				'Status',
				'Payment_Mode'
				);
	$this->load->model('order');
	$res=$this->order->dele($data,$a);
				if($res==true)
				{
				redirect('Admin/Order');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/Book');
				}
 	
 }
	
}