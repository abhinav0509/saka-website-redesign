<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$data['banner']=$this->display->get_banner();
		$data['news']=$this->display->get_news();
		$data["results"] = $this->display->Testi_display();
		$this->load->view('front_view/homeheader');
		$this->load->view('front_view/Home',$data);
		$this->load->view('front_view/footer');
	}
	
	public function about()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/front_about',$data);
		$this->load->view('front_view/footer');
	}
	public function smart_tally()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/smart_tally',$data);
		$this->load->view('front_view/footer');
	}
	public function quick_tally()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/quick_tally',$data);
		$this->load->view('front_view/footer');
	}
	public function tally_professional()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/tally_professional',$data);
		$this->load->view('front_view/footer');
	}
	public function smart_excel()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/smart_excel',$data);
		$this->load->view('front_view/footer');
	}
	public function master_excel()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/master_excel',$data);
		$this->load->view('front_view/footer');
	}
   public function cea()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/cea',$data);
		$this->load->view('front_view/footer');
	}
	public function NULM()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/mid_brain',$data);
		$this->load->view('front_view/footer');
	}
	public function virtual_mba()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/virtual_mba',$data);
		$this->load->view('front_view/footer');
	}
	public function gfs_project()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/gfs_project',$data);
		$this->load->view('front_view/footer');
	}
	public function placement()
	{
		
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/placement',$data);
		$this->load->view('front_view/footer');
	}
	public function download()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/download',$data);
		$this->load->view('front_view/footer');
	}
	public function cca_gallery()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/cca_gallery',$data);
		$this->load->view('front_view/footer');
	}
	public function cca_franchisee()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$data['contact']=$this->display->get_contact_details();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/cca_franchisee',$data);
		$this->load->view('front_view/footer');
	}
	public function enquiry()
	{
	
		
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');

		$this->load->model('display');
		$data1['states']=$this->display->get_state();
		$data1['courses']=$this->display->getcourse();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/stud_enquiry',$data1);
		$this->load->view('front_view/footer');
	}
	public function stud_enquiry()
	{
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');

		$this->load->model('display');
		$data1['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/stud_enquiry1',$data1);
		$this->load->view('front_view/footer');
	}
	public function employer()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/employer',$data);
		$this->load->view('front_view/footer');
	}
	
	public function Franchisee_Enq()
	{
		$session_data=$this->session->userdata('msg');
		$data1['message']=$session_data;
		$this->session->unset_userdata('msg');
		
		$this->load->view('front_view/Header');
		$this->load->view('front_view/Franchisee_Enquiry',$data1);
		$this->load->view('front_view/footer');
	}
	public function contact()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/contact_us',$data);
		$this->load->view('front_view/footer');
	}
	
	public function Franchisee_Login()
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
			$this->load->view('front_view/Header');
			$this->load->view('front_view/F_login');
			$this->load->view('front_view/footer');
		}
	}
	
	public function Student()
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
		//$this->load->view('front_view/Header');
			$this->load->view('Student_Login');
		}
	}
	
	public function locateus()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/locate_us',$data);
		$this->load->view('front_view/footer');
	}
	
	public function jobs()
	{
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
         	$pageindex=intval(($pageindex-1)*5);
         }		
		 
		 
		$this->load->model('display');
		$config=array();
		$config["base_url"]=base_url()."index.php/welcome/jobs";
		$data1["rowcount"] = $this->display->Jobs_display();
		$config["per_page"] = 5;
        $config["uri_segment"] = $pageindex;
		$this->pagination->initialize($config);
		
		$data1["results"] = $this->display->job_Paging($config["per_page"], $pageindex);
		$data1["links"] = $this->pagination->create_links();
		
		$this->load->view('front_view/Header');
		$this->load->view('front_view/jobs',$data1);
		$this->load->view('front_view/footer');
	}
	public function fran_placement()
	{
		$this->load->view('front_view/Header');
		$this->load->view('front_view/fran_placement');
		$this->load->view('front_view/footer');
	}
public function more_testimonal()
	{
		$id=$_GET['id'];
		$this->load->model('display');
		$data1["results"]=$this->display->More_Test($id);
		$this->load->view('front_view/Header');
		$this->load->view('front_view/detail_testimonial',$data1);
		$this->load->view('front_view/footer');
	}
	public function stud_testimonal()
	{
		$this->load->model('display');
		$data1["results"] = $this->display->Testi_display();
	
		$data1['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/testimonial',$data1);
		$this->load->view('front_view/footer');
	}
	public function cca_college()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/cca_college',$data);
		$this->load->view('front_view/footer');
	} 
	public function cca_skills()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/cca_skills',$data);
		$this->load->view('front_view/footer');
	} 
	public function franchisee()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/our_franchisee',$data);
		$this->load->view('front_view/footer');
	}
	public function institute()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/cca_institute');
		$this->load->view('front_view/footer');
	}
	public function jobcard()
	{
		$this->load->model('display');
        $data1['fran']=$this->display->get_franchisee();
        $data1['states']=$this->display->get_state();
        $data1['cities']=$this->display->get_city();

		$config=array();
        $config["base_url"]="http://localhost/CCA/index.php/welcome/jobcard";
        $config["total_rows"]=$this->display->jobcard_display();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data1["results"] = $this->display->jobcard_Paging($config["per_page"], $page,$cp="");
        $data1["links"] = $this->pagination->create_links();


		$this->load->view('jobcardheader');
		$this->load->view('front_view/card',$data1);
		$this->load->view('footer1');
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
        
           $fname=$this->input->post('frn');
           $sname=$this->input->post('nm');
           $scode=$this->input->post('code');
           $vupto=$this->input->post('dt');
           $course=$this->input->post('course');
           $state=$this->input->post('state');
           $city=$this->input->post('city');
           $img=$b;
           $data=array('fname'=>$fname,'sname'=>$sname,'scode'=>$scode,'vupto'=>$vupto,'course'=>$course,'state'=>$state,'city'=>$city,'img'=>$b);

           $this->load->model('news');
           $result=$this->news->save_job_card($data);
           if($result)
           {
                redirect('welcome/jobcard');
           }
           else
           { 
                echo "Error";
           }
           
	}
	public function job_pdf()
	{
        $this->load->library("Pdf");
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
 
    // set document information
	
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
 
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);   
 
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
 
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
 
    // Set some content to print	
    $html = <<<EOD
	<style>
		.jobcard{
width: 475px;
height: 300px;
border: 1px solid black;
background:url('<?php echo base_url(); ?>/cca-job-card-front1.jpg');

}
.cno{
margin-top: 80px;
margin-left: 21px;
width: 155px;
height: auto;
}

.name{
margin-top: 10px;

width: 255px;
height: auto;
}

.sco{
margin-top: 10px;

width: 255px;
height: auto;
}

.valid{
margin-top: 10px;

width: 355px;
height: auto;
}

.scenter{
margin-top: 10px;

width: 255px;
height: auto;
}

.city{
margin-top: 11px;
float:left;
width: auto;
height: auto;
margin-left:10px;
}

.state{
margin-top: 11px;
float:left;
width: auto;
height: auto;
}

.sc{width:455px;

height: auto;
}
#img {
    width: 150px;
    height: 150px;
    float: left;
    border: 1px solid #000;
    margin-top: -158px;
    margin-left: 271px;
}
		
	</style>
	<div class="jobcard" style="background:url('<?php echo base_url(); ?>Uploads/job_card/cca-job-card-front1.jpg')">
<div class="cno">
    <div class="cno1">
	    Card No : T-3051
	</div>
	<div class="name">
	     Name : Kalpana Manovijay Govekar
	</div>

	<div class="sco">
	     Student Code : DM014/066
	</div>
	
	
	<div class="valid">
	     Valid Upto : Mar-14
	</div>
	
	<div class="scenter">
	Study Center : Ambika Computers
	</div>
	
	<div class="sc">
<div class="state">
	State : Maharashtra
	</div>
	<div class="city">
	City : Malvan
	</div>
	</div>
	<div id="img">
	
	<img src="<?php echo base_url(); ?>Uploads/job_card/ccaimg2.jpg" height="150px" width:"150px";>
	
	
	
	</div>
	
	</div>



</div>
EOD;
 
    // Print text using writeHTMLCell()
     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
 
    // ---------------------------------------------------------    
 
    // Close and output PDF documentry]
    // This method has several options, check the source code documentation for more information.
    
   
  
     $pdf->Output("Mypdf", 'I');
  
	}
	public function student_enquiry()
	{
		$mmail="enquiry@mavericksoftware.in";
		$pass="Msipl@411037";
		$query1=$this->db->get_where('mail_config',array('status'=>'Active'));
		$result=$query1->result_array();
		if($query1->num_rows() > 0){
		  $mmail=$result[0]['email'];      
		  $pass=$result[0]['paswrd'];
		}
		$mmail="enquiry@mavericksoftware.in";
		$pass="Msipl@411037";
		
		 $this->load->view("front_view/PHPMailerAutoload");
		
		 $name=$this->input->post('name_id');
		 $contact=$this->input->post('cont');
		 $subject=$this->input->post('cmp');
		 $message=$this->input->post('msg');
		 $from=$this->input->post('email_id');
		 $state_id=$this->input->post('Campus');
		 $city_id=$this->input->post('Discipline');
		 $fran=$this->input->post('Study_Level');
		 $course=$this->input->post('cour');
		 $n_status="unread";
		 $dt=date('Y-m-d');
         
         $query=$this->db->get_where("state",array('state_id'=>$state_id));
         $result=$query->result_array();
         $query1=$this->db->get_where("city",array('city_id'=>$city_id));
         $result1=$query1->result_array();
         $query2=$this->db->get_where("customers_info",array('institute_name'=>$fran));
         $result2=$query2->result_array();
         $state_name=$result[0]['name'];
         $city_name=$result1[0]['name'];
         $fran_id=$result2[0]['cus_id'];
         
         $data1=array('name'=>$name,'email'=>$from,'contact'=>$contact,'subject'=>$subject,'message'=>$message,'state_id'=>$state_id,'state_name'=>$state_name,'city_id'=>$city_id,'city_name'=>$city_name,'fran_id'=>$fran_id,'fran_name'=>$fran,'enq_dt'=>$dt,'n_status'=>$n_status,'course'=>$course);
         $to='yogesh@mavericksoftware.in';

            $txt  ="<div style='width:90%; height:auto; border:1px solid #CCC; border-top:none;'>";
		    $txt .="<div style='width:100%;height:40px;background-color:#00569D; color:#FFF;'>";
			$txt .="<p style='padding-left:20px;padding-top:9px;'><b style='font-size:19px;'>Wellcome Mail... (CCA)</b></p></div>";
			$txt .="<div style='width:100%; margin-top:20px; margin-bottom:20px; padding-left:20px;'>";
			$txt .="Hello <b>$name</b>, <br />We Received Your Mail,Our Team Will Contact You Soon...";
			$txt .="</div>";
			$txt .="<p style='padding-left:20px;'>Thank You...!</p>";
			$txt .="</div>";
       
		try
		{
		    $mail = new PHPMailer;
		    $mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = $mmail;                   // SMTP username
			$mail->Password = $pass;               // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
			$mail->setFrom($mmail, 'CCA');     //Set who the message is to be sent from
			$mail->addAddress('cca.franchise@gmail.com', 'CCA');  // Add a recipient
			$mail->AddReplyTo('cca.franchise@gmail.com', 'Reply to CCA');
			//$mail->addAddress('anand@mavericksoftware.in', 'Property Basket');
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->isHTML(true);                                  // Set email format to HTML
			//$mail->AddAttachment();
			 
			$mail->Subject = "New Student Enquiry";
			$mail->Body    = "Student Name:- $name<br><br>Contact No :- $contact<br><br>Email :- $from<br><br>Subject :- $subject <br><br>Message :- $message";
            
            if(!$mail->send()) {
			    //delfile($fname);
			   echo 'Message could not be sent.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
			   exit;
			}
			else
			{
				 $data['message']="You successfully send mail.";
			}
				$this->load->model('student_enquiry');
				$res=$this->student_enquiry->Insert_Data($data1);
				if($res)
				{
				     //$this->session->set_userdata('msg',$mess);
 	     		     $mail = new PHPMailer;
				     $mail->isSMTP();                                      // Set mailer to use SMTP
					 $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
					 $mail->SMTPAuth = true;                               // Enable SMTP authentication
					 $mail->Username = $mmail;                   // SMTP username
					 $mail->Password = $pass;               // SMTP password
					 $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
					 $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
					 $mail->setFrom($mmail, 'CCA');     //Set who the message is to be sent from
					 $mail->addAddress($from, 'CCA');  // Add a recipient
					 $mail->AddReplyTo($mmail, 'Reply to CCA');
					 $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
					 $mail->isHTML(true);                                  // Set email format to HTML
				 	 $mail->Subject = "Wellcome Mail";
					 $mail->Body    = $txt;
					 $mail->send();
				     //redirect('welcome/enquiry');

					  $data['message']="Your Data Subited successfully.";
					 print_r(json_encode($data));
				}
				else
				{
				
					$data['message']="You Data Not Submitted Successfullu...Try Again";
					print_r(json_encode($data));
					//redirect('welcome/enquiry');
				} 


		}
		catch(Exception $e)
		{
			echo "Mail not send";
		}

    }
    public function student_enquiry1()
	{
		 
		 $this->load->view("front_view/PHPMailerAutoload");
		
		 $name=$this->input->post('name_id');
		 $contact=$this->input->post('cont');
		 $subject=$this->input->post('cmp');
		 $message=$this->input->post('msg');
		 $from=$this->input->post('email_id');
		 $state_id=$this->input->post('Campus');
		 $city_id=$this->input->post('Discipline');
		 $fran=$this->input->post('Study_Level');
		 $dt=date('Y-m-d');
         
         $query=$this->db->get_where("state",array('state_id'=>$state_id));
         $result=$query->result_array();
         $query1=$this->db->get_where("city",array('city_id'=>$city_id));
         $result1=$query1->result_array();
         $query2=$this->db->get_where("customers_info",array('institute_name'=>$fran));
         $result2=$query2->result_array();
         $state_name=$result[0]['name'];
         $city_name=$result1[0]['name'];
         $fran_id=$result2[0]['cus_id'];
         
         $data1=array('name'=>$name,'email'=>$from,'contact'=>$contact,'subject'=>$subject,'message'=>$message,'state_id'=>$state_id,'state_name'=>$state_name,'city_id'=>$city_id,'city_name'=>$city_name,'fran_id'=>$fran_id,'fran_name'=>$fran,'enq_dt'=>$dt);
		 $to='yogesh@mavericksoftware.in';
       
		try
		{
		    $mail = new PHPMailer;
		    $mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'yogesh@mavericksoftware.in';                   // SMTP username
			$mail->Password = 'Yogesh@5132';               // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
			$mail->setFrom($from, 'CCA');     //Set who the message is to be sent from
			$mail->addAddress('cca.franchise@gmail.com', 'CCA');  // Add a recipient
			 $mail->AddReplyTo('cca.franchise@gmail.com', 'Reply to CCA');
			//$mail->addAddress('cca.franchise@gmail.com', 'CCA');  // Add a recipient
			//$mail->addAddress('anand@mavericksoftware.in', 'Property Basket');
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->isHTML(true);                                  // Set email format to HTML
			//$mail->AddAttachment();
			 
			$mail->Subject = "New Student Enquiry";
			$mail->Body    = "Student Name:- $name<br><br>Contact No :- $contact<br><br>Email :- $from<br><br>Subject :- $subject <br><br>Message :- $message";
            
            if(!$mail->send()) {
			    //delfile($fname);
			   echo 'Message could not be sent.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
			   exit;
			}
			else
			{
				 $data['message']="You successfully send mail.";
			}

				$this->load->model('student_enquiry');
				$res=$this->student_enquiry->Insert_Data($data1);
				if($res)
				{
				     $mess="We recieved Mail.....! We will contact you Thanks...!";
				     $this->session->set_userdata('msg',$mess);
				     redirect('welcome/stud_enquiry');
				}
				else
				{
				
					redirect('welcome/stud_enquiry');
				} 
		}
		catch(Exception $e)
		{
			echo "Mail not send";
		}

		
	}
	
	public function franch_enquiry()
	{
		$mmail="enquiry@mavericksoftware.in";
		$pass="Msipl@411037";
		$query1=$this->db->get_where('mail_config',array('status'=>'Active'));
		$result=$query1->result_array();
		if($query1->num_rows() > 0){
		  $mmail=$result[0]['email'];      
		  $pass=$result[0]['paswrd'];
		}
		$mmail="enquiry@mavericksoftware.in";	
		$pass="Msipl@411037";
	 
     $this->load->view("front_view/PHPMailerAutoload");	 
	 $name =$this->input->post('fname');
	 $inst_name =$this->input->post('finst');
	 $badd =$this->input->post('bAdd');
	 $State =$this->input->post('state');
	 $city =$this->input->post('city');
	 $email =$this->input->post('femail');
	 $mobile =$this->input->post('fCont3');
	 $username =$this->input->post('femail');
	 $password =$this->input->post('password');
	 $pin=$this->input->post('pin');
	 $dist=$this->input->post('dist');
	 $lat=$this->input->post('lat');
	 $long=$this->input->post('lng');
	 $n_status="unread";
	 
      $query=$this->db->get_where("state",array('state_id'=>$State));
      $result=$query->result_array();
      $query1=$this->db->get_where("city",array('city_id'=>$city));
      $result1=$query1->result_array();
	  $state_name=$result[0]['name'];
      $city_name=$result1[0]['name'];

     

      //$query3=$this->db->select('max()')
      
	   /*  $str=substr($state_name, 0,1);
	     $str1=substr($state_name, 2,1);

     $str3=strtoUpper(substr($city_name, 0,2));//city
     $str2=strtoUpper($str.$str1);//state*/
     

      $dt=date('Y-m-d');

	 $data1=array(
        'Name'=>$name,
        'Inst_name'=>$inst_name,
        'Badd'=>$badd,
        'pincode'=>$pin,
        'district'=>$dist,
        'State'=>$state_name,
        'City'=>$city_name,
        'state_id'=>$State,
        'city_id'=>$city,
        'Email'=>$email,
        'Mobile'=>$mobile,
        'username'=>$username,
        'password'=>$password,
        'Status'=>0,
        'enq_dt'=>$dt,
        'lat'=>$lat,
        'longi'=>$long,
        'n_status'=>$n_status
	 	);
	
      try
		{
		    $mail = new PHPMailer;
		    $mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = $mmail;                   // SMTP username
			$mail->Password = $pass;               // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
			$mail->setFrom($email, 'CCA');     //Set who the message is to be sent from
			$mail->addAddress('cca.franchise@gmail.com', 'CCA');  // Add a recipient
			$mail->addAddress('yogesh@mavericksoftware.in', 'CCA');  // Add a recipient
			//$mail->addAddress('yogesh@mavericksoftware.in', 'CCA');  // Add a recipient
     		$mail->AddReplyTo('cca.franchise@gmail.com', 'Reply to CCA');
			//$mail->addAddress('cca.franchise@gmail.com', 'CCA');  // Add a recipient
			//$mail->addAddress('anand@mavericksoftware.in', 'Property Basket');
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->isHTML(true);                                  // Set email format to HTML
			//$mail->AddAttachment();
			 
			$mail->Subject = "New Franchise Enquiry";
			$mail->Body    = "Name:- $name<br><br>Inst_name :- $inst_name<br><br>Buissness Address :- $badd<br><br>State :- $State 
			                  <br><br>City :- $city<br><br>Email :- $email<br><br>Mobile :- $mobile<br><br> 
			                  Username :-$username<br><br>Password :-$password";
            
            if(!$mail->send()) {
			    //delfile($fname);
			   $data['message']="Error In Sending Mail to cca...!";
				print_r(json_encode($data));
			}
			else
			{
				 
			}
		}
		catch(Exception $e)
		{
			print_r(json_encode($data1));
		}

			$txt  ="<div style='width:90%; height:auto; border:1px solid #CCC; border-top:none;'>";
			$txt .="<div style='width:100%;height:40px;background-color:#00569D; color:#FFF;'>";
			$txt .="<p style='padding-left:20px;padding-top:9px;'><b style='font-size:19px;'>Wellcome Mail... (CCA)</b></p></div>";
			$txt .="<div style='width:100%; margin-top:20px; margin-bottom:20px; padding-left:20px;'>";
			$txt .="Hello <b>$name</b>, <br />We Received Your Registration Request,You will get Activation Mail Soon";
			$txt .="</div>";
			$txt .="<p style='padding-left:20px;'>Thank You...!</p>";
			$txt .="</div>";

	    $this->load->model('franchisee_enquiry');
		$res=$this->franchisee_enquiry->Insert_Data($data1);
		if($res)
		{
		     $mess="We recieved Mail.....! We will contact you Thanks...!";
		     $this->session->set_userdata('msg',$mess);
		      $mail->isSMTP();                                      // Set mailer to use SMTP
			  $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
			  $mail->SMTPAuth = true;                               // Enable SMTP authentication
			  $mail->Username = $mmail;                   // SMTP username
			  $mail->Password = $pass;               // SMTP password
			  $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			  $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
			  $mail->setFrom('cca.franchise@gmail.com', 'CCA');     //Set who the message is to be sent from
			  $mail->addAddress($email, 'CCA');  // Add a recipient
			  $mail->AddReplyTo('cca.franchise@gmail.com', 'Reply to CCA');
			  $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			  $mail->isHTML(true);                                  // Set email format to HTML
			  

			  $mail->Subject = "Registration Request";
			  $mail->Body    = $txt;
              $mail->send();
		      //redirect('welcome/Franchisee_Enq');
			  
			  $data['message']="Mail Sent...!";
		      print_r(json_encode($data));	
		}
		else
		{
			  //$data1['message']="Error In Sending Mail to franchisee...!";
			  $data['message']="Mail Sent...!";	
		      print_r(json_encode($data));	
			//redirect('welcome/Franchisee_Enq');
		} 
	 	
	 	print_r(json_encode($data1));
	}


	public function Contact_mail()
	{
     $name1=$this->input->post('name');
    // die("asdad");
      $email=$this->input->post('email');
      $cont=$name=$this->input->post('cont');
      $company=$name=$this->input->post('cmp');
      $msg=$name=$this->input->post('message');
     $this->load->view("front_view/PHPMailerAutoload");
        try
		{
		    $mail = new PHPMailer;
		    $mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'yogesh@mavericksoftware.in';                   // SMTP username
			$mail->Password = 'yog@5132';               // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
			$mail->setFrom($email, 'CCA Contact Us');     //Set who the message is to be sent from
			$mail->addAddress('cca.franchise@gmail.com', 'CCA INDIA');  // Add a recipient
			 $mail->AddReplyTo('cca.franchise@gmail.com', 'Reply to CCA');
			//$mail->addAddress('anand@mavericksoftware.in', 'Property Basket');
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->isHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = "New Enquiry from"." ".$name1;
			$mail->Body    = "Name:- $name1<br><br>Email :- $email<br><br>Company Name :- $company<br><br>Message :- $msg";
            
            if(!$mail->send()) {
			 
			   echo 'Message could not be sent.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
			   exit;
			}
			else
			{
				 $data['message']="You successfully send mail.";
			}
		}
		catch(Exception $e)
		{
			echo "Mail not send";
		}

        $this->load->view('front_view/Header');
		$this->load->view('front_view/contact_us',$data);
		$this->load->view('front_view/footer');
	}
	
    public function sent_enquiry()
    {
		$mmail="enquiry@mavericksoftware.in";
		$pass="Msipl@411037";
		$query1=$this->db->get_where('mail_config',array('status'=>'Active'));
		$result=$query1->result_array();
		if($query1->num_rows() > 0){
		  $mmail=$result[0]['email'];      
		  $pass=$result[0]['paswrd'];
		}
    	$this->load->library('mail');
		$name=$this->input->post('name');
		$contact=$this->input->post('mobno');
		$message=$this->input->post('msg');
		$interest=$this->input->post('enquiry');
		$state=$this->input->post('state');
		$city=$this->input->post('city');
		$email=$this->input->post('email');
		
		$subject="Get In Touch Enquiry";
		$to=$email;
		$from=$mmail;
 
       $this->load->view("front_view/PHPMailerAutoload");
       if($name!="")
       {
         try
		 {
		    $mail = new PHPMailer;
		    $mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = $mmail;                   // SMTP username
			$mail->Password = $pass;               // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
			$mail->setFrom($mmail, 'Get In Touch');     //Set who the message is to be sent from
			$mail->addAddress('cca.franchise@gmail.com', 'CCA INDIA');  // Add a recipient
			 $mail->AddReplyTo('cca.franchise@gmail.com', 'Reply to CCA');
			
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->isHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = "New Enquiry from"." ".$name;
			$mail->Body    = "Name:- $name<br><br>Sontact :- $contact<br><br>Interest :- $interest<br><br>State :- $state<br><br>City :- $city<br><br>Message :- $message";
            if(!$mail->send()) {
			 
			   $data['message']="Error in sending mail......";
			   print_r(json_encode($data));
			   
			}
			else
			{
			    $data['message']="You successfully send mail.";
				print_r(json_encode($data));
			}
		}
		catch(Exception $e)
		{
			echo "Mail not send";
		}

      }
		
    }

public function Gallery()
	{
		$this->load->model('display');
        $config=array();
        $config["base_url"]=base_url()."index.php/welcome/Gallery";
        $config["total_rows"]=$this->display->Get_Gallery_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);
        //$data1["rowcount"]=$this->display->Adm_jobcard_display($fran,$from_dt,$to_dt);
        $data1["results"] = $this->display->Get_Gallery($config["per_page"],$page);
        $data1["links"] = $this->pagination->create_links();
		
		$this->load->view('front_view/Header');
		$this->load->view('front_view/gallery',$data1);
		$this->load->view('front_view/footer');
	}

public function more_Gallery()
	{
		$id=$_GET['id'];
		$this->load->model('display');
		$data1["results"]=$this->display->Get_Gallery_Detail($id);
		$this->load->view('front_view/Header');
		$this->load->view('front_view/More_Gallery1',$data1);
		$this->load->view('front_view/footer');
	}

public function Video_Gallery()
	{
		$this->load->view('front_view/Header');
		$this->load->view('front_view/Video_Gallery');
		$this->load->view('front_view/footer');
	}


	public function cancellation()
	{
		$this->load->view('front_view/Header');
		$this->load->view('front_view/cancellation');
		$this->load->view('front_view/footer');
	}

	public function privacy()
	{
		$this->load->view('front_view/Header');
		$this->load->view('front_view/privacy');
		$this->load->view('front_view/footer');
	}

	public function terms()
	{
		$this->load->view('front_view/Header');
		$this->load->view('front_view/terms');
		$this->load->view('front_view/footer');
	}

	public function shipping()
	{
		$this->load->view('front_view/Header');
		$this->load->view('front_view/shipping');
		$this->load->view('front_view/footer');
	}


	
		public function detail_news()
	{
		$id=$_GET['id'];
		$this->load->Model('display');
		$data['news']=$this->display->get_News_id($id);
		$this->load->view('front_view/Header');
		$this->load->view('front_view/detail_news',$data);
		$this->load->view('front_view/footer');
	}

	public function news()
	{
	   	$this->load->model('display');
		
	   	$config=array();
        $config["base_url"]=base_url()."index.php/welcome/news";
        $config["total_rows"]=$this->display->News_display();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;        
        $this->pagination->initialize($config);
        $data1["results"] = $this->display->News_Paging($config["per_page"],$page);	
        $data1["links"] = $this->pagination->create_links();	

		$this->load->view('front_view/Header');
		$this->load->view('front_view/newsevents',$data1);
		$this->load->view('front_view/footer');	 
	}


/*******************For New Front Stude Details Start***********************/

	public function stud_details()
	{
	    $this->load->view('front_view/Header');
		$this->load->view('front_view/stud_details');
		$this->load->view('front_view/stud_footer');	  	 
	}

	public function GetCertiNo()
	{
		$name= $this->input->post('term');	
	    $this->load->model('display');	
	    $this->display->getcertificateno($name);
	}

	public function Certi_details()
	{
		$cid=$_POST['id'];
		$this->load->model('display');	
	    $data=$this->display->get_certi_stud_data($cid);		
	    print_r(json_encode($data));
	}

	public function get_certi_by_id()
	{
		 $id=$_GET['id'];
		 $this->load->Model('display');
		 $this->display->generate_certificate_stud_pdf($id);
	}

	public function pkmvy(){
		$this->load->view('front_view/Header');
		$this->load->view('front_view/pkmvy');
		$this->load->view('front_view/footer');
	}
	
	public function banking_management()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/banking_management',$data);
		$this->load->view('front_view/footer');
	}
	
	public function robotouch()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/robotouch',$data);
		$this->load->view('front_view/footer');
	}
	
	public function robospice()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/robospice',$data);
		$this->load->view('front_view/footer');
	}
	
	public function robobrain()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/robobrain',$data);
		$this->load->view('front_view/footer');
	}

	public function career()
	{
		$this->load->model('display');
		$data['states']=$this->display->get_state();
		$this->load->view('front_view/Header');
		$this->load->view('front_view/career',$data);
		$this->load->view('front_view/footer');
	}

}