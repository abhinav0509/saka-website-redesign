<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

     public function index()
     {

     }
     public function checklogin($str)
     {
         $query=$this->db->get_where('userlogin',array('email'=>$str['name'],'pass'=>$str['pass'],'user_type'=>$str['user_type']));
         return $data=$query->result();
     }

     public function checklogin1($mail)
     {
         $query=$this->db->get_where('userlogin',array('email'=>$mail));
         return $data=$query->result();
     }

	 public function Demo_Fran($str)
     {
         $this->db->select('democustomer.cus_id,democustomer.fran_id,democustomer.email,democustomer.lname,democustomerinfo.institute_name,democustomerinfo.state,democustomerinfo.city');
        $this->db->from('democustomer');
        $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id'); 
        $query=$this->db->where(array('email'=>$str['name'],'password'=>$str['pass'],'role'=>'franchisee','status'=>1));
        $query=$this->db->get();
         return $data=$query->result();
     }
	 
	 
	/*public function Fran($str)
    {
        
        $this->db->select('customers.cus_id,customers.fran_id,customers.email,customers.lname,customers_info.institute_name,customers_info.state,customers_info.city,customers.type');
        $this->db->from('customers');
        $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id'); 
        $query=$this->db->where(array('email'=>$str['name'],'password'=>$str['pass'],'role'=>'franchisee','status'=>1));
        $query=$this->db->get();
        return $data=$query->result();
     }*/


	public function Fran($str)
    {
        
        $this->db->select('customers.cus_id,customers.fran_id,customers.email,customers.lname,customers_info.institute_name,customers_info.state,customers_info.city,customers.type');
        $this->db->from('customers');
        $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id'); 
        $query=$this->db->where(array('email'=>$str['name'],'password'=>$str['Password'],'role'=>'franchisee','status'=>1));
        $query=$this->db->get();
        return $data=$query->result();
     }
	 
	  public function student($str)
     {
        $dt=date('Y-m-d');       
        $query=$this->db->get_where('active_stud',array('user_id'=>$str['name'],'password'=>$str['pass']));
        return $data=$query->result();
     }
     public function set_status($fid,$u_id,$status)
     {
        $data=array(
            'stud_id'=>$u_id,
            'f_id'=>$fid,
            'status'=>$status
            );  
        $query=$this->db->insert('user_exm_status',$data);
     }
     public function update_act_user_stat($user_id,$s)
     {
         $this->db->set('status',$s);
         $this->db->where('user_id',$user_id);
         $this->db->update('active_stud');
     }
	 

}