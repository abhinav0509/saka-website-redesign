<?php
class Fran_Data extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data,$data1)
	{
		$this->load->database();
		$query=$this->db->insert('franchisee',$data);
		$query1=$this->db->insert('userlogin',$data1);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	public function del_act_fran($a)
	{
		$this->db->where('cus_id',$a); 
		$query=$this->db->delete('customers');

		$this->db->where('cus_id',$a); 
		$query1=$this->db->delete('customers_info');
		if($query1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function save_admisson($id)
	{
		$dt=date('Y-m-d');
		$query=$this->db->get_where('enquiry',array('id'=>$id));
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
		   'n_status'=>'unread'
		   
		  );

		$query3=$this->db->insert('admission',$data);
		if($query3)
		{
			
			$this->db->where('id',$id);
			$this->db->delete('enquiry');
			return true;
		}	
		else
		{
			return false;
		}
		
	}

public function getdata($term)
	{
		$query = $this->db->query("SELECT stud_name
	            FROM enquiry
	            WHERE stud_name LIKE '%".$term."%'
	            GROUP BY stud_name");
	        echo json_encode($query->result_array());
	}
public function getAddmissionstud($name,$session)
{
	$query = $this->db->query("SELECT name
	            FROM admission
	            WHERE name LIKE '%".$name."%' And f_id='$session->cus_id'
	            GROUP BY name");
	        echo json_encode($query->result_array());
}
public function getdata1($term)
	{
		$query = $this->db->query("SELECT Franchisee_Name
	            FROM enquiry
	            WHERE Franchisee_Name LIKE '%".$term."%'
	            GROUP BY Franchisee_Name");
	        echo json_encode($query->result_array());
	}	
public function autocourse($name)
{
	$query = $this->db->query("SELECT Course_Name
	            FROM course
	            WHERE Course_Name LIKE '%".$name."%'
	            GROUP BY Course_Name");
	        echo json_encode($query->result_array());
}

public function get_stud_placement($session,$name)
{
	$query = $this->db->query("SELECT sname
	            FROM fran_placement
	            WHERE sname LIKE '%".$name."%' And f_id='".$session->fran_id."'
	            GROUP BY sname");
	        echo json_encode($query->result_array());
}

public function get_stud_placement1($session,$name)
{
	$query = $this->db->query("SELECT name
	            FROM admission
	            WHERE name LIKE '%".$name."%' And fran_Name='".$session->institute_name."'
	            GROUP BY name");
	        echo json_encode($query->result_array());
}


public function Fran_Data_Enquiry_Save($data1)
{

		$this->load->database();
		$query=$this->db->insert('enquiry',$data1);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}

}	
	

public function Fran_Data_Enquiry_Update($data1,$up_id)
{

		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('enquiry', $data1); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}
public function Fran_Daily_Enquiry_Update($data,$up_id)
{
        $this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('enquiry', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}
	
public function dele($data,$a)
{
		$this->load->database();
		$this->db->where('F_id',$a); 
		$query=$this->db->delete('franchisee');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}


public function dele_Enq($a)
{
		$this->load->database();
		$this->db->where('id',$a); 
		$query=$this->db->delete('enquiry');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}

public function Update_Data($data,$up_id,$data1,$name1)
	{
		$this->load->database();
		$this->db->where('F_id', $up_id);
		$query=$this->db->update('franchisee', $data); 
		
		$this->db->where('email', $name1);
		$query1=$this->db->update('userlogin', $data1); 
		
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}

	
	public function Fran_Placement_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('fran_placement',$data);
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
		$query=$this->db->delete('fran_placement');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}

public function fran_place_update($data,$up_id)
	{
		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('fran_placement', $data); 
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
?>