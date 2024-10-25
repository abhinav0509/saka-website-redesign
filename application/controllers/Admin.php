<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
     	//   $this->load->library("Pdf");
		 $var=$this->session->userdata;
	   	 if(isset($var['login_user']))
     	 {
          
          $this->globaldata=array(
		  'userdata'=>$var['login_user']
	 );
       }

   }



   public function Smouser()
   {
   	   $mail=$_GET['unm'];
   	   	      	 $this->load->model('login_model');	
			 try
			 {
				 $data=array();
				 $data = $this->login_model->CheckLogin1($mail);
				 if($data!=null)
		  			{
		    			$this->session->set_userdata('login_user', $data[0]);
					    if($data[0]->user_type=="Admin")
					    {
					    	 redirect('Admin/home');
					    }
					    else if($data[0]->user_type=="Employee")
					    {
					    	redirect('Employee/home');
					    }

						
		  			}
		  			else {
		  				    $data['message'] = "Username And Password is incorrect "; 
		  					$this->load->view('login',$data);
		  			}
		 	 }
			catch(Exception $e)
			{
			 	redirect('Admin');
			}
   }

public function only_Img_certi($id=1)
{
 

 $query=$this->db->get_where('before_certi',array('id'=>$id));
 $result=$query->result_array();
 foreach($result as $res)
 {
 	 $stud_name=$res['stud_name'];
 	 $certi_id=$res['certi_id'];
 	 $fname=$res['fname'];
 	 $marks=$res['stud_mark'];
 	 $p_marks=$res['p_mark'];
 	 $from_dt=$res['admission_dt'];
 	 $to_dt=$res['to_dt'];
 }

 $grade="";
 if($marks<$p_marks)
 {
 	$grade="Fail";

 }
 else if($marks > $p_marks && $marks < 60 )
 {
 	 $grade="C";
 }
 else if($marks >= 60 && $marks < 70)
 {
 	 $grade="A";
 }
 else if($marks > 70)
 {
 	 $grade="A++";
 }
 
$farr=array();
$farr =explode("-",$from_dt); 
$farr=array_reverse($farr);
$newfdate1 =implode($farr,"-");
$fdt=str_replace("-","/",$newfdate1);

$arr=array();
$arr =explode("-",$to_dt); 
$arr=array_reverse($arr);
$newtdate1 =implode($arr,"-");
$tdt=str_replace("-","/",$newtdate1);

$dt=date("d/m/Y");
$exa = new TCPDF();

$exa->setCreator ( PDF_CREATOR );
//$exa->setAuthor ( 'CCA' );
//$exa->setTitle ( 'CCA Certificate' );
//$exa->setSubject ( 'Certificate' );
$exa->setKeywords ( 'TCPDF, pdf, PHP' );
$font_size = $exa->pixelsToUnits('40');
$exa->setFont ( 'times', '', 12);
$exa->addPage ();

//$exa->Write (0, $txt );

$exa->Ln ();

$exa->setImageScale ( PDF_IMAGE_SCALE_RATIO );

$exa->setJPEGQuality ( 90 );

//$exa->Image ( "http://localhost/CCA/Certi/master_excel.jpg" , 0,0,475,600);

$exa->Ln ( 50 );

$exa->SetXY(50, 102);
$exa->Cell(0,0, $stud_name, 0, 0, 'L', 0, '', 0);

$exa->SetXY(30, 135);
$exa->Cell(0,0, $fname, 0, 0, 'L', 0, '', 0);

//$exa->setCellPaddings(1, 1, 1, 1);
$exa->SetXY(75, 153);
//$grade="A";
$exa->Cell(0,0, $grade, 0, 0, 'L', 0, '', 0);

$exa->SetXY(62, 169);
//$dur1="May2013";
$exa->Cell(0,0, $fdt, 0, 0, 'L', 0, '', 0);

$exa->SetXY(120, 169);
//$dur2="May2014";
$exa->Cell(0,0, $tdt, 0, 0, 'L', 0, '', 0);

$exa->SetXY(64, 187);
//$cno="C001";
$exa->Cell(0,0, $certi_id, 0, 0, 'L', 0, '', 0);



$exa->SetXY(35, 205);
$exa->Cell(0,0, $dt, 0, 0, 'L', 0, '', 0);

$path=dirname(__FILE__);
    
    $filename="Demo.pdf";
    $fulpath=$path."\pdf_file";
    $this->load->helper('file');
   //$myNewFolderPath = "c:/pdf_file";
   if (!file_exists($fulpath."/".$filename)){
     $exa->Output($fulpath."/".$filename, 'F');
   } else {
     //unlink($fulpath."/".$filename);
     $exa->Output($fulpath."/".$filename, 'F');
   }
  
    //$str=file_get_contents($fulpath."/".$filename,"r");
   $str = shell_exec($fulpath."/".$filename);
   echo $str;
   
   //$this->printIssue($fulpath,$filename);
   // force_download($filename, $str);
   // $file = $fulpath."/".$filename;
  


  //echo  "<script>window.print()</script>";
//
//$exa->Output ('./User Certificate/demo.pdf','D');  
 
}

  
function printIssue($fulpath,$filename)
 {
	ini_set('extension','php_printer.dll');
	$your_printer_name="HP LaserJet M1005 on INDIAN-PC";
	$handle=printer_open($your_printer_name);
//set the font characteristics here
	$font_face = "calibri";
	$font_height = 20;
	$font_width = 6;
$font=printer_create_font($font_face,$font_height,$font_width,PRINTER_FW_THIN,false,false,false,0);
printer_select_font($handle,$font);
printer_write($handle,"My PDF file content below");
//here loop through your pdf file and print the line by line or else get the entire content inside the string at once and print
$your_pdf_file = $fulpath."/".$filename;
	if(!eof($file_handle))
	{
		//do something
		printer_write($handle,$name);
	}
	printer_delete_font($font);
	printer_close($handle);
}


	public function index()
	{		
		if($this->session->userdata("loginType")){
			if($this->session->userdata("loginType")=="Student"){
				redirect('Student/Home');
			}
			if($this->session->userdata("loginType")=="Admin"){
				redirect('Admin/Home');
			}
			if($this->session->userdata("loginType")=="Franchisee"){
				redirect('Franchisee/Home');
			}
			if($this->session->userdata("loginType")=="Employee"){
				redirect('Employee/Home');
			}
		}else{
			$this->load->view('Login');		
		}
	}
	public function demo_pdf() {		
		
		
 $exa = new TCPDF();

$exa->setCreator ( PDF_CREATOR );

$exa->setAuthor ( 'CCA' );

$exa->setTitle ( 'CCA Certificate' );

$exa->setSubject ( 'Certificate' );

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

$exa->Image ( "http://localhost/CCA/Certi/certificate.jpg" , 0,0,475,600);

$exa->Ln ( 50 );

$exa->setCellPaddings(1, 1, 1, 1);
$exa->setCellMargins(60, 15, 1, 1);
$txt_nn="Yogesh Nikam";
$exa->Cell(20,10, $txt_nn, 0, 0, 'C', 0, '', 0);

$exa->setCellPaddings(1, 1, 1, 1);
$exa->setCellMargins(10, 48, 1, 1);
$f_name="College Of Computer Accountants";
$exa->Cell(5,10, $f_name, 0, 0, 'C', 0, '', 0);

//$exa->setCellPaddings(1, 1, 1, 1);
$exa->SetXY(70, 102);
$grade="A";
$exa->Cell(0,0, $grade, 0, 0, 'L', 0, '', 0);

$exa->SetXY(52, 118);
$dur1="May2013";
$exa->Cell(0,0, $dur1, 0, 0, 'L', 0, '', 0);

$exa->SetXY(115, 118);
$dur2="May2014";
$exa->Cell(0,0, $dur2, 0, 0, 'L', 0, '', 0);

$exa->SetXY(64, 136);
$cno="C001";
$exa->Cell(0,0, $cno, 0, 0, 'L', 0, '', 0);


$exa->SetXY(25, 155);
$dt=date('Y-m-d');
$exa->Cell(0,0, $dt, 0, 0, 'L', 0, '', 0);
//$exa->WriteHTML ( $txt );

$exa->Output ('image_and_html.pdf', 'I' );
 
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 
  
}

   public function job_card()
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
         	'fran'=>$this->input->post('franch'),
         	'fromdate'=>$fromdate,
         	'todate'=>$todate,
            'storeArrayvalue'=>$this->input->post('storeArrayvalue')         	
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
      
         $pageindex=$this->input->post("pindex");
         $fran=$this->input->post('franch');

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

         //$stud=$this->input->post('stu');
 
		$data=$this->globaldata;
		$this->load->model('display');
        $data1['fran']=$this->display->get_franchisee();
        $data1['states']=$this->display->get_state();
        $data1['cities']=$this->display->get_city();
        $data1['fdetails']=$this->globaldata['userdata'];

		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/job_card";
        $config["total_rows"]=$this->display->Adm_jobcard_display($fran,$from_dt,$to_dt);
        $config["per_page"] = 5;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["rowcount"]=$this->display->Adm_jobcard_display($fran,$from_dt,$to_dt);
        $data1["results"] = $this->display->Adm_jobcard_Paging($config["per_page"],$pageindex,$fran,$from_dt,$to_dt);
        $data1["links"] = $this->pagination->create_links();

        $this->load->view('header1',$data);
		$this->load->view('card',$data1);
		$this->load->view('footer1');
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

			           $this->load->model('news');
			           $result=$this->news->update_job_card($data,$up_id);
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

			           $this->load->model('news');
			           $result=$this->news->update_job_card($data,$up_id);
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
	    $this->load->model('news');	
	    $this->news->getfrnenq($name);
	}
	public function Home()
	{
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Home');		
		$this->load->view('footer1');
	}
	public function Dashboard()
	{
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('index');		
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
         	'franch'=>$this->input->post('fr'),
         	'storeArrayvalue'=>$this->input->post('storeArrayvalue')         	
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
        $config["total_rows"]=$this->display->ad_order_count($from_dt,$to_dt,$fname);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
        $data1['rowcount']=$this->display->ad_order_count($from_dt,$to_dt,$fname);	
		$data1['Order1']=$this->display->order_Data($config["per_page"],$pageindex,$from_dt,$to_dt,$fname);
		$data1["links"] = $this->pagination->create_links();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Order',$data1);
		$this->load->view('footer1');
	}
	
	public function News()
	{
	    $this->load->model('display');

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
         	$pageindex=intval($pageindex-1)*4;
         }
         else
         {
         	$pageindex=0;
         }

		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/News";
        $config["total_rows"]=$this->display->News_display();
        $config["per_page"] = 4;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
       
        $data1["results"] = $this->display->News_Paging($config["per_page"], $pageindex);
        $data1["rowcount"]=$this->display->News_display();
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
        $config["base_url"]=base_url()."index.php/Admin/Exam_Module";
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
	
	/*public function Download()
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
	}*/
	
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
         	$tdt=$todate;
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
		
			$fdt=$this->input->post('from');
			$tdt=$this->input->post('to');
			$sname=$this->input->post('crr');
			$cname=$this->input->post('centt');
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

		$this->load->Model("frn_excell");
		if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
		{
			$this->frn_excell->get_admin_all_cat($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname=="" && $from_dt!="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_fromdt_cat($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname=="")
		{
			 $this->frn_excell->get_admin_fromtodt_cat($cname,$from_dt,$to_dt,$sname,$sid);
		}	
		else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname!="")
		{
			$this->frn_excell->get_admin_datefran_cat($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname!="" && $from_dt!="" && $to_dt!="" && $sname=="")
		{
			$this->frn_excell->get_admin_datecourse_cat($cname,$from_dt,$to_dt,$sname,$sid);
		}	
		else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname!="")
		{
			$this->frn_excell->get_admin_coursefran_cat($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_coursee_cat($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname=="" && $from_dt=="" && $to_dt=="" && $sname!="")
		{
			$this->frn_excell->get_admin_frann_cat($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname=="" && $from_dt=="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_alll_cat($cname,$from_dt,$to_dt,$sname,$sid);
		}

	}


	public function get_Excell_by_cat()
	{
		$fdt=$this->input->post('from1');
		$tdt=$this->input->post('to1');
		$sname=$this->input->post('crr1');
		$cname=$this->input->post('centt1');
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

		$this->load->Model("frn_excell");
		if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
		{
			$this->frn_excell->get_admin_all_Excell($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname=="" && $from_dt!="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_fromdt_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname=="")
		{
			 $this->frn_excell->get_admin_fromtodt_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid);
		
		}	
		else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname!="")
		{
			$this->frn_excell->get_admin_datefran_cat_excell($cname,$from_dt,$to_dt,$sname,$sid);
		
		}
		else if($cname!="" && $from_dt!="" && $to_dt!="" && $sname=="")
		{
			$this->frn_excell->get_admin_datecourse_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid);
				
		}	
		else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname!="")
		{
			$this->frn_excell->get_admin_coursefran_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_coursee_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid);
			
		}
		else if($cname=="" && $from_dt=="" && $to_dt=="" && $sname!="")
		{
			$this->frn_excell->get_admin_frann_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid);
		}
		else if($cname=="" && $from_dt=="" && $to_dt=="" && $sname=="")
		{
			$this->frn_excell->get_admin_alll_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid);
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
         //$data1['exame1']=$this->exm_pass_req->get_activ_list();		 	
         $data1['exame']=$this->exm_pass_req->admin_get_exm_req();
    	 //print_r($data1);
         $this->load->view('header1',$data);         
		 $this->load->view('Fran_exame_request',$data1);
		 //$this->load->view('Fran_exame_request');
		 $this->load->view('footer1');

	}
	
    public function convert_fran_enquiry()
	{
		$id=$_POST['id'];
		$this->load->Model('franchisee_enquiry');
		$this->franchisee_enquiry->send_fran_single_msg($id);
		
		$mess=$this->franchisee_enquiry->convert_fran($id);
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
	
	
	$config["base_url"]=base_url()."index.php/Admin/city1";
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
   
	/************************Mukesh Work**********/
	
	
   
   public function Demo_Fran_List()
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
         	$pageindex=intval(($pageindex-1)*15);
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
        $config["base_url"]=base_url()."index.php/Admin/Demo_Fran_List";
        $config["total_rows"]=$this->display->Franchisee_Detail_count1($from_dt,$to_dt,$sname,$cname);
        $config["per_page"] = 15;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;      
        $data1['rowcount']=$this->display->Franchisee_Detail_count1($from_dt,$to_dt,$sname,$cname);
        $data1["links"] = $this->pagination->create_links();
        $data1['enquiry']=$this->display->Franchisee_Detail1($config["per_page"],$pageindex,$from_dt,$to_dt,$sname,$cname);
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Demo_Fran_List',$data1);
		$this->load->view('footer1');

	}
   
   

	public function Demo_Active_Fran()
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
         	'stname'=>$this->input->post('cname')
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
        	$config["total_rows"]=$this->display->Demo_Enquiry_display($cp,$fname,$from_date,$to_date);
        	$config["per_page"] = 10;
        	$config["uri_segment"] = $pageindex;
       		$this->pagination->initialize($config);
        	//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        	$data1['rowcount']=$this->display->Demo_Enquiry_display($cp,$fname,$from_date,$to_date);
        	
        	$data1['enquiry']=$this->display->Demo_Active_Fran_Enquiry_display($config["per_page"], $pageindex,$cp,$fname,$from_date,$to_date);
			$data=$this->globaldata;
			$data1["links"] = $this->pagination->create_links();
			$this->load->view('header1',$data);
			$this->load->view('Demo_Stud_Enquiry',$data1);
			$this->load->view('footer1');
		

}


public function Demo_Order()
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
        $config["base_url"]=base_url()."index.php/Admin/Demo_Order";
        $config["total_rows"]=$this->display->Demo_order_count($from_dt,$to_dt,$fname);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
        $data1['rowcount']=$this->display->Demo_order_count($from_dt,$to_dt,$fname);	
		$data1['Order1']=$this->display->Demo_order_Data($config["per_page"],$pageindex,$from_dt,$to_dt,$fname);
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('DemoOrder',$data1);
		$this->load->view('footer1');
	}
	


	public function Demo_Fran_Admission()
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
         	'course'=>$this->input->post('cr'),
         	'center'=>$this->input->post('cent')
         	);
 
         $pageindex=$this->input->post("pindex");
         

         if($pageindex=="")
         {
         	$pageindex=1;
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
	        	$config["base_url"]=base_url()."index.php/Admin/Demo_Fran_Admission";
	        	$config["total_rows"]=$this->display->Demofrn_admision_display($cname,$from_dt,$to_dt,$sname);
	        	$config["per_page"] = 10;
	        	$config["uri_segment"] = $pageindex;

	        	$data1['rowcount']=$this->display->Demofrn_admision_display($cname,$from_dt,$to_dt,$sname);
	        	
	       		$this->pagination->initialize($config);
	        	//$page = ($this->uri->segment($pageindex)) ? $this->uri->segment($pageindex) : 0;
	        	$data1['enquiry']=$this->display->Demo_Student_Admission($config["per_page"],$pageindex,$cname,$from_dt,$to_dt,$sname);
				$data=$this->globaldata;
				$data1["links"] = $this->pagination->create_links();
				$this->load->view('header1',$data);
				$this->load->view('Demo_Fran_Admission',$data1);
				$this->load->view('footer1');
	
	}

   
    public function Adm_Download()
	{
		$this->load->Model('download_mod');
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');
		$data=$this->globaldata;
		$data1['fdata']=$this->globaldata['userdata'];
		
		
        
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
         	$pageindex=intval(($pageindex-1)*12);
         }
		 

		
		$config=array();
        $config["base_url"]=base_url()."index.php/Franchisee/Download";
        $config["total_rows"]=$this->download_mod->get_Download_Details_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = $pageindex;
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1['result']=$this->download_mod->get_Download_Details($config['per_page'],$pageindex);
        $data1["rowcount"]=$this->download_mod->get_Download_Details_count();
        $this->pagination->initialize($config);	
        $data1["links"] = $this->pagination->create_links();
        $data['fdata']=$this->globaldata['userdata'];
		
		$this->load->view('header1',$data);
		$this->load->view('Deownload1',$data1);		
		$this->load->view('footer1');
	}




	public function create_cert()
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
         	'fran'=>$this->input->post('f'),
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
         	$fname=$this->input->post('f');
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



		 
		 $data=$this->globaldata; 
		 $this->load->Model('display');
		
        $config=array();
        $config["base_url"]=base_url()."index.php/Admin/create_cert";
        $config["total_rows"]=$this->display->get_certi_berfore_data_count($from_dt,$to_dt,$fname,$stud,$course);
        $config["per_page"] = 5;
        $config["uri_segment"] = $pageindex;
        
        $data1['result']=$this->display->get_certi_berfore_data($config['per_page'],$pageindex,$from_dt,$to_dt,$fname,$stud,$course);
        $data1["rowcount"]=$this->display->get_certi_berfore_data_count($from_dt,$to_dt,$fname,$stud,$course);
        $this->pagination->initialize($config);	
        $data1["links"] = $this->pagination->create_links();
		
    	$data1['courses']=$this->display->getcourse();

		 $this->load->view('header1',$data);
		 $this->load->view('generate_certi',$data1);
		 $this->load->view('footer1');
	}
	
	public function save_certi_date()
	{
		$fdt=$_POST['dt'];
		$id=$_POST['id'];

		 $farr=array();
		 $arr=array();
			    
		 $farr =explode("/",$fdt); 
		 $farr=array_reverse($farr);
		 $newfdate1 =implode($farr,"/");
		 $from_dt=str_replace("/","-",$newfdate1);

		 $this->load->Model("display");
		 $res=$this->display->set_certi_date($id,$from_dt);
		 if($res)
		 {
		 	 $data['message']="Date Saved successfuly.....!";
		 	 print_r(json_encode($data));
		 }
		 else
		 {
		 	$data['message']="Error In Saving date.....!";
		 	 print_r(json_encode($data));
		 }
	}


	public function GetstudCertiPdf()
	{
		$this->load->Model('exam_certi');
		$id=$_GET['id'];
		$course=$_GET['course'];
        $fid=$_GET['fid'];
        $sid=$_GET['sid'];
        $certi_id="C".$id."/".$sid;
        
        $this->db->set(array('certi_id'=>$certi_id,'status'=>'Issued'));
        $this->db->where('id',$id);
        $this->db->update('before_certi');
        
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


	public function get_issued_certi_data()
	{
		
		$pageindex=$_POST['pindex'];
        
		$fdt=$_POST['fdt'];
		$tdt=$_POST['tdt'];
		$course=$_POST['course'];
		$fname=$_POST['fname'];
		$stud=$_POST['stud'];

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
		$data1=$this->display->issued_certi_data($from_dt,$to_dt,$fname,$course,$stud,$pageindex);
        $data2=$this->display->issued_certi_data_count($from_dt,$to_dt,$fname,$course,$stud);
		
		$result['data1']=$data1;
		$result['data2']=$data2;
		print_r(json_encode($result));
	}


 public function getCertiStude()
 {
 	$name=$this->input->post('term');
 	$this->load->Model('display');
 	$this->display->get_certi_stud($name);
 }
 public function getCertifranch()
 {
    $name=$this->input->post('term');
 	$this->load->Model('display');
 	$this->display->get_certi_franch($name);	
 }
	
/***********************End******************/

	public function Expense()
	{
		//$session_data=$this->session->userdata('msg');
		//$data1['message']=$session_data;
		//$this->session->unset_userdata('msg');
    
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
        $config["total_rows"]=$this->display->Expense_Detail_count($from_dt,$to_dt);
        $config["per_page"] = 15;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;      
        $data1['rowcount']=$this->display->Expense_Detail_count($from_dt,$to_dt);
        $data1["links"] = $this->pagination->create_links();
        $data1['enquiry']=$this->display->Expense_Detail($config["per_page"],$pageindex,$from_dt,$to_dt);
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Expense',$data1);
		$this->load->view('footer1');
	}

/*************************************Receipt*********************************************************/


public function Receipts()
	{
		//$session_data=$this->session->userdata('msg');
		//$data1['message']=$session_data;
		//$this->session->unset_userdata('msg');
    
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
        $config["total_rows"]=$this->display->Receipt_Detailed_count($from_dt,$to_dt);
        $config["per_page"] = 15;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;      
        $data1['rowcount']=$this->display->Receipt_Detailed_count($from_dt,$to_dt);
        $data1["links"] = $this->pagination->create_links();
        $data1['enquiry']=$this->display->Receipt_Detailed($config["per_page"],$pageindex,$from_dt,$to_dt);
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Receipt',$data1);
		$this->load->view('footer1');
	}

	

/********************************************Receipt End**************************************************/	

public function Adm_acc_history()
{

	    $data=$this->globaldata;
	    $fromdate=$this->input->post("fromdt");
        $pageindex=$this->input->post("pindex");

         if($fromdate=="")
         {
         	$fromdate=date('d/m/Y');
         }
         
         $todate=$this->input->post("todate");
         if($todate=="")
         {
         	$todate=date('d/m/Y');
         }

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
         	$pageindex=intval(($pageindex-1)*20);
         }

         $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
         	'from_date'=>$fromdate,
         	'to_date'=>$todate,
         	'bname'=>$this->input->post('bnm')         	         	
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
	    $bname=$this->input->post('bnm');
	    $config=array();
        $config["base_url"]=base_url()."index.php/Admi/Adm_acc_history";
        $config["total_rows"]=$this->display->Acc_adm_count($from_dt,$to_dt,$bname);
        $config["per_page"] = 20;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);

        $data1["rowcount"]=$this->display->Acc_adm_count($from_dt,$to_dt,$bname);		
    	$data1["links"] = $this->pagination->create_links();
	    $data1['result']=$this->display->get_account_receipt_adm_history($config["per_page"],$pageindex,$from_dt,$to_dt,$bname);
	    $data1['branch']=$this->display->get_branch();

	    $this->load->view('header1',$data);
		$this->load->view('adm_ac_history',$data1);
		$this->load->view('footer1');
	}

	
	
	
	public function EmployeeEnq()
	{
	    
       
         $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
         	'cname'=>$this->input->post('cnm1'),
         	//'course'=>$this->input->post('cnm1')
         	//'author'=>$this->input->post('auth')
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
        
        	$cname=$this->input->post('cnm1');
         	//$course=$this->input->post('cor');
         	//echo $author=$this->input->post('auth');
 
	
    /*888888888888888888888888888888888888888888888888888888888888888*/
        


	    $this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/EmployeeEnq";
        //$config["total_rows"]=$this->display->Book_display($bname,$course,$author);
		$config["total_rows"]=$this->display->Emp_display($cname);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
       //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->Emp_Paging($config["per_page"], $pageindex,$cname);
		//$data1['rowcount']=$this->display->Book_display($bname,$course,$);
		$data1['rowcount']=$this->display->Emp_display($cname);
        $data1["links"] = $this->pagination->create_links();		
		//$data1['course']=$this->display->getcourse();
		$data=$this->globaldata;
		//print_r($data1['results']);
		//die();
		$this->load->view('header1',$data);
		$this->load->view('Employe_Enquiry',$data1);
		$this->load->view('footer1');
	}
	
	
	
	
	
public function ActiveStud()
	{
	     $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
         	'cname'=>$this->input->post('cnm1'),
         	'sname'=>$this->input->post('snm1')
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
        	$cname=$this->input->post('cnm1');
        	$sname=$this->input->post('snm1');
        
	    $this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/ActiveStud";
        //$config["total_rows"]=$this->display->Book_display($bname,$course,$author);
		$config["total_rows"]=$this->display->Active_display($cname,$sname);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
       //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->Active_Paging($config["per_page"], $pageindex,$cname,$sname);
		//$data1['rowcount']=$this->display->Book_display($bname,$course);
		$data1['rowcount']=$this->display->Active_display($cname,$sname);
        $data1["links"] = $this->pagination->create_links();		
		//$data1['course']=$this->display->getcourse();
		$data=$this->globaldata;
		//print_r($data1['results']);
		//die();
		$this->load->view('header1',$data);
		$this->load->view('Active_student',$data1);
		$this->load->view('footer1');
	}
	
	
	
	

	public function Testimonial()
	{
		 $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
         	'cname'=>$this->input->post('cnm1'),
         	//'course'=>$this->input->post('cnm1')
         	//'author'=>$this->input->post('auth')
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
        
        	$cname=$this->input->post('cnm1');
         	//$course=$this->input->post('cor');
         	//echo $author=$this->input->post('auth');
 
	
    /*888888888888888888888888888888888888888888888888888888888888888*/
        


	    $this->load->model('display');
		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/Testimonial";
        //$config["total_rows"]=$this->display->Book_display($bname,$course,$author);
		$config["total_rows"]=$this->display->Testimonial_display($cname);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
       //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->Testimonial1_Paging($config["per_page"], $pageindex,$cname);
		//$data1['rowcount']=$this->display->Book_display($bname,$course,$);
		$data1['rowcount']=$this->display->Testimonial_display($cname);
        $data1["links"] = $this->pagination->create_links();		
		//$data1['course']=$this->display->getcourse();
		$data=$this->globaldata;
		//print_r($data1['results']);
		//die();
		$this->load->view('header1',$data);
		$this->load->view('Testimonial',$data1);
		$this->load->view('footer1');
	}



/********************************DEmo Codee Start******************************/
	public function Demo()
	{
		$data=$this->globaldata;
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;

		$this->load->Model('demo_mod');
		$data1['stud']=$this->demo_mod->get_stud_id();

		$this->load->view('header1',$data);
		$this->load->view('demo',$data1);
		$this->load->view('footer1');

	}

	public function Get_other_deet()
	{
		 $sid=$_POST['sid'];
		 $this->load->Model('demo_mod');

		 $data1=$this->demo_mod->Other_det($sid);
		 $data2=$this->demo_mod->Other_det1($sid);

		 $result['data1']=$data1;
		 $result['data2']=$data2;
		 print_r(json_encode($result));
	}

	public function update_new_admission()
	{
		  $this->load->Model('demo_mod');

		  $st_id=$this->input->post('sid');

		  $data=array(
		  	'currrent_module'=>$this->input->post('cmod'),
		  	'module_name'=>$this->input->post('modnm'),
		  	'module_id'=>$this->input->post('modid'),
		  	'e_status'=>$this->input->post('estate'),
		  	'total_module'=>$this->input->post('totmod'),
			'exm_status'=>'notactive'
		  	);

		  $act_data=array('u_status'=>'updated');

		  $res=$this->demo_mod->update_data($st_id,$data,$act_data);

		  if($res)
		  {
		  	   $mess="Saved.....!";
        	   $this->session->set_userdata('msg',$mess);
		  	   redirect('Admin/Demo');
		  }
		  else
		  {
		  	   $mess="Error.....!";
        	   $this->session->set_userdata('msg',$mess);
		  	   redirect('Admin/Demo');
		  }



	}
	
	


	/********************************DEmo Codee End******************************/


  
   /*****************************************NEW**************************************/	

 public function admin_exm_request1()
 {
 		$f_id=$_POST['fid'];
 		$stud=$_POST['stud'];
 		$start=$_POST['pid'];
 		$this->load->Model('exm_pass_req');

 		$data1=$this->exm_pass_req->get_activ_list12($f_id,$stud,$start);
 		$data2=$this->exm_pass_req->get_activ_list_count($f_id,$stud);

 		$result['data1']=$data1;// Data
 		$result['data2']=$data2; //count
 		print_r(json_encode($result));

 }	
 
 public function GetActiveStud()
 {
        $name= $this->input->post('term');	
	    $this->load->model('exm_pass_req');	
	    $this->exm_pass_req->gety_active_stud_name($name);
 }	

 public function GetActivefranchh()
 {
 	    $name= $this->input->post('term');	
	    $this->load->model('exm_pass_req');	
	    $this->exm_pass_req->gety_active_stud_franchh($name);
 }

 public function single_reactive_exam()
 {
 	 $stud_id=$_POST['stud'];
 	 $this->load->model('exm_pass_req');	
 	 $res=$this->exm_pass_req->reactive_single($stud_id);
 	 if($res)
 	 {
 	 	 $data['message']="Exam Reactivated...!";
 	 	 print_r(json_encode($data));
 	 }
 	 else
 	 {
 	 	 $data['message']="Error In Reactivating Exam...!";
 	 	 print_r(json_encode($data));
 	 }

 }

/*****************************************NEW End**************************************/


/**************************************Certification Start**********************/
   
   public function Insert_certi_data()
   {
   	    $id=$_POST['id'];
   	    $this->load->Model('certi');
   	    $res=$this->certi->Insert_certificate_data($id);
   	    if($res)
   	    {
   	    	 $data['message']="Inserted";
   	    	 print_r(json_encode($data));
   	    }
   	    else
   	    {
   	         $data['message']="Not Inserted";
   	    	 print_r(json_encode($data));	
   	    }
   }


   public function get_issued_certificates()
   {
   	   $start=$_POST['pageindex'];
   	   $fnm=$_POST['fnm'];
   	   $snm=$_POST['snm'];

   	   $this->load->Model('display');
   	   $data1=$this->display->issued_certificates($start,$fnm,$snm);
   	   $data2=$this->display->issued_certificates_count($start,$fnm,$snm);

   	   $result['data1']=$data1;
   	   $result['data2']=$data2;
   	   print_r(json_encode($result));
   }

   /**************************************Certification Ends**********************/	  

  public function generate_final_certi()
  {
       $id=$_GET['id'];
       	
       	$this->load->Model('display');
        $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id,issued_certificates.issued_date');
	    $this->db->from('exm_status');
	    $this->db->join('admission','exm_status.siid=admission.id');
	    $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
	    $this->db->where(array('issued_certificates.certi_id'=>$id));
	    $query=$this->db->get();
	    $result=$query->result_array();        
	    $course=$result[0]['course_Name'];
	    if($course=="Tally Professional")
	    {
       	  $this->display->get_final_tally_prof_certi($id);
       	}  
       	else if($course=="Smart Tally")
       	{
       	  $this->display->get_final_smart_tally_certi($id);	 
       	}
       	else if($course=="Master In Excel")
       	{
       	  $this->display->get_final_Master_Excel_certi($id);	
       	}
       	elseif ($course=="Smart Excel")
       	{
       		$this->display->get_final_Smart_Excel_certi($id);
       	}
  }


public function Payment_History()
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
         	'franch'=>$this->input->post('fr'),
         	'storeArrayvalue'=>$this->input->post('storeArrayvalue')         	
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

	
		$this->load->model('display');

		$config=array();
        $config["base_url"]=base_url()."index.php/Admin/Payment_History";
        $config["total_rows"]=$this->display->Ad_payment_histry_count($from_dt,$to_dt,$fname);
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
        $data1['rowcount']=$this->display->Ad_payment_histry_count($from_dt,$to_dt,$fname);	
		$data1['Order1']=$this->display->payme_histry_Data($config["per_page"],$pageindex,$from_dt,$to_dt,$fname);
		$data1["links"] = $this->pagination->create_links();
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('Payment',$data1);
		$this->load->view('footer1');
	}

    
public function Convert()
  {
	$this->load->model('display');
	$data['Res']=$this->display->Convert_data();	
	
  }
  
 public function getExmStude1()
	{
		$name=$this->input->post('term');
		$dt=$this->globaldata['userdata'];
		$fid=$dt->cus_id;
		$this->load->Model("display");
		$this->display->get_stud_info1($name,$fid);
	}

	public function Meta(){
		$data=$this->globaldata;
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');
		
	    $fromdate=$this->input->post("fromdt");
        $pageindex=$this->input->post("pindex");

         if($fromdate=="")
         {
         	$fromdate=date('d/m/Y');
         }
         
         $todate=$this->input->post("todate");
         if($todate=="")
         {
         	$todate=date('d/m/Y');
         }

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

         $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
         	'from_date'=>$fromdate,
         	'to_date'=>$todate,
         	'bname'=>$this->input->post('bnm')         	         	
         	);

	    $this->load->Model('display');
	    $bname=$this->input->post('bnm');
	    $config=array();
        $config["base_url"]=base_url()."index.php/Admin/Meta";
        $config["total_rows"]=$this->display->meta_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);

        $data1["rowcount"]=$this->display->meta_count();		
    	$data1["links"] = $this->pagination->create_links();
	    $data1['result']=$this->display->meta_details($config["per_page"],$pageindex);	   
		
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('meta',$data1);
		$this->load->view('footer1');
	}
	
	public function meta_create(){
		$this->load->Model('display');
		$data=array('meta_data'=>$this->input->post('metakey'));
		$res=$this->display->meta_insert($data);
		if($res){
			   $mess="Meta Details Saved.....!";
        	   $this->session->set_userdata('msg',$mess);
		  	   redirect('Admin/Meta');
		}
		else{
			   $mess="Error...! Please Try Again";
        	   $this->session->set_userdata('msg',$mess);
		  	   redirect('Admin/Meta');
		}
	}
	
	public function Update_meta(){
		$this->load->Model('display');
		$data=array('meta_data'=>$this->input->post('metakey'));
		$id=$this->input->post('bid');
		$res=$this->display->meta_update($data,$id);
		if($res){
			   $mess="Meta Details Updated.....!";
        	   $this->session->set_userdata('msg',$mess);
		  	   redirect('Admin/Meta');
		}
		else{
			   $mess="Error...! Please Try Again";
        	   $this->session->set_userdata('msg',$mess);
		  	   redirect('Admin/Meta');
		}
	}
	
	public function Delete_meta(){
		$id=$_POST['id'];
		$this->load->Model('display');
		$res=$this->display->meta_delete($id);
		if($res){
			   $data['message']="Meta Details Deleted.....!";
        	   print_r(json_encode($data));
		}
		else{
			   $data['message']="Error...!Please Try Again!";
        	   print_r(json_encode($data));
		}
	}
	
	public function mail_configure(){
		$data=$this->globaldata;
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');
		
	    $fromdate=$this->input->post("fromdt");
        $pageindex=$this->input->post("pindex");

         if($fromdate=="")
         {
         	$fromdate=date('d/m/Y');
         }
         
         $todate=$this->input->post("todate");
         if($todate=="")
         {
         	$todate=date('d/m/Y');
         }

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

         $data1['dt']=array(
         	'page_index'=>$this->input->post('pindex'),
         	'from_date'=>$fromdate,
         	'to_date'=>$todate,
         	'bname'=>$this->input->post('bnm')         	         	
         	);

	    $this->load->Model('display');
	    $bname=$this->input->post('bnm');
	    $config=array();
        $config["base_url"]=base_url()."index.php/Admin/mail_configure";
        $config["total_rows"]=$this->display->mailconfig_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = $pageindex;
        $this->pagination->initialize($config);

        $data1["rowcount"]=$this->display->mailconfig_count();		
    	$data1["links"] = $this->pagination->create_links();
	    $data1['result']=$this->display->mailconfig_details($config["per_page"],$pageindex);	   
		
		$data=$this->globaldata;
		$this->load->view('header1',$data);
		$this->load->view('mail_config',$data1);
		$this->load->view('footer1');
	}

	public function banner()
	{
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');
		$this->load->model('display');
		
		$data1['dt']=array(
		'pindex'=>$this->input->post('pindex'),
		'page'=>$this->input->post('page')
		);

        $pageindex=$this->input->post('pindex');
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
			$pageindex = intval(($pageindex-1)*5);
		}
		
			$config=array();
	        $config["base_url"]=base_url()."index.php/Admin/banner";
			$config['total_rows']=$this->display->banner_count();
	        //$config["total_rows"]=$this->display->Slider_Data();
			$config['per_page']=5;
			$config['uri_segment']=$pageindex;
	        $this->pagination->initialize($config);
			$data1['rowcount']=$this->display->banner_count();
			$data1["links"] = $this->pagination->create_links();
	        $data1["results"] = $this->display->get_banner($config["per_page"], $pageindex,$cp="");
	        
			$data=$this->globaldata;
			$this->load->view('header1',$data);
			$this->load->view('banner',$data1);
			$this->load->view('footer1');
	}
	
	public function activatestudentsforpassword()
	{	
		$this->load->Model('gridmodel');
		$data1["franchisees"] = $this->gridmodel->loadAllFranchiseeData();
		$data=$this->globaldata;		
		$this->load->view('header1',$data);
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
			if($result)	{
				$responsedata["message"]="Exists";
			}else{
				$responsedata["message"]="Success";
			}

	    }
	    print_r(json_encode($responsedata));
	}

}




	