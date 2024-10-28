<?php
class Paper_mod extends CI_Model{
function __construct() {
parent::__construct();
}


 public function course_res()
    {
    	   $this->db->select('Course_Name');
	       $query=$this->db->get('course');
	       return $query->result_array();
    }
 public function Exame_get($cname)
 {
 	 $this->db->select('qid,quiz_cat_name');
 	 $this->db->where('course',$cname);
     $this->db->from('quiz_category');
     $query=$this->db->get();
     return $query->result_array();
 }
 public function save_paper($data)
 {
 	 $query=$this->db->insert('quiz',$data);
 	 if($query)
 	 {
 	 	 return true;
 	 }
 	 else
 	 {
 	 	return false;
 	 }
 } 

 public function update_paper($data,$up_id)
 {
 	 $this->db->where('quiz_id',$up_id);	
 	 $query=$this->db->update('quiz',$data);
 	 if($query)
 	 {
 	 	 return true;
 	 }
 	 else
 	 {
 	 	return false;
 	 }
 }
 public function Set_Exame_det_count($module)
 {
     $this->db->where('quiz_cat_id',$module);
     $query=$this->db->get('quiz');
     return $query->num_rows();
 }
 public function Set_Exame_det($course,$module,$pindex)
 {
 	 if($pindex=="")
 	 {
 	 	$pindex=1;
 	 }
 	 $start=($pindex-1)*10;
 	 $limit=10; 
     $this->db->limit($limit,$start);
 	 $this->db->select('quiz_category.course,quiz.quiz_id,quiz.quiz_cat_id,quiz.question,quiz.option_a,quiz.option_b,quiz.option_c,quiz.option_d,quiz.answer');
     $this->db->from('quiz_category');
     $this->db->join('quiz','quiz_category.qid = quiz.quiz_cat_id'); 	
 	 $this->db->where(array('quiz.quiz_cat_id'=>$module));
 	 $query=$this->db->get();
 	 return $query->result_array();
 }
  
  public function ques_get($name,$id)
  {
  	       $query = $this->db->query("SELECT question,quiz_id
              FROM quiz
              WHERE quiz_cat_id='".$id."'  AND  question LIKE '%".$name."%' 
              GROUP BY question");
          echo json_encode($query->result_array());
  }
  public function q_get($id)
  {
  	$this->db->where('quiz_id',$id);
  	$query=$this->db->get('quiz');
  	return $query->result_array();
  }
  public function Set_Exame_det1($id)
  {
  	$this->db->where('quiz_cat_id',$id);
  	$query=$this->db->get('quiz');
  	return $query->result_array();
  }

}