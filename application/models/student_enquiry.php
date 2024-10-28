<?php
class Student_Enquiry extends CI_Model{
function __construct() {
parent::__construct();
}
public function Insert_Data($data1)
	{
		$this->load->database();
		$query=$this->db->insert('student_enquiry',$data1);
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
		$this->db->where('s_id',$a); 
		$query=$this->db->delete('student_enquiry');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}

public function dele1($data,$a)
{
		$this->load->database();
		$this->db->where('id',$a); 
		$query=$this->db->delete('franch_enquiry');
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