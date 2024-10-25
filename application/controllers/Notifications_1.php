<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends CI_Controller {
	
     function __construct()
     {
     	 parent::__construct();
     	  $this->load->library("Pdf");
		    $var=$this->session->userdata;
	   	 if(isset($var['login_user']))
     	 {
          
          $this->globaldata=array(
		      'userdata'=>$var['login_user']
	 );
       }

   }


   public function getnotifications()
  {
    $this->load->Model('noti_mod');
    $data1=$this->noti_mod->get_front_fran_enq_noti();
    $data2=$this->noti_mod->get_front_stud_enq_noti();
    $data3=$this->noti_mod->get_act_stud_enq_noti();
    $data4=$this->noti_mod->get_act_stud_add_noti();
    $result['data1']=$data1;
    $result['data2']=$data2;
    $result['data3']=$data3;
    $result['data4']=$data4;
    print_r(json_encode($result));
  }




  public function set_stud_enq_status()
  {
    $status=$_POST['status'];
    $this->load->Model('noti_mod');
    $this->noti_mod->front_stud_enq_noti_status($status);
  }

  public function set_fran_enq_status()
  {
    $status=$_POST['status'];
    $this->load->Model('noti_mod');
    $this->noti_mod->front_fran_enq_noti_status($status);
  }
  
  public function set_fran_stud_enq_status()
  {
     $status=$_POST['status'];
     $this->load->Model('noti_mod');
     $this->noti_mod->Act_fran_stud_enq_status($status);
  }
  public function set_fran_stud_add_status()
  {
     $status=$_POST['status'];
     $this->load->Model('noti_mod');
     $this->noti_mod->Act_fran_stud_add_status($status);
  }
 


 public function del_Franch_admission_by_check()
 {
    $Action = $_GET['Action'];
    $array = $_POST['storeArrayvalue'];
    $arraydata = explode(',',$array);
    $this->load->Model("noti_mod");
    $res=$this->noti_mod->Franch_admission_del_by_check($arraydata);
    if($res)
    {
      $str = "Record Deleted Successfully.....!";
      $this->session->set_userdata('msg',$str);
      redirect('Franchisee/Admission');
    }
    else{
      $str = "Error In Deleting The Records.....!";
      $this->session->set_userdata('msg',$str);
      redirect('Franchisee/Admission');
    }
 }

 public function del_Franch_enquiry_by_check()
 {
     $action = $_GET['Action'];
     $str=$this->input->post('storeArrayvalue');
     $arraydata=explode(",", $str);

     $this->load->Model('noti_mod');
     $res=$this->noti_mod->Franch_enquiry_del_by_check($action,$arraydata);
     
     if($res)
    {
      $str = "Changes Updated Successfuly.....!";
      $this->session->set_userdata('msg',$str);
      redirect('Franchisee/Daily_Enquiry');
    }
    else
    {
      $str = "Error In Updating The Records.....!";
      $this->session->set_userdata('msg',$str);
      redirect('Franchisee/Daily_Enquiry');
    }
 }

 public function del_admission_from_admin()
 {
    $action=$_GET['Action'];
    $this->load->Model('noti_mod');
    $str=$this->input->post('storeArrayvalue');
    $arraydata=explode(",", $str);
    $res=$this->noti_mod->admission_del_from_admin($action,$arraydata);
    if($res)
    {
      $str = "Record Deleted Successfully.....!";
      $this->session->set_userdata('msg',$str);
      redirect('Admin/Fran_Admission');
    }
    else
    {
      $str = "Error In Deleting The Records.....!";
      $this->session->set_userdata('msg',$str);
      redirect('Admin/Fran_Admission');
    }
 }
 public function Del_act_stud_enq_from_admin()
 {
     $this->load->Model('noti_mod');
     $action=$_GET['Action'];
     $str=$this->input->post('storeArrayvalue');
     $arraydata=explode(",", $str);
     $this->load->Model('noti_mod');
     $res=$this->noti_mod->act_stud_enq_from_admin_del($action,$arraydata);
     if($res)
     {
       $str = "Record Deleted Successfully.....!";
       $this->session->set_userdata('msg',$str);
       redirect('Admin/Active_Fran');
     }
     else
     {
        $str = "Error In Deleting The Records.....!";
        $this->session->set_userdata('msg',$str);
        redirect('Admin/Active_Fran');
     } 

 }




 }