<?php
class Testimonial extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('testimonial',$data);
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
	$this->db->where('T_id',$a);
	$query=$this->db->delete('testimonial');
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
		$this->db->where('T_id', $up_id);
		$query=$this->db->update('testimonial', $data); 
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
	            FROM testimonial
	            WHERE Name LIKE '%".$term."%'
	            GROUP BY Name");
	        echo json_encode($query->result_array());
	}


	
}

?>