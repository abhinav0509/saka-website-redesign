<?php
class gridmodel extends CI_Model{
	function __construct() {	  
		parent::__construct();
	}

	public function loadAllFranchiseeData(){

		$this->db->select('cus_id as id, fname as name');
	    $this->db->from('customers  pr');
	    $query = $this->db->get();
		$result = $query->result_array();
		return $result;

	}

	public function franicheeData($fid){
		$this->db->where("cus_id", $fid);
		$query = $this->db->get("customers");
		return $query->result_array();
	}

	public function singlestudentData($studid){
		$this->db->where("stud_id", $studid);
		$query = $this->db->get("admission");
		return $query->result_array();
	}

	public function updatesinglestudentData($fid, $studid){
		$this->db->set("f_id", $fid);
		$this->db->where("stud_id", $studid);
		$this->db->update("admission");
	}

	public function coursedetails($coursename){
		$this->db->where("course", $coursename);
		$this->db->order_by("quiz_cat_name");
		$query = $this->db->get("quiz_category");
		return $query->result_array();
	}

	public function studentsRequestData($condition,$startData, $rows,$filterdata){		
		$data = array();
		$this->db->select('id as id,stud_id as studid,name as studename,course_Name as coursename');
		$this->db->where($condition);
		if(count($filterdata) > 0 && !empty($filterdata)){
	    	foreach ($filterdata as $key => $value) {
	    		if($value->field=="studename")
					$this->db->where("(name LIKE '%".$value->data."%' )");	
	    	}
	    }
	    $this->db->from('admission pr');
	    $this->db->limit($rows, $startData);
	    $query = $this->db->get();
	    if($query->num_rows() > 0){
	    	$data=$query->result_array();
		}
		return $data;
	}
	public function studentsRequestCount($condition,$filterdata){
		$data = array();
		$this->db->select('id');
		$this->db->where($condition);
		if(count($filterdata) > 0 && !empty($filterdata)){
	    	foreach ($filterdata as $key => $value) {
	    		if($value->field=="studename")
					$this->db->where("(name LIKE '%".$value->data."%' )");	
	    	}
	    }
	    $this->db->from('admission pr');
	    $query = $this->db->get();
    	$data=$query->result_array();    	
		return count($data);
	}

	public function checkalreadyexistsrquest($coursename, $moduleid, $studuid,$fid,$modulename){
		$this->db->where('course', $coursename);
		$this->db->where('module_id', $moduleid);
		$this->db->where('stud_id', $studuid);
		$this->db->where('fid', $fid);
		$this->db->where('module', $modulename);
		$this->db->delete('exame_active_request');
	}

	public function insertstudentrequest($data){
		$insert_id = "";
		$this->db->insert("exame_active_request", $data);
		if($this->db->affected_rows() >=0){
		  $insert_id = $this->db->insert_id();
		}
		return $insert_id;
	}

	public function updatestudentRequestData($studuid, $studdata){
		$this->db->where("stud_id", $studuid);
		$this->db->update("admission", $studdata);
	}

	public function checkupdatestudentRequestData($studid, $coursemmodule, $course){
		$this->db->where('stud_id', $studid);
		$this->db->where('module', $coursemmodule);
		$this->db->where('course', $course);
		$this->db->where('status', "pass");
		$query = $this->db->get('exm_status');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function checkstudenttotalexam($studid){
		$this->db->where("stud_id", $studid);
		$this->db->where('status', "pass");
		$query = $this->db->get('exm_status');
		return $query->num_rows();
	}

}