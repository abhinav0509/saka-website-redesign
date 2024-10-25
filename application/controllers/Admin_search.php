<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_search extends CI_Controller {
    

    
    public function Getfranname()
	{
		
		$name= $this->input->post('term');	
	    $this->load->model('search_admin');	
	    $this->search_admin->getfrnd($name);
	}


    public function front_enq_search()
    {
          if(isset($_POST['fname']))
          {
          	$fname=$_POST['fname'];

          }
          else
          {
          	 $fname="";
          }
          if(isset($_POST['fdate'],$_POST['todate']))
          {
          	  $farr=array();
          	  $tarr=array();
          	  $fdt=$_POST['fdate'];
          	  $tdt=$_POST['todate'];
          	  	
          	  	$farr =explode("/",$fdt); 
				$farr=array_reverse($farr);
				$newfdate1 =implode($farr,"/");
				$from_dt=str_replace("/","-",$newfdate1);

				$tarr =explode("/",$tdt); 
				$tarr=array_reverse($tarr);
				$newtdate1 =implode($tarr,"/");
				$to_dt=str_replace("/","-",$newtdate1);

          }
          else
          {
          	$from_dt="";
          	$to_dt="";
          }
          $this->load->Model('search_admin');
          if($from_dt!="" && $to_dt!="" && $fname=="")
          {
              $data1=$this->search_admin->front_admin_enq($fname,$from_dt,$to_dt);
              print_r(json_encode($data1));
          }
          else if($from_dt!="" && $to_dt!="" && $fname!="")
          {
              $data1=$this->search_admin->front_admin_enq($fname,$from_dt,$to_dt);
              print_r(json_encode($data1));
          }
          else if($from_dt!="" && $to_dt=="" && $fname!="")
          {
              $data1=$this->search_admin->front_admin_enq($fname,$from_dt,$to_dt);
              print_r(json_encode($data1));
          }


    }


    public function convert_enquiry()
    {
    	$id=$_POST['id'];
    	$this->load->Model('search_admin');
    	$mess=$this->search_admin->enquiry_convert($id);
    	if($mess)
    	{
    		$data['message']="Enquiry Successfully Send to Franchisee...!";
    		print_r((json_encode($data)));	
    	}
    	else
    	{
    		$data['message']="Error In Sending Enqiury...!";
    		print_r((json_encode($data)));	
    	}

    }


}