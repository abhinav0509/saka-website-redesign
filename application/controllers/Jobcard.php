<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobcard extends CI_Controller {
	 var $globaldata;
     function __construct()
     {
	     ini_set('memory_limit', '500M');
		
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

    
    public function save_job()
	{
           
           $config['upload_path'] = './uploads/job_card/';
		   $config['allowed_types'] = 'gif|jpg|png';
		   $this->load->library('upload', $config);
		   if ( !$this->upload->do_upload('upload'))
	 	   { 
			  $error = array('error' => $this->upload->display_errors());
		   } 
		   else
	 	   {
			 $data = array('upload_data' => $this->upload->data());
			 foreach($data as $d)
			 {
			    $b=$d['file_name'];
			 }
		  }
		   
           $fdata=$this->globaldata['userdata'];
           
           $fname=$this->input->post('fran');
           $sname=$this->input->post('nm');
           $scode=$this->input->post('code');
           $vupto=$this->input->post('dt');
           $addt=$this->input->post('addate');
           $dtt=date('Y-m-d');
           $farr=array();
           $farr =explode("/",$addt); 
		   $farr=array_reverse($farr);
		   $newfdate1 =implode($farr,"/");
		   $adt=str_replace("/","-",$newfdate1);
           
           $img=$b;
           $data=array('f_id'=>$fdata->fran_id,'fname'=>$fname,'sname'=>$sname,'scode'=>$scode,'vupto'=>$vupto,'img'=>$b,'admission_dt'=>$adt,'entry_dt'=>$dtt);

           $this->load->model('job_card');
           $result=$this->job_card->save_job_card($data,$fdata->fran_id);
            if($result)
        	{
	        	$mess="Details saved successfuly.....!";
	        	$this->session->set_userdata('msg',$mess);
	        	redirect('Franchisee/job_card');
        	}
        	else
        	{
	        	$mess="Record already exists Or Error In Saving Details.....!";
	        	$this->session->set_userdata('msg',$mess);
	        	redirect('Franchisee/job_card');
        	}
           
	}

	public function Update_job_card()
	{
		   $b="";
		   $config['upload_path'] = './uploads/job_card/';
		   $config['allowed_types'] = 'gif|jpg|png';
		   $this->load->library('upload', $config);
		   if ( !$this->upload->do_upload('upload'))
	 	   { 
			  $error = array('error' => $this->upload->display_errors());
		   } 
		   else
	 	   {
			 $data = array('upload_data' => $this->upload->data());
			 foreach($data as $d)
			 {
			    $b=$d['file_name'];
			 }
		  }
           $fdata=$this->globaldata['userdata'];
           $up_id=$this->input->post('bid');
           $fname=$this->input->post('fran');
           $sname=$this->input->post('nm');
           $scode=$this->input->post('code');
           $vupto=$this->input->post('dt');
           $addt=$this->input->post('addate');
           $farr=array();
           $farr =explode("/",$addt); 
		   $farr=array_reverse($farr);
		   $newfdate1 =implode($farr,"/");
		   $adt=str_replace("/","-",$newfdate1);
           
           $img=$b;
           if($b!="")
           {
             $data=array('f_id'=>$fdata->fran_id,'fname'=>$fname,'sname'=>$sname,'scode'=>$scode,'vupto'=>$vupto,'img'=>$b,'admission_dt'=>$adt);
           }
           else if($b=="")
           {
              $data=array('f_id'=>$fdata->fran_id,'fname'=>$fname,'sname'=>$sname,'scode'=>$scode,'vupto'=>$vupto,'admission_dt'=>$adt);   	
           } 
           $this->load->model('job_card');
           $result=$this->job_card->update_job_card($data,$up_id,$fdata->fran_id);
            if($result)
        	{
	        	$mess="Details updated successfuly.....!";
	        	$this->session->set_userdata('msg',$mess);
	        	redirect('Franchisee/job_card');
        	}
        	else
        	{
	        	$mess="Error In Updating Details.....!";
	        	$this->session->set_userdata('msg',$mess);
	        	redirect('Franchisee/job_card');
        	}
	}

	public function GetStuddata()
	{
		$name=$this->input->post('term');
		$this->load->Model('job_card');
		$this->job_card->getStud($name,$this->globaldata['userdata']);
	}
	public function Getjobstuddata()
	{
	   	$name=$this->input->post('term');
		$this->load->Model('job_card');
		$this->job_card->getjobStud($name,$this->globaldata['userdata']);	
	}
	public function Getjobfrandata()
	{
	    $name=$this->input->post('term');
		$this->load->Model('job_card');
		$this->job_card->getjobFranch($name);	
	}

	public function get_Pdf_of_jobcard()
	{
		 $fdt=$this->input->post('fromdt1');
		 $tdt=$this->input->post('todate1');
		 $sid=$this->input->post('storedArrayvalue');
		 $fname=$this->input->post('pname');
		 
		 $farr=array();
	     $arr=array();
		 
			    
		 $farr =explode("/",$fdt); 
		 $farr=array_reverse($farr);
		 $newfdate1 =implode($farr,"/");
		 $from_dt=str_replace("/","-",$newfdate1);
         $arr =explode("/",$tdt); 
    	 $arr=array_reverse($arr);
		 $newtdate1 =implode($arr,"/");
		 $to_dt=str_replace("/","-",$newtdate1);

		 $this->load->Model('job_card');
		 $this->job_card->get_jobcard_pdf($from_dt,$to_dt,$fname,$sid);
	}

	public function get_Excell_of_jobcard()
	{
		  $fdt=$this->input->post('fromdt2');
		 $tdt=$this->input->post('todate2');
		 $sid=$this->input->post('storedArrayvalue2');
		 $fname=$this->input->post('pname2');
       
		 $farr=array();
	     $arr=array();
			    
		 $farr =explode("/",$fdt); 
		 $farr=array_reverse($farr);
		 $newfdate1 =implode($farr,"/");
		 $from_dt=str_replace("/","-",$newfdate1);
         $arr =explode("/",$tdt); 
    	 $arr=array_reverse($arr);
		 $newtdate1 =implode($arr,"/");
		 $to_dt=str_replace("/","-",$newtdate1);

		 $this->load->Model('job_card');
		 $this->job_card->get_jobcard_Excell($from_dt,$to_dt,$fname,$sid);
	}




 }