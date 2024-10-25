<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Franchisee extends CI_Controller {
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
	 
 public function GetFranData()
	{	
	  
	    $name= $this->input->post('term');	
	    $this->load->model('Fran_Data');	
	    $this->Fran_Data->getdata($name,$this->globaldata['userdata']);
	
	}
	
public function GetFranData1()
	{	
	    
	    $name= $this->input->post('term');	
	    $this->load->model('Fran_Data');	
	    $this->Fran_Data->getdata1($name);
	
	}
public function Ac_history()
{
	    $data=$this->globaldata;
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
         	'from_date'=>$fromdate,
         	'to_date'=>$todate         	
         	);

         		$fdt=$fromdate;
         		$tdt=$todate;
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

	    $this->load->Model('display');
	    $data1['result']=$this->display->get_account_receipt_history($this->globaldata['userdata'],$from_dt,$to_dt);
	    $data1['result1']=$this->display->get_account_expense_history($this->globaldata['userdata'],$from_dt,$to_dt);	
	    $this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Acc_history',$data1);
		$this->load->view('Franchisee/footer');
	}
	
	public function Job_card()
	{
        
        $session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');

		$data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
         	'stud'=>$this->input->post('stu')
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
         	$pageindex=intval(($pageindex-1)*7);
         }		

         $stud=$this->input->post('stu');
 
		$data=$this->globaldata;
		$this->load->model('display');
        $data1['fran']=$this->display->get_franchisee();
        $data1['states']=$this->display->get_state();
        $data1['cities']=$this->display->get_city();
        $data1['fdetails']=$this->globaldata['userdata'];

		$config=array();
        $config["base_url"]=base_url()."index.php/Franchisee/job_card";
        $config["total_rows"]=$this->display->jobcard_display($stud,$this->globaldata['userdata']);
        $config["per_page"] = 7;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["rowcount"]=$this->display->jobcard_display($stud,$this->globaldata['userdata']);
        $data1["results"] = $this->display->jobcard_Paging($config["per_page"],$pageindex,$stud,$this->globaldata['userdata']);
        $data1["links"] = $this->pagination->create_links();

        $this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/card',$data1);
		$this->load->view('Franchisee/footer');
	}

public function get_single_enquiry_excel()
{
	$id=$_GET['id'];
	$name=$_GET['name'];
	
	$this->load->model('Excell');
	$this->Excell->get_single_fran_enquiry_excel($id,$name);
}
public function get_single_enquiry_excel1()
{
	$id=$_GET['id'];
	$name=$_GET['name'];
	
	$this->load->model('Excell');
	$this->Excell->get_single_fran_enquiry_excel1($id,$name);
}
public function get_single_enquiry_pdf()
{
	$id=$_GET['id'];
	
	$this->load->model('Excell');
	$this->Excell->get_single_fran_enquiry_pdf($id);
}

public function get_single_enquiry_pdf1()
{
	$id=$_GET['id'];
	
	$this->load->model('Excell');
	$this->Excell->get_single_fran_enquiry_pdf1($id);
}

public function get_excel_by_cat()
{
	$farr=array();
	$tarr=array();
	if(isset($_GET['fdate'],$_GET['todate'],$_GET['fnm']))
	{
		$fdate=$_GET['fdate'];
		$todate=$_GET['todate'];
		$fnm=$_GET['fnm'];
	}

	
	$farr =explode("/",$fdate); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$newfdate=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$todate); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$newtdate=str_replace("/","-",$newtdate1);
	$this->load->Model('Excell');

	if($fdate!="" && $todate!="" && $fnm!="")
	{
         $this->Excell->Get_all_cat_excel($newfdate,$newtdate,$fnm);
	}
	else if($fdate!="" && $todate=="" && $fnm!="")
	{
	     $this->Excell->Get_today_excel($newfdate,$fnm);	
	}
	else if($fdate=="" && $todate=="" && $fnm!="")
	{
	     $this->Excell->Get_by_fran_excel($fnm);	
	}
    else if($fdate=="" && $todate=="" && $fnm=="")
	{
	     $this->Excell->Get_fran_all_excel();	
	}
	else if($fdate!="" && $todate=="" && $fnm=="")
	{
	     $this->Excell->Get_fran_all_today_excel($newfdate);	
	}
    else if($fdate!="" && $todate!="" && $fnm=="")
	{
         $this->Excell->Get_date_excel($newfdate,$newtdate);	
	}

}
public function get_pdf_by_cat()
{
	$farr=array();
	$tarr=array();
	$fdate=$_GET['fdate'];
	$todate=$_GET['todate'];
	$fnm=$_GET['fnm'];
	
	$farr =explode("/",$fdate); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$newfdate=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$todate); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$newtdate=str_replace("/","-",$newtdate1);
	$this->load->Model('Excell');

	if($fdate!="" && $todate!="" && $fnm!="")
	{
         $this->Excell->Get_all_cat_pdf($newfdate,$newtdate,$fnm);
	}
	else if($fdate!="" && $todate=="" && $fnm!="")
	{
	     $this->Excell->Get_today_pdf($newfdate,$fnm);	
	}
	else if($fdate=="" && $todate=="" && $fnm!="")
	{
	     $this->Excell->Get_by_fran_pdf($fnm);	
	}
    else if($fdate=="" && $todate=="" && $fnm=="")
	{
	     $this->Excell->Get_fran_all_pdf();	
	}
	else if($fdate!="" && $todate=="" && $fnm=="")
	{
	     $this->Excell->Get_fran_all_today_pdf($newfdate);	
	}
	else if($fdate!="" && $todate!="" && $fnm=="")
	{
         $this->Excell->Get_date_pdf($newfdate,$newtdate);	
	}
}
public function get_enquiry_Excell()
{
	$data=$this->globaldata;
	$fdate=$_GET['fdate'];
	$todate=$_GET['todate'];
	
	$farr=array();
	$tarr=array();

	$farr =explode("/",$fdate); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$newfdate=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$todate); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$newtdate=str_replace("/","-",$newtdate1);

	$this->load->model('frn_excell');
	if($fdate!="" && $todate!="")
	{
	    $this->frn_excell->get_datewise_Excell($newfdate,$newtdate,$this->globaldata['userdata']);
    }
    else if($fdate!="" && $todate=="")
    {
    	$this->frn_excell->get_today_datewise_Excell($newfdate,$this->globaldata['userdata']);
    }
    else if($fdate=="" && $todate=="")
    {
        $this->frn_excell->get_all_frn_excel($this->globaldata['userdata']);	
    }
}

public function get_enquiry_Excell1()
{
	$data=$this->globaldata;
	$fdate=$_GET['fdate'];
	$todate=$_GET['todate'];
	$course=$_GET['course'];
	$stud=$_GET['stud'];
	
	$farr=array();
	$tarr=array();

	$farr =explode("/",$fdate); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$newfdate=str_replace("/","-",$newfdate1);
    
	$tarr =explode("/",$todate); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$newtdate=str_replace("/","-",$newtdate1);
	
     $dt=date('Y-m-d');

	$this->load->model('frn_excell');
	if($newfdate!=$dt && $newtdate!=$dt && $course=="")
	{
	   $this->frn_excell->get_datewise_Excell3($newfdate,$newtdate,$this->globaldata['userdata']);
    }
    else if($newfdate==$dt && $newtdate==$dt && $course=="")//remining	
    {	    
	    $this->frn_excell->get_datewise_Excell1($this->globaldata['userdata']);
    }
    else if($newfdate!=$dt && $newtdate==$dt && $course=="")
	{	    
	    $this->frn_excell->get_today_datewise_Excell2($this->globaldata['userdata']);
    }
    else if($newfdate!=$dt && $newtdate!=$dt && $course!="")
	{	    
	    $this->frn_excell->get_datewise_Excell4($newfdate,$newtdate,$course,$this->globaldata['userdata']);
    }
    else if($newfdate!=$dt && $newtdate==$dt && $course!="")
	{	    
	    $this->frn_excell->get_datewise_Excell4($newfdate,$newtdate,$course,$this->globaldata['userdata']);
    }
    else if($newfdate==$dt && $newtdate==$dt && $course!="")
	{	    
	    $this->frn_excell->get_datewise_Excell5($course,$this->globaldata['userdata']);
    } 


}
public function get_enquiry_pdf()
{
	$data=$this->globaldata['userdata'];
	$fdate=$_GET['fdate'];
	$todate=$_GET['todate'];
	
	
	$farr=array();
	$tarr=array();

	$farr =explode("/",$fdate); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$newfdate=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$todate); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$newtdate=str_replace("/","-",$newtdate1);

	$this->load->model('frn_excell');
	if($fdate!="" && $todate!="")
	{
	    $this->frn_excell->get_datewise_pdf($newfdate,$newtdate,$this->globaldata['userdata']);
    }
    else if($fdate!="" && $todate=="")
    {
    	$this->frn_excell->get_today_datewise_pdf($newfdate,$this->globaldata['userdata']);
    }
    else if($fdate=="" && $todate=="")
    {
        $this->frn_excell->get_all_frn_pdf($this->globaldata['userdata']);	
    }
}

public function get_enquiry_pdf1()
{
	$data=$this->globaldata['userdata'];
	$fdate=$_GET['fdate'];
	$todate=$_GET['todate'];
	$course=$_GET['course'];
	$stud=$_GET['stud'];
	
	$farr=array();
	$tarr=array();

	$farr =explode("/",$fdate); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$newfdate=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$todate); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$newtdate=str_replace("/","-",$newtdate1);

	$this->load->model('frn_excell');
    $this->frn_excell->get_demo_enquiry_pdf($newtdate,$newtdate,$course,$stud,$this->globaldata['userdata']);

	
}
public function GetEnquiry()
	{	
	  
	    $name= $this->input->post('term');	
	    $this->load->model('Fran_Data');	
	    $this->Fran_Data->getslide($name);
	
	}

	public function exame_request()	 
	{
			$data=$this->globaldata;
			$this->load->model('exm_pass_req');
			$data2=$this->exm_pass_req->get_pass();			
			$data1['modules']=$this->exm_pass_req->get_modules();
			$data1['exame']=$this->exm_pass_req->get_exam_app_stud($this->globaldata['userdata']);
			$data1['exame1']=$this->exm_pass_req->get_activ_list1($this->globaldata['userdata']);
			$this->load->view('Franchisee/header',$data);
			$this->load->view('Franchisee/Exame_request',$data1);
			$this->load->view('Franchisee/footer');
	}



public function Update_Active_Enquiry()
{
					$up_id = $this->input->post('bid');
					$state= $this->input->post('stat1');
			        $city=  $this->input->post('city');

			        $endt=$this->input->post('pcontt');
					$arr =explode("/",$endt); 
					$arr=array_reverse($arr);
					$str =implode($arr,"/");
					$str1=str_replace("/","-",$str);

					$sdt=$this->input->post('sdate');
					$farr =explode("/",$sdt); 
					$farr=array_reverse($farr);
					$strr =implode($farr,"/");
					$strr1=str_replace("/","-",$strr);

			        $query=$this->db->get_where('state',array('state_id'=>$state));
			        $result=$query->result_array();
			        $state_id=$result[0]['name'];

			        $query=$this->db->get_where('city',array('city_id'=>$city));
			        $result=$query->result_array();
			        $city=$result[0]['name'];

					$data1 = array(
					'stud_name' => $this->input->post('nm'),
					'enq_date' => $str1,
					'sadd' => $this->input->post('testo'),
					'contact' => $this->input->post('cont'),
					'email' => $this->input->post('email1'),
					'state_id'=>$this->input->post('stat1'),
					'city_id'=>$this->input->post('city'),
					'state' => $state_id,
					'city' => $city,
					'sfees'=>$this->input->post('sfees'),
					'sdate'=>$strr1,
					'course' => $this->input->post('course'),
					'con_name' => $this->input->post('conname'),
					'con_contact' => $this->input->post('conmobile')
		            );
					$this->load->model('Fran_Data');
					$res=$this->Fran_Data->Fran_Data_Enquiry_Update($data1,$up_id);
					redirect('Franchisee/Daily_Enquiry');
			    	
}

public function Active_Fran_enquiry_Update()
{
	$up_id = $this->input->post('bid');
	$data1 = array(
					'remark' => $this->input->post('testo1'),
					'adm_rem_state'=>'unread'
					);

	$this->load->model('Fran_Data');
	$res=$this->Fran_Data->Fran_Daily_Enquiry_Update($data1,$up_id);
	if($res)
	{
		$data1['message']="Remark saved....";
		redirect('Admin/Active_Fran');
	}
	else
	{
		echo "<script>alert('Data Not saved');</script>";
	}
}

public function Active_Fran_enquiry_Update1()
{
	$up_id = $this->input->post('bid');
	$data1 = array(
					'remark' => $this->input->post('testo1'),
					'adm_rem_state'=>'unread'
					);

	$this->load->model('Fran_Data');
	$res=$this->Fran_Data->Fran_Daily_Enquiry_Update($data1,$up_id);
	if($res)
	{
		$data1['message']="Remark saved....";
		redirect('Employee/Active_Fran');
	}
	else
	{
		echo "<script>alert('Data Not saved');</script>";
	}
}

public function Delete_Enquiry_Data()
{
$a=$_POST['id'];
//$up_id = $this->input->post('bid');

		
				$this->load->model('Fran_Data');
				$res=$this->Fran_Data->dele_Enq($a);
				if($res==true)
				{
				redirect('Admin/Active_Fran');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/Active_Fran');
				}


}

public function Delete_Enquiry_Data1()
{
$a=$_POST['id'];
//$up_id = $this->input->post('bid');
				$this->load->model('Fran_Data');
				$res=$this->Fran_Data->dele_Enq($a);
				if($res)
				{
				   $data['message']="Record Deleted.....!";
				   print_r(json_encode($data));
				}
				else
				{
				   $data['message']="Error In Deleting The Record.....!";
				   print_r(json_encode($data));
				}


}	 
	 

	
public function Delete()
 {
 	$a= $_POST['F_id'];
    $this->load->Model('Fran_Data');
	$res=$this->Fran_Data->del_act_fran($a);
	if($res)
	{
		 $data['message']="Franchise Deleted.....!";
		 print_r(json_encode($data));
	}
	else
	{
		 $data['message']="Error In Deleting Franchise.....!";
		 print_r(json_encode($data));
	}
 }
	 
	 
	public function Update()
	{
	 $up_id = $this->input->post('bid');
	  $name1 = $this->input->post('nm');
	 $data = array(
	 'Name' =>$this->input->post('fname'),
	 'Inst_name' =>$this->input->post('ins'),
	 'Badd' =>$this->input->post('add'),
	 'State' =>$this->input->post('stat'),
	 'City' =>$this->input->post('cit'),
	 'Email' =>$this->input->post('mail'),
	 'Contact' =>$this->input->post('cont'),
	 'Branch' =>$this->input->post('bran'),
	 'Location' =>$this->input->post('loc'),
	 'uname' =>$this->input->post('uname'),
	 'password' =>$this->input->post('pwd'),
	 'status' =>$this->input->post('status')
		 );
		 
		 $data1 = array(
		'email' =>$this->input->post('uname'),
		'pass' =>$this->input->post('pwd'),
	 
	 );
	 
		$this->load->model('Fran_Data');
		$res=$this->Fran_Data->Update_Data($data,$up_id,$data1,$name1);
		if($res==true)
		{
		redirect('Admin/Franchisee');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/Franchisee');
		} 
		
	
	}	
	public function index()
	{
		$this->load->view('F_login');
		
	}
	
	public function Book_Order()
	{
		
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');
		$data=$this->globaldata;
		$data1['fdata']=$this->globaldata['userdata'];
		$this->load->model('order_mod');		
		
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
         	'to_date'=>$todate         	   	
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
         	//$fname=$this->input->post('fr');
         	
 
	

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

		$config=array();
        $config["base_url"]="http://localhost/CCA/index.php/Franchisee/Book_Order";
        $config["total_rows"]=$this->order_mod->fr_order_count($this->globaldata['userdata'],$from_dt,$to_dt);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        $data1['rowcount']=$this->order_mod->fr_order_count($this->globaldata['userdata'],$from_dt,$to_dt);
        
		$data1['Order1']=$this->order_mod->get_order_det($config["per_page"],$pageindex,$from_dt,$to_dt,$this->globaldata['userdata']);
		$this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Book',$data1);		
		$this->load->view('Franchisee/footer');
	}
	
	
	public function Admission()
	{
		
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg'); 

		$this->load->model('display');
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
         	'sname'=>$this->input->post('s'),
         	'cname'=>$this->input->post('c'),
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
            
    		$config=array();
	        $config["base_url"]=base_url()."index.php/Admin/Franchisee";
	        $config["total_rows"]=$this->display->Franchisee_admission_count($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
	        $config["per_page"] = 5;
	        $config["uri_segment"] = $pageindex;
	        $this->pagination->initialize($config);
	        $data1['rowcount']=$this->display->Franchisee_admission_count($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);		

            $data1["links"] = $this->pagination->create_links();
        	$data=$this->globaldata;
        	$data1['max_id']=$this->display->getmax_id($this->globaldata['userdata']);
        	$data1['fdata']=$this->globaldata['userdata']; 
           	$data1['courses']=$this->display->getcourse();
        	$data1['fdata']=$this->globaldata['userdata'];
			$data1['Order1']=$this->display->Admission($config["per_page"],$pageindex,$this->globaldata['userdata'],$sname,$cname,$from_dt,$to_dt);
			$this->load->view('Franchisee/header',$data);
			$this->load->view('Franchisee/Admission',$data1);
			$this->load->view('Franchisee/footer');
     
		
	}
	
	
	public function Daily_Enquiry_Save()
	{

		$arra=array();
		$farr=array();
		$up_id = $this->input->post('bid');
		$data=$this->globaldata['userdata'];
		$endt=$this->input->post('pcontt');
		$sdt=$this->input->post('sdate');
		$arr =explode("/",$endt); 
		$arr=array_reverse($arr);
		$str =implode($arr,"/");
		$str1=str_replace("/","-",$str);

		$farr =explode("/",$sdt); 
		$farr=array_reverse($farr);
		$strr =implode($farr,"/");
		$strr1=str_replace("/","-",$strr);//sdate

		
		$fran_id=$data->fran_id;
		$fid=$data->cus_id;
		$fstate=$data->state;
		$fcity=$data->city;
		$fname1=$data->institute_name;

		$this->db->select('Max(enq_id) As idd');
		$this->db->where('f_id',$fid);
		$query12=$this->db->get('enquiry');
		$des=$query12->result_array();
		$iid=$des[0]['idd'];
		if($iid=="")
		{
			$iid=1;
		}
		else
		{
			$iid=$iid+1;
		}
		        
        $state= $this->input->post('stat1');
        $city=  $this->input->post('city');

        $query=$this->db->get_where('state',array('state_id'=>$state));
        $result=$query->result_array();
        $state_id=$result[0]['name'];

        $query=$this->db->get_where('city',array('city_id'=>$city));
        $result=$query->result_array();
        $city=$result[0]['name'];
       

		$data1 = array(
		'f_id' => $fid,
		'fran_id'=>$fran_id,
		'enq_id'=>$iid,
		'Franchisee_Name' => $fname1,
		'f_State'  => $fstate,
		'f_City' => $fcity,
		'stud_name' => $this->input->post('nm'),
		'enq_date' => $str1,
		'sadd' => $this->input->post('testo'),
		'contact' => $this->input->post('cont'),
		'email' => $this->input->post('email1'),
		'state_id' => $this->input->post('stat1'),
		'city_id' => $this->input->post('city'),
		'state' => $state_id,
		'city' => $city,
		'sfees' => $this->input->post('sfees'),
		'sdate' => $strr1,
		'course' => $this->input->post('course'),
		'Status' => 'Direct',
		'con_name'=>$this->input->post('conname'),
		'con_contact'=>$this->input->post('conmobile'),
		'n_status'=>'unread'
		);
		
		        $this->load->model('Fran_Data');
				$res=$this->Fran_Data->Fran_Data_Enquiry_Save($data1);
				if($res==true)
				{
					redirect('Franchisee/Daily_Enquiry');
				}
				else
				{
					echo "Your Data Is Not Inserted";
					redirect('Franchisee/Daily_Enquiry');
				}
		
		
		
	}
	public function conver_to_admission()
	{
		$id=$_POST['id'];
		$this->load->Model('Fran_Data');
		$res=$this->Fran_Data->save_admisson($id);
	}
	public function GetAdmissionData()
	{
		$data=$this->globaldata;
		$name= $this->input->post('term');	
	    $this->load->model('Fran_Data');	
	    $this->Fran_Data->getAddmissionstud($name,$this->globaldata['userdata']);
	}
	public function getCourseauto()
	{
		$name= $this->input->post('term');	
	    $this->load->model('Fran_Data');	
	    $this->Fran_Data->autocourse($name);
	}
	public function Daily_Enquiry()
	{
		
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
         	'city'=>$this->input->post('c')
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
         	$cname=$this->input->post('c');//course
         	$sname=$this->input->post('s');//student
 
	

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
            $this->load->Model('fran_display');
            $this->load->Model('display');
	        $data=$this->globaldata;

	        $config=array();
	        $config["base_url"]="http://localhost/CCA/index.php/Franchisee/Daily_Enquiry";
	        $config["total_rows"]=$this->fran_display->count_enquery($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = $pageindex;
	        
	        $this->pagination->initialize($config);
	        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data1['rowcount']=$this->fran_display->count_enquery($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
	        $data1['enquiry']=$this->fran_display->daliy_enquiry($config["per_page"], $pageindex,$this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
			$data1["links"] = $this->pagination->create_links();
            $data1['courses']=$this->display->getcourse();
			$this->load->view('Franchisee/header',$data);
			$this->load->view('Franchisee/Enquiry',$data1);
			$this->load->view('Franchisee/footer');
	 

	}
	
	public function Active_Fran_Update()
	{
		$remark=$this->input->post('testo1');
		$up_id=$this->input->post('bid');
		$this->load->Model('admission_data');
		$res=$this->admission_data->save_remark($up_id,$remark);
		if($res)
		{
			redirect('Admin/Fran_Admission');
		}
		else
		{
            
		}
	}
	
	
	public function Home()
	{
		$data=$this->globaldata;

		$this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Home');		
		$this->load->view('Franchisee/footer');
	}
	
	public function Generate_Excell()
	{
		$a=$_GET['id1'];
		$this->load->database();
		$query="select * from franchisee where F_id='$a'";
		$header = '';
		$data ='';
 		$export = mysql_query($query ) or die(mysql_error()); 		
		while ($fieldinfo=mysql_fetch_field($export))
		{
			$header .= $fieldinfo->name."\t";
		}
		while( $row = mysql_fetch_row( $export ) )
		{
    		$line = '';
    		foreach( $row as $value )
    		{                                            
        		if ( ( !isset( $value ) ) || ( $value == "" ) )
       		    {
            		$value = "\t";
       			 }
        		else
        		{
            		$value = str_replace( '"' , '""' , $value );
          		    $value = '"' . $value . '"' . "\t";
        		}
       		    $line .= $value;
    		}
    		$data .= trim( $line ) . "\n";
		}
		$data = str_replace( "\r" , "" , $data );
 
		if ( $data == "" )
		{
    		$data = "\nNo Record(s) Found!\n";                        
		}

		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=CCA-INDIA.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		print "\n$header\n\n$data";
 
	}
	/*****************************Starting Of All PDF*************************/
	public function create_pdf_all() 
	{	
		//$b=$_GET['id2'];
		$this->load->database();
		$sql="select * from franchisee";
		$res1=mysql_query($sql);
		 //while($row=mysql_fetch_array($res))
				//{
		while($row=mysql_fetch_array($res1))
		{
		$Name1 = 'CCA-INDIA'; 
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
 
			$pdf->SetCreator(PDF_CREATOR);
		    $pdf->SetAuthor('Nicola Asuni');
		    $pdf->SetTitle('TCPDF Example 001');
		    $pdf->SetSubject('TCPDF Tutorial');
		    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
 
		    // set default header data
		    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'','', array(255,255,255), array(255,255,255));
		    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
 
		    // set header and footer fonts
		    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
 
		    // set default monospaced font
		    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
 
		    // set margins
		    $pdf->setPrintHeader(false);
		    $pdf->SetMargins(PDF_MARGIN_LEFT, 1, PDF_MARGIN_RIGHT);    
		    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    

 
		    // set auto page breaks
		    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
		 
		    // set image scale factor
		    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
		 
		    // set some language-dependent strings (optional)
		    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		        require_once(dirname(__FILE__).'/lang/eng.php');
		        $pdf->setLanguageArray($l);
		    }   
 
		    // ---------------------------------------------------------    
		    $pdf->setFontSubsetting(true);   
		    $pdf->SetFont('dejavusans', '', 14, '', true);   
		    $pdf->AddPage(); 
		     $html = <<<EOD
	<style>
		p{
		font-size:10px;
		line-height : 5px;		
		}
		table, td, th {
   		 	border-bottom : 1px solid #46484a;
			border-top : 1px solid #46484a;
			border-left : 1px solid #46484a;
			border-right : 1px solid #46484a;
			font-size:12px;	
			padding:4px;			
		}
		th {
	    	background-color: green;
		    color: white;
			font-size:10px;
		}	
		img{
			height : 50px;
		}			
		
	</style>
	<div style="text-align:center;padding-top: -120px">
	<img height="120px" src="http://localhost/CCA/Style/images/cca-logo2.png"/>
	</div>
	<div style="border-top: 2px solid #F0AD55;">   
	
	<p>
	
	
	</p>
	
	 <table class="table">
               <thead >
                    <tr style="background-color:#F5F5F5;">
                        <th style="font-size:20px;">Name:</th>
                        <td>$row[Name]</td>
					</tr>	
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Institute Name:</th>
						<td>$row[Inst_name]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Address:</th>
						<td>$row[Badd]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">State:</th>
						<td>$row[State]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">City:</th>
						<td>$row[City]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Email Id:</th>
						<td>$row[Email]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Office No:</th>
						<td>$row[Contact]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Mobile No:</th>
						<td>$row[Mobile]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Branch:</th>
						<td>$row[Branch]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Location:</th>
						<td>$row[Location]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">User Name:</th>
						<td>$row[uname]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Password:</th>
						<td>$row[password]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Status:</th>
						<td>$row[status]</td>
					</tr>
					
                </thead>
                <tbody>
                 
                    
                </tbody>
               

            </table>	
			<div>
			
			</div>
	</div>
EOD;

  	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	}
	$filename='C:/xampp/htdocs/CCA/PDFDATA/'.$Name1.ltrim(".")."pdf";
	$pdf->Output($filename, 'F'); 
	
    //$pdf->Output('test.pdf', 'F');	
	redirect('Admin/Franchisee');
    //============================================================+
    // END OF FILE
    //============================================================+ 


	}
	/******************************End Of ALL PDF****************************/
	/***************************Starting**************************************/
	public function create_pdf() {	
		$b=16;
		$this->load->database();
		$sql="select * from franchisee where F_id='$b' ";
		$res1=mysql_query($sql);
		$row=mysql_fetch_array($res1);
		
		$mobile = $row['Mobile'];
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
 
			$pdf->SetCreator(PDF_CREATOR);
		    $pdf->SetAuthor('Nicola Asuni');
		    $pdf->SetTitle('TCPDF Example 001');
		    $pdf->SetSubject('TCPDF Tutorial');
		    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
 
		    // set default header data
		    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'','', array(255,255,255), array(255,255,255));
		    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
 
		    // set header and footer fonts
		    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
 
		    // set default monospaced font
		    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
 
		    // set margins
		    $pdf->setPrintHeader(false);
		    $pdf->SetMargins(PDF_MARGIN_LEFT, 1, PDF_MARGIN_RIGHT);    
		    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    

 
		    // set auto page breaks
		    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
		 
		    // set image scale factor
		    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
		 
		    // set some language-dependent strings (optional)
		    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		        require_once(dirname(__FILE__).'/lang/eng.php');
		        $pdf->setLanguageArray($l);
		    }   
 
		    // ---------------------------------------------------------    
		    $pdf->setFontSubsetting(true);   
		    $pdf->SetFont('dejavusans', '', 14, '', true);   
		    $pdf->AddPage(); 
		     $html = <<<EOD
	<style>
		p{
		font-size:10px;
		line-height : 5px;		
		}
		table, td, th {
   		 	border-bottom : 1px solid #46484a;
			border-top : 1px solid #46484a;
			border-left : 1px solid #46484a;
			border-right : 1px solid #46484a;
			font-size:12px;	
			padding:4px;			
		}
		th {
	    	background-color: green;
		    color: white;
			font-size:10px;
		}	
		img{
			height : 50px;
		}			
		
	</style>
	<div style="text-align:center;padding-top: -120px">
	<img height="120px" src="http://localhost/CCA/Style/images/cca-logo2.png"/>
	</div>
	<div style="border-top: 2px solid #F0AD55;">   
	
	<p>
	</p>
	
	 <table class="table">
               <thead >
                    
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">Address:</th>
						<td>$row[Badd]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">State:</th>
						<td>$row[State]</td>
					</tr>
					
					<tr style="background-color:#F5F5F5;">
						<th style="font-size:20px;">City:</th>
						<td>$row[City]</td>
					</tr>
					
					
					
                </thead>
                <tbody>
                 
                    
                </tbody>
               

            </table>	
			<div>
			
			</div>
	</div>
EOD;
  				   
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
 
    // ---------------------------------------------------------    
 
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    
    $filename="f.pdf";
   //die("asdasdsd");
    $pdf->Output($filename, 'D'); 
    	
	//redirect('Admin/Franchisee');
	}
  

  public function Excell_by_cat()
  {
  	$fdt=$_GET['fdate'];
  	$tdt=$_GET['todate'];
    
    		$farr=array();
			$tarr=array();

			$farr =explode("/",$fdt); 
			$farr=array_reverse($farr);
			$fromdate1 =implode($farr,"/");
			$fromdate=str_replace("/","-",$fromdate1);

			$tarr =explode("/",$tdt); 
			$tarr=array_reverse($tarr);
			$newtdate1 =implode($tarr,"/");
			$todate=str_replace("/","-",$newtdate1); 

  	$this->load->model('order_mod');
  	$this->order_mod->get_fran_excel_cat($fromdate,$todate,$this->globaldata['userdata']);
  }

  public function Pdf_By_Cat()
  {
  	  $fdt=$_GET['fdate'];
  	  $tdt=$_GET['todate'];
    
    		$farr=array();
			$tarr=array();

			$farr =explode("/",$fdt); 
			$farr=array_reverse($farr);
			$fromdate1 =implode($farr,"/");
			$fromdate=str_replace("/","-",$fromdate1);

			$tarr =explode("/",$tdt); 
			$tarr=array_reverse($tarr);
			$newtdate1 =implode($tarr,"/");
			$todate=str_replace("/","-",$newtdate1); 

  	$this->load->model('order_mod');
  	$this->order_mod->get_fran_pdf_cat($fromdate,$todate,$this->globaldata['userdata']);
  }

  
 public function placement()
 {
 	$this->load->model('display');
	$data1['enquiry']=$this->display->fran_Placement();
 	$data=$this->globaldata;
 	$this->load->view('Franchisee/header',$data);
	$this->load->view('Franchisee/Placement',$data1);
	$this->load->view('Franchisee/footer');
 } 
 
 
 public function placement_data()
 {
 			
		$up_id = $this->input->post('bid');	
		$b="";
		$a=$this->globaldata['userdata'];
		$fid=$a->fran_id;
		$f_name=$a->institute_name;
		$st=$a->state;
		$ct=$a->city;

		$config['upload_path'] = base_url().'/uploads/FranPlacement/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = '150';
		$config['max_height']  = '150';
		
		$this->load->library('upload', $config);
		if ( !$this->upload->do_upload('upload'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} 
		else
		{
			 $data = array('upload_data' => $this->upload->data());
			 foreach($data as $d)
			 {
			   echo  $b= $d['file_name'];
			 }
			 die("asdsadd");
		}
	    if($up_id!="")
	    {
					if($b=="")
					{
					$data1 = array(
					
						'sname' => $this->input->post('name1'),
						'cname' => $this->input->post('cname1'),
						'designation' => $this->input->post('desi'),
						'salary' => $this->input->post('slr')
							//'image' => $b
							);
					}
					else if($b!="")
					{
			    	 $data1 = array(
							'sname' => $this->input->post('name1'),
							'cname' => $this->input->post('cname1'),
							'designation' => $this->input->post('desi'),
							'salary' => $this->input->post('slr'),
							'image' => $b
							);
				    	/*$this->db->select('image');
				    	$this->db->where('id',$up_id);
				    	$qry=$this->db->get('fran_placement');
				    	$res=$qry->result_array();
				    	$oldimg=$res[0]['image'];
				      	$dir=base_url().'uploads/FranPlacement/'.$oldimg;*/
				    	
				       
	             
					}
					$this->load->model('Fran_Data');
					$res=$this->Fran_Data->fran_place_update($data1,$up_id);
					redirect('Franchisee/placement');
			    	 
	    }
	    else
	    {
			    $data = array(
					'f_id'=>$fid,
					'fname'=>$f_name,
					'fstate'=>$st,
					'fcity'=>$ct,
				'sname' => $this->input->post('name1'),
				'cname' => $this->input->post('cname1'),
				'designation' => $this->input->post('desi'),
				'salary' => $this->input->post('slr'),
				'image' => $b
				);
				$this->load->model('Fran_Data');
				$res=$this->Fran_Data->Fran_Placement_Data($data);
				if($res==true)
				{
				redirect('Franchisee/placement');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Franchisee/placement');
				}
		}
 }
 
 
 public function Delete1()
 {
 	$a= $_POST['id'];
	$this->load->model('Fran_Data');
	$res=$this->Fran_Data->dele1($a);
				if($res==true)
				{
				redirect('Franchisee/placement');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Franchisee/placement');
				}
 	
 }
 
public function get_stud_for_placement()
{
	$name=$this->input->post('term');
	$this->load->Model("Fran_Data");
	$this->Fran_Data->get_stud_placement($this->globaldata['userdata'],$name);
}

public function get_stud_for_placement1()
{
	$name=$this->input->post('term');
	$this->load->Model("Fran_Data");
	$this->Fran_Data->get_stud_placement1($this->globaldata['userdata'],$name);
}



public function Download()
	{
		$this->load->Model('download_mod');
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');
		$data=$this->globaldata;
		$data1['fdata']=$this->globaldata['userdata'];
		
		
        /*88888888888888888888888888888Paging8888888888888888888888*/
          $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex')
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
         	$pageindex=intval(($pageindex-1)*8);
         }
		 

		/*8888888888888888888888888888paging End88888888888888*/ 
		$config=array();
        $config["base_url"]=base_url()."index.php/Franchisee/Download";
        $config["total_rows"]=$this->download_mod->get_Download_Details_count();
        $config["per_page"] = 8;
        $config["uri_segment"] = $pageindex;
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1['result']=$this->download_mod->get_Download_Details($config['per_page'],$pageindex);
        $data1["rowcount"]=$this->download_mod->get_Download_Details_count();
        $this->pagination->initialize($config);	
        $data1["links"] = $this->pagination->create_links();
        $data['fdata']=$this->globaldata['userdata'];
		
		$this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Deownload1',$data1);		
		$this->load->view('Franchisee/footer');
	}

	/*public function summary()
	{
		 $this->load->Model("display");
		 $data1['result']=$this->display->get_summary_details($this->globaldata['userdata']);
		 print_r($data1['result']);
	}*/
	

	public function create_cert1()
	{
		 /***************For Paging *****************************/

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
         	'stud'=>$this->input->post('s'),
         	'cou'=>$this->input->post('cou')
         	);
 
         $pageindex=$this->input->post("pindex");
         
        
         
  
         if($pageindex=="")
         {
         	$pageindex=0;
         }
         else if($pageindex>=1)
         {
         	$pageindex=intval(($pageindex-1)*5);
         }
         else
         {
         	$pageindex=0;
         }
                    
         	$fdt=$fromdate;
         	$tdt=$todate;
         	$course=$this->input->post('cou');
         	$stud=$this->input->post('s');
 
	

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



		 /*******************Paging end**********************/
		 $data=$this->globaldata; 
		 $this->load->Model('fran_display');
		 $this->load->Model('display');

	        $config=array();
	        $config["base_url"]=base_url()."index.php/Franchisee/create_cert1";
	        $config["total_rows"]=$this->fran_display->get_certi_berfore_data_count1($from_dt,$to_dt,$stud,$course,$this->globaldata['userdata']);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = $pageindex;
	        
	        $data1['result']=$this->fran_display->get_certi_berfore_data1($config['per_page'],$pageindex,$from_dt,$to_dt,$stud,$course,$this->globaldata['userdata']);
	        $data1["rowcount"]=$this->fran_display->get_certi_berfore_data_count1($from_dt,$to_dt,$stud,$course,$this->globaldata['userdata']);
	        $this->pagination->initialize($config);	
	        $data1["links"] = $this->pagination->create_links();

	    	$data1['courses']=$this->display->getcourse();

			 $this->load->view('Franchisee/header',$data);
			 $this->load->view('Franchisee/generate_certi',$data1);
			 $this->load->view('Franchisee/footer');
	}

 public function getCertiStude()
 {
 	$name=$this->input->post('term');
 	$this->load->Model('fran_display');
 	$this->fran_display->get_certi_stud($name,$this->globaldata['userdata']);
 }


 public function GetstudCertiPdf()
	{
		$this->load->Model('exam_certi');
		$id=$_GET['id'];
		$course=$_GET['course'];
                
        if($course=="Master In Excel")
        {
        	$this->exam_certi->Master_Excel_certi($id);	
        }
        else if($course=="Smart Excell")
        {
        	$this->exam_certi->Smart_Excel_certi($id);
        }
        else if($course=="Smart Tally")
        {
        	$this->exam_certi->Smart_Tally_certi($id);
        }
        else if($course=="Tally Professional")
        {
        	$this->exam_certi->Tally_prof_certi($id); 
        } 

	}
   

   public function Receipt()	 
	{
			
         $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
			'std'=>$this->input->post('std')
         );         
         $pageindex=$this->input->post("pindex");
         if($pageindex=="")
         {
         	$pageindex=0;
         }
         else if($pageindex >=1)
         {
         	$pageindex=intval(($pageindex-1)*10);
         }
         else
         {
         	$pageindex=0;
         }
		 
		 
		$std=$this->input->post('std');
		
	
		 $this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Franchisee/Receipt";
        $config["total_rows"]=$this->display->Reeipt_display($std);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        $data1["results"] = $this->display->Receipt_Paging($config["per_page"], $pageindex,$std);
		$data1['rowcount']=$this->display->Reeipt_display($std);
        $data1["links"] = $this->pagination->create_links();		
		
			$data=$this->globaldata;
			$this->load->view('Franchisee/header',$data);
			$this->load->view('Franchisee/Receipt',$data1);
			$this->load->view('Franchisee/footer');
	}	
	

public function Expense()	 
	{
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
         	'to_date'=>$todate
         );         
         $pageindex=$this->input->post("pindex");
         if($pageindex=="")
         {
         	$pageindex=0;
         }
         else if($pageindex >=1)
         {
         	$pageindex=intval(($pageindex-1)*2);
         }
         else
         {
         	$pageindex=0;
         }
		 
		 $fdt=$fromdate;
         $tdt=$todate;
		//$std=$this->input->post('std');
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
        $config["base_url"]=base_url()."index.php/Franchisee/Receipt";
        $config["total_rows"]=$this->display->Expense_display($from_dt,$to_dt);
        $config["per_page"] = 2;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        $data1["results"] = $this->display->Expense_Paging($config["per_page"], $pageindex,$from_dt,$to_dt);
		$data1['rowcount']=$this->display->Expense_display($from_dt,$to_dt);
        $data1["links"] = $this->pagination->create_links();		
		
		$data=$this->globaldata;
		$this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Expense',$data1);
		$this->load->view('Franchisee/footer');
	}





}

	