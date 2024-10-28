<?php
class Demo_mod extends CI_Model{
function __construct() {
parent::__construct();
$this->load->library("Pdf");
}


public function get_stud_id()
{
	 $this->db->order_by('user_id','Asc');
	 $query=$this->db->get_where('active_stud',array('u_status !='=>'updated'));
	 return $query->result_array();

}

public function Other_det($sid)
{
	$query=$this->db->get_where('active_stud',array('user_id'=>$sid));
	return $query->result_array();
}

public function Other_det1($sid)
{
	$query=$this->db->get_where('exm_status',array('stud_id'=>$sid));
	return $query->result_array();
}

public function update_data($st_id,$data,$act_data)
{
	 $this->db->where('stud_id',$st_id);
	 $query=$this->db->update('admission',$data);
	 if($query)
	 {
	 	  $this->db->where('user_id',$st_id);
	 	  $query1=$this->db->update('active_stud',$act_data);
	 	  if($query1)
	 	  {
	 	  	 return true;
	 	  }
	 	  else
	 	  {
	 	  	 return false;
	 	  }
	 }	
}




}


