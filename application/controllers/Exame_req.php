<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exame_req extends CI_Controller {
	 var $globaldata;
     function __construct()
     {
	 
		
     	 parent::__construct();
		 $this->load->library("Pdf");
		 $this->load->database();
		
		 $var=$this->session->userdata;
	   	 if(isset($var['login_user']))
     	 {
          
          $this->globaldata=array(
		  'userdata'=>$var['login_user']
	     );
       }

     }
    
   
 public function Insert_request()
    {
		$this->load->model('exm_pass_req');
    	$stud_id=$this->input->post('sid');   
		$stud_nm=$this->input->post('sname');
        $edate=$this->input->post('edate');
        $cname=$this->input->post('cname');
        $modu=$this->input->post('modu');
		$mid=$this->input->post('hd');
		$data=$this->globaldata['userdata'];
		
		//'edate'=>$edate,
        $data=array('student_id'=>$stud_id,
        	        'student_name'=>$stud_nm,
        	        'course_name'=>$cname,
					'edate'=>$edate,
                    'module'=>$modu,        	        
        	        'fid'=>$data->cus_id,
					'module_id'=>$mid
        	);
       $res=$this->exm_pass_req->request_insert($data,$this->globaldata['userdata']); 
        if($res)
        {
        	$mess="Password Request Send.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Franchisee/exame_request');
        }
        else
        {
        	$mess="Error In Sending Password Request.....! We will contact you.";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Franchisee/exame_request');
        }
    }
    	 
    public function get_req_det()
    {
    	$fid=$_POST['fid'];
    	$this->load->Model('exm_pass_req');
    	$data1=$this->exm_pass_req->req_det($fid);
    	$data2=$this->exm_pass_req->get_modules();
    	$result['data1']=$data1;
    	$result['data2']=$data2;
    	print_r(json_encode($result));
    }
    
    public function generate_password()
    {
    	$this->load->model('exm_pass_req');
        
        $action=$_GET['Action'];
                
        if($action=="Active")
        {

            $str=$this->input->post('storeArrayvalue');
            $arraydata=explode(",", $str);

            $res=$this->exm_pass_req->generate_pass_by_check($arraydata); 
            if($res)
            {
                   $mess="Password Generated.....!";
                   $this->session->set_userdata('msg',$mess);
                   redirect('Admin/admin_exm_request');
            }
            else
            {
                   $mess="Error In Generating Password.....!";
                   $this->session->set_userdata('msg',$mess);
                   redirect('Admin/admin_exm_request');
            }
            
        }  
        else if($action=="Notactive")
        {
                    $stud_id=$this->input->post('sid');
                    $stud_nm=$this->input->post('sname');
                    $edate=$this->input->post('edate');
                    $cname=$this->input->post('cname');
                    $modu=$this->input->post('hd');
                    $fid=$this->input->post('fid');
                   
                    $data=array('student_id'=>$stud_id,
                    	        'student_name'=>$stud_nm,
                    	        'course_name'=>$cname,
                                'module'=>$modu,
                    	        'edate'=>$edate,
                    	        'fid'=>$fid
                    	        
                    	);
                    


                    $res=$this->exm_pass_req->active_request_insert($data); 
                    if($res)
                    {
                        $this->exm_pass_req->active_request_insert_msg($data);	
					    $mess="Password Generated.....!";
                    	$this->session->set_userdata('msg',$mess);
                    	redirect('Admin/admin_exm_request');
                    }
                    else
                    {
                    	$mess="Error In Generating Password.....!";
                    	$this->session->set_userdata('msg',$mess);
                    	redirect('Admin/admin_exm_request');
                    }
            }
     }







}