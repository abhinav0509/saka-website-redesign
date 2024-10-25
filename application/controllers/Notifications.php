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
    $data5=$this->noti_mod->get_act_fran_ord_noti();
    $result['data1']=$data1;
    $result['data2']=$data2;
    $result['data3']=$data3;
    $result['data4']=$data4;
    $result['data5']=$data5;
    print_r(json_encode($result));
  }

  public function set_Admm_ord_status()
  {
      $status=$_POST['status'];
      $this->load->Model('noti_mod');
      $this->noti_mod->Admm_Ord_change($status);
  }

  public function getfranchnotifications()
  {
    
    $this->load->Model('noti_mod');
    $data1=$this->noti_mod->get_admission_exame_dt_noti($this->globaldata['userdata']);
    $data2=$this->noti_mod->get_admission_order_remark_noti($this->globaldata['userdata']);
    $data3=$this->noti_mod->get_enq_from_admin_cnt($this->globaldata['userdata']);
    $data4=$this->noti_mod->get_enq_rem_from_admin_cnt($this->globaldata['userdata']);
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

 public function del_Franch_enquiry_by_check1()
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


public function del_Franch_enquiry_by_check()
 {
     $action = $_GET['Action'];
     $str=$this->input->post('storeArrayvalue');
     $arraydata=explode(",", $str);

     $this->load->Model('noti_mod');
     $this->noti_mod->Franch_enquiry_msg($action,$arraydata); 
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

 public function del_admission_from_admin1()
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
      redirect('Employee/Fran_Admission');
    }
    else
    {
      $str = "Error In Deleting The Records.....!";
      $this->session->set_userdata('msg',$str);
      redirect('Employee/Fran_Admission');
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

 public function Del_act_stud_enq_from_admin1()
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
       redirect('Employee/Active_Fran');
     }
     else
     {
        $str = "Error In Deleting The Records.....!";
        $this->session->set_userdata('msg',$str);
        redirect('Employee/Active_Fran');
     } 

 }

 public function set_front_franch_enq_status()
 {
     $status=$_POST['status'];
     $this->load->Model('noti_mod');
     $this->noti_mod->front_franch_enq_status_cng($status);
 }
  
  public function set_front_new_stud_enq_status()
  {
     $status=$_POST['status'];
     $this->load->Model('noti_mod');
     $this->noti_mod->front_new_stud_enq_status($status);
  }

 /*********************************For Franchisee***********************************/

public function fran_stud_enq_status()
{
     $status=$_POST['status'];
     $this->load->Model('noti_mod');
     $this->noti_mod->fran_stud_enq_status($status,$this->globaldata['userdata']);
}

public function fran_stud_admission_status()
{
     $status=$_POST['status'];
     $this->load->Model('noti_mod');
     $this->noti_mod->stud_fran_admission_status($status,$this->globaldata['userdata']); 
}

public function fran_order_status()
{
      $status=$_POST['status'];
      $this->load->Model('noti_mod');
      $this->noti_mod->fran_ord_adm_status($status,$this->globaldata['userdata']);
}



 /********************************End************************************************/

public function saveFronstudenq()
{
   $action=$_GET['Action'];
   $str=$this->input->post('storeArrayvalue');
   $arraydata=explode(",", $str);
   $this->load->Model('noti_mod');
   $res=$this->noti_mod->conver_check_stud_enquiry($action,$arraydata);
   if($res)
   {
       $str = "Your Changes Updated Successfully.....!";
       $this->session->set_userdata('msg',$str);
       redirect('Admin/Student_Enquiry');
    }
    else
    {
        $str = "Error In Updating The Records.....!";
        $this->session->set_userdata('msg',$str);
        redirect('Admin/Student_Enquiry');
    } 
}

public function saveFronstudenq1()
{
   $action=$_GET['Action'];
   $str=$this->input->post('storeArrayvalue');
   $arraydata=explode(",", $str);
   $this->load->Model('noti_mod');
   $res=$this->noti_mod->conver_check_stud_enquiry($action,$arraydata);
   if($res)
   {
       $str = "Your Changes Updated Successfully.....!";
       $this->session->set_userdata('msg',$str);
       redirect('Employee/Student_Enquiry');
    }
    else
    {
        $str = "Error In Updating The Records.....!";
        $this->session->set_userdata('msg',$str);
        redirect('Employee/Student_Enquiry');
    } 
}

public function covert_fran_to_active()
{
   $action=$_GET['Action'];
   $str=$this->input->post('storeArrayvalue');
   $arraydata=explode(",", $str);
   $this->load->Model('noti_mod');
   $this->noti_mod->conver_fran_to_active_msg($action,$arraydata);
   $res=$this->noti_mod->conver_fran_to_active($action,$arraydata);
   if($res)
   {
       $str = "Your Changes Updated Successfully.....!";
       $this->session->set_userdata('msg',$str);
       redirect('Admin/Fran_Enquiry');
    }
    else
    {
        $str = "Error In Updating The Records.....!";
        $this->session->set_userdata('msg',$str);
        redirect('Admin/Fran_Enquiry');
    }
}

public function covert_fran_to_active1()
{
   $action=$_GET['Action'];
   $str=$this->input->post('storeArrayvalue');
   $arraydata=explode(",", $str);
   $this->load->Model('noti_mod');
   $this->noti_mod->conver_fran_to_active_msg($action,$arraydata);   
   $res=$this->noti_mod->conver_fran_to_active($action,$arraydata);
   if($res)
   {
       $str = "Your Changes Updated Successfully.....!";
       $this->session->set_userdata('msg',$str);
       redirect('Employee/Fran_Enquiry');
    }
    else
    {
        $str = "Error In Updating The Records.....!";
        $this->session->set_userdata('msg',$str);
        redirect('Employee/Fran_Enquiry');
    }
}



 }