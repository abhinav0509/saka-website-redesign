<?php
class Order extends CI_Model{
function __construct() {
parent::__construct();
}

function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('order',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
public function dele($data,$a)
{
		$this->load->database();
		$this->db->where('O_Id',$a); 
		$query=$this->db->delete('order');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}
public function Update_Data($data,$up_id)
	{
		
	}
}
?>