<?php
class Admission_Data extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data1($data)
	{
		$this->load->database();
		$query=$this->db->insert('admission',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}

function Insert_Data($data,$cou)
	{
		//echo $cou;
		
		$this->db->order_by('quiz_cat_name','asc');
		$this->db->where('course',$cou);
		$this->db->limit(1,0);
		$query1=$this->db->get('quiz_category');
		$result=$query1->result_array();
	    
		if($query1->num_rows()>0)
	    {
			$result[0]['quiz_cat_name'];
			$data['module_id']=$result[0]['qid'];
			$data['module_name']=$result[0]['quiz_cat_name'];
		}
		
		$this->load->database();
		$query=$this->db->insert('admission',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}

	
function Insert_Exam_Module($data1,$cou)
	{
	//	echo $cou;
		
		$this->db->order_by('quiz_cat_name','asc');
		$this->db->where('course',$cou);
		$this->db->limit(1,0);
		$query1=$this->db->get('quiz_category');
		$result=$query1->result_array();
		
		if($query1->num_rows()>0)
		{
		  $result[0]['quiz_cat_name'];
		  $data1['module']=$result[0]['quiz_cat_name'];
		}

		$this->load->database();
		
		$query=$this->db->insert('stud_exam',$data1);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}	

public function getdata($term)
	{
		$query = $this->db->query("SELECT name
	            FROM admission
	            WHERE name LIKE '%".$term."%'
	            GROUP BY name");
	        echo json_encode($query->result_array());
	}

	public function getdata1($term)
	{
		$query = $this->db->query("SELECT fran_Name
	            FROM admission
	            WHERE fran_Name LIKE '%".$term."%'
	            GROUP BY fran_Name");
	        echo json_encode($query->result_array());
	}

	
	public function dele($a)
{
		$this->load->database();
		$this->db->where('id',$a); 
		$query=$this->db->delete('admission');
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
		$this->db->where('n_id', $up_id);
		$query=$this->db->update('news', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	
public function dele1($a)
{
	$this->load->database();
	$this->db->where('id',$a);
	$query=$this->db->delete('admission');
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
}

public function Update_Admiossion($data,$up_id)
	{
		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('admission', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}

	public function save_remark($up_id,$remark)
	{
		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('admission', array('remark'=>$remark)); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}	
	}	
	
	public function getAddmissionstud1($name)	
	{

	       $query = $this->db->query("SELECT fran_Name
	            FROM admission
	            WHERE fran_Name LIKE '%".$name."%' 
	            GROUP BY fran_Name");
	        echo json_encode($query->result_array());
	}
	public function duration_get($cname)
	{
		
		$this->db->where(array('Course_Name'=>$cname));
		$query=$this->db->get('course');
		return $query->result_array();
	}
	public function Exame_date_save($dt,$arraydata)
	{
		
		$arr =explode("/",$dt); 
		$arr=array_reverse($arr);
		$newtdate1 =implode($arr,"/");
		$to_dt=str_replace("/","-",$newtdate1);

		foreach($arraydata as $arr)
		{
 		    $this->db->set(array('exame_date'=>$to_dt,'exm_dt_stat'=>'unread'));
 		    $this->db->where('id',$arr);
 		    $query=$this->db->update('admission');
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

public function Exame_single_date_save($dt,$id)
{
	$arr =explode("/",$dt); 
	$arr=array_reverse($arr);
	$newtdate1 =implode($arr,"/");
	$to_dt=str_replace("/","-",$newtdate1);

	$this->db->set(array('exame_date'=>$to_dt,'exm_dt_stat'=>'unread'));
	$this->db->where('id',$id);
	$query=$this->db->update('admission');
	if($query)
	{
		 return true;
	}
	else
	{
		return false;
	}
}


public function Insert_Exam_Module_msg($cou,$studd_nm,$stud_mob)
{
	   $nm=explode(" ",$studd_nm);
	   $snm=$nm[0];

	   //$msg ="Dear $snm ur Adm confirm for $cou Get CCA Books,Online Exam &certificate from ur center Any assistance call: 02032392121";
		$msg="Ur admission confirmed for $cou. You will get CCA Books,  Online Exam, Certificate & Job Guarantee. For Further Assistance Contact no. 9326427400";
           
       $this->load->view('sendsms');
       $sendsms=new sendsms("http://alerts.valueleaf.com/api/v3",'sms'
                   , "A46dc1705723c21960a525f9ce18b705e", "OOOCCA");
       $api=$sendsms->send_sms($stud_mob, $msg, 'http://alerts.valueleaf.com/index.php&custom=1,2', 'xml');      
       print_r($api);
}

public function Check_sid($stud){
	$this->db->where('stud_id',$stud);
	$query=$this->db->get('admission');
	if($query->num_rows()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}


}

?>