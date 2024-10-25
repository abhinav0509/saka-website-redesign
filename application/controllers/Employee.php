<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {
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


   public function index()
   {

   }
  public function Home()
  {
    $data=$this->globaldata;
    $this->load->view('Employee/header1',$data);
    $this->load->view('Employee/Home');    
    $this->load->view('Employee/footer1');
  }
  public function Franchisee()
  {
    $session_data=$this->session->userdata('msg');
    $data1['message']=$session_data;
    $this->session->unset_userdata('msg');
    
    /********************For Paging********************************/

         $fromdate=$this->input->post("fromdt");
         
         if($fromdate=="")
         {
          $fromdate=date('d/m/Y');
         }
         
         $todate=$this->input->post("todate");
         if($todate=="")
         {
          $todate=date('d/m/Y');
         }
         $data1['dt']=array(
          'page_index'=>$this->input->post('pindex'),
          'from_date'=>$fromdate,
          'to_date'=>$todate,
          'state'=>$this->input->post('s'),
          'city'=>$this->input->post('c'),
          'storeArrayvalue'=>$this->input->post('storeArrayvalue')
          );

         
      
         $pageindex=$this->input->post("pindex");
         

          if($pageindex=="")
         {
          $pageindex=0;
         }
         else if($pageindex==1)
         {
          $pageindex=0;
         }
         else if($pageindex >=1)
         {
          $pageindex=intval(($pageindex-1)*10);
         }
        

            
          $fdt=$fromdate;
          $tdt=$todate;
          $cname=$this->input->post('c');
          $sname=$this->input->post('s');
 
  

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




    /*888888888888888888888888888888888888888888888888888888888888888*/


        $this->load->model('display');
        $config=array();
        $config["base_url"]=base_url()."index.php/Employee/Franchisee";
        $config["total_rows"]=$this->display->Franchisee_Detail_count($from_dt,$to_dt,$sname,$cname);
        $config["per_page"] = 15;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;      
        $data1['rowcount']=$this->display->Franchisee_Detail_count($from_dt,$to_dt,$sname,$cname);
        $data1["links"] = $this->pagination->create_links();
        $data1['enquiry']=$this->display->Franchisee_Detail($config["per_page"],$pageindex,$from_dt,$to_dt,$sname,$cname);
        $data=$this->globaldata;
        $this->load->view('Employee/header1',$data);
        $this->load->view('Employee/franchise',$data1);
        $this->load->view('Employee/footer1');
  }

  public function Active_Fran()
  {

         $session_data=$this->session->userdata('msg');
         $data1['message']=$session_data;
         $this->session->unset_userdata('msg'); 

         $fromdate=$this->input->post("fromdt");
         
         if($fromdate=="")
         {
          $fromdate=date('d/m/Y');
         }
         
         $todate=$this->input->post("todate");
         if($todate=="")
         {
          $todate=date('d/m/Y');
         }
         $pageindex=$this->input->post("pindex");
         

         if($pageindex=="")
         {
          $pageindex=0;
         }
         else if($pageindex >=1)
         {
          $pageindex=intval($pageindex-1)*10;
         }
         else
         {
          $pageindex=0;
         }
        

            
          $fdt=$fromdate;
          $tdt=$todate;
          $cp=$this->input->post('fname');
          $fname=$this->input->post('cname');  


            $data1['dt']=array(
          'page_index'=>$this->input->post('pindex'),
          'from_date'=>$fromdate,
          'to_date'=>$todate,
          'frname'=>$this->input->post('fname'),
          'stname'=>$this->input->post('cname'),
          'storeArrayvalue'=>$this->input->post('storeArrayvalue')
          );
    
      
      

      $farr =explode("/",$fdt); 
      $farr=array_reverse($farr);
      $from_date2 =implode($farr,"/");
      $from_date=str_replace("/","-",$from_date2);
      
            
      $tarr =explode("/",$tdt); 
      $tarr=array_reverse($tarr);
      $to_date2 =implode($tarr,"/");
      $to_date=str_replace("/","-",$to_date2);  
  
      $this->load->model('display');
      $config=array();
          $config["base_url"]=base_url()."index.php/Employee/Active_Fran";
          $config["total_rows"]=$this->display->Enquiry_display($cp,$fname,$from_date,$to_date);
          $config["per_page"] = 10;
          $config["uri_segment"] = $pageindex;
          $this->pagination->initialize($config);
          
          $data1['rowcount']=$this->display->Enquiry_display($cp,$fname,$from_date,$to_date);
          
          $data1['enquiry']=$this->display->Active_Fran_Enquiry_display($config["per_page"], $pageindex,$cp,$fname,$from_date,$to_date);
          $data=$this->globaldata;
          $data1["links"] = $this->pagination->create_links();
          $this->load->view('Employee/header1',$data);
          $this->load->view('Employee/Active_Franchisee_Enquiry',$data1);
          $this->load->view('Employee/footer1');
    

}


public function Fran_Admission()
  {
    
        $session_data=$this->session->userdata('msg');
    $data1['message']=$session_data;
    $this->session->unset_userdata('msg');

         $fromdate=$this->input->post("fromdt");
         
         if($fromdate=="")
         {
          $fromdate=date('d/m/Y');
         }
         
         $todate=$this->input->post("todate");
         if($todate=="")
         {
          $todate=date('d/m/Y');
         }
         $data1['dt']=array(
          'page_index'=>$this->input->post('pindex'),
          'from_date'=>$fromdate,
          'to_date'=>$todate,
          'course'=>$this->input->post('cr'),
          'center'=>$this->input->post('cent'),
          'storeArrayvalue'=>$this->input->post('storeArrayvalue')
          );
 
         $pageindex=$this->input->post("pindex");
         

         if($pageindex=="")
         {
          $pageindex=0;
         }
         else if($pageindex >=1)
         {
          $pageindex=intval($pageindex-1)*5;
         }
         else
         {
          $pageindex=0;
         }
                    
          $fdt=$fromdate;
          $tdt=$this->input->post('todate');
          $cname=$this->input->post('cr');
          $sname=$this->input->post('cent');
 
  

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

        $this->load->model('display');
        $data1['courses']=$this->display->getcourse();
        $config=array();
            $config["base_url"]=base_url()."index.php/Employee/Fran_Admission";
            $config["total_rows"]=$this->display->frn_admision_display($cname,$from_dt,$to_dt,$sname);
            $config["per_page"] = 5;
            $config["uri_segment"] = $pageindex;

            $data1['rowcount']=$this->display->frn_admision_display($cname,$from_dt,$to_dt,$sname);
            
            $this->pagination->initialize($config);
            //$page = ($this->uri->segment($pageindex)) ? $this->uri->segment($pageindex) : 0;
            $data1['enquiry']=$this->display->Student_Admission($config["per_page"],$pageindex,$cname,$from_dt,$to_dt,$sname);
        $data=$this->globaldata;
        $data1["links"] = $this->pagination->create_links();
        $this->load->view('Employee/header1',$data);
        $this->load->view('Employee/Franchisee_Admission',$data1);
        $this->load->view('Employee/footer1');
  
  }

  public function Student_Enquiry()
  {
    
    $session_data=$this->session->userdata('msg');
    $data1['message']=$session_data;
    $this->session->unset_userdata('msg');  

    $fromdate=$this->input->post("fromdt");
         
         if($fromdate=="")
         {
          $fromdate=date('d/m/Y');
         }
         
         $todate=$this->input->post("todate");
         if($todate=="")
         {
          $todate=date('d/m/Y');
         }
         $data1['dt']=array(
          'page_index'=>$this->input->post('pindex'),
          'from_date'=>$fromdate,
          'to_date'=>$todate,
          'center'=>$this->input->post('s'),
          'storeArrayvalue'=>$this->input->post('storeArrayvalue')        
          );         
      
         $pageindex=$this->input->post("pindex");
         

          if($pageindex=="")
         {
          $pageindex=0;
         }
         else if($pageindex==1)
         {
          $pageindex=0;
         }
         else if($pageindex >=1)
         {
          $pageindex=intval(($pageindex-1)*5);
         }
        

            
          $fdt=$fromdate;
          $tdt=$todate;
          $cname=$this->input->post('s');
          
 
  

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


    $this->load->model('display');
        $config=array();
        $config["base_url"]=base_url()."index.php/Employee/Student_Enquiry";
        $config["total_rows"]=$this->display->front_stud_enq_count($from_dt,$to_dt,$cname);
        $config["per_page"] = 5;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        $data1['rowcount']=$this->display->front_stud_enq_count($from_dt,$to_dt,$cname);
        $data1['enquiry']=$this->display->Student_Enquiry_display($config["per_page"], $pageindex,$from_dt,$to_dt,$cname);
        $data1["links"] = $this->pagination->create_links();  

        $data=$this->globaldata;
        $this->load->view('Employee/header1',$data);
        $this->load->view('Employee/Student_Enquiry',$data1);
        $this->load->view('Employee/footer1');
  }

  public function Fran_Enquiry()
  {
    
       $session_data=$this->session->userdata('msg');
    $data1['message']=$session_data;
    $this->session->unset_userdata('msg');
    
        $fromdate=$this->input->post("fromdt");
         
         if($fromdate=="")
         {
          $fromdate=date('d/m/Y');
         }
          $todate=$this->input->post("todate");
         
         if($todate=="")
         {
          $todate=date('d/m/Y');
         }
  
         $data1['dt']=array(
          'page_index'=>$this->input->post('pindex'),
          'from_date'=>$fromdate,
          'to_date'=>$todate,
          'state'=>$this->input->post('s'),
          'city'=>$this->input->post('c'),
          'storeArrayvalue'=>$this->input->post('storeArrayvalue'),
          );

            $fdt=$fromdate;
          $tdt=$todate;
          $st=$this->input->post('s');
          $ct=$this->input->post('c');
        
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
         
      
         $pageindex=$this->input->post("pindex");
         

         if($pageindex=="")
         {
          $pageindex=0;
         }
         else if($pageindex==1)
         {
          $pageindex=0;
         }
         else if($pageindex >=1 )
         {
          $pageindex=intval($pageindex-1)*10;
         }
         else
         {
           $pageindex=0;
         }
        
          $fdt=$fromdate;
          $tdt=$this->input->post('todate');
          $cname=$this->input->post('s');
          $sname=$this->input->post('c');


    $this->load->model('display');
        
        $config=array();
        $config["base_url"]=base_url()."index.php/Employee/Fran_Enquiry";
        $config["total_rows"]=$this->display->fran_enq_display($from_dt,$to_dt,$st,$ct);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $data1['rowcount']=$this->display->fran_enq_display($from_dt,$to_dt,$st,$ct);
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment($pageindex)) ? $this->uri->segment($pageindex) : 0;
        $data1["enquiry"] = $this->display->Fran_Enquiry_display($config["per_page"],$pageindex,$from_dt,$to_dt,$st,$ct);
        $data1["links"] = $this->pagination->create_links();

    $data=$this->globaldata;
    $this->load->view('Employee/header1',$data);
    $this->load->view('Employee/Franchisee_Enquiry',$data1);
    $this->load->view('Employee/footer1');
  }

  public function Order()
  {
    /*88888888888888888888888888888Paging8888888888888888888888*/

     $fromdate=$this->input->post("fromdt");
         
         if($fromdate=="")
         {
          $fromdate=date('d/m/Y');
         }
         
         $todate=$this->input->post("todate");
         if($todate=="")
         {
          $todate=date('d/m/Y');
         }
         $data1['dt']=array(
          'page_index'=>$this->input->post('pindex'),
          'from_date'=>$fromdate,
          'to_date'=>$todate,
          'franch'=>$this->input->post('fr')          
          );

         
      
         $pageindex=$this->input->post("pindex");
         

         if($pageindex=="")
         {
          $pageindex=0;
         }
         else if($pageindex >=1)
         {
           $pageindex=intval($pageindex-1)*10;
         }
         else
         {
          $pageindex=0;
         }  
        

            
          $fdt=$fromdate;
          $tdt=$todate;
          $fname=$this->input->post('fr');
          
 
  

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

    /*8888888888888888888888888888paging End88888888888888*/     


    $this->load->model('display');

        $config=array();
        $config["base_url"]=base_url()."index.php/Employee/Order";
        $config["total_rows"]=$this->display->Ad_order_count($from_dt,$to_dt,$fname);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;  
        $data1['rowcount']=$this->display->Ad_order_count($from_dt,$to_dt,$fname);  
        $data1['Order1']=$this->display->order_Data($config["per_page"],$pageindex,$from_dt,$to_dt,$fname);
        $data=$this->globaldata;
        $this->load->view('Employee/header1',$data);
        $this->load->view('Employee/Order',$data1);
        $this->load->view('Employee/footer1');
  }

  public function Exam_Module()
  {
    $session_data=$this->session->userdata('msg');
    $data1['message']=$session_data;
    $this->session->unset_userdata('msg');
        
        $this->load->Model('exam_data');
        $data1['course']=$this->exam_data->course_res();

        $data1['dt']=array(
          'page_index'=>$this->input->post('pindex')
            );

         
      
        $pageindex=$this->input->post("pindex");
       

         if($pageindex=="")
         {
          $pageindex=0;
         }
         else if($pageindex!=1)
         {
          $pageindex=intval($pageindex-1)*10;
         }
         else
         {
          $pageindex=0;
         }
        
        $config=array();
        $config["base_url"]=base_url()."index.php/Employee/Exam_Module";
        $config["total_rows"]=$this->exam_data->get_Exam_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $data1['rowcount']=$this->exam_data->get_Exam_count();
        $this->pagination->initialize($config);
        $data1["exames"] = $this->exam_data->get_exame_data($config["per_page"],$pageindex);
        $data1["links"] = $this->pagination->create_links(); 

    $data=$this->globaldata;
    $this->load->view('Employee/header1',$data);
    $this->load->view('Employee/Exam_Module',$data1);
    $this->load->view('Employee/footer1');
  }

  public function Paper()
  {
    $session_data=$this->session->userdata('msg');
    $data1['message']=$session_data;
    $this->session->unset_userdata('msg');

    $this->load->model('paper_mod');
    $data1['course']=$this->paper_mod->course_res();
    $data=$this->globaldata;
    $this->load->view('Employee/header1',$data);
    $this->load->view('Employee/Paper',$data1);
    $this->load->view('Employee/footer1');
  }
  
  public function Pass_Student()
  {
    
    $data=$this->globaldata;
    $this->load->model('display');
    
    $fromdate=$this->input->post("fromdt");
         
         if($fromdate=="")
         {
          $fromdate=date('d/m/Y');
         }
       
         $data1['dt']=array(
          'page_index'=>$this->input->post('pindex'),
          'from_date'=>$fromdate,
          'cour'=>$this->input->post('cou'),
          'frrn'=>$this->input->post('frrn'),
          'sttud'=>$this->input->post('sttud')
          );

         
      
         $pageindex=$this->input->post("pindex");
         

         if($pageindex=="")
         {
          $pageindex=0;
         }
         else if($pageindex==1)
         {
          $pageindex=0;
         }
         else if($pageindex >=1)
         {
          $pageindex=intval(($pageindex-1)*15);
         }
        

            
          $fdt=$fromdate;
          $course=$this->input->post('cou');
          $stud=$this->input->post('sttud');
          $fran=$this->input->post('frrn');
  

          $farr=array();
          $arr=array();
          
          $farr =explode("/",$fdt); 
        $farr=array_reverse($farr);
        $newfdate1 =implode($farr,"/");
        $from_dt=str_replace("/","-",$newfdate1);


    /*888888888888888888888888888888888888888888888888888888888888888*/ 
         
        $config=array();
        $config["base_url"]=base_url()."index.php/Employee/Pass_Student";
        $config["total_rows"]=$this->display->get_pass_stud_count($from_dt,$course,$stud,$fran,"");
        $config["per_page"] = 15;
        $config["uri_segment"] = $pageindex;
        $data1['rowcount']=$this->display->get_pass_stud_count($from_dt,$course,$stud,$fran,"");
        $this->pagination->initialize($config);
        $data1["result"] = $this->display->get_pass_stud($config["per_page"],$pageindex,$from_dt,$course,$stud,$fran,"");
        $data1["links"] = $this->pagination->create_links();    
        $data1['course']=$this->display->getcourse(); 
    //$data1['result']=$this->display->get_pass_stud(); 
    
    $this->load->view('Employee/header1',$data);
    $this->load->view('Employee/Pass_Student',$data1);
    $this->load->view('Employee/footer1');
  }


 public function activatestudentsforpassword()
  { 
    $this->load->Model('gridmodel');
    $data1["franchisees"] = $this->gridmodel->loadAllFranchiseeData();
    $data=$this->globaldata;    
    $this->load->view('Employee/header1',$data);
    $this->load->view('activestudentsfromadmin',$data1);    
  }

  public function studentdataforrequest(){
    header('Content-Type: application/json');
    $responsedata["message"]="Error";
    $this->load->Model('gridmodel');

    $page=0;
    $responsedata["totaldata"]=0;
    $responsedata["page"]=1;
    $responsedata["gridData"]=array();
        if(isset($_REQUEST["page"]) && !empty($_REQUEST["page"])){
            $responsedata["page"]=$_REQUEST["page"];
            $responsedata["rows"]=10;
            $page = $_REQUEST["page"]-1;
        }
        $rows = 20;
        if(isset($_REQUEST["rows"]) && !empty($_REQUEST["rows"])){
          $rows = $_REQUEST["rows"];
        }
        $startData = $page*$rows;
        $wherecondition="";

        $filterdata=array();
        if(isset($_REQUEST["filters"]) && !empty($_REQUEST["filters"])){
          $filters=json_decode($_REQUEST["filters"]);
          if(!empty($filters->rules)){
            $filterdata=$filters->rules;
          }
        }
        if(isset($_REQUEST["franchiseeid"]) && !empty($_REQUEST["franchiseeid"])){
          $franchiseeid="";
          $frnachiseeData = $this->gridmodel->franicheeData($_REQUEST["franchiseeid"]);
          if(count($frnachiseeData) > 0){
            $franchiseeid=$frnachiseeData[0]["fran_id"];
            $wherecondition = "(f_id='".$_REQUEST["franchiseeid"]."' or stud_id like '".$franchiseeid."%')";
            $studentdata = $this->gridmodel->studentsRequestData($wherecondition,$startData, $rows,$filterdata);
            foreach($studentdata as $key => & $val) {
           $val['franchisee'] = $frnachiseeData[0]["fname"];
        }
        $responsedata["gridData"] = $studentdata;
            $responsedata["totaldata"] = $this->gridmodel->studentsRequestCount($wherecondition,$filterdata);
          }
        }
        print_r(json_encode($responsedata));
  }

  public function singleStudentDetails(){
    header('Content-Type: application/json');
    $responsedata["message"]="Error";
    $this->load->Model('gridmodel');
    if(isset($_REQUEST["studid"]) && !empty($_REQUEST["studid"])
      && isset($_REQUEST["fid"]) && !empty($_REQUEST["fid"])){
      $responsedata["studid"]=$_REQUEST["studid"];
      $responsedata["fid"]=$_REQUEST["fid"];

      $franchiseedata = $this->gridmodel->franicheeData($_REQUEST["fid"]);
      $studentdata = $this->gridmodel->singlestudentData($_REQUEST["studid"]);  
      if(count($studentdata) > 0){
        if(is_null($studentdata[0]["f_id"]) || strlen($studentdata[0]["f_id"])==0){
          $this->gridmodel->updatesinglestudentData($_REQUEST["fid"], $_REQUEST["studid"]);
        }
        $responsedata["studname"]=$studentdata[0]["name"];
        $responsedata["franchisee"]="";
        if(count($franchiseedata) > 0){
          $responsedata["franchisee"]=$franchiseedata[0]["fname"];
        }

        $responsedata["coursename"]="";
        $coursename="";
        $responsedata["cources"]= array();
        if(!is_null($studentdata[0]["course_Name"]) || strlen($studentdata[0]["course_Name"]) > 0){ 
          $coursename=$studentdata[0]["course_Name"];
        }
        
        if(strlen($coursename) > 0){
          $responsedata["cources"] =  $this->gridmodel->coursedetails($coursename);
        }
        $responsedata["coursename"]=$coursename;
        $responsedata["message"]="Success"; 
      }
    }
    print_r(json_encode($responsedata));
  } 


  public function sendstudentrequest(){
    header('Content-Type: application/json');
    $responsedata["message"]="Error";
    $this->load->Model('gridmodel');
    date_default_timezone_set('Asia/Kolkata');

    if(isset($_REQUEST["requestcoursename"]) && !empty($_REQUEST["requestcoursename"])
      && isset($_REQUEST["requestcoursemodules"]) && !empty($_REQUEST["requestcoursemodules"])
      && isset($_REQUEST["requeststudid"]) && !empty($_REQUEST["requeststudid"])
      && isset($_REQUEST["requesfid"]) && !empty($_REQUEST["requesfid"])
      && isset($_REQUEST["selectedcourse"]) && !empty($_REQUEST["selectedcourse"])
      && isset($_REQUEST["requeststudname"]) && !empty($_REQUEST["requeststudname"])){

      $coursename = $_REQUEST["requestcoursename"];
      $moduleid = $_REQUEST["requestcoursemodules"];
      $studuid = $_REQUEST["requeststudid"];
      $fid = $_REQUEST["requesfid"];
      $modulename = $_REQUEST["selectedcourse"];
      $studname = $_REQUEST["requeststudname"];

      $this->gridmodel->checkalreadyexistsrquest($coursename, $moduleid, $studuid,$fid,$modulename);      
      $data = array(
        'stud_id' => $studuid,
        'stud_name' => $studname,
        'fid' => $fid,
        'course' => $coursename,
        'module' => $modulename,        
        'exame_dt' => date('Y-m-d'),
        'module_id' => $moduleid
      );

      $insertid = $this->gridmodel->insertstudentrequest($data);
      $currentModule = 1;
      $totalexam = $this->gridmodel->checkstudenttotalexam($studuid);
      $totalModule = $this->gridmodel->coursedetails($coursename);
      if($totalexam==0 || $totalexam="0" || intval($totalexam) ==0){
        $currentModule = 1;
      }else{
        $currentModule = (intval($totalexam)+1);
      }
      if(strlen($insertid) > 0){
        $studdata = array(
          'f_id' => $fid,
          'stud_id' => $studuid,
          'exm_status' => 'activated',
          'module_id' => $moduleid,
          'module_name' => $modulename,
          'currrent_module' => $currentModule,
          'total_module' => count($totalModule),
          'P_Req' => 1
        );
        $this->gridmodel->updatestudentRequestData($studuid, $studdata);
        $responsedata["message"]="Success";
      }
    }
    print_r(json_encode($responsedata));
  }

  public function checkexamstudentstatus(){
    header('Content-Type: application/json');
    $responsedata["message"]="Error";
    $this->load->Model('gridmodel');
    date_default_timezone_set('Asia/Kolkata');
    if(isset($_REQUEST["studid"]) && !empty($_REQUEST["studid"])
      && isset($_REQUEST["coursemmodule"]) && !empty($_REQUEST["coursemmodule"])
      && isset($_REQUEST["course"]) && !empty($_REQUEST["course"])){

      $result = $this->gridmodel->checkupdatestudentRequestData($_REQUEST["studid"], $_REQUEST["coursemmodule"], $_REQUEST["course"]);
      if($result) {
        $responsedata["message"]="Exists";
      }else{
        $responsedata["message"]="Success";
      }

      }
      print_r(json_encode($responsedata));
  }

 }