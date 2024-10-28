<?php
class Employee_Detail extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('employeeenquiry',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
public function Update_Admiossion($data,$up_id)
	{
		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('employeeenquiry', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}

public function Update_Change($data,$id)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$query=$this->db->update('employeeenquiry', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}

function Admin_Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('employeeenquiry',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}

public function get_cmp_name($name)
{
	$query = $this->db->query("SELECT cname
            FROM employeeenquiry
            WHERE cname LIKE '%".$name."%'
            GROUP BY cname");
        echo json_encode($query->result_array());
}

public function Active_Stud($name)
{
	$query = $this->db->query("SELECT institute_name
            FROM customers_info
            WHERE institute_name LIKE '%".$name."%'
            GROUP BY institute_name");
        echo json_encode($query->result_array());
}

	
	 
	 public function Delete($id)
    {
    	$query=$this->db->delete('employeeenquiry', array('id' => $id)); 

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