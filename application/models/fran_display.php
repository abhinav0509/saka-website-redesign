<?php
class Fran_display extends CI_Model{
function __construct() {
parent::__construct();
}

		
        public function count_enquery($session,$from_dt,$to_dt,$sname,$cname)
        {
        	$dt=date("Y-m-d");
				$array=array();
				if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					
					$array=array('f_id'=>$session->cus_id,'enq_date'=>$dt);
				}
				
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname!="")
				{
					$array=array('f_id'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && ($cname=="" || $cname!="" ))
				{
					$array=array('f_id'=>$session->cus_id,'stud_name'=>$sname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname!="" && ($cname=="" || $cname!="" ))
				{
					$array=array('f_id'=>$session->cus_id,'stud_name'=>$sname);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname!="" && ($cname=="" || $cname!="" ))
				{
					$array=array('f_id'=>$session->cus_id,'stud_name'=>$sname);
				}
				else if($from_dt!=$dt && $to_dt!="" && $sname=="" && $cname!="")
				{
					
					$array=array('f_id'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$cname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname!="")
				{
					$array=array('f_id'=>$session->cus_id,'course'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
				{
					$array=array('f_id'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					$array=array('f_id'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt);
				}
		    $this->load->database();
			$this->db->where($array);
			$query=$this->db->get("enquiry");
			return $query->num_rows();
		}


		public function daliy_enquiry($limit,$start,$session,$from_dt,$to_dt,$sname,$cname)
		{
				$dt=date("Y-m-d");
				$array=array();
				if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					$array=array('f_id'=>$session->cus_id);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname!="")
				{
					$array=array('f_id'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && ($cname=="" || $cname!="" ))
				{
					$array=array('f_id'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'stud_name'=>$sname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname!="" && ($cname=="" || $cname!="" ))
				{
					$array=array('f_id'=>$session->cus_id,'stud_name'=>$sname);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname!="" && ($cname=="" || $cname!="" ))
				{
					$array=array('f_id'=>$session->cus_id,'enq_date >='=>$from_dt,'stud_name'=>$sname);
				}

				else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname!="")
				{
					$array=array('f_id'=>$session->cus_id,'course'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					$array=array('f_id'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
				{
					$array=array('f_id'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt);
				}
   					
   					$this->db->order_by('enq_date','desc');
			        $this->db->where($array);
			        $this->db->limit($limit, $start);
			        $query=$this->db->get("enquiry"); 
			        if ($query->num_rows() > 0) {
			            foreach ($query->result() as $row) {
			                $data[] = $row;
			            }
			            return $data;
			        }
			        return false;
			     
 		}

public function get_certi_berfore_data_count1($ses,$sname)
{
	//$dt=date("Y-m-d");

    $array=array();
    if($sname!="")
      {
          
         $array=array('admission.name'=>$sname,'admission.e_status'=>'Complete');
      }
	  else
	  {
		 $array=array('admission.e_status'=>'Complete','admission.f_id'=>$ses->cus_id);
	  }
     
    $this->db->select('exm_status.status,exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
    $this->db->from('exm_status');
    $this->db->join('admission','exm_status.stud_id=admission.stud_id');
    $this->db->where($array);
    $this->db->group_by('admission.stud_id');
    $query=$this->db->get();
    return $query->num_rows();
}
      
public function get_certi_berfore_data1($limit,$start,$ses,$sname)
{

	 $array=array();
    if($sname!="")
      {
          
         $array=array('admission.name'=>$sname,'admission.e_status'=>'Complete');
      }
	  else
	  {
		 $array=array('admission.e_status'=>'Complete','admission.f_id'=>$ses->cus_id);
	  }
   
	          $this->db->limit($limit,$start);
              $this->db->select('exm_status.status,exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
              $this->db->from('exm_status');
              $this->db->join('admission','exm_status.stud_id=admission.stud_id');
              $this->db->where($array);
              $this->db->group_by('admission.stud_id');
              $this->db->order_by('exm_status.exm_date','desc');
              $query=$this->db->get();
              return $query->result_array();
}





public function get_certi_berfore_data_count12($from_dt,$to_dt,$stud,$course,$session)
{
	$dt=date("Y-m-d");

    $array=array();
    if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud=="")
      {
          
          $this->db->where(array('status'=>'Issued','f_id'=>$session->cus_id));
          $this->db->order_by('id','desc');
          $query=$this->db->get('before_certi');
          return $query->num_rows();
      }
      else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud=="")
      {
        
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud=="")
      {
        
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }

      /*******************course Wise************************/
      
      else if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud=="")
      {
         
         $array=array('course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud=="")
      {
         
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }

      /*********************************Student Wise**********************************/

      else if($from_dt==$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="")
      {
         
         $array=array('stud_name'=>$stud,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="")
      {
  
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && ($course!="" || $course=="") && $stud!="")
      {
         
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      

      
      $this->db->where($array);
      $this->db->order_by('id','desc');
      $query=$this->db->get('before_certi');
      return $query->num_rows();
}
      
public function get_certi_berfore_data11($limit,$start,$from_dt,$to_dt,$stud,$course,$session)
{
    $dt=date("Y-m-d");

    $array=array();
    if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud=="")
      {
          $this->db->limit($limit,$start);
          $this->db->where(array('status'=>'Issued','f_id'=>$session->cus_id));
          $this->db->order_by('id','desc');
          $query=$this->db->get('before_certi');
          return $query->result_array();
      }
      else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud=="")
      {
        
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud=="")
      {
        
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }

      /*******************course Wise************************/
      
      else if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud=="")
      {
         
         $array=array('course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud=="")
      {
         
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }

      /*********************************Student Wise**********************************/

      else if($from_dt==$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="")
      {
         
         $array=array('stud_name'=>$stud,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="")
      {
  
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && ($course!="" || $course=="") && $stud!="")
      {
         
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Not Issued','f_id'=>$session->cus_id);
      }
      

      $this->db->limit($limit,$start);
      $this->db->where($array);
      $this->db->order_by('id','desc');
      $query=$this->db->get('before_certi');
      return $query->result_array();
}

public function get_certi_stud($name,$session)
{
	$query = $this->db->query("SELECT stud_name
                FROM before_certi
                Where stud_name LIKE '%".$name."%' AND f_id='".$session->cus_id."' AND status='Issued'
                GROUP BY stud_name");
    echo json_encode($query->result_array());
}


public function getTotAdmission($fdata)
{
    $query=$this->db->get_where('admission',array('f_id'=>$fdata->cus_id));
    return $query->num_rows();
}

public function getTotOrders($fdata)
{
    $query=$this->db->get_where('forder',array('f_id'=>$fdata->cus_id));
    return $query->num_rows();	
}
public function getTotCerti($fdata)
{
	 $this->db->select('admission.name,issued_certificates.certi_id');
	 $this->db->from('admission');
	 $this->db->join('issued_certificates','admission.id=issued_certificates.siid');
	 $this->db->where('admission.f_id',$fdata->cus_id);
	 $query=$this->db->get();
	 return $query->num_rows();
}



}