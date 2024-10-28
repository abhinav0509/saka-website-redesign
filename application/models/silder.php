<?php
//error_reporting(0);
class Silder extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data1)
	{
		$this->load->database();
		$query=$this->db->insert('slider',$data1);
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
		$this->db->where('S_id',$a); 
		$query=$this->db->delete('slider');
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
		$this->db->where('S_id', $up_id);
		$query=$this->db->update('slider', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	public function getslide($term)
	{
		$query = $this->db->query("SELECT Caption
	            FROM slider
	            WHERE Caption LIKE '%".$term."%'
	            GROUP BY Caption");
	        echo json_encode($query->result_array());
	}
	
	
}

?>