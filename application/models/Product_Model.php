<?php
class Product_Model extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('tbl_product',$data);
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
	$this->db->where('id',$a);
	$query=$this->db->delete('tbl_product');
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
		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('tbl_product', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}


public function getdata1($term)
	{
		$query = $this->db->query("SELECT Name
	            FROM tbl_product
	            WHERE Name LIKE '%".$term."%'
	            GROUP BY Title");
	        echo json_encode($query->result_array());
	}


	
}

?>