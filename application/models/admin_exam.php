<?php
class Admin_Exam extends CI_Model{
function __construct() {
parent::__construct();
}

public function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('exam_module',$data);
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
		$query=$this->db->update('about', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	
public function Module123($data)
{
		$this->load->database();
		$sql="select Module_Name from exam_module where Course_Name='$b'";
		$res1=mysql_query($sql);
		$row=mysql_fetch_array($res1);
		if($row)
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
		$query=$this->db->delete('about');
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

