<?php
class Expense_data extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('expense',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	
	
	
public function Update_Expense($data1,$up_id)
{

		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('expense', $data1); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}

	 
	 public function Del_Expense($id)
    {
    	$query=$this->db->delete('expense', array('id' => $id)); 

    	if($query)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
	
public function get_name_stud($name)
{
	$query = $this->db->query("SELECT sname
            FROM receipt
            WHERE sname LIKE '%".$name."%'
            GROUP BY sname");
        echo json_encode($query->result_array());
}
	
public function get_name_stud1($name)
{
	$query = $this->db->query("SELECT sname
            FROM receipt
            WHERE sname LIKE '%".$name."%'
            GROUP BY sname");
        echo json_encode($query->result_array());
}	

public function get($name)
{		
		echo $name;
		die();
		$this->load->database();
       	$arr=array();
		if($name!="")
		{
		$arr=array('sname'=>$name);
		}
		
$this->db->where($arr);
$query=$this->db->get('receipt');
echo $query;
return $query->num_rows();

		
}
public function Delete1($a)
	{
		$this->db->where('id',$a); 
		$query=$this->db->delete('expense');

		
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