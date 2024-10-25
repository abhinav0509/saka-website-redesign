<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
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
		$this->load->view('Login');
		
	}
	public function demo_pdf() {		
		
		
 $exa = new TCPDF();

$exa->setCreator ( PDF_CREATOR );

$exa->setAuthor ( 'Vinod kumar' );

$exa->setTitle ( 'Image with HTML' );

$exa->setSubject ( 'Example of TCPDF' );

$exa->setKeywords ( 'TCPDF, pdf, PHP' );

//setting font

$exa->setFont ( 'times', '', 18);

$exa->addPage ();

$txt = <<<HDOC

 Example of TCPDF

HDOC;

$exa->Write (0, $txt );

$exa->Ln ();

$exa->setImageScale ( PDF_IMAGE_SCALE_RATIO );

$exa->setJPEGQuality ( 90 );

$exa->Image ( "http://localhost/CCA/Certi/certificate.jpg" , 0,0,490,600);

$exa->Ln ( 50 );

$txt = <<<EOD

<style>
p{
		font-size:16px;
			
		}
</style>

<br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Special Copy</span>
<br/><br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Special Copy</span>
<br><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A++
<br><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2014 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2015
<br><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CA/2015/3/2
<br><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 15-6-2015";

EOD;
$exa->WriteHTML ( $txt );

$exa->Output ( 'image_and_html.pdf', 'I' );
 
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 
  
}
	public function job_card_det()
	{
		
	    if(isset($_POST['caption']))
		{
		   $cp=$_POST['caption'];	
		  
		}
		else
		{
			$cp="";
		}		

		$this->load->model('display');
        $data1['fran']=$this->display->get_franchisee();
        $data1['states']=$this->display->get_state();
        $data1['cities']=$this->display->get_city();
        if($cp!="")
        {  
			$config=array();
	        $config["base_url"]=base_url()."index.php/Welcome/jobcard";
	        $config["total_rows"]=$this->display->jobcard_display();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data2 = $this->display->jobcard_Paging($config["per_page"], $page,$cp);
	        $data1["links"] = $this->pagination->create_links();	

	        print_r(json_encode($data2));
	    }
	    else if($cp=="")
	    {
	    	$config=array();
	        $config["base_url"]=base_url()."index.php/Welcome/jobcard";
	        $config["total_rows"]=$this->display->jobcard_display();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data1["results"] = $this->display->jobcard_Paging($config["per_page"], $page,$cp);
	        $data1["links"] = $this->pagination->create_links();	


			$data=$this->globaldata;
			$this->load->view('header1',$data);
			$this->load->view('job_card_info',$data1);		
			$this->load->view('footer1');
	    }		
	}
	public function update_jobcard()
	{
		    $up_id=$this->input->post('bid');
		    $fname=$this->input->post('frn');
            $sname=$this->input->post('nm');
            $scode=$this->input->post('code');
            $vupto=$this->input->post('dt');
            $course=$this->input->post('course');
            $state=$this->input->post('state');
            $city=$this->input->post('city');
            $f=$this->input->post('upload');
		   
		  
		   	   $config['upload_path'] = './uploads/job_card/';
			   $config['allowed_types'] = 'gif|jpg|png';
			   $this->load->library('upload', $config);
			   if (!$this->upload->do_upload('upload'))
		 	   { 
				  $error = array('error' => $this->upload->display_errors());
			   } 
			   else
		 	   {
				 $data = array('upload_data' => $this->upload->data());
				 foreach($data as $d)
				 {
				    $b=$d['file_name'];
				    $img=$b;
				 }
			   }
			   if($b!="")
			   {	    
			           $data=array('fname'=>$fname,'sname'=>$sname,'scode'=>$scode,'vupto'=>$vupto,'course'=>$course,'state'=>$state,'city'=>$city,'img'=>$b);

			           $this->load->model('News');
			           $result=$this->News->update_job_card($data,$up_id);
			           if($result)
			           {
			                redirect('Admin/job_card_det');
			           }
			           else
			           { 
			                echo "Error";
			           }
				  }
			  
		   else
		   {
			  
	           $data=array('fname'=>$fname,'sname'=>$sname,'scode'=>$scode,'vupto'=>$vupto,'course'=>$course,'state'=>$state,'city'=>$city);

			           $this->load->model('News');
			           $result=$this->News->update_job_card($data,$up_id);
			           if($result)
			           {
			                redirect('Admin/job_card_det');
			           }
			           else
			           { 
			                echo "Error";
			           }
          }
	}
	public function create_job_card()
	{
		
		
		
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
		    $pdf->SetFont('dejavusans', '', 10, '', true);   
		    $pdf->AddPage(); 
		
		    //$img_file="http://localhost/CCA/Style/images/cca-job-card-front1.jpg";
		    //$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 100, '', false, false, 0);
		     $html = <<<EOD
	<style>
	p{
		font-size:10px;
		line-height : 5px;		
		}
		span{
		font-size:10px;
		line-height : 2px;		
		}
		table{
			margin-top:100px;
		}
		table td{font-size:12px; text-align:left; height:10px;}
		th {
	    	background-color: green;
		    color: white;
			font-size:10px;
		}	
					
		
	</style>
	    <table style="width:500px; height:auto;border:1px solid #CCC">
      <tr>
         <td colspan="3">
             <img src="http://localhost/CCA/Style/images/jheader.jpg" width="500px" height="50px" />

         </td>
      </tr>
      <tr>
	    <td>
		   <p>Card No:</p>
		</td>
		<td>
		 <p> 1140</p>
		</td>
		
	  </tr>
	 
	  <tr>
	    <td>
		 <p> Name</p>
		</td>
		<td>
		 <p> Yogesh Ramchandra Nikam</p>
		</td>
		<td rowspan="5">
		<img src="http://localhost/CCA/uploads/job_card/ccaimg2.jpg" height="100px" width:"100px" style="margin-top:-350px;">
		</td>
	  </tr>
	  
	  <tr>
	    <td>
		 <p> Student Code</p>
		</td>
		<td>
		  <p> DM014/066</p>
		</td>
	  </tr>
	 
	  <tr>
	    <td>
		 <p> Valid Upto</p>
		</td>
		<td>
		  <p> Mar-14</p>
		</td>
	  </tr>
	  
	  <tr>
	    <td>
		 <p> Study Center</p>
		</td>
		<td>
		  <p>Ambika Computers</p>
		</td>
		
	  </tr>
	  
	  <tr>
	    <td>
		 <p> State</p>
		</td>
		<td>
		  <p>Maharashtra</p>
		</td>

	  </tr>
	  
	  <tr>
	    <td>
		 <span> City</span>
		</td>
		<td>
		  <span>Malvan</span>
		</td>
		
	  </tr>

      <tr>
         <td colspan="3" rowspan="1">
             <img src="http://localhost/CCA/Style/images/jfooter.jpg" width="500px" height="50px" style="margin-bottom:10px;"  />

         </td>
      </tr>
  
   </table>



    
EOD;
    
  print_r($html);
  die("asdad");
  	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   

	$filename="Demo.pdf";
	$pdf->Output($filename, 'D'); 
	die("asdad");
	}
	public function single_jobcard_excel()
	{
		$id=$_GET['id'];
		$name=$_GET['name'];
		$this->load->Model('Excell');
		$this->Excell->Jobcard_excel($id,$name);
	}
	public function single_jobcard_pdf()
	{
		$id=$_GET['id'];
		//$name=$_GET['name'];
		$this->load->Model('Excell');
		$result=$this->Excell->Jobcard_pdf($id);
     
	}
	public function all_jobcard_excel()
	{
		
		if(isset($_GET['fname']))
		{
			
			$fname=$_GET['fname'];
			

		}
		else
		{
			$fname="";
		}
		$this->load->Model('Excell');
		$result=$this->Excell->all_job_card_excel($fname);
	}
	public function all_jobcard_pdf()
	{
		$this->load->Model('Excell');
		$result=$this->Excell->all_job_card_pdf();
	}
	public function Getfrnenquiry()
	{
		$name= $this->input->post('term');	
	    $this->load->model('News');	
	    $this->News->getfrnenq($name);
	}
	public function Home()
	{
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Home');		
		$this->load->view('footer1');
	}
	public function Contact()
	{
		$this->load->model('display');
        $data1['enquiry']=$this->display->Contact_Us_display();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Contact_Us',$data1);
		$this->load->view('footer1');
	}

	public function create_user()
	{
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg'); 

		$this->load->model('display');
        $data1['users']=$this->display->Get_user_details();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('New_user',$data1);
		$this->load->view('footer1');
	}

	public function user_create()
	{
		$this->load->Model('display');
        
        $data=array(
         'user_name'=>$this->input->post('fname'),
         'contact'=>$this->input->post('cont'),
         'uemail'=>$this->input->post('eml'),
         'email'=>$this->input->post('uname'),
         'pass'=>$this->input->post('pass'),
         'user_type'=>$this->input->post('utype')
        	);

		$res=$this->display->Insert_user($data);

		if($res)
        {
        	$mess="New User Created.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/create_user');
        }
        else
        {
        	$mess="Error In Creating New User.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/create_user');
        }

	}

	public function Update_userr()
	{
		$this->load->Model('display');
        
        $up_id=$this->input->post('bid');

        $data=array(
         'user_name'=>$this->input->post('fname'),
         'contact'=>$this->input->post('cont'),
         'uemail'=>$this->input->post('eml'),
         'email'=>$this->input->post('uname'),
         'pass'=>$this->input->post('pass'),
         'user_type'=>$this->input->post('utype')
        	);

		$res=$this->display->user_update($data,$up_id);

		if($res)
        {
        	$mess="User Details updated.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/create_user');
        }
        else
        {
        	$mess="Error In Updating The Details.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/create_user');
        }
	}

	public function Delete_userr()
	{
		 $id=$_POST['id'];
		 $this->load->Model('display');
		 $res=$this->display->Userr_Delete($id);
		 if($res)
		 {
		 	 $data['message']="User Deleted.....!";
		 	 print_r(json_encode($data));
		 }
		 else
		 {
		 	 $data['message']="Error In Deleting The User.....!";
		 	 print_r(json_encode($data));
		 }
	}
	
	public function about()
	{
		$this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/about";
        $config["total_rows"]=$this->display->About_display();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->About_Paging($config["per_page"], $page);
        $data1["links"] = $this->pagination->create_links();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('about',$data1);
		$this->load->view('footer1');
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
        $config["base_url"]=base_url()."index.php/Admin/Student_Enquiry";
        $config["total_rows"]=$this->display->front_stud_enq_count($from_dt,$to_dt,$cname);
        $config["per_page"] = 5;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        $data1['rowcount']=$this->display->front_stud_enq_count($from_dt,$to_dt,$cname);
        $data1['enquiry']=$this->display->Student_Enquiry_display($config["per_page"], $pageindex,$from_dt,$to_dt,$cname);
		$data1["links"] = $this->pagination->create_links();	

		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Student_Enquiry',$data1);
		$this->load->view('footer1');
	}
	
	public function Slider()
	{
		if(isset($_POST['caption']))
		{
		   $cp=$_POST['caption'];	
		  
		}
		else
		{
			$cp="";
		}
		
		if($cp!="")
		{
			$this->load->model('display');
			$config=array();
	        $config["base_url"]=base_url()."index.php/Admin/Slider";
	        $config["total_rows"]=$this->display->Slider_Data();
	        $config["per_page"] = 3;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data2 = $this->display->Slider_Paging($config["per_page"], $page,$cp);
	        $data1["links"] = $this->pagination->create_links();
			
			print_r(json_encode($data2));
		}
		else if($cp=="")
		{
			$this->load->model('display');
			$config=array();
	        $config["base_url"]=base_url()."index.php/Admin/Slider";
	        $config["total_rows"]=$this->display->Slider_Data();
	        $config["per_page"] = 3;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data1["results"] = $this->display->Slider_Paging($config["per_page"], $page,$cp="");
	        $data1["links"] = $this->pagination->create_links();
			$data=$this->globaldata;
			$this->load->view('header1',$data);
			$this->load->view('slider',$data1);
			$this->load->view('footer1');
	    }
	}
	
	public function Testimonial()
	{
		$this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/Testimonial";
        $config["total_rows"]=$this->display->Testimonial_Data();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data1["results"] = $this->display->Testimonial_Paging($config["per_page"], $page);
        $data1["links"] = $this->pagination->create_links();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Testimonial',$data1);
		$this->load->view('footer1');
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
        $config["base_url"]=base_url()."index.php/Admin/Franchisee";
        $config["total_rows"]=$this->display->Franchisee_Detail_count($from_dt,$to_dt,$sname,$cname);
        $config["per_page"] = 15;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;      
        $data1['rowcount']=$this->display->Franchisee_Detail_count($from_dt,$to_dt,$sname,$cname);
        $data1["links"] = $this->pagination->create_links();
        $data1['enquiry']=$this->display->Franchisee_Detail($config["per_page"],$pageindex,$from_dt,$to_dt,$sname,$cname);
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('franchise',$data1);
		$this->load->view('footer1');
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
         	'sttud'=>$this->input->post('sttud'),
         	'result'=>$this->input->post('sres')
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
         	$res=$this->input->post('sres');
 	

			    $farr=array();
			    $arr=array();
			    
			    $farr =explode("/",$fdt); 
				$farr=array_reverse($farr);
				$newfdate1 =implode($farr,"/");
				$from_dt=str_replace("/","-",$newfdate1);


    /*888888888888888888888888888888888888888888888888888888888888888*/	
         
        $config=array();
        $config["base_url"]=base_url()."index.php/Admin/Pass_Student";
        $config["total_rows"]=$this->display->get_pass_stud_count($from_dt,$course,$stud,$fran,$res);
        $config["per_page"] = 15;
        $config["uri_segment"] = $pageindex;
        $data1['rowcount']=$this->display->get_pass_stud_count($from_dt,$course,$stud,$fran,$res);
        $this->pagination->initialize($config);
        $data1["result"] = $this->display->get_pass_stud($config["per_page"],$pageindex,$from_dt,$course,$stud,$fran,$res);
        $data1["links"] = $this->pagination->create_links(); 		
        $data1['course']=$this->display->getcourse();	
		//$data1['result']=$this->display->get_pass_stud(); 
		
		$this->load->view('header1',$data);
		$this->load->view('Pass_Student',$data1);
		$this->load->view('footer1');
	}
	
	public function Edit_Image()
	{
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Edit');
		$this->load->view('footer1');
	}
	public function Book()
	{
	    
       
         $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
         	'book_nm'=>$this->input->post('bnm'),
         	'course'=>$this->input->post('cor'),
         	'author'=>$this->input->post('auth')
         	);         
      
         $pageindex=$this->input->post("pindex");
         

         if($pageindex=="")
         {
         	$pageindex=0;
         }
         else if($pageindex >=1)
         {
         	$pageindex=intval(($pageindex-1)*4);
         }
         else
         {
         	$pageindex=0;
         }
        
        	$bname=$this->input->post('bnm');
         	$course=$this->input->post('cor');
         	echo $author=$this->input->post('auth');
 
	
    /*888888888888888888888888888888888888888888888888888888888888888*/
        


	    $this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/Book";
        $config["total_rows"]=$this->display->Book_display($bname,$course,$author);
        $config["per_page"] = 4;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
       //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->Book_Paging($config["per_page"], $pageindex,$bname,$course,$author);
        $data1['rowcount']=$this->display->Book_display($bname,$course,$author);
        $data1["links"] = $this->pagination->create_links();		
		$data1['course']=$this->display->getcourse();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Book',$data1);
		$this->load->view('footer1');
	}
	
	public function Course()
	{
	    $this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/Course";
        $config["total_rows"]=$this->display->Course_display();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->Course_Paging($config["per_page"], $page);
        $data1["links"] = $this->pagination->create_links();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Course',$data1);
		$this->load->view('footer1');
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
        $config["base_url"]=base_url()."index.php/Admin/Order";
        $config["total_rows"]=$this->display->Ad_order_count($from_dt,$to_dt,$fname);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
        $data1['rowcount']=$this->display->Ad_order_count($from_dt,$to_dt,$fname);	
		$data1['Order1']=$this->display->order_Data($config["per_page"],$pageindex,$from_dt,$to_dt,$fname);
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Order',$data1);
		$this->load->view('footer1');
	}
	
	public function News()
	{
	    $this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/News";
        $config["total_rows"]=$this->display->News_display();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->News_Paging($config["per_page"], $page);
        $data1["links"] = $this->pagination->create_links();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('News',$data1);
		$this->load->view('footer1');
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
        $config["base_url"]=base_url()."index.php/Admin/Fran_Enquiry";
        $config["total_rows"]=$this->exam_data->get_Exam_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $data1['rowcount']=$this->exam_data->get_Exam_count();
        $this->pagination->initialize($config);
        $data1["exames"] = $this->exam_data->get_exame_data($config["per_page"],$pageindex);
        $data1["links"] = $this->pagination->create_links(); 

		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Exam_Module',$data1);
		$this->load->view('footer1');
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
        $config["base_url"]=base_url()."index.php/Admin/Fran_Enquiry";
        $config["total_rows"]=$this->display->fran_enq_display($from_dt,$to_dt,$st,$ct);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $data1['rowcount']=$this->display->fran_enq_display($from_dt,$to_dt,$st,$ct);
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment($pageindex)) ? $this->uri->segment($pageindex) : 0;
        $data1["enquiry"] = $this->display->Fran_Enquiry_display($config["per_page"],$pageindex,$from_dt,$to_dt,$st,$ct);
        $data1["links"] = $this->pagination->create_links();

		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Franchisee_Enquiry',$data1);
		$this->load->view('footer1');
	}

	public function Placement()
	{
		$this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/Placement";
        $config["total_rows"]=$this->display->Placement_display();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->Placement_Paging($config["per_page"], $page);
        $data1["links"] = $this->pagination->create_links();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Placement',$data1);
		$this->load->view('footer1');
	}
	
	public function Download()
	{
		$this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/Download";
        $config["total_rows"]=$this->display->Download_Data();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->Download_Paging($config["per_page"], $page);
        $data1["links"] = $this->pagination->create_links();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Download',$data1);
		$this->load->view('footer1');
	}
	
	public function Gallery()
	{
		$this->load->model('display');
        $data1['enquiry']=$this->display->Gallery_Data();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Gallery',$data1);
		$this->load->view('footer1');
	}
	
	public function Paper()
	{
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');

		$this->load->model('paper_mod');
        $data1['course']=$this->paper_mod->course_res();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Paper',$data1);
		$this->load->view('footer1');
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
        	$config["base_url"]=base_url()."index.php/Admin/Active_Fran";
        	$config["total_rows"]=$this->display->Enquiry_display($cp,$fname,$from_date,$to_date);
        	$config["per_page"] = 10;
        	$config["uri_segment"] = $pageindex;
       		$this->pagination->initialize($config);
        	//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        	$data1['rowcount']=$this->display->Enquiry_display($cp,$fname,$from_date,$to_date);
        	
        	$data1['enquiry']=$this->display->Active_Fran_Enquiry_display($config["per_page"], $pageindex,$cp,$fname,$from_date,$to_date);
			$data=$this->globaldata;
			$data1["links"] = $this->pagination->create_links();
			$this->load->view('header1',$data);
			$this->load->view('Active_Franchisee_Enquiry',$data1);
			$this->load->view('footer1');
		

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
	        	$config["base_url"]=base_url()."index.php/Admin/Fran_Admission";
	        	$config["total_rows"]=$this->display->frn_admision_display($cname,$from_dt,$to_dt,$sname);
	        	$config["per_page"] = 5;
	        	$config["uri_segment"] = $pageindex;

	        	$data1['rowcount']=$this->display->frn_admision_display($cname,$from_dt,$to_dt,$sname);
	        	
	       		$this->pagination->initialize($config);
	        	//$page = ($this->uri->segment($pageindex)) ? $this->uri->segment($pageindex) : 0;
	        	$data1['enquiry']=$this->display->Student_Admission($config["per_page"],$pageindex,$cname,$from_dt,$to_dt,$sname);
				$data=$this->globaldata;
				$data1["links"] = $this->pagination->create_links();
				$this->load->view('header1',$data);
				$this->load->view('Franchisee_Admission',$data1);
				$this->load->view('footer1');
	
	}

	public function get_pdf_by_cat()
	{
		if(isset($_GET['fdate'],$_GET['todate'],$_GET['sname'],$_GET['cname']))
		{
			$fdt=$_GET['fdate'];
			$tdt=$_GET['todate'];
			$sname=$_GET['sname'];
			$cname=$_GET['cname'];

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

		}
		else
		{
			$fdt="";
			$tdt="";
			$sname="";
			$cname="";
			$from_dt="";
			$to_dt="";
		}
		$this->load->Model("frn_excell");
		if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
		{
			$this->frn_excell->get_admin_all_cat($cname,$from_dt,$to_dt,$sname);
		}
		else if($cname=="" && $from_dt!="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_fromdt_cat($cname,$from_dt,$to_dt,$sname);
		}
		else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname=="")
		{
			 $this->frn_excell->get_admin_fromtodt_cat($cname,$from_dt,$to_dt,$sname);
		
		}	
		else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname!="")
		{
			$this->frn_excell->get_admin_datefran_cat($cname,$from_dt,$to_dt,$sname);
		
		}
		else if($cname!="" && $from_dt!="" && $to_dt!="" && $sname=="")
		{
			$this->frn_excell->get_admin_datecourse_cat($cname,$from_dt,$to_dt,$sname);
				
		}	
		else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname!="")
		{
			$this->frn_excell->get_admin_coursefran_cat($cname,$from_dt,$to_dt,$sname);
		}
		else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_coursee_cat($cname,$from_dt,$to_dt,$sname);
			
		}
		else if($cname=="" && $from_dt=="" && $to_dt=="" && $sname!="")
		{
			$this->frn_excell->get_admin_frann_cat($cname,$from_dt,$to_dt,$sname);
		}
		else if($cname=="" && $from_dt=="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_alll_cat($cname,$from_dt,$to_dt,$sname);
		}

	}


	public function get_Excell_by_cat()
	{
		if(isset($_GET['fdate'],$_GET['todate'],$_GET['sname'],$_GET['cname']))
		{
			$fdt=$_GET['fdate'];
			$tdt=$_GET['todate'];
			$sname=$_GET['sname'];
			$cname=$_GET['cname'];

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

		}
		else
		{
			$fdt="";
			$tdt="";
			$sname="";
			$cname="";
			$from_dt="";
			$to_dt="";
		}
		$this->load->Model("frn_excell");
		if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
		{
			$this->frn_excell->get_admin_all_Excell($cname,$from_dt,$to_dt,$sname);
		}
		else if($cname=="" && $from_dt!="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_fromdt_cat_Excell($cname,$from_dt,$to_dt,$sname);
		}
		else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname=="")
		{
			 $this->frn_excell->get_admin_fromtodt_cat_Excell($cname,$from_dt,$to_dt,$sname);
		
		}	
		else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname!="")
		{
			$this->frn_excell->get_admin_datefran_cat_excell($cname,$from_dt,$to_dt,$sname);
		
		}
		else if($cname!="" && $from_dt!="" && $to_dt!="" && $sname=="")
		{
			$this->frn_excell->get_admin_datecourse_cat_Excell($cname,$from_dt,$to_dt,$sname);
				
		}	
		else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname!="")
		{
			$this->frn_excell->get_admin_coursefran_cat_Excell($cname,$from_dt,$to_dt,$sname);
		}
		else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_coursee_cat_Excell($cname,$from_dt,$to_dt,$sname);
			
		}
		else if($cname=="" && $from_dt=="" && $to_dt=="" && $sname!="")
		{
			$this->frn_excell->get_admin_frann_cat_Excell($cname,$from_dt,$to_dt,$sname);
		}
		else if($cname=="" && $from_dt=="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_alll_cat_Excell($cname,$from_dt,$to_dt,$sname);
		}

	}

	public function GetAdmissionData1()
	{
		
		$name= $this->input->post('term');	
	    $this->load->model('admission_data');	
	    $this->admission_data->getAddmissionstud1($name);
	}

	public function admin_exm_request()
	{
         $session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');

         $data=$this->globaldata;
         $this->load->Model('exm_pass_req');
         $data1['exame1']=$this->exm_pass_req->get_activ_list();
         $data1['exame']=$this->exm_pass_req->admin_get_exm_req();
         $this->load->view('header1',$data);
		 $this->load->view('Fran_exame_request',$data1);
		 $this->load->view('footer1');

	}
	
    public function convert_fran_enquiry()
	{
		$id=$_POST['id'];
		$this->load->Model('Franchisee_Enquiry');
		$mess=$this->Franchisee_Enquiry->convert_fran($id);
		if($mess)
    	{
    		$data['message']="Franchisee Activated...!";
    		print_r((json_encode($data)));	
    	}
    	else
    	{
    		$data['message']="Error In Activating Or Franchisee already exists...!";
    		print_r((json_encode($data)));	
    	}
	}
	public function getExmStude()
	{
		$name=$this->input->post('term');
		$this->load->Model("display");
		$this->display->get_stud_info($name);
	}
	public function Savebatchdata()
	{
		$this->load->Model("display");		
		$Action = $_GET['Action'];
		$array = $_POST['storeArrayvalue'];
		$arraydata = explode(',',$array);
		$msg = $this->display->Savebatchdatamodel($arraydata,$Action);
		if($msg)
		{
			$str = "Your Changes Added Successfuly";
			$this->session->set_userdata('msg',$str);
			redirect('Admin/Franchisee');
		}
		else{
			$str = "Your Changes Not Added Successfuly";
			$this ->session->set_userdata('msg',$str);
			redirect('Admin/Franchisee');
		}
	}

	public function Savebatchdata12()
	{
		$this->load->Model("display");		
		$Action = $_GET['Action'];
		$array = $_POST['storeArrayvalue'];
		$arraydata = explode(',',$array);
		$msg = $this->display->Savebatchdatamodel($arraydata,$Action);
		if($msg)
		{
			$str = "Your Changes Added Successfuly";
			$this->session->set_userdata('msg',$str);
			redirect('Employee/Franchisee');
		}
		else{
			$str = "Your Changes Not Added Successfuly";
			$this ->session->set_userdata('msg',$str);
			redirect('Employee/Franchisee');
		}
	}

	

   public function state1()
   {
   			/**************************************Start*************************************/
            $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
			'st_name'=>$this->input->post('st')
         	);
         $pageindex=$this->input->post("pindex");
		 $sname=$this->input->post("st");
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
        
   /*************************************End***************************************/
   				$this->load->model('display');
				$config["base_url"]=base_url()."index.php/Admin/state1";
	        	$config["total_rows"]=$this->display->count_state_display($sname);
	        	$config["per_page"] = 5;
	        	$config["uri_segment"] = $pageindex;
				$data1['rowcount']=$this->display->count_state_display($sname);
	       		$this->pagination->initialize($config);
	
	$data1['enquiry']=$this->display->State_Data($config["per_page"],$pageindex,$sname);
   	$data=$this->globaldata;
	$data1["links"] = $this->pagination->create_links();
	$data1['states']=$this->display->get_state();
   	$this->load->view('header1',$data);
	$this->load->view('State',$data1);
	$this->load->view('footer1');
		
   }
   
    public function city1()
   {
   
   			/**************************************Start*************************************/
   
         $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
         	'st_name'=>$this->input->post('st1'),
			'ct_name'=>$this->input->post('ct1')
         	);
      
         $pageindex=$this->input->post("pindex");
		 $st_name=$this->input->post('st1');
	     $ct_name=$this->input->post('ct1');
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
        
   /*************************************End***************************************/
   
   	$this->load->model('display');
	
	
	$config["base_url"]=base_url()."index.php/Admin/state1";
	        	$config["total_rows"]=$this->display->count_city_display($st_name,$ct_name);
	        	$config["per_page"] = 10;
	        	$config["uri_segment"] = $pageindex;
				$data1['rowcount']=$this->display->count_city_display($st_name,$ct_name);
	        
	        	
	       		$this->pagination->initialize($config);
	
	
   
   
   	//$this->load->model('display');
	$data1['enquiry2']=$this->display->State_Data2($config["per_page"],$pageindex,$st_name,$ct_name);
    $data1['enquiry1']=$this->display->State_Data1();
   	$data=$this->globaldata;
	$data1["links"] = $this->pagination->create_links();
   	$this->load->view('header1',$data);
	$this->load->view('City',$data1);
	$this->load->view('footer1');
	}
   
	

	

}




	