<?php
class Placement extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('placement',$data);
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
	$this->db->where('Pl_id',$a);
	$query=$this->db->delete('placement');
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
		$this->db->where('Pl_id', $up_id);
		$query=$this->db->update('placement', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}	
	
}

?>