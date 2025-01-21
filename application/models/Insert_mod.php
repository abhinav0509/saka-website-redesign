<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_mod extends CI_Model {

public function enquiry_insert($data)
{
	$query = $this->db->insert('enquiry',$data);
	if($query){
		return true;
	}
	else{
		return false;
	}
 }
}