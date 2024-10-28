<?php
class Course_Module_Data extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('course',$data);
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
		$query=$this->db->delete('course');
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
		$query=$this->db->update('course', $data); 
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