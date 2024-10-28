<?php
class News extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('news',$data);
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
		$this->db->where('n_id',$a); 
		$query=$this->db->delete('news');
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
		$this->db->where('n_id', $up_id);
		$query=$this->db->update('news', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	

public function save_job_card($data)
{
      $this->load->database();
		$query=$this->db->insert('jobcard',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}

public function update_job_card($data,$up_id)
{
      $this->load->database();
	$this->db->where('id', $up_id);
    $query=$this->db->update('jobcard', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}

public function getfrnenq($term)
	{
		$query = $this->db->query("SELECT fname
	            FROM jobcard
	            WHERE fname LIKE '%".$term."%'
	            GROUP BY fname");
	        echo json_encode($query->result_array());
	}

}
?>