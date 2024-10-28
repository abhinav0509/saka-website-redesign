<?php
class Rerecipt_data extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('acc_history',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	
	
	
public function Fran_Data_Enquiry_Update($data1,$up_id)
{

		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('acc_history', $data1); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}

	 
	 public function Del_Receipt($id)
    {
    	$this->db->where('id',$id);
		$query=$this->db->delete('acc_history'); 

    	if($query)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
	
public function get_name_stud($name,$session)
{
	$query = $this->db->query("SELECT name,tfee
            FROM admission
            WHERE name LIKE '%".$name."%' And f_id='".$session->cus_id."'
            GROUP BY name");
        echo json_encode($query->result_array());
}
	
public function get_name_stud1($name,$session)
{
	$query = $this->db->query("SELECT particular
            FROM acc_history
            WHERE particular LIKE '%".$name."%' and type='Income' and f_id='".$session->cus_id."'
            GROUP BY particular");
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
		$query=$this->db->delete('receipt');

		
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