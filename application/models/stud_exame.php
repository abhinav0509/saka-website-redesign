<?php
class Stud_exame extends CI_Model{
function __construct() {
parent::__construct();
}

public function getExame_paper($id)
{
    
     $limit=1;
     $this->db->limit($limit);
     $this->db->where('quiz_cat_id',$id);
     $query=$this->db->get('quiz');
     return $query->result_array();
}
public function getnext_ques($mid,$id,$lastid)
{
    if($id==$lastid)
    {
      $limit=1;
      $this->db->limit($limit);
      $this->db->where('quiz_id',$id);
      $query=$this->db->get('quiz');
      return $query->result_array();	
    }
    else if($id!=$lastid)
    {
	     $limit=1;
	     $this->db->limit($limit);
	     $this->db->where(array('quiz_id >'=>$id,'quiz_cat_id'=>$mid));
	     $this->db->order_by('quiz_id');
	     $query=$this->db->get('quiz');
	     return $query->result_array();
	}     
}

public function getprev_ques($mid,$id,$firstid)
{
    if($id==$firstid)
    {
      $limit=1;
      $this->db->limit($limit);
      $this->db->where('quiz_id',$id);
      $query=$this->db->get('quiz');
      return $query->result_array();  
    }
    else if($id!=$firstid)
    {
       $limit=1;
       $this->db->limit($limit);
       $this->db->where(array('quiz_id <'=>$id,'quiz_cat_id'=>$mid));
       $this->db->order_by('quiz_id','desc');
       $query=$this->db->get('quiz');
       return $query->result_array();
  }     
}
public function getsingle($mid,$id)
{
       $this->db->where(array('quiz_id'=>$id,'quiz_cat_id'=>$mid));
       $query=$this->db->get('quiz');
       return $query->result_array();
}

public function getExame_paper_count($id)
{
     $this->db->where('quiz_cat_id',$id);
     $query=$this->db->get('quiz');
     return $query->result_array();
}
public function get_exam_first_id($id)
{
	return $this->db->select('quiz_id,quiz_cat_id')->where('quiz_cat_id',$id)->order_by('quiz_id','Asc')->limit(1)->get('quiz')->result_array('id');

}
public function get_exam_last_id($id)
{
	return $this->db->select('quiz_id,quiz_cat_id')->where('quiz_cat_id',$id)->order_by('quiz_id','desc')->limit(1)->get('quiz')->result_array('id');

}
public function save_user_ans($data,$qid,$s_id)
{
  $query1=$this->db->get_where('user_answer',array('q_id'=>$qid,'s_id'=>$s_id));
  if($query1->num_rows() > 0)
  {
      $this->db->where(array('q_id'=>$qid,'s_id'=>$s_id));
      $query=$this->db->update('user_answer',$data);
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
  } 
  else
  {
      $query=$this->db->insert('user_answer',$data);
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
public function get_stud_ans($sid,$module)
{
    $query=$this->db->get_where('user_answer',array('s_id'=>$sid,'module_id'=>$module));
    return $query->result_array();
}

public function get_module_det($id)
{
   $query=$this->db->get_where('quiz_category',array('qid'=>$id));
   return $query->result_array(); 
}
public function Fail_status($sid,$status,$mid)
{
	 $this->db->set('exm_status',$status);
	 $this->db->where('stud_id',$sid);
	 $query=$this->db->update('admission');
	 //$this->db->where(array('s_id'=>$sid,'module_id'=>$mid)); 
	 //$query=$this->db->delete('user_answer');
}


public function Pass_status($sid,$status,$estatus)
{
	$st="";
	$query=$this->db->get_where('admission',array('stud_id'=>$sid));
	$a=$query->result_array();
	$cm=$a[0]['currrent_module'];
	$tm=$a[0]['total_module'];
	$cnm=$a[0]['course_Name'];
	if($cm==$tm)
	{
			$st="Complete";
			if($estatus=="fail")
			{
				
			}
			else
			{
			$this->db->set('e_status',$st);
			$this->db->where('stud_id',$sid);
			$query=$this->db->update('admission');
			}
	}
	else if($cm!=$tm)
	{
		$newcm=intval($cm+1);
		$this->db->limit(1,$cm);
		$mquery=$this->db->get_where('quiz_category',array('course'=>$cnm));
		$res=$mquery->result_array();
		$mname=$res[0]['quiz_cat_name'];
		$qid=$res[0]['qid'];
		$this->db->set(array('currrent_module'=>$newcm,'module_name'=>$mname,'exm_status'=>'notactive','module_id'=>$qid));
	 $this->db->where('stud_id',$sid);
	 $query=$this->db->update('admission');
	}

}









public function update_status($stud_id,$status)
{
  $this->db->set('status',$status);
  $this->db->where('stud_id',$stud_id);
  $query=$this->db->update('user_exm_status');
  if($query)
  {
     $this->db->set(array('exm_status'=>'activated','P_Req'=>1));
     $this->db->where('stud_id',$stud_id);
     $this->db->update('admission'); 
    return true;
  }
  else
  {
    return false;
  }
}


public function get_cor_ans($id,$mid)
{
    $this->db->select('quiz.quiz_id,quiz.answer,user_answer.u_ans');
    $this->db->from('quiz');
    $this->db->join('user_answer','quiz.quiz_id=user_answer.q_id','left outer');
    //$this->db->where('user_answer.s_id',$id);
	$this->db->where(array('user_answer.s_id'=>$id,'user_answer.module_id'=>$mid));
    $this->db->order_by('quiz.quiz_id','Asc');
    $query=$this->db->get();
    return $query->result_array();


}
public function get_stud_info($user_id)
{
   $query=$this->db->get_where('admission',array('stud_id'=>$user_id));
   return $query->result_array();
}
public function get_exm_det($user_id)
{
   $this->db->select('quiz_category.quiz_cat_name,quiz_category.course');
   $this->db->from('quiz_category');
   $this->db->where('active_stud.user_id',$user_id);
   $this->db->join('active_stud','quiz_category.qid=active_stud.module');
   $query=$this->db->get();
   return $query->result_array();

}
public function get_correct_count($user_id,$mid)
{
  $this->db->where(array('s_id'=>$user_id,'ans_stat'=>1,'module_id'=>$mid));
  $query=$this->db->get('user_answer');
  return $query->num_rows();
}

public function get_incorrect_count($user_id, $mid)
{
  $this->db->where(array('s_id'=>$user_id,'ans_stat'=>0,'module_id'=>$mid));
  $query=$this->db->get('user_answer');
  return $query->num_rows();

}
public function get_pass_marks($mod)
{
  $query=$this->db->get_where('quiz_category',array('qid'=>$mod));
  return $query->result_array();
}
public function insert_result($data,$sid,$data1)
{
   $mod=$data['module'];
   $mod1=$data1['Module'];
   

   $query1=$this->db->get_where('exm_status',array('stud_id'=>$sid,'module'=>$mod));
   $query2=$this->db->get_where('before_certi',array('stud_id'=>$sid,'Module'=>$mod1));
   $que=$query2->result_array();
   
    if($query1->num_rows()>0)
   {
	 	$this->db->where(array('stud_id'=>$sid,'module'=>$mod));
		$this->db->update('exm_status',$data);  
	 
   }
   else
   {
	$query=$this->db->insert('exm_status',$data);
   }

   if($query2->num_rows() > 0)
   {
	
	
        $this->db->where(array('stud_id'=>$sid,'Module'=>$mod1));
        $this->db->update('before_certi',$data1);
   }
   else
   {
        $query3=$this->db->insert('before_certi',$data1);     
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

public function adm_stud_state_chane($sid)
{
   $this->db->set(array('exm_status'=>'notactive','P_Req'=>0));
   $this->db->where('stud_id',$sid);
   $this->db->update('admission');
}


}