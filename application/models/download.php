<?php
class Download extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('download',$data);
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
	$this->db->where('D_id',$a);
	$query=$this->db->delete('download');
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
		$this->db->where('D_id', $up_id);
		$query=$this->db->update('download', $data); 
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