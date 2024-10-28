<?php
class Noti_mod extends CI_Model{
function __construct() {
parent::__construct();
}

public function get_front_fran_enq_noti()
  {
    $this->db->where('n_status','unread');
    $query=$this->db->get('franch_enquiry');
    return $query->result_array();
  }
  public function get_front_stud_enq_noti()
  {
    
    $this->db->where('n_status','unread');
    $query=$this->db->get('student_enquiry');
    return $query->result_array();
  }
  public function get_act_stud_enq_noti()
  {
  	 $this->db->where('n_status','unread');
     $query=$this->db->get('enquiry');
     return $query->result_array();
  }
  public function get_act_stud_add_noti()
  {
  	  $this->db->where('n_status','unread');
      $query=$this->db->get('admission');
      return $query->result_array();
  }



  public function front_stud_enq_noti_status($status)
  {
	    $this->db->set("n_status",$status);
	    $this->db->where('n_status','unread');
	    $this->db->update('student_enquiry');
  }
  public function front_fran_enq_noti_status($status)
  {
  		$this->db->set("n_status",$status);
	    $this->db->where(array('n_status'=>'unread'));
	    $this->db->update('franch_enquiry');
  }
  public function Act_fran_stud_enq_status($status)
  {
  		$this->db->set("n_status",$status);
	    $this->db->where(array('n_status'=>'unread'));
	    $this->db->update('enquiry');
  }
  public function Act_fran_stud_add_status($status)
  {
  	    $this->db->set("n_status",$status);
	    $this->db->where(array('n_status'=>'unread'));
	    $this->db->update('admission');
  }
 public function Franch_admission_del_by_check($arraydata)
 {
     
     foreach($arraydata as $arr)
     {
         $this->db->where('id',$arr);
         $query=$this->db->delete('admission');  
     }
     if($query)
     {
        return true;
     }
     else
     {
        return false;
     }
 }

 public function admission_del_from_admin($action,$arraydata)
 {
     if($action=="Delete")
     {
         foreach($arraydata as $arr)
         {
            $this->db->where('id',$arr);
            $query=$this->db->delete('admission');
         }   
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
 public function act_stud_enq_from_admin_del($action,$arraydata)
 {
     if($action=="Delete")
     {
         foreach($arraydata as $arr)
         {
            $this->db->where('id',$arr);
            $query=$this->db->delete('enquiry');
         }   
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


 public function Franch_enquiry_del_by_check($action,$arraydata)
 {
      if($action=="Delete")
      {
         foreach($arraydata as $arr)
         {
            $this->db->where('id',$arr);
            $query=$this->db->delete('enquiry');
         }   
         if($query)
         {
            return true;
         }
         else
         {
            return false;
         }
      }
      else if($action=="Active")
      {
           $dt=date('Y-m-d');
           foreach($arraydata as $arr)
           {
              $query=$this->db->get_where('enquiry',array('id'=>$arr));
              $result=$query->result_array();
              
              foreach($result as $res)
              {
                $fid=$res['f_id'];
                $fran_id=$res['fran_id'];
                $fname=$res['Franchisee_Name'];
                $stud_name=$res['stud_name'];
                $email=$res['email'];
                $add=$res['sadd'];
                $contact=$res['contact'];
                $state_id=$res['state_id'];
                $city_id=$res['city_id'];
                $course=$res['course'];
                $center=$res['fran_id'];
                $remark=$res['remark'];

                
              }
                  $this->db->select("Max(ad_id) As iddd");
                  $this->db->where('f_id',$fid);
                  $query=$this->db->get('admission');
                  $des=$query->result_array();
                  $iid1=$des[0]['iddd'];
                   if($iid1=="")
                   {
                    $iid1=1;
                   }
                   else
                   {
                    $iid1=$iid1+1;
                   }
                   $frr=substr($fname,0,3);
                   $str1=substr($fran_id,0,-1);
                  $stud_id=$fran_id."/".$iid1;
              
              $data=array(
                 'fran_Name'=>$fname,
                 'f_id'=>$fid,
                 'ad_id'=>$iid1,
                 'stud_id'=>$stud_id,
                 'name'=>$stud_name,
                 'email'=>$email,
                 'add'=>$add,
                 'contact'=>$contact,
                 'state'=>$state_id,
                 'city'=>$city_id,
                 'course_Name'=>$course,
                 'center_name'=>$center,
                 'course_date'=>$dt,
                 'exm_status'=>'notactive',
                 'remark'=>$remark,
                 'n_status'=>'unread',
                 'O_Status'=>0,
                 'n_status'=>'unread'
                 
                );

              $query3=$this->db->insert('admission',$data);
              $this->db->where('id',$arr);
              $this->db->delete('enquiry');

      
           }
          if($query3)
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