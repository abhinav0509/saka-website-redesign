<?php
class Mail_config extends CI_Model{

public function mail_insert($data)
{
	$query=$this->db->insert('mail_config',$data);
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
}

public function mail_update($data,$id)
{
	$this->db->where('id',$id);
	$query=$this->db->update('mail_config',$data);
	if($query)
	{
		return true;
	}
	else
	{
		return false;
	}
}

public function delete_mailconfig($id)
{
	$this->db->where('id',$id);
	$res = $this->db->delete('mail_config');
	if($res)
	{
		return true;
	}
	else
	{
		return false;
	}
}

public function mail_status($id,$str)
{
	 if($str=="Active"){
       $this->db->where('status',$str);
	   $this->db->set('status','NotActive');
       $query = $this->db->update('mail_config');	   
	   }
	   $this->db->where('id',$id);
	   $this->db->set('status',$str);
       $query = $this->db->update('mail_config');
	   if($query)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
}
}