<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_master extends CI_Controller {


  public function getstate()
  {

  	$this->load->database();
  	$query = $this->db->get('state');
  	return json_encode($query->result());

  }
   public function getcity($sid)
  {

  	$this->load->database();
  	$query = $this->db->get_where('city',array('state_id'=>$sid));
  	return json_encode($query->result());

  }
    public function getfr($sid,$cid)
  {

  	$this->load->database();
  	$query = $this->db->get_where('customers_info',array('state'=>$sid,'city'=>$cid));
  	return json_encode($query->result());

  }
  public function getfraddd($sid,$cid,$fr)
  {

  	$this->db->select('customers_info.address,customers_info.cus_id,state.name as State,city.name');    
  	$this->db->from('customers_info');
  	$this->db->join('state', 'customers_info.state = state.state_id');
  	$this->db->join('city', 'customers_info.city = city.city_id');
	//$this->db->join('locations', 'customers_info.cus_id = locations.f_id');
  	$this->db->where(array('customers_info.state'=>$sid,'customers_info.city'=>$cid,));
  	$query = $this->db->get();

  	/*$this->load->database();
  	$query = $this->db->get_where('customers_info',array('state'=>$sid,'city'=>$cid,'cus_id'=>$fr));*/
  	return json_encode($query->result());

  }


  public function getAlldata($sid,$cid,$fr)
  {

  	if($sid!="Select" && $cid!="Select" && $fr!="Select")
  	{ 
	  	$this->db->select('customers_info.address,customers_info.cus_id,customers_info.cus_mobile,customers_info.institute_name,customers_info.femail,state.name as State,city.name,locations.lati,locations.longi');    
		$this->db->from('customers_info');
		$this->db->join('state', 'customers_info.state = state.state_id');
		$this->db->join('city', 'customers_info.city = city.city_id');
		$this->db->join('locations', 'customers_info.cus_id = locations.f_id');
		$this->db->where(array('customers_info.state'=>$sid,'customers_info.city'=>$cid,'customers_info.cus_id'=>$fr));
		$query = $this->db->get();

	  	return json_encode($query->result());
	 }
	 else if($sid!="" && $cid!="" && $fr=="Select")
	 {
	 	$this->db->select('customers_info.address,customers_info.cus_id,customers_info.cus_mobile,customers_info.institute_name,customers_info.femail,state.name as State,city.name,locations.lati,locations.longi');    
		$this->db->from('customers_info');
		$this->db->join('state', 'customers_info.state = state.state_id');
		$this->db->join('city', 'customers_info.city = city.city_id');
		$this->db->join('locations', 'customers_info.cus_id = locations.f_id');
		$this->db->where(array('customers_info.state'=>$sid,'customers_info.city'=>$cid));
		$query = $this->db->get();

	  	return json_encode($query->result());
	 } 	

  }
 public function addr_get($sid,$cid)
 {
    $this->db->select('state.name As State_Name,city.name As City_Name');
    $this->db->from('state');
    $this->db->join('city','state.state_id=city.state_id');
    $this->db->where('city.city_id',$cid);
    $query=$this->db->get();
    return $query->result_array();
 }
  public function save_loc($data)
  {

  	$query=$this->db->insert('locations', $data);
  	if($query)
  	{
  		return true;
  	}
  	else
  	{
  		return false;
  	}

  }

  public function franch_get($st_id)
  {
     $this->db->where('state',$st_id);
     $query=$this->db->get('customers_info');
     return $query->result_array();
  }
  
  public function get_franch_add($st_id)
  {
     $this->db->select('address');
     $this->db->where('fran_id',$st_id);
     $query=$this->db->get('customers_info');
     return $query->result_array();
  }
  public function get_placed_stud($st_id)
  {
     $this->db->where('f_id',$st_id);
     $query=$this->db->get('fran_placement');
     return $query->result_array();
  }








}