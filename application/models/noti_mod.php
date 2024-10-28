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

  public function Admm_Ord_change($status)
  {
          $this->db->set("new_ord_stat",$status);
          $this->db->where('new_ord_stat','unread');
          $this->db->update('forder');
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
  	  $this->db->where('new_ord_stat','unread');
      $query=$this->db->get('forder');
      return $query->result_array();
  }

  public function get_act_fran_ord_noti()
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
           $ss=0;
           $cnt=count($arraydata);
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
                $totalmodule=$res['total_module'];
                $modulename=$res['module'];
                $moduleid=$res['module_id'];
                
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
                 'total_module'=>$totalmodule,
                 'module_name'=>$modulename,
                 'module_id'=>$moduleid,
                 'currrent_module'=>1,
                 'n_status'=>'unread'
                 
                );

              $query3=$this->db->insert('admission',$data);
              $this->db->where('id',$arr);
              $this->db->delete('enquiry');

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



/*public function Franch_enquiry_del_by_check($action,$arraydata)
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
           $ss=0;
           $cnt=count($arraydata);
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
				$totalmodule=$res['total_module'];
				$modulename=$res['module'];
				$moduleid=$res['module_id'];
				
                
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
				 'total_module'=>$totalmodule,
				 'module_name'=>$modulename,
				 'module_id'=>$moduleid,
				 'currrent_module'=>1,
                 'exm_status'=>'notactive',
                 'remark'=>$remark,
                 'n_status'=>'unread',
                 'O_Status'=>0,
                 'n_status'=>'unread'
                 
                );

              $query3=$this->db->insert('admission',$data);
              $this->db->where('id',$arr);
              $this->db->delete('enquiry');

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

 }*/




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
               $fname=$result[0]['fran_name'];
    
                $query1=$this->db->get_where('customers',array('fname'=>$fname));
                $result1=$query1->result_array();
                $a=$result1[0]['fran_id'];

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
                     'adm_enq_stat'=>'unread',
                     'fran_id'=>$a,
                     'course'=>$course
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
   
   $this->load->view("front_view/PHPMailerAutoload"); 
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

                 
                 

                 $vupto = date('d-m-Y',strtotime('+1 years',strtotime($dt)));
           
             $txt  ="<div id='introduction' style='border: 1px solid #ccc; width: 550px; height: auto; margin: auto;  border-top:none;'>";
             $txt .="<div class='intro_header' style='height: 48px; background: #3498db;'>";
             $txt .="<h1 style='color: #fff; font-size:30px; padding-top:8px; font-weight: normal; text-align: center; margin-bottom: -17px; line-height: 100%;'>Franchisee activation mail</h1>";
             $txt .="</div>";
             $txt .="<div id='confirm' style='height: 250px;'>";
             $txt .="<div class='wel' style='margin-top: 5px; text-align:center; font-size:13px;'>Welcome in CCA India Network & Thanks for availing CCA Franchisee </div>";
             $txt .="<div class='container' style='width: 500px; padding-top: 20px; margin-left: 30px;'>";
             $txt .="<div class='left_con' style='width: 245px;  border:1px solid #CCC;; height: 150px; float: left; border-right:none;'>";
             $txt  .="<div class='lheader' style='border-bottom:1px solid #CCC; background-color:#E5E6E6;  text-align:center; font-family:calibri;'><h3 style='color: #5F5F5F; line-height: 125%; font-size: 16px; font-weight: normal; margin-top: 0; margin-bottom: 3px;'>Login Details</h3></div>";
             $txt  .="<div class='uid' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> User Id :</div>";
             $txt .="<div class='uid_txt' style='margin-top:5px; float: left; font-family:calibri; font-size:14px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$email</div>";
             $txt .="<div class='uid' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> Password :</div>";
             $txt .="<div class='uid_txt' style='margin-top:5px; float: left; font-family:calibri; font-size:14px;'>&nbsp;&nbsp;$pass</div>";
             $txt .="</div>";
             $txt .="<div class='right_con' style='width: 240px; border:1px solid #CCC; height: 150px; float: left;'>";
             $txt .="<div class='rheader' style='border-bottom:1px solid #CCC; background-color:#E5E6E6; text-align:center; font-family:calibri;'><h3 style='color: #5F5F5F; line-height: 125%; font-size: 16px; font-weight: normal; margin-top: 0; margin-bottom: 3px;'>Registration Details</h3></div>";
             $txt .="<div class='reg_no' style='margin-top:5px; float: left;font-family:calibri; padding-left:5px; font-size:14px;'>Registration No : </div>";
             $txt .="<div class='reg_no_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$frn_id</div>";
             $txt .="<div class='reg_dt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>Registration date : </div>";
             $txt .="<div class='reg_dt_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> &nbsp;&nbsp;$dt</div>";
             $txt .="<div class='valid' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>Valid Up to : </div>";
             $txt .="<div class='valid_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$vupto</div>";
             $txt .="<div class='support_no' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> Your Support no : </div>";
             $txt .="<div class='support_no_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>&nbsp;&nbsp;&nbsp;&nbsp;02032392121</div>";
             $txt .="<div class='assis' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>For Assistance : </div>";
             $txt .="<div class='assis_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9326427400</div>";
             $txt .="</div>";
             $txt .="<div class='clear' style='clear: both;'></div>";
             $txt .="<div style='font-family:calibri;font-size:12px;color:#000;text-align:center;line-height:120%; margin-top:10px;'>";
             $txt .="<div>(you can use online service for Daily Enquiry,Admission,order, exam, certificates ,Online training or marketing)</div>";
             $txt .="<div style='margin-top:5px;'>Copyright &#169; CCA . All&nbsp;rights&nbsp;reserved.</div>";
             $txt .="</div></div></div></div>";

              $mail = new PHPMailer;
              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username = 'yogesh@mavericksoftware.in';                   // SMTP username
              $mail->Password = 'yog@5132';               // SMTP password
              $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
              $mail->Port = 465;                                    //Set the SMTP port number - 587 for authenticated TLS
              $mail->setFrom('yogesh@mavericksoftware.in', 'CCA Contact Us');     //Set who the message is to be sent from
              $mail->addAddress($email, 'CCA');  // Add a recipient
              
              $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
              $mail->isHTML(true);                                  // Set email format to HTML
              
               $mail->Subject = "CCA Franchisee Activation Mail";
               $mail->Body=$txt;
               $mail->send(); 

               $this->db->where(array('id'=>$arraydata[$i]));
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


public function conver_fran_to_active_msg($action,$arraydata)
{
   $this->load->view('sendsms');
  if($action=="Active")
  { 
    for($i=0 ; $i< count($arraydata);$i++)
     {
               $msg="";
               $query=$this->db->get_where('franch_enquiry',array('id'=>$arraydata[$i]));
               $res=$query->result_array();

               $mobile=$res[0]['Mobile'];
               $unm=$res[0]['username'];
               $pass=$res[0]['password']; 
            
            if($mobile!="")
            {
               $msg .="Welcome to CCA Network..!  ";
               $msg .="Ur center Register @  CCA Website  ";
               $msg .="Ur User Name:-$unm ";
               $msg .="Password:$pass  ";
               $msg .="All Online Services are activate. ";
               $msg .="For Query Call :9326427400";

               $sendsms=new sendsms("http://alerts.valueleaf.com/api/v3",'sms'
                      , "A46dc1705723c21960a525f9ce18b705e", "OOOCCA");
               $api=$sendsms->send_sms($mobile, $msg, 'http://alerts.valueleaf.com/index.php&custom=1,2', 'xml');      
               print_r($api);
            }
     }
   }           
}


 public function Franch_enquiry_msg($action,$arraydata)
 {
     $this->load->view('sendsms');
     if($action=="Active")
     {
         foreach($arraydata as $arr)
           {
              $msg="";
              $query=$this->db->get_where('enquiry',array('id'=>$arr));
              $result=$query->result_array();
              
              foreach($result as $res)
              {
                
                $stud_name=$res['stud_name'];
                $contact=$res['contact'];
                $course=$res['course'];
                              
              }

              if($contact!="")
              {
                   $nm=explode(" ",$stud_name);
				   $snm=$nm[0];
				   $msg .="Dear $snm";
                   $msg .="ur Adm confirm for $course course";
				   $msg .="You will get CCA Books,Online Exam &certificate from ur center";
				   $msg .="Any assistance";
				   $msg .="call: 02032392121";
                         
                  
                   $sendsms=new sendsms("http://alerts.valueleaf.com/api/v3",'sms'
                               , "A46dc1705723c21960a525f9ce18b705e", "OOOCCA");
                   $api=$sendsms->send_sms($contact, $msg, 'http://alerts.valueleaf.com/index.php&custom=1,2', 'xml');      
                   print_r($api);
              }


          }
 }
}



}