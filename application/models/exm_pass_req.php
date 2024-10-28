<?php
class Exm_pass_req extends CI_Model{
function __construct() {
parent::__construct();
$this->load->library("Pdf");
}

public function get_exam_app_stud1($session)
{


	$dt=date('Y-m-d');
	$this->db->where(array('exame_date <='=>$dt,'f_id'=>$session->cus_id,'exm_status'=>'notactive'));
	$query=$this->db->get('admission');
	return $query->result_array();

}

 public function stud_res($session)
    {
		  $dt=date('Y-m-d');
          $this->db->select('name,stud_id');
		  $s="";
      	 $query=$this->db->get_where('admission',array('exm_status'=>'notactive','f_id'=>$session->cus_id));
         return $query->result_array();

    }


public function get_exam_app_stud($session)
{
	$dt=date('Y-m-d');
	$this->db->where(array('f_id'=>$session->cus_id,'exm_status'=>'notactive'));
	$query=$this->db->get('admission');
	if($query->num_rows() <= 0){
		$this->db->where(array('f_id'=>$session->cus_id,'exm_status'=>'notactive'));
		$query=$this->db->get('admission');
	}
	return $query->result_array();
}




public function get_modules()
{
 	 $query=$this->db->get('quiz_category');
	 return $query->result_array();
}
public function request_insert1($data,$session)
{
        $sid=$data['student_id'];
        $sname=$data['student_name'];
        $cname=$data['course_name']; 
        $md=$data['module'];
        $edt=$data['edate'];
        $f_id=$session->cus_id;
        
        
        for($i=0; $i < count($sname); $i++) {
          
			$queryMy = $this->db->query("SELECT name FROM admission where stud_id='".$sname[$i]."' ");
			 foreach($queryMy->result_array() as $row)
			 {    
					$order[$i]['stud_name'] = $row["name"];
			 }
           $order[$i]['fid']=$f_id;
           $order[$i]['stud_id']=$sid[$i];
           //$order[$i]['stud_name']=$sname[$i];
           $order[$i]['course']=$cname[$i];
           $order[$i]['module']=$md[$i];
           $order[$i]['exame_dt']=$edt[$i];

           $order1[$i]['f_id']=$f_id;
           $order1[$i]['stud_id']=$sid[$i];
		   $order1[$i]['exame_date']=$edt[$i];//new
           $order1[$i]['exm_status']="activated";
           $order1[$i]['P_Req']=1;
           
        }
        
        $query1=$this->db->update_batch('admission', $order1, 'stud_id');
        $query=$this->db->insert_batch('exame_active_request',$order);
        if($query)
        {
        	return true;
        }
        else
        {
        	return false;
        }

       
}
  

public function request_insert($data,$session)
{
		$sid=$data['student_id'];
        $sname=$data['student_name'];
        $cname=$data['course_name']; 
        $md=$data['module'];
        $edt=$data['edate'];
		$modid=$data['module_id'];
        $f_id=$session->cus_id;
        
        
        for($i=0; $i < count($sname); $i++) {
			
		 $queryMy = $this->db->query("SELECT name FROM admission where stud_id='".$sname[$i]."' ");
         foreach($queryMy->result_array() as $row)
		 {    
				$order[$i]['stud_name'] = $row["name"];
		 }

           $order[$i]['fid']=$f_id;
           $order[$i]['stud_id']=$sid[$i];
           //$order[$i]['stud_name']=$sname[$i];
           $order[$i]['course']=$cname[$i];
           $order[$i]['module']=$md[$i];
           $order[$i]['exame_dt']=$edt[$i];
		   $order[$i]['module_id']=$modid[$i];
		   
           $order1[$i]['f_id']=$f_id;
           $order1[$i]['stud_id']=$sid[$i];
           $order1[$i]['exm_status']="activated";
           $order1[$i]['P_Req']=1;
           
        }
        
        $query1=$this->db->update_batch('admission', $order1, 'stud_id');
        $query=$this->db->insert_batch('exame_active_request',$order);
        if($query)
        {
        	return true;
        }
        else
        {
        	return false;
        }

       
}





  public function admin_get_exm_req()
  {
      $this->db->select('exame_active_request.fid,count(exame_active_request.stud_id) As Total_stud,customers_info.institute_name');
      $this->db->from('exame_active_request');
      $this->db->join('customers_info','customers_info.cus_id = exame_active_request.fid');
      $this->db->group_by('exame_active_request.fid');
	  $this->db->order_by('exame_active_request.exame_dt','desc');	
      $query=$this->db->get();
      return $query->result_array();
  }
  public function get_activ_list()/// For Admin
  {
    $this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
    $this->db->from('active_stud');
    $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
    $query=$this->db->get();
    return $query->result_array();
  } 

  /*public function get_activ_list1($session) /// For Franchisee
  {
    $this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
    $this->db->from('active_stud');
    $this->db->where('f_id',$session->cus_id);
    $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
    $query=$this->db->get();
    return $query->result_array();
  } */


public function get_activ_list1($limit,$start,$stud,$session) /// For Franchisee
  {
    if($stud!=""){
      $this->db->limit($limit,$start);
      $this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
      $this->db->from('active_stud');
      $this->db->where(array('f_id'=>$session->cus_id,'stud_name'=>$stud));
      $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
	  $this->db->order_by("active_stud.a_id","desc");
      $query=$this->db->get();
      return $query->result_array();
    }
    else{
      $this->db->limit($limit,$start);
      $this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
      $this->db->from('active_stud');
      $this->db->where('f_id',$session->cus_id);
      $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
      $query=$this->db->get();
      return $query->result_array();
    }
  }

  public function get_activ_list1_count($session,$stud) /// For Franchisee
  {
    if($stud!=""){
        $this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
        $this->db->from('active_stud');
        $this->db->where(array('f_id'=>$session->cus_id,'stud_name'=>$stud));
        $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
        $query=$this->db->get();
        return $query->num_rows();
    }
    else{
        $this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
        $this->db->from('active_stud');
        $this->db->where('f_id',$session->cus_id);
        $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
        $query=$this->db->get();
        return $query->num_rows();
    }    
  }
    
    public function get_pass()
    {
        $array=array();
         $name_length = 8;
       $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
       for($i=0;$i<4;$i++)
       {
          $array[$i]=substr(str_shuffle($alpha_numeric), 0, $name_length);
       }  
       //print_r($array);
    }
   
   public function req_det($fid)
   {
      $this->db->where('fid',$fid);
      $query=$this->db->get('exame_active_request');
      return $query->result_array();

   }

   public function generate_pass_by_check($arraydata)
   {
        $ss=0;
        $cnt=count($arraydata);
        $dt=date('Y-m-d');
        $time = strtotime($dt) + 86400;
        $dt1=date('Y-m-d', $time);

         $this->load->view('sendsms');
        
         $name_length = 8;
         $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; 
       foreach($arraydata as $arr)
       {
            $msg="";

            $this->db->where('ac_id',$arr);
            $query=$this->db->get('exame_active_request');
            $res=$query->result_array();

			$stud_id=$res[0]['stud_id'];
            $stud_nm=$res[0]['stud_name'];
            $f_id=$res[0]['fid'];
            $course=$res[0]['course'];
            $mod=$res[0]['module_id'];
            $edt=$res[0]['exame_dt'];

            $this->db->where('stud_id',$res[0]['stud_id']);
            $query123=$this->db->get('admission');
            $res123=$query123->result_array();

            $contact=$res123[0]['contact'];

            $data=array(
                'user_id'=>$stud_id,
                'stud_name'=>$stud_nm,
                'course'=>$course,
                'module'=>$mod,
                'exm_dt'=>$edt,
                'f_id'=>$f_id,
                'cr_dt'=>$dt,
                'password'=>substr(str_shuffle($alpha_numeric), 0, $name_length),
                'valid_upto'=>$dt1,
                'status'=>0
              );

            $data1=array(
                'stud_name'=>$stud_nm,
                'course'=>$course,
                'module'=>$mod,
                'exm_dt'=>$edt,
                'f_id'=>$f_id,
                'cr_dt'=>$dt,
                'password'=>substr(str_shuffle($alpha_numeric), 0, $name_length),
                'valid_upto'=>$dt1,
                'status'=>0
              );

            $pass=$data1['password'];
			     
				 $nm=explode(" ",$stud_nm);
                 $snm=$nm[0];
		
                 $msg .="Online Exam Dear $snm";
                 $msg .="Visit ccaindia.in,";
                 $msg .="User ID:- $stud_id";
                 $msg .="Password:- $pass";
                  
             $sendsms=new sendsms("http://alerts.valueleaf.com/api/v3",'sms'
                         , "A46dc1705723c21960a525f9ce18b705e", "OOOCCA");
             $api=$sendsms->send_sms($contact, $msg, 'http://alerts.valueleaf.com/index.php&custom=1,2', 'xml');      
             print_r($api);
		    		

            $this->db->where(array('s_id'=>$stud_id,'module_id'=>$mod));
            $use_ans_del=$this->db->delete('user_answer');

            $this->db->where('user_id',$stud_id);
            $query1=$this->db->get('active_stud');
            if($query1->num_rows() > 0)
            {
     
				 $this->db->where('user_id',$stud_id);
                 $this->db->update('active_stud',$data1);
            }
            else
            {
    
					$this->db->insert('active_stud',$data);
            }
            $query1=$this->db->delete('exame_active_request', array('ac_id' => $arr)); 

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

   public function active_request_insert($data)
   {
        $sid=$data['student_id'];
        $sname=$data['student_name'];
        $cname=$data['course_name']; 
        $md=$data['module'];
        $edt=$data['edate'];
        $ffid=$data['fid'];
      
        $id=$ffid[0];
       
        $dt=date('Y-m-d');
        $time = strtotime($dt) + 86400;
        $dt1=date('Y-m-d', $time);
        
         $name_length = 8;
         $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        
        for($i=0; $i < count($sname); $i++) {
           
           $order[$i]['user_id']=$sid[$i];
           $order[$i]['stud_name']=$sname[$i];
           $order[$i]['course']=$cname[$i];
           $order[$i]['module']=$md[$i];
           $order[$i]['exm_dt']=$edt[$i];
           $order[$i]['f_id']=$ffid[$i];
           $order[$i]['cr_dt']=$dt;
           $order[$i]['password']=substr(str_shuffle($alpha_numeric), 0, $name_length);
           $order[$i]['valid_upto']=$dt1;
           $order[$i]['status']=0;

           $data1=array(
                'stud_name'=>$sname[$i],
                'course'=>$cname[$i],
                'module'=>$md[$i],
                'exm_dt'=>$edt[$i],
                'f_id'=>$ffid[$i],
                'cr_dt'=>$dt,
                'password'=>substr(str_shuffle($alpha_numeric), 0, $name_length),
                'valid_upto'=>$dt1,
                'status'=>0
              );

			$this->db->where(array('s_id'=>$order[$i]['user_id'],'module_id'=>$md[$i]));
            $use_ans_del=$this->db->delete('user_answer');

            $this->db->where('user_id',$order[$i]['user_id']);
            $query1=$this->db->get('active_stud');
            if($query1->num_rows() > 0)
            {
                 $this->db->where('user_id',$order[$i]['user_id']);
                 $this->db->update('active_stud',$data1);
                 $query2=$this->db->delete('user_answer', array('s_id' =>$order[$i]['user_id']));                 
            }
            else
            {
                 $this->db->insert('active_stud',$order[$i]);
            }
        }
        
       $query1=$this->db->delete('exame_active_request', array('fid' => $id));
       if($query1)
       {
          return true;
       }
       else
       {
          return false;
       }
   }


 public function stud_course_det1($stud_id)
  {
	  $stud_id=trim($stud_id);	
      $query=$this->db->get_where('admission',array('stud_id'=>trim($stud_id)));
      return $query->result_array();
  } 


/***********************************************NEW **************************************/

  public function gety_active_stud_name($name)
  {
     $query = $this->db->query("SELECT stud_name,user_id
              FROM active_stud
              WHERE stud_name LIKE '%".$name."%' 
              GROUP BY stud_name");
          echo json_encode($query->result_array());
  }

  public function gety_active_stud_franchh($name)
  {
         $query = $this->db->query("SELECT institute_name,cus_id
              FROM customers_info
              WHERE institute_name LIKE '%".$name."%' 
              GROUP BY institute_name");
          echo json_encode($query->result_array());
  }
 
  public function get_activ_list12($f_id,$stud,$start)
  {
       $array=array(); 
       $limit=10;
       $start=intval($start-1)*10;
       if($f_id!="" && $stud=="")
       {
           $array=array('active_stud.f_id'=>$f_id);
       }
       else if($f_id=="" && $stud!="")
       {
           $array=array('active_stud.user_id'=>$stud);
       }
       else if($f_id!="" && $stud!="")
       {
           $array=array('active_stud.f_id'=>$f_id);
       }
       else if($f_id=="" && $stud=="")
       {
           $this->db->limit($limit,$start);
           $this->db->select('customers_info.institute_name,quiz_category.quiz_cat_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
           $this->db->from('active_stud');
           $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
           $this->db->join('quiz_category','active_stud.module=quiz_category.qid');
           $query=$this->db->get();
           return $query->result_array();
       }

       $this->db->limit($limit,$start);
       $this->db->select('customers_info.institute_name,quiz_category.quiz_cat_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
       $this->db->from('active_stud');
       $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
       $this->db->join('quiz_category','active_stud.module=quiz_category.qid');
       $this->db->where($array);
       $query=$this->db->get();
       return $query->result_array();
  }
  
  public function get_activ_list_count($f_id,$stud)
  {
       $array=array(); 
       if($f_id!="" && $stud=="")
       {
           $array=array('active_stud.f_id'=>$f_id);
       }
       else if($f_id=="" && $stud!="")
       {
           $array=array('active_stud.user_id'=>$stud);
       }
       else if($f_id!="" && $stud!="")
       {
           $array=array('active_stud.f_id'=>$f_id);
       }
       else if($f_id=="" && $stud=="")
       {
           $this->db->select('customers_info.institute_name,quiz_category.quiz_cat_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
           $this->db->from('active_stud');
           $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
           $this->db->join('quiz_category','active_stud.module=quiz_category.qid');
           $query=$this->db->get();
           return $query->num_rows();
       }

           $this->db->select('customers_info.institute_name,quiz_category.quiz_cat_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
           $this->db->from('active_stud');
           $this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
           $this->db->join('quiz_category','active_stud.module=quiz_category.qid');
           $this->db->where($array);
           $query=$this->db->get();
       return $query->num_rows();
  }

  public function reactive_single($stud_id)
  {
      $dt=date('Y-m-d');
      $this->db->set(array('valid_upto'=>$dt,'status'=>0));
      $this->db->where('user_id',$stud_id);
      $query=$this->db->update('active_stud');
      if($query)
      {
         return true;
      }
      else
      {
         return false;
      }
  }

  /***********************************************NEW **************************************/



   public function active_request_insert_msg($data)
   {
          $this->load->view('sendsms');
          $sid=$data['student_id'];
          
          for($i=0; $i < count($sid); $i++) {
            
            $msg="";
           $query1=$this->db->get_where('admission',array('stud_id'=>$sid[$i])); 
           $result1=$query1->result_array();

           $query2=$this->db->get_where('active_stud',array('user_id'=>$sid[$i])); 
           $result2=$query2->result_array(); 

            foreach($result1 as $res1)
            {
                 
                 $stud_name=$res1['name'];
                 $mobile=$res1['contact'];
                 
            } 
            foreach($result2 as $res2)
            {
                 $user_id=$res2['user_id'];
                 $pass=$res2['password'];               
            }     
                 
				 $nm=explode(" ",$stud_name);
                 $snm=$nm[0];
 
				 $msg .="Online Exam Dear $snm";
                 $msg .="Visit ccaindia.in,";
                 $msg .="User ID:- $user_id";
                 $msg .="Password:- $pass";
                 
				 	
				 	                       
                $sendsms=new sendsms("http://alerts.valueleaf.com/api/v3",'sms'
                             , "A46dc1705723c21960a525f9ce18b705e", "OOOCCA");
                 $api=$sendsms->send_sms($mobile, $msg, 'http://alerts.valueleaf.com/index.php&custom=1,2', 'xml');      
                 print_r($api);
			    
                 
             } 
              
           

   }

public function autocourse($name,$session)
  {
      $query = $this->db->query("SELECT stud_name
              FROM active_stud
              WHERE stud_name LIKE '%".$name."%' and f_id='".$session->cus_id."'
              GROUP BY stud_name");
          echo json_encode($query->result_array());
  }


}