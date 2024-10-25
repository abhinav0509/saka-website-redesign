<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Franchisee extends CI_Controller {
	 var $globaldata;
     function __construct()
     {
	 
		
     	 parent::__construct();
		 $this->load->library("Pdf");
		 $this->load->database();
		
		 $var=$this->session->userdata;
	   	 if(isset($var['login_user1']))
     	 {
          
          $this->globaldata=array(
		  'userdata'=>$var['login_user1']
	 );
       }

     }
	 
 public function GetFranData()
	{	
	  
	    $name= $this->input->post('term');	
	    $this->load->model('Fran_Data');	
	    $this->Fran_Data->getdata($name);
	
	}
	
public function GetFranData1()
	{	
	  
	    $name= $this->input->post('term');	
	    $this->load->model('Fran_Data');	
	    $this->Fran_Data->getdata1($name);
	
	}

public function get_single_enquiry_excel()
{
	$id=$_GET['id'];
	$name=$_GET['name'];
	
	$this->load->model('Excell');
	$this->Excell->get_single_fran_enquiry_excel($id,$name);
}
public function get_single_enquiry_pdf()
{
	$id=$_GET['id'];
	
	$this->load->model('Excell');
	$this->Excell->get_single_fran_enquiry_pdf($id);
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
		
					$data1 = array(
					'stud_name' => $this->input->post('nm'),
					'enq_date' => $this->input->post('pcont'),
					'sadd' => $this->input->post('testo'),
					'contact' => $this->input->post('cont'),
					'email' => $this->input->post('email1'),
					'state' => $this->input->post('stat'),
					'city' => $this->input->post('city'),
					'course' => $this->input->post('course')
		);
					$this->load->model('Fran_Data');
					$res=$this->Fran_Data->Fran_Data_Enquiry_Update($data1,$up_id);
					redirect('Franchisee/Daily_Enquiry');
			    	
}

public function Active_Fran_enquiry_Update()
{
	$up_id = $this->input->post('bid');
	$data1 = array(
					'remark' => $this->input->post('testo1')
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
         	$pageindex=1;
         }
         else
         {
         	
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
        $data1['rowcount']=$this->order_mod->fr_order_count($this->globaldata['userdata'],$from_dt,$to_dt);


		$data1['Order1']=$this->order_mod->get_order_det($config["per_page"],$pageindex,$from_dt,$to_dt,$this->globaldata['userdata']);
		$this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Book',$data1);		
		$this->load->view('Franchisee/footer');
	}
	
	
	public function Admission()
	{
		
		$this->load->model('display');
		       
        if(isset($_POST['fdate'],$_POST['todate'],$_POST['sname'],$_POST['cname']))
        {
        	$fdt=$_POST['fdate'];
        	$tdt=$_POST['todate'];
        	$cname=$_POST['cname'];
        	$sname=$_POST['sname'];

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
        } 
        else
        {
        	$fromdate="";
        	$todate="";
        	$cname="";
        	$sname="";
        }
        if($fromdate!="" && $todate!="" && $cname!="" && $sname!="")
        {
        	$data1=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
            print_r(json_encode($data1));
        }
        else if($fromdate!="" && $todate=="" && $cname!="" && $sname=="")
        {
        	$data1=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
            print_r(json_encode($data1));
        }
        else if($fromdate!="" && $todate=="" && $cname!="" && $sname!="")
        {
        	$data1=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
            print_r(json_encode($data1));
        }
        else if($fromdate!="" && $todate=="" && $cname=="" && $sname!="")
        {
        	$data1=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
            print_r(json_encode($data1));
        }
        else if($fromdate=="" && $todate=="" && $cname=="" && $sname!="")
        {
        	$data1=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
            print_r(json_encode($data1));
        }
        else if($fromdate!="" && $todate=="" && $cname=="" && $sname=="")
        {
        	$data1=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
            print_r(json_encode($data1));
        }
        else if($fromdate=="" && $todate=="" && $cname!="" && $sname=="")
        {
        	$data1=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
            print_r(json_encode($data1));
        }
         else if($fromdate!="" && $todate!="" && $cname=="" && $sname=="")
        {
        	$data1=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
            print_r(json_encode($data1));
        }
         else if($fromdate!="" && $todate=="" && $cname!="" && $sname=="")
        {
        	$data1=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
            print_r(json_encode($data1));
        }
        else
        {
        	$data=$this->globaldata;
        	$data1['max_id']=$this->display->getmax_id();
        	$data1['fdata']=$this->globaldata['userdata']; 
           	$data1['courses']=$this->display->getcourse();
        	$data1['fdata']=$this->globaldata['userdata'];
			$data1['Order1']=$this->display->Admission($this->globaldata['userdata'],$sname,$cname,$fromdate,$todate);
			$this->load->view('Franchisee/header',$data);
			$this->load->view('Franchisee/Admission',$data1);
			$this->load->view('Franchisee/footer');
        }
		
	}
	
	
	public function Daily_Enquiry_Save()
	{

		$up_id = $this->input->post('bid');
		$data=$this->globaldata['userdata'];
		$endt=$this->input->post('pcontt');
		$arr =explode("/",$endt); 
		$arr=array_reverse($arr);
		$str =implode($arr,"/");
		$str1=str_replace("/","-",$str);
		
		$fid=$data->cus_id;
		$fstate=$data->state;
		$fcity=$data->city;
		$fname1=$data->institute_name;
		$data1 = array(
		'f_id' => $fid,
		'Franchisee_Name' => $fname1,
		'f_State'  => $fstate,
		'f_City' => $fcity,
		'stud_name' => $this->input->post('nm'),
		'enq_date' => $str1,
		'sadd' => $this->input->post('testo'),
		'contact' => $this->input->post('cont'),
		'email' => $this->input->post('email1'),
		'state' => $this->input->post('stat'),
		'city' => $this->input->post('city'),
		'course' => $this->input->post('course'),
		'Status' => 'Direct'
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
		$data=$this->globaldata;
		$this->load->model('fran_display');
		$this->load->model('display');
		
		if(isset($_POST['stud_name']))
		{
			$snm=$_POST['stud_name'];
		}
		else
		{
            $snm="";
		}
         
        if(isset($_POST['todt'],$_POST['fdt']))
		{
			$farr=array();
			$tarr=array();
			$to_date1=$_POST['todt'];
			$from_date1=$_POST['fdt'];
			
			

			$farr =explode("/",$from_date1); 
			$farr=array_reverse($farr);
			$from_date2 =implode($farr,"/");
			$from_date=str_replace("/","-",$from_date2);
			
            
			$tarr =explode("/",$to_date1); 
			$tarr=array_reverse($tarr);
			$to_date2 =implode($tarr,"/");
			$to_date=str_replace("/","-",$to_date2);	
			

		}
		else
		{
			$to_date="";
			$from_date="";
		}

        if($from_date!="" && $to_date!="")
        {
 			$config=array();
	        $config["base_url"]="http://localhost/CCA/index.php/Franchisee/Daily_Enquiry";
	        $config["total_rows"]=$this->fran_display->count_enquery($this->globaldata['userdata']);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 10;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data2=$this->fran_display->daliy_enquiry($config["per_page"], $page,$this->globaldata['userdata'],$from_date,$to_date,$snm);
			$data1["links"] = $this->pagination->create_links();
            print_r(json_encode($data2));
			
        } 
        else if($snm!="")
        {
        	$config=array();
	        $config["base_url"]="http://localhost/CCA/index.php/Franchisee/Daily_Enquiry";
	        $config["total_rows"]=$this->fran_display->count_enquery($this->globaldata['userdata']);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 10;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data2=$this->fran_display->daliy_enquiry($config["per_page"], $page,$this->globaldata['userdata'],$from_date,$to_date,$snm);
			$data1["links"] = $this->pagination->create_links();
			print_r(json_encode($data2));
        }
        else
        {
	        $config=array();
	        $config["base_url"]="http://localhost/CCA/index.php/Franchisee/Daily_Enquiry";
	        $config["total_rows"]=$this->fran_display->count_enquery($this->globaldata['userdata']);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 10;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data1['enquiry']=$this->fran_display->daliy_enquiry($config["per_page"], $page,$this->globaldata['userdata'],$from_date,$to_date,$snm);
			$data1["links"] = $this->pagination->create_links();
            $data1['courses']=$this->display->getcourse();
			$this->load->view('Franchisee/header',$data);
			$this->load->view('Franchisee/Enquiry',$data1);
			$this->load->view('Franchisee/footer');
	   }

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
}

	