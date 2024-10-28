<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_mod extends CI_Model {
	
	
	public function banner_insert($data)
	{
		$query = $this->db->insert('banner',$data);
		if($query){
			return true;
		}
		else{
			return false;
		}
	}
	public function banner_delete($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->delete('banner');
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function banner_update($data,$id)
	{
		$this->db->where('id',$id);
		$query=$this->db->update('banner',$data);
		if($query)
		{
			return true;
		}
		else{
			return false;
		}
	}
	public function set_banner_status($id,$oldseq,$newseq)
	{   
		$query1=$this->db->get_where('banner',array('seq' => $newseq));        
		if($query1->num_rows() > 0){
		   $this->db->set('seq',$oldseq);
		   $this->db->where('seq',$newseq);
		   $query2=$this->db->update('banner');
		}

		   $this->db->set('seq',$newseq);
		   $this->db->where('id',$id);
		   $query=$this->db->update('banner');  
		   if($query){
			 return true;
		   }
		   else{
			 return false;
		   }
	}
	
	
}
?>