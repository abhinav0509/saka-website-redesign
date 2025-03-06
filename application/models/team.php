<?php
class Team extends CI_Model{

    function __construct() {
    parent::__construct();
}
function Insert_Team($data)
	{
		$this->load->database();
		$query=$this->db->insert('tbl_team',$data);
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
	$query=$this->db->delete('tbl_team');
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
}

public function Update_Team($data,$up_id)
	{
		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('tbl_team', $data); 
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
	            FROM tbl_team
	            WHERE Name LIKE '%".$term."%'
	            GROUP BY Title");
	        echo json_encode($query->result_array());
	}


	
}

?>