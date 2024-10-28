<?php
class Search_admin extends CI_Model{
function __construct() {
parent::__construct();
}

   public function front_admin_enq($fname,$from_dt,$to_dt)
   {
   	  if($from_dt!="" && $to_dt!="" && $fname=="")
   	  {
	   	  $this->db->where(array('enq_dt >='=>$from_dt));
	   	  $this->db->where(array('enq_dt <='=>$to_dt));
	   	  $query=$this->db->get('student_enquiry');
	   	  return $query->result_array();
	  }
	  else if($from_dt!="" && $to_dt!="" && $fname!="")
	  {
	  	  $this->db->where(array('enq_dt >='=>$from_dt));
	   	  $this->db->where(array('enq_dt <='=>$to_dt));
	   	  $this->db->where(array('fran_name'=>$fname));
	   	  $query=$this->db->get('student_enquiry');
	   	  return $query->result_array();
	  }
      else if($from_dt!="" && $to_dt=="" && $fname!="")
      {
      	   $this->db->where(array('enq_dt'=>$from_dt));
	   	   $this->db->where(array('fran_name'=>$fname));
	   	   $query=$this->db->get('student_enquiry');
	   	  return $query->result_array();
      }

   }

   public function getfrnd($name)	
	{

	       $query = $this->db->query("SELECT fran_name
	            FROM student_enquiry
	            WHERE fran_Name LIKE '%".$name."%' 
	            GROUP BY fran_name");
	        echo json_encode($query->result_array());
	}
     public function enquiry_convert($id)
    {
    	$query=$this->db->get_where('student_enquiry',array('s_id'=>$id));
    	$result=$query->result_array();
		  $fname=$result[0]['fran_name'];
		
		  $query1=$this->db->get_where('customers',array('fname'=>$fname));
    	$result1=$query1->result_array();
		  $a=$result1[0]['fran_id'];
		
		  $dt=date('Y-m-d');

    	foreach($result as $res)
    	{
    		$fid=$res['fran_id'];
    		$fnm=$res['fran_name'];
    		$frn_id=$res['fran_id'];
    		$st=$res['state_name'];
    		$st_id=$res['state_id'];
    		$ct=$res['city_name'];
    		$ct_id=$res['city_id'];
    		$snm=$res['name'];
    		$edt=$res['enq_dt'];
    		$cont=$res['contact'];
    		$email=$res['email'];
			  $course=$res['course'];
			}

    	$data=array(
           'f_id'=>$fid,
           'Franchisee_Name'=>$fnm,
           'f_State'=>$st_id,
           'f_City'=>$ct_id,
           'stud_name'=>$snm,
           'enq_date'=>$dt,
           'contact'=>$cont,
           'email'=>$email,
           'state'=>$st,
           'city'=>$ct,
           'Status'=>'CCA Admin',
		       'course'=>$course,
           'adm_enq_stat'=>'unread',
		        'fran_id'=>$a
    		);
    	
		
		    $this->db->select('quiz_cat_name');
        $this->db->from('quiz_category');
        $this->db->where('course',$course);
        $query=$this->db->get();		
		    $tot=$query->num_rows();
		    $data['total_module']=$tot;
		
		
		    $this->db->order_by('quiz_cat_name','asc');
		    $this->db->where('course',$course);
		    $this->db->limit(1,0);
		    $query1=$this->db->get('quiz_category');
		    $result=$query1->result_array();
	      $result[0]['quiz_cat_name'];
		    $data['module_id']=$result[0]['qid'];
		    $data['module']=$result[0]['quiz_cat_name'];


		  
      $ins_enq=$this->db->insert('enquiry',$data);
		  if($ins_enq)
    	  {
    	  	   $this->db->where(array('s_id'=>$id));
			       $this->db->delete('student_enquiry');
			       return true;
    	  }
    	  else
    	  {
    	  	   return false;
    	  }
    }



}