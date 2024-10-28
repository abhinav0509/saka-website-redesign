<?php
class gallery_Data extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data)
	{
		$this->load->database();
		$query=$this->db->insert('album',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	public function dele123($a,$b)
	{
		$this->load->database();
		$sql="select name from gallery where id='$b'";
		$res1=mysql_query($sql);
		$row=mysql_fetch_array($res1);
		$s=$row['name'];
		$data=explode(',',$s);
		$j=count($data);
		for($i=0;$i<$j;$i++)
		{
			//echo $data[$i];
			//echo $a;
			//die();
			if($data[$i]==$a)
			{
				$str=$a.",";
				echo $str;
				$var12=str_replace($str,"",$s);
				echo $update=("Update gallery set name='$var12' where id='$b'");
				$res=mysql_query($update);
				if($res)
				{
				redirect('Admin/Gallery');
				}
			}
			else if($data[$i]!=$a)
			{
				$str=",".$a;
				$var12=str_replace($str,"",$s);
				$update=("Update gallery set name='$var12' where id='$b'");
				$res=mysql_query($update);
				if($res)
				{
				redirect('Admin/Gallery');
				}
			}
			else
			{
			
			}
		}
		
	}
	
	function Insert_Data1($data1)
	{
		$this->load->database();
		$query=$this->db->insert('image',$data1);
		echo $query['name'];
		die();
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
		$this->db->where('id',$a); 
		$query=$this->db->delete('gallery');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}

public function Update_Data($up_id)
	{
		$this->load->database();
		$this->db->where('id', $up_id);
		$query = $this->db->get("gallery");
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