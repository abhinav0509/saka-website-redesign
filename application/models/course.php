<?php
class Course extends CI_Model{
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
	
}

?>