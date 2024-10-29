<?php
class Blog extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('tbl_blog',$data);
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
	$this->db->where('B_id',$a);
	$query=$this->db->delete('tbl_blog');
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
		$this->db->where('B_id', $up_id);
		$query=$this->db->update('tbl_blog', $data); 
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
	            FROM tbl_blog
	            WHERE Name LIKE '%".$term."%'
	            GROUP BY Title");
	        echo json_encode($query->result_array());
	}


	
}

?>