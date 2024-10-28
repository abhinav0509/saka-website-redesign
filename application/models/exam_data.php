<?php
class Exam_Data extends CI_Model{
function __construct() {
parent::__construct();
}

public function get_Exam_count()
{
    return $this->db->count_all("quiz_category");
}
public function get_exame_data($limit,$start)
{
    $this->db->limit($limit, $start); 
    $query = $this->db->get("quiz_category");
     
    if ($query->num_rows() > 0) {
       foreach ($query->result() as $row) {
                $data[] = $row;
          }
          return $data;
    }
    return false;
}
public function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('quiz_category',$data);
		if($query)
		{
		  return true;
		}
		else
		{
		return false;
		}
	}

	public function Delete_question($id)
	{
		$this->db->where('quiz_id',$id);
		$query=$this->db->delete('quiz');
		if($query)
		{
			 return true;
		}
		else
		{
			 return false;
		}
	}
public function dele($a)
{
		$this->load->database();
		$this->db->where('qid',$a); 
		$query=$this->db->delete('quiz_category');
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
		$this->db->where('qid', $up_id);
		$query=$this->db->update('quiz_category', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		 return false;
		}
	}

    public function course_res()
    {
    	$this->db->select('Course_Name');
        $query=$this->db->get('course');
        return $query->result_array();
    }




}




?>