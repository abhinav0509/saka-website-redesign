<?php
class Download_mod extends CI_Model{
function __construct() {
parent::__construct();
}

public function insert_download($data1)
{
	 $query=$this->db->insert('download',$data1);
	 if($query)
	 {
	 	return true;
	 }
	 else
	 {
	 	 return false;
	 }	
}

public function insert_download1($data1,$org)
{
     
      $count=count($org);
      $cnt=0;
      for($j=0; $j<count($org); $j++)
      {
      	  $data1['Image']=$org[$j];
      	  $query=$this->db->insert('download',$data1);
      }
      if($cnt==$count)
      {
      	return false;
      } 
      else
      {
      	return true;
      }
      
}

public function get_Download_Details_count()
{
	 $query=$this->db->get('download');
	 return $query->num_rows();
}

public function get_Download_Details($limit,$start)
{
	$this->db->limit($limit,$start);
	$query=$this->db->get('download');
	return $query->result_array();

}

public function delete_data_down($id)
{
	$this->db->where('D_id',$id);
	$query=$this->db->delete('download');
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