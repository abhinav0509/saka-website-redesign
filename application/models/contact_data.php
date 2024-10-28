<?php
class Contact_Data extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('contact',$data);
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
	$query=$this->db->delete('contact');
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
		$query=$this->db->update('contact', $data); 
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