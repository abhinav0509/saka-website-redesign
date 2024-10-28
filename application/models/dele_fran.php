<?php
class Dele_fran extends CI_Model{
function __construct() {
parent::__construct();
}
 
    public function del_enquiry($id)
    {
    	$query=$this->db->delete('enquiry', array('id' => $id)); 

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