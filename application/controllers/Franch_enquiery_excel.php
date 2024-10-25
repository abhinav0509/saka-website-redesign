<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Franch_enquiery_excel extends CI_Controller {
	 var $globaldata;
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

   public function get_enquiry_Excell()
   {
   	  $fdt=$this->input->post('from');
   	   $tdt=$this->input->post('to');
   	   $course=$this->input->post('crr');
   	   $stud=$this->input->post('stt');
	   $sid=$this->input->post('storedArrayvalue');

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

   	  $this->load->Model('admin_enquiry_excel');

   	  $dt=date('Y-m-d');
   	  if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud=="")
   	  {
         $this->admin_enquiry_excel->get_enq_Excel1($this->globaldata['userdata'],$sid);     
   	  }
   	  else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud=="")
   	  {
         $this->admin_enquiry_excel->get_enq_Excel2($from_dt,$to_dt,$this->globaldata['userdata'],$sid);     
   	  }
   	  else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud=="")
   	  {
         $this->admin_enquiry_excel->get_enq_Excel2($from_dt,$to_dt,$this->globaldata['userdata'],$sid);     
   	  }
      
      else if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud=="")
   	  {
         $this->admin_enquiry_excel->get_enq_Excel3($course,$this->globaldata['userdata'],$sid);     
   	  }
   	  else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud=="")
   	  {
         $this->admin_enquiry_excel->get_enq_Excel4($from_dt,$to_dt,$course,$this->globaldata['userdata'],$sid);     
   	  }
   	  else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud=="")
   	  {
         $this->admin_enquiry_excel->get_enq_Excel4($from_dt,$to_dt,$course,$this->globaldata['userdata'],$sid);     
   	  }

   	  else if($from_dt==$dt && $to_dt==$dt && ($course!="" || $course=="")  && $stud!="")
   	  {
         $this->admin_enquiry_excel->get_enq_Excel5($stud,$this->globaldata['userdata'],$sid);     
   	  }
   	  else if($from_dt!=$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="")
   	  {
         $this->admin_enquiry_excel->get_enq_Excel5($stud,$this->globaldata['userdata'],$sid);     
   	  }
   	  else if($from_dt!=$dt && $to_dt!=$dt && ($course!="" || $course=="") && $stud!="")
   	  {
         $this->admin_enquiry_excel->get_enq_Excel5($stud,$this->globaldata['userdata'],$sid);     
   	  }

   	  
   }

   public function get_enquiry_pdf()
   {
   	   $fdt=$this->input->post('from');
   	   $tdt=$this->input->post('to');
   	   $course=$this->input->post('crr');
   	   $stud=$this->input->post('stt');
	   $sid=$this->input->post('storedArrayvalue');

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

	    		$this->load->Model('admin_enquiry_excel');
	    		$this->admin_enquiry_excel->get_enq_pdf($from_dt,$to_dt,$course,$stud,$this->globaldata['userdata'],$sid); 

   }

   public function getfranadmissionexcel()
   {
       $fdt=$this->input->post('from1');
       $tdt=$this->input->post('to1');
       $course=$this->input->post('cr1');
       $stud=$this->input->post('st1');
	   $sid=$this->input->post('storedArrayvalue1');

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
        $dt=date('Y-m-d');

      $this->load->Model('admin_enquiry_excel');

      if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud=="")
      {
          $this->admin_enquiry_excel->getfranadmissionexcel1($from_dt,$to_dt,$this->globaldata['userdata'],$sid);
      } 
      else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud=="")
      {
          $this->admin_enquiry_excel->getfranadmissionexcel2($from_dt,$to_dt,$this->globaldata['userdata'],$sid);  
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud=="")
      {
          $this->admin_enquiry_excel->getfranadmissionexcel2($from_dt,$to_dt,$this->globaldata['userdata'],$sid);  
      }

      if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud=="")
      {
          $this->admin_enquiry_excel->getfranadmissionexcel3($from_dt,$to_dt,$course,$this->globaldata['userdata'],$sid);
      } 
      else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud=="")
      {
          $this->admin_enquiry_excel->getfranadmissionexcel4($from_dt,$to_dt,$course,$this->globaldata['userdata'],$sid);  
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud=="")
      {
          $this->admin_enquiry_excel->getfranadmissionexcel4($from_dt,$to_dt,$this->globaldata['userdata'],$sid);  
      }

      if($from_dt==$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="")
      {
          $this->admin_enquiry_excel->getfranadmissionexcel5($stud,$this->globaldata['userdata'],$sid);
      } 
      else if($from_dt!=$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="")
      {
          $this->admin_enquiry_excel->getfranadmissionexcel5($stud,$this->globaldata['userdata'],$sid);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && ($course!="" || $course=="") && $stud!="")
      {
          $this->admin_enquiry_excel->getfranadmissionexcel5($stud,$this->globaldata['userdata'],$sid);  
      }    



   }

   public function getAdmissioncatpdf()
   {
       $fdt=$this->input->post('from');
       $tdt=$this->input->post('to');
       $course=$this->input->post('cr');
       $stud=$this->input->post('st');
	   $sid=$this->input->post('storedArrayvalue');

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

          $this->load->Model('admin_enquiry_excel');
          $this->admin_enquiry_excel->get_admission_pdf($from_dt,$to_dt,$course,$stud,$this->globaldata['userdata'],$sid); 
   }



   }

