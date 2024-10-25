<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DemoLogin extends CI_Controller {
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
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
		$this->load->view('Demo_Fran_Login');
	}
	public function Home()
	{
		$data=$this->globaldata;
		$this->load->view('DemoFranchisee/header1',$data);
		$this->load->view('DemoFranchisee/Home');
		$this->load->view('DemoFranchisee/footer');
	}
	
	
	
     public function enquiry_del()
     {
     	$id=$_POST['id'];
     	$this->load->model('demo_enquiry');
     	$result=$this->demo_enquiry->dele($id);
     	if($result)
     	{
     		$data['res']="success";

     	}
     	else
     	{
     		$data['res']="False";
     	}

     } 
	
	
	
	public function Enquiry()
	{
		/*$this->load->model('display');
        $data1['enquiry']=$this->display->Demo_Franchisee_display();
		$data=$this->globaldata;
		$data1['courses']=$this->display->getcourse();
		$this->load->view('DemoFranchisee/header1',$data);
		$this->load->view('DemoFranchisee/Enquiry',$data1);
		$this->load->view('DemoFranchisee/footer');*/
		
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
         else if($pageindex!=1)
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
            $this->load->Model('demo_enquiry');
            $this->load->Model('display');
	        $data=$this->globaldata;

	        $config=array();
	        $config["base_url"]=base_url()."index.php/DemoLogin/Enquiry";
	        $config["total_rows"]=$this->demo_enquiry->count_enquery($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = $pageindex;
	        
	        $this->pagination->initialize($config);
	        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data1['rowcount']=$this->demo_enquiry->count_enquery($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
	        $data1['enquiry']=$this->demo_enquiry->daliy_enquiry($config["per_page"], $pageindex,$this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
			$data1["links"] = $this->pagination->create_links();
            $data1['courses']=$this->display->getcourse();
			$this->load->view('DemoFranchisee/header1',$data);
			$this->load->view('DemoFranchisee/Enquiry',$data1);
			$this->load->view('DemoFranchisee/footer');
	 

		
		
		
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

		
		//$fran_id=$data->fran_id;
		$fid=$data->cus_id;
		$fstate=$data->state;
		$fcity=$data->city;
		//print_r($data);
		//die();
		$fname1=$data->institute_name;
		$this->db->select('Max(enq_id) As idd');
		$this->db->where('fid',$fid);
		$query12=$this->db->get('demoenquiry');
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
		
		//'franid'=>$fran_id,
		//'Franchisee_Name' => $fname1,
		//'f_State'  => $fstate,
		//'f_City' => $fcity,
		'fid' => $fid,
		'enq_id'=>$iid,
		'Franchisee_Name'=>$fname1,
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
		'con_name' => $this->input->post('conname'),
		'con_contact' => $this->input->post('conmobile'),
		'Status' => 'Direct'
		);
		
		        $this->load->model('demo_enquiry');
				$res=$this->demo_enquiry->Fran_Data_Enquiry_Save($data1);
				if($res==true)
				{
					redirect('DemoLogin/Enquiry');
				}
				else
				{
					echo "Your Data Is Not Inserted";
					redirect('DemoLogin/Enquiry');
				}
		
		
		
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
					'con_name'=>$this->input->post('conname'),
					'con_contact'=>$this->input->post('conmobile'),
					
					'city' => $city,
					'course' => $this->input->post('course')
		            );
					$this->load->model('demo_enquiry');
					$res=$this->demo_enquiry->Fran_Data_Enquiry_Update($data1,$up_id);
					redirect('DemoLogin/Enquiry');
			    	
}
	
public function Demo_Admission()
	{
		/*$this->load->model('display');
        $data1['enquiry']=$this->display->Demo_Franchisee_Admission_display();
		$data=$this->globaldata;          
		$data1['courses']=$this->display->getcourse();
		$this->load->view('DemoFranchisee/header1',$data);
		$this->load->view('DemoFranchisee/Admission',$data1);
		$this->load->view('DemoFranchisee/footer');*/
		
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
         	'cname'=>$this->input->post('c')
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
         else if($pageindex!=1)
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
            $this->load->Model('demo_enquiry');
            $this->load->Model('display');
	        $data=$this->globaldata;

	        $config=array();
	        $config["base_url"]=base_url()."index.php/DemoLogin/Demo_Admission";
	        $config["total_rows"]=$this->demo_enquiry->count_enquery1($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = $pageindex;
	        
	        $this->pagination->initialize($config);
	        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data1['rowcount']=$this->demo_enquiry->count_enquery1($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
	        $data1['enquiry']=$this->demo_enquiry->daliy_enquiry1($config["per_page"], $pageindex,$this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
			$data1["links"] = $this->pagination->create_links();
            $data1['courses']=$this->display->getcourse();
			$this->load->view('DemoFranchisee/header1',$data);
			$this->load->view('DemoFranchisee/Admission',$data1);
			$this->load->view('DemoFranchisee/footer');
	 
		
		
		
	}	
	
	
public function Demo_Fran_Admission()
{
  				$arr=array();
  				$farr=array();
  				$b="";
				$data=$this->globaldata['userdata'];
				$fid=$data->cus_id;
				$fname1=$data->institute_name;
				$up_id = $this->input->post('bid');
				$config['upload_path'] = './uploads/Demo_Admission/';
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
			       $b= $d['file_name'];
			 	}
				
				}
				$endt=$this->input->post('doa');
				$arr =explode("/",$endt); 
				$arr=array_reverse($arr);
				$str =implode($arr,"/");
				$str1=str_replace("/","-",$str);

				echo $edt=$this->input->post('edt');
				$farr =explode("/",$edt); 
				$farr=array_reverse($farr);
				$strr =implode($farr,"/");
				echo $str2=str_replace("/","-",$strr);
				

	
	$data = array(
					'fran_Name' => $fname1,
					'fid' => $fid,
					'ad_id' => $this->input->post('max_id'),
					'stud_id' => $this->input->post('sid'),
					'name' => $this->input->post('sname'),
					'email' => $this->input->post('eml'),
					'add' => $this->input->post('add'),
					'contact' => $this->input->post('cnt'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'qualification' => $this->input->post('quali'),
					'course_Name' => $this->input->post('course'),
					'center_name' => $this->input->post('cent'),
					'course_date' => $str1,
					'exame_date' => $str2,
					'timing' => $this->input->post('btime'),
					'remark' => $this->input->post('remark'),
					'image' => $b,
					'exm_status'=>'notactive',
					'remark'=>0,
					'O_Status'=>0,
					'P_Req'=>0
		);
	

					$this->load->model('demo_enquiry');
					$res=$this->demo_enquiry->Demo_Admission($data);
					redirect('DemoLogin/Demo_Admission');
}
	
	
	public function Delete_Data()
 {
 	$a= $_POST['id'];
	$this->load->model('demo_enquiry');
	$res=$this->demo_enquiry->dele1($a);
				if($res==true)
				{
					redirect('DemoLogin/Demo_Admission');
				}
				else
				{
					echo "Your Data Is Not Inserted";
					redirect('DemoLogin/Demo_Admission');
				}
 	
 }	
 
	
public function addmissin_update()
{
		$arr=array();
		$farr=array();
		$up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/Demo_Admission/';
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
			    $b= $d['file_name'];
			 }
		}


				$endt=$this->input->post('doa');
				$arr =explode("/",$endt); 
				$arr=array_reverse($arr);
				$str =implode($arr,"/");
				$str1=str_replace("/","-",$str);

				$edt=$this->input->post('edt');
				$farr =explode("/",$edt); 
				$farr=array_reverse($farr);
				$strr =implode($farr,"/");
				$str2=str_replace("/","-",$strr);

					if($b!="")
					{
						$data1 = array(
					
					'name' => $this->input->post('sname'),
					'email' => $this->input->post('eml'),
					'add' => $this->input->post('add'),
					'contact' => $this->input->post('cnt'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'qualification' => $this->input->post('quali'),
					'course_Name' => $this->input->post('course'),
					'center_name' => $this->input->post('cent'),
					'course_date' => $str1,
					'exame_date' => $str2,
					'timing' => $this->input->post('btime'),
					'remark' => $this->input->post('remark'),
					'image' => $b
		);
						$this->load->model('demo_enquiry');
						$res=$this->demo_enquiry->Update_Demo_Admiossion($data1,$up_id);
						redirect('DemoLogin/Demo_Admission');
					}
					else if($b=="")
					{
						$data1 = array(
					
					'name' => $this->input->post('sname'),
					'email' => $this->input->post('eml'),
					'add' => $this->input->post('add'),
					'contact' => $this->input->post('cnt'),
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'qualification' => $this->input->post('quali'),
					'course_Name' => $this->input->post('course'),
					'center_name' => $this->input->post('cent'),
					'course_date' => $str1,
					'exame_date' => $str2,
					'timing' => $this->input->post('btime'),
					'remark' => $this->input->post('remark'),
					
		);

						$this->load->model('demo_enquiry');
						$res=$this->demo_enquiry->Update_Demo_Admiossion($data1,$up_id);
						redirect('DemoLogin/Demo_Admission');
					}	
	}	

public function GetAdmissionData()
	{
		$data=$this->globaldata;
		$name= $this->input->post('term');	
		$this->load->model('demo_enquiry');	
	    $this->demo_enquiry->getAddmissionstud1($name,$this->globaldata['userdata']);
	}
		
	 public function GetFranData()
	{	
	  
	    $name= $this->input->post('term');	
	    $this->load->model('demo_enquiry');	
	    $this->demo_enquiry->getdata($name);
	
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
         else if($pageindex!=1)
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
            $this->load->Model('demo_enquiry');
            $this->load->Model('display');
	        $data=$this->globaldata;

	        $config=array();
	        $config["base_url"]=base_url()."index.php/DemoLogin/Enquiry";
	        $config["total_rows"]=$this->demo_enquiry->count_enquery($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = $pageindex;
	        
	        $this->pagination->initialize($config);
	        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data1['rowcount']=$this->demo_enquiry->count_enquery($this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
	        $data1['enquiry']=$this->demo_enquiry->daliy_enquiry($config["per_page"], $pageindex,$this->globaldata['userdata'],$from_dt,$to_dt,$sname,$cname);
			$data1["links"] = $this->pagination->create_links();
            $data1['courses']=$this->display->getcourse();
			$this->load->view('DemoFranchisee/header1',$data);
			$this->load->view('DemoFranchisee/Enquiry',$data1);
			$this->load->view('DemoFranchisee/footer');
	 

	}
	
	
	
	public function Book_Order()
	{
		
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');
		$data=$this->globaldata;
		$data1['fdata']=$this->globaldata['userdata'];
		$this->load->model('demo_enquiry');		
		
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
        $config["base_url"]=base_url()."index.php/DemoLogin/Book_Order";
        $config["total_rows"]=$this->demo_enquiry->fr_order_count($this->globaldata['userdata'],$from_dt,$to_dt);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
        $data1['rowcount']=$this->demo_enquiry->fr_order_count($this->globaldata['userdata'],$from_dt,$to_dt);


		$data1['Order1']=$this->demo_enquiry->get_order_det($config["per_page"],$pageindex,$from_dt,$to_dt,$this->globaldata['userdata']);
		$this->load->view('DemoFranchisee/header1',$data);
		$this->load->view('DemoFranchisee/Order',$data1);		
		$this->load->view('DemoFranchisee/footer');
	}
	
	
	 public function Insert_order()
    {
        $stud=$this->input->post('stud');
        $course=$this->input->post('course');
        $price=$this->input->post('price');
        $qty=$this->input->post('qty');
        $tot=$this->input->post('tot');
        $this->globaldata;
        $book_name=$this->input->post('selectedval');
        

        $data=array('student_name'=>$stud,
        	        'course_name'=>$course,
                    'Book_Name'=>$book_name,
        	        'price'=>$price,
        	        'quantity'=>$qty,
        	        'total'=>$tot
					
        	);
        $this->load->model('demo_enquiry');
        $res=$this->demo_enquiry->order_insert($data,$this->globaldata['userdata']); 
        if($res)
        {
        	$mess="Order Placed.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('DemoLogin/Book_Order');
        }
        else
        {
        	$mess="We recieved Mail.....! We will contact you.";
        	$this->session->set_userdata('msg',$mess);
        	redirect('DemoLogin/Book_Order');
        }
    }
	
	
	public function Insert_new_Fran()
     {
     	$email=$this->input->post('mail');
     	$dt=date('Y-m-d');

      $state=$this->input->post('state');
      $city=$this->input->post('city');
      $query=$this->db->get_where("state",array('state_id'=>$state));
      $result=$query->result_array();
      $query1=$this->db->get_where("city",array('city_id'=>$city));
      $result1=$query1->result_array();
      $state_name=$result[0]['name'];
      $city_name=$result1[0]['name'];
    
      $this->db->select('Max(cus_id) As idd');
      $query12=$this->db->get('democustomer');
      $des=$query12->result_array();
      $id1=$des[0]['idd'];
      if($id1=="")
      {
        $id1=1;
      }
      else
      {
        $id1=$id1+1;
      }

      $str=substr($state_name, 0,1);
      $str1=substr($state_name, 2,1);

      $str3=strtoUpper(substr($city_name, 0,2));//city
      $str2=strtoUpper($str.$str1);//state

      $frn_id=$str2."CF".$id1;
          
     	$data=array(
           'email'=>$this->input->post('mail'),
           'fran_id'=>$frn_id,
           'password'=>$this->input->post('pwd'),
           'fname'=>$this->input->post('fname'),
           'role'=>'franchisee',
           'date'=>$dt,
           'status'=>$this->input->post('status')
          );

     	$data1=array(
           'femail'=>$this->input->post('mail'),
           'fran_id'=>$frn_id,
           'state'=>$this->input->post('state'),
           'city'=>$this->input->post('city'),
           'cus_mobile'=>$this->input->post('cont'),
           'institute_name'=>$this->input->post('ins')
          );
      
      $add1=$this->input->post('add')." ".$state_name." ".$city_name;
      $data2=array(
          'address'=>$add1,
          'lati'=>$this->input->post('lat'),
          'longi'=>$this->input->post('lng')
        );

     	$this->load->Model('demo_enquiry');
     	$mess=$this->demo_enquiry->save_new_fran($data,$data1,$data2,$email);
        if($mess)
    	{
    		$mess="New Franchisee Created.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/Demo_Fran_List');
    	}
    	else
    	{
    		$mess="Error in Saving or Franchisee already exists.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/Demo_Fran_List');
    	}

     }
    	
	public function update_fran()
    {

        $cus_id=$this->input->post('bid');
        $dt=date('Y-m-d');
        $data=array(
           'email'=>$this->input->post('mail'),
           'password'=>$this->input->post('pwd'),
           'fname'=>$this->input->post('fname'),
           'role'=>'franchisee',
           'date'=>$dt,
           'status'=>$this->input->post('status')
          );

       $data1=array(
           'femail'=>$this->input->post('mail'),
           'state'=>$this->input->post('state'),
           'city'=>$this->input->post('city'),
           'cus_mobile'=>$this->input->post('cont'),
           'institute_name'=>$this->input->post('ins')
          );

      $this->load->Model('demo_enquiry');
      $mess=$this->demo_enquiry->fran_update($data,$data1,$cus_id);
        if($mess)
        {
          $mess="Franchisee Record Updated.....!";
          $this->session->set_userdata('msg',$mess);
          redirect('Admin/Demo_Fran_List');
        }
      else
      {
        $mess="Error in Updating Franchisee Record.....!";
          $this->session->set_userdata('msg',$mess);
          redirect('Admin/Demo_Fran_List');
      }
    }
    
	public function Delete()
 {
 	$a= $_POST['F_id'];
    $this->load->Model('demo_enquiry');
	$res=$this->demo_enquiry->del_act_fran($a);
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
	 
	
	
	public function GetFranData1()
	{	
	   $name= $this->input->post('term');	
	    $this->load->model('demo_enquiry');	
	    $this->demo_enquiry->getdata1($name);
	
	}
	
		
public function GetFranData2()
	{	
	    $name= $this->input->post('term');	
	    $this->load->model('demo_enquiry');	
	    $this->demo_enquiry->getdata2($name);
	
	}

public function get_stud_name()
    {
    	$action=$_POST['action'];
    	if($action=="getstudent")
    	{
    	   $this->globaldata;
    	   $this->load->Model('demo_enquiry');
    	   $data1=$this->demo_enquiry->stud_res($this->globaldata['userdata']);
    	   print_r(json_encode($data1));

    	}
    }
	
public function get_course_name()
    {
    	$action=$_POST['action'];
    	if($action=="getCourses")
    	{
    	   $this->globaldata;
    	   $this->load->Model('demo_enquiry');
    	   $data1=$this->demo_enquiry->course_res();
    	   print_r(json_encode($data1));

    	}
    }	
	
public function Add_Remark()
	{
		$dt=$_POST['hd1'];
		$id=$_POST['hd2'];
		$msg=$_POST['rem'];
		if($msg=="")
		{
			redirect('Admin/Demo_Order');
		}
		else
		{
		$data = array(
					'Admin_Remark' => $msg
					);
		
		$this->load->Model('demo_enquiry');
    	$res=$this->demo_enquiry->Add_Admin_Remark($dt,$id,$data);
    	if($res)
        {
        	echo "Remark Added.....!";
        	redirect('Admin/Demo_Order');
        }
		else
		{
			echo "Remark Not Added Try Again";
			redirect('Admin/Demo_Order');
		}
        }
	}		

	public function GetAdmissionData1()
	{
		
		$name= $this->input->post('term');	
	    $this->load->model('demo_enquiry');	
	    $this->demo_enquiry->getAddmissionstud1($name);
	}
	
	public function get_course_price()
    {
    	
    	if($_POST['cname'])
    	{
    	   $cname=$_POST['cname'];
           $stid=$_POST['stid'];
    	   $this->load->Model('demo_enquiry');
    	   $data1=$this->demo_enquiry->course_price($cname,$stid);
    	   print_r(json_encode($data1));

    	}
    }
	
	public function Delete_Admission()
 {
 	$a= $_POST['id'];
	$this->load->model('demo_enquiry');
	$res=$this->demo_enquiry->dele2($a);
				if($res==true)
				{
					redirect('Admin/Demo_Fran_Admission');
				}
				else
				{
					echo "Your Data Is Not Inserted";
					redirect('Admin/Demo_Fran_Admission');
				}
 	
 }

	
 public function Admin_Remark()
     {
        $id=$_POST['id'];
        $remark=$_POST['remark'];
        $this->load->Model('demo_enquiry');
        $res=$this->demo_enquiry->adm_enq_remark_update($id,$remark);
        if($res)
        {
           $data['message']="Remark Saved.....!";
           print_r(json_encode($data));
        }
        else
        {
           $data['message']="Error In Saving The Remark.....!";
           print_r(json_encode($data));
        }
     }	
	 
	 
	 
	
   public function Add_Remark2()
    {
        $dt=$_POST['hd1'];
        $id=$_POST['hd2'];
        $msg=$_POST['rem'];
        if($msg=="")
        {
            redirect('Admin/Demo_Order');
        }
        else
        {
        $data = array(
                    'Admin_Remark' => $msg,
                    'adm_ord_state'=>'unread'
                    );
        
        $this->load->Model('demo_enquiry');
        $res=$this->demo_enquiry->Add_Admin_Remark1($dt,$id,$data);
        if($res)
        {
            echo "Remark Added.....!";
            redirect('Admin/Demo_Order');
        }
        else
        {
            echo "Remark Not Added Try Again";
            redirect('Admin/Demo_Order');
        }
        }
    }


   /***************PDF & EXCELL DATA***************************/
	 public function get_enquiry_excel()
    {
         $fdt=$this->input->post('from1');
         $tdt=$this->input->post('to1');
         $state=$this->input->post('stt1');
         $city=$this->input->post('ct1');
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

        $this->load->Model('demo_enquiry');
        $this->demo_enquiry->get_excel_cat($from_dt,$to_dt,$state,$city,$sid);
    }
	
	 public function get_enquiry_pdf()
    {
         $fdt=$this->input->post('from');
         $tdt=$this->input->post('to');
         $state=$this->input->post('stt');
         $city=$this->input->post('ct');
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

        $this->load->Model('demo_enquiry');
        $this->demo_enquiry->get_pdf_cat($from_dt,$to_dt,$state,$city,$sid);

      
    }
	
	public function getsinglepdf()
    {
         $id=$_GET['id'];
         $this->load->Model('demo_enquiry');
         $this->demo_enquiry->pdf_single($id);
    }
	
	public function getsingleexcell()
    {
         $id=$_GET['id'];
         $name=$_GET['name1'];
         $this->load->Model('demo_enquiry');
         $this->demo_enquiry->Excel_single($id,$name);    
    }
	
	
public function get_excel_by_cat()
{
	$farr=array();
	$tarr=array();
	$fdate=$this->input->post('from1');
	$todate=$this->input->post('to1');
	$fnm=$this->input->post('fn1');
	$sid=$this->input->post('storedArrayvalue1');

	$dt=date('Y-m-d');
	$farr =explode("/",$fdate); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$newfdate=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$todate); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$newtdate=str_replace("/","-",$newtdate1);
	$this->load->Model('demo_enquiry');

	if($newfdate!=$dt && $newtdate==$dt && $fnm!="")
	{
         $this->demo_enquiry->Get_all_cat_excel($newfdate,$newtdate,$fnm,$sid);
	}
	else if($newfdate==$dt && $newtdate==$dt && $fnm!="")
	{
	     $this->demo_enquiry->Get_today_excel($newfdate,$newtdate,$fnm,$sid);	
	}
    else if($newfdate==$dt && $newtdate==$dt && $fnm=="")
	{
	     $this->demo_enquiry->Get_fran_all_excel($newfdate,$newtdate,$sid);	
	}
	
    else if($newfdate!=$dt && $newtdate!=$dt && $fnm=="")
	{
         $this->demo_enquiry->Get_date_excel($newfdate,$newtdate,$sid);	
	}
	else if($newfdate!=$dt && $newtdate!=$dt && $fnm!="")
	{
		$this->demo_enquiry->Get_all_excel($newfdate,$newtdate,$fnm,$sid);	
	}
	else if($newfdate==$dt && $newtdate!=$dt && $fnm!="")
	{
         $this->demo_enquiry->Get_cat_excel($newfdate,$newtdate,$fnm,$sid);
	}

}








public function get_pdf_by_cat()
{
	$farr=array();
	$tarr=array();
	$fdate=$this->input->post('from');
	$todate=$this->input->post('to');
	$fnm=$this->input->post('fn');
	$sid=$this->input->post('storedArrayvalue');
	
	$farr =explode("/",$fdate); 
	$farr=array_reverse($farr);
	$newfdate1 =implode($farr,"/");
	$newfdate=str_replace("/","-",$newfdate1);

	$tarr =explode("/",$todate); 
	$tarr=array_reverse($tarr);
	$newtdate1 =implode($tarr,"/");
	$newtdate=str_replace("/","-",$newtdate1);
	$this->load->Model('demo_enquiry');

	if($fdate!="" && $todate!="" && $fnm!="")
	{
         $this->demo_enquiry->Get_all_cat_pdf($newfdate,$newtdate,$fnm,$sid);
	}
	else if($fdate!="" && $todate=="" && $fnm!="")
	{
	     $this->demo_enquiry->Get_today_pdf($newfdate,$fnm,$sid);	
	}
	else if($fdate=="" && $todate=="" && $fnm!="")
	{
	     $this->demo_enquiry->Get_by_fran_pdf($fnm,$sid);	
	}
    else if($fdate=="" && $todate=="" && $fnm=="")
	{
	     $this->demo_enquiry->Get_fran_all_pdf($sid);	
	}
	else if($fdate!="" && $todate=="" && $fnm=="")
	{
	     $this->demo_enquiry->Get_fran_all_today_pdf($newfdate,$sid);	
	}
	else if($fdate!="" && $todate!="" && $fnm=="")
	{
         $this->demo_enquiry->Get_date_pdf($newfdate,$newtdate,$sid);	
	}
}

	
public function get_single_enquiry_excel()
{
	$id=$_GET['id'];
	$name=$_GET['name'];
	
	$this->load->model('demo_enquiry');
	$this->demo_enquiry->get_single_fran_enquiry_excel($id,$name);
}	

public function get_single_enquiry_pdf()
{
	$id=$_GET['id'];
	
	$this->load->model('demo_enquiry');
	$this->demo_enquiry->get_single_fran_enquiry_pdf($id);
}








	
}
