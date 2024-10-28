<?php
class Insert_About extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('about',$data);
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