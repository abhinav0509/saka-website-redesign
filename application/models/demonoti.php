<?php
class DemoNoti extends CI_Model{
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
         $query=$this->db->delete('demoadmission');  
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
            $query=$this->db->delete('demoenquiry');
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
           $ss=0;
           $cnt=count($arraydata);
           foreach($arraydata as $arr)
           {
              $query=$this->db->get_where('demoenquiry',array('id'=>$arr));
              $result=$query->result_array();
              
              foreach($result as $res)
              {
                $fid=$res['fid'];
                $fname=$res['Franchisee_Name'];
                $stud_name=$res['stud_name'];
                $email=$res['email'];
                $add=$res['sadd'];
                $contact=$res['contact'];
                $state_id=$res['state_id'];
                $city_id=$res['city_id'];
                $course=$res['course'];
                $remark=$res['remark'];

                
              }
                  
              
              $data=array(
                 'fran_Name'=>$fname,
                 'fid'=>$fid,
                 'name'=>$stud_name,
                 'email'=>$email,
                 'add'=>$add,
                 'contact'=>$contact,
                 'state'=>$state_id,
                 'city'=>$city_id,
                 'course_Name'=>$course,
                 'center_name'=>$fname,
                 'course_date'=>$dt,
                 'exm_status'=>'notactive',
                 'remark'=>$remark,
                 'n_status'=>'unread',
                 'O_Status'=>0,
                 'n_status'=>'unread'
                 
                );

              $query3=$this->db->insert('demoadmission',$data);
              $this->db->where('id',$arr);
              $this->db->delete('demoenquiry');

            $ss++;
           }
          if($ss==$cnt)
           {
              return true;
           }        
           else
           {
              return false;
           }

           
      } 

 }

 public function front_franch_enq_status_cng($status)
 {
    $this->db->set('n_status',$status);
    $this->db->where('n_status','unread');
    $query=$this->db->update('franch_enquiry');
 }

 public function front_new_stud_enq_status($status)
 {
    $this->db->set('n_status',$status);
    $this->db->where('n_status','unread');
    $query=$this->db->update('student_enquiry');
 }


/*************************************Franch Notifications********************************/

public function get_admission_exame_dt_noti($session)
{
  $this->db->where(array('exm_dt_stat'=>'unread','f_id'=>$session->cus_id));
  $query=$this->db->get('admission');
  return $query->result_array();
}

public function get_admission_order_remark_noti($session)
{
  $this->db->where(array('adm_ord_state'=>'unread','f_id'=>$session->cus_id));
  $query=$this->db->get('forder');
  return $query->result_array(); 
}

public function get_enq_from_admin_cnt($session)
{
  $this->db->where(array('adm_enq_stat'=>'unread','f_id'=>$session->cus_id));
  $query=$this->db->get('enquiry');
  return $query->result_array();  
}

public function get_enq_rem_from_admin_cnt($session)
{
   $this->db->where(array('adm_rem_state'=>'unread','f_id'=>$session->cus_id));
   $query=$this->db->get('enquiry');
   return $query->result_array(); 
}


public function fran_stud_enq_status($status,$session)
{
   $this->db->set(array('adm_rem_state'=>$status));
   $this->db->where(array('adm_rem_state'=>'unread','f_id'=>$session->cus_id));
   $this->db->update('enquiry');

   $this->db->set('adm_enq_stat',$status);
   $this->db->where(array('adm_enq_stat'=>'unread','f_id'=>$session->cus_id));
   $this->db->update('enquiry');
}

public function stud_fran_admission_status($status,$session)
{
    $this->db->set(array('exm_dt_stat'=>$status));
    $this->db->where(array('exm_dt_stat'=>'unread','f_id'=>$session->cus_id));
    $this->db->update('admission');
}

public function fran_ord_adm_status($status,$session)
{
   $this->db->set(array('adm_ord_state'=>$status));
    $this->db->where(array('adm_ord_state'=>'unread','f_id'=>$session->cus_id));
    $this->db->update('forder'); 
}

/*************************************End**************************************************/

public function conver_check_stud_enquiry($action,$arraydata)
{
   if($action=="Active")
   {
          $ss=0;
          $cnt=count($arraydata);
          foreach($arraydata as $arr)
          {    
               $dt=date('Y-m-d');
               $query=$this->db->get_where('student_enquiry',array('s_id'=>$arr));
               $result=$query->result_array();
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
                     'adm_enq_stat'=>'unread'
                  );

                $query1=$this->db->insert('enquiry',$data);
                if($query1)
                {
                   $this->db->where(array('s_id'=>$arr));
                   $query2=$this->db->delete('student_enquiry');
                  
                }
                $ss++;
          }//maiin foreach
          if($ss==$cnt)
          {
             return true;
          }
          else
          {
             return false;
          }
           

      }
      else if($action=="Delete")
      {
          $ss=0;
          $cnt=count($arraydata);
          foreach($arraydata as $arr)
          {
              $this->db->where('s_id',$arr);
              $query=$this->db->delete('student_enquiry');
              $ss++;
          }
          if($ss==$cnt)
          {
              return true;
          }
          else
          {
              return false;
          }
      }
}

public function conver_fran_to_active($action,$arraydata)
{  
   if($action=="Active")
   {
     $ss = 0;
     $cnt=count($arraydata);       
     for($i=0 ; $i< count($arraydata);$i++)
     {
               $query=$this->db->get_where('franch_enquiry',array('id'=>$arraydata[$i]));
               $res=$query->result_array();

                $this->db->select('Max(cus_id) As idd');
                $query12=$this->db->get('customers');
                $des=$query12->result_array();
                  
                   $id1=$des[0]['idd'];
                if($id1=="")
                {
                  $id1=1;
                }
                else
                {
                  $id1=$id1+1;
                }

                
                  $onm=$res[0]['Name'];
                  $fnm=$res[0]['Inst_name'];
                  $add=$res[0]['Badd'];
                  $state=$res[0]['State']; //naem
                  $state_id=$res[0]['state_id'];
                  $ct=$res[0]['City'];//name
                  $ct_id=$res[0]['city_id'];
                  $email=$res[0]['Email'];
                  $mobile=$res[0]['Mobile'];
                  $unm=$res[0]['username'];
                  $pass=$res[0]['password'];
                  $dt=date('Y-m-d');
                  $pin=$res[0]['pincode'];
                  $dist=$res[0]['district'];
                  $lat=$res[0]['lat'];
                  $long=$res[0]['longi'];

               $str=substr($state, 0,1);
                $str1=substr($state, 2,1);

                $str3=strtoUpper(substr($ct, 0,2));//city
                $str2=strtoUpper($str.$str1);//state

                $frn_id=$str2."CF".$id1;
               
                $data=array(
                     'email'=>$email,
                     'password'=>$pass,
                     'fname'=>$fnm,
                     'role'=>'franchisee',
                     'date'=>$dt,
                     'fran_id'=>$frn_id,
                     'status'=>1
                    );                
                 $search=$this->db->get_where('customers',array('email'=>$email));
           $row=$search->result();
           if($search->num_rows() > 0)
           {
            print_r('Hello');
           }
           else
           {                
                $this->db->insert('customers',$data);       

                $this->db->where(array('email'=>$email));
                $query1=$this->db->get('customers');
                $result1=$query1->result_array(); 

                 $cid=$result1[0]['cus_id'];
            

                 $data1=array(
                     'cus_id'=>$cid,
                     'femail'=>$email,
                     'pincode'=>$pin,
                     'address'=>$add,
                     'district'=>$dist,
                     'state'=>$state_id,
                     'city'=>$ct_id,
                     'cus_mobile'=>$mobile,
                     'fran_id'=>$frn_id,
                     'institute_name'=>$fnm

                    );
             
                   $add1=$add." ".$ct." ".$state;
                   $data2=array(
                    'f_id'=>$cid,
                    'address'=>$add1,
                    'lati'=>$lat,
                    'longi'=>$long
                  );
                 $this->db->insert('locations',$data2);
                 $this->db->insert('customers_info',$data1);

                 $this->db->where(array('id'=>$arr));
                 $queryy=$this->db->delete('franch_enquiry');
           
                
            }  
            $ss++; 

     }
       
       if($ss==$cnt)
       {
          return true;
       } 
       else
       {
          return false; 
       }
         

           
      
   }
   else if($action=="Delete")
   {
      $ss=0;
      $cnt=count($arraydata);
      foreach($arraydata as $arr)
      {
          $this->db->where(array('id'=>$arr));
          $queryy=$this->db->delete('franch_enquiry');
          $ss++;
      }
      if($ss==$cnt)
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