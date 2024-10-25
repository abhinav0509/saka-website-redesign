<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
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
          $this->load->library("Pdf");
       }

     }
	public function index()
	{
		$this->load->view('Student/Login');
		
	}
	public function Home()
	{
		$data=$this->globaldata;
		$this->load->view('Student/header',$data);
		$this->load->view('Student/Home');		
		$this->load->view('Student/footer');
	}
	public function exame_result()
	{
		$data=$this->globaldata;
		$data1=$this->globaldata['userdata'];
		$mid=$data1->module;
		$data2['fdata']=$this->globaldata['userdata'];
		$this->load->Model('stud_exame');
		$data2['result']=$this->stud_exame->get_cor_ans($data1->user_id,$mid);
		$data2['stud_info']=$this->stud_exame->get_stud_info($data1->user_id);
		$data2['exame_det']=$this->stud_exame->get_exm_det($data1->user_id);
		//$data2['correct']=$this->stud_exame->get_correct_count($data1->user_id);
		$data2['correct']=$this->stud_exame->get_correct_count($data1->user_id,$mid);
		$data2['incorrect']=$this->stud_exame->get_incorrect_count($data1->user_id,$mid);
		$data2['passmark']=$this->stud_exame->get_pass_marks($data1->module);

		$this->load->view('Student/header',$data);
		$this->load->view('Student/exm_res',$data2);		
		$this->load->view('Student/footer');
	}
	public function Exam_paper()
	{
		$data=$this->globaldata;
		$data1['fdata']=$this->globaldata['userdata'];
		$this->load->view('Student/header',$data);
		$this->load->view('Student/exam_paper',$data1);		
		$this->load->view('Student/footer');
	}
	public function getExame()
	{
		
		$data=$this->globaldata['userdata'];
		$this->load->Model('stud_exame');
		$data1=$this->stud_exame->getExame_paper($data->module);
		$data2=$this->stud_exame->get_stud_ans($data->user_id,$data->module);
		$result['data1']=$data1;
		$result['data2']=$data2;
		print_r(json_encode($result));

	}
	public function getExamenext()
	{
	    
		$id=$_POST['mid'];
		$lastid=$_POST['lastid'];
		$data=$this->globaldata['userdata'];		
		$this->load->Model('stud_exame');
		$data1=$this->stud_exame->getnext_ques($data->module,$id,$lastid);
		$data2=$this->stud_exame->get_stud_ans($data->user_id,$data->module);
		$result['data1']=$data1;
		$result['data2']=$data2;
		print_r(json_encode($result));
	}
	public function getExameprev()
	{
		$id=$_POST['mid'];
		$firstid=$_POST['firstid'];
		$data=$this->globaldata['userdata'];
		$this->load->Model('stud_exame');
		$data1=$this->stud_exame->getprev_ques($data->module,$id,$firstid);
		$data2=$this->stud_exame->get_stud_ans($data->user_id,$data->module);
		$result['data1']=$data1;
		$result['data2']=$data2;
		print_r(json_encode($result));
	}
	public function getsinglequiz()
	{
       $id=$_POST['id1'];
       $data=$this->globaldata['userdata'];
		$this->load->Model('stud_exame');
		$data1=$this->stud_exame->getsingle($data->module,$id);
		$data2=$this->stud_exame->get_stud_ans($data->user_id,$data->module);
		$result['data1']=$data1;
		$result['data2']=$data2;
		print_r(json_encode($result));
		

	}
	public function getExameCount()
	{
        $data=$this->globaldata['userdata'];
		$this->load->Model('stud_exame');

		$data1=$this->stud_exame->get_stud_ans($data->module,$data->module);
		$data1=$this->stud_exame->getExame_paper_count($data->module);
		$data2=$this->stud_exame->get_exam_first_id($data->module);
		$data3=$this->stud_exame->get_exam_last_id($data->module);
		$data4=$this->stud_exame->get_stud_ans($data->user_id,$data->module);
        $data5=$this->stud_exame->get_module_det($data->module);

		$result['data1']=$data1; //Main Data
		$result['data2']=$data2;
		$result['data3']=$data3;
		$result['data4']=$data4;
		$result['data5']=$data5;
		print_r(json_encode($result));
	}
	public function save_ans()
	{
         $ans_stat=0;
         $qid=$this->input->post('qid');
         $user_ans=$this->input->post('uans');
         $correct_ans=$this->input->post('cans');
         $s_id=$this->input->post('sid');
		 $m_id=$this->input->post('mid');
         if($user_ans==$correct_ans)
         {
         	$ans_stat=1;
         }
         else
         {
         	$ans_stat=0;
         }

         $data=array(
        	'f_id'=>$this->input->post('fid'),
        	's_id'=>$this->input->post('sid'),
        	'q_id'=>$this->input->post('qid'),
        	'u_ans'=>$this->input->post('uans'),
        	'c_ans'=>$this->input->post('cans'),
        	'ans_stat'=>$ans_stat,
			'module_id'=>$m_id
        	);


		$this->load->Model('stud_exame');
		$data1=$this->stud_exame->save_user_ans($data,$qid,$s_id);
		print_r($data1);
	}
    
    public function end_exame()
	{
		$stud_id=$this->input->post('sid');
		$status=$this->input->post('status');
		
		$data1=$this->globaldata['userdata'];
		$mod=$data1->module;
		
		$this->load->Model('stud_exame');
		
		$this->db->set('u_status','Completed');
  		$this->db->where(array('user_id'=>$stud_id,'module'=>$mod));
  		$update_active=$this->db->update('active_stud');

		$res34=$this->stud_exame->update_status($stud_id,$status);
        
        $data1=$this->globaldata['userdata'];
        
        $estatus=""; 
        $mid=$data1->module;
        $course=$data1->course;
        $sid=$data1->user_id; 	
        $fid=$data1->f_id;

        $data2['exame_det']=$this->stud_exame->get_exm_det($data1->user_id);
        $data2['correct']=$this->stud_exame->get_correct_count($data1->user_id,$mid);
		$data2['incorrect']=$this->stud_exame->get_incorrect_count($data1->user_id);
		$data2['passmark']=$this->stud_exame->get_pass_marks($data1->module);

		$p_marks=$data2['passmark'][0]['pass_marks'];
		$module=$data2['exame_det'][0]['quiz_cat_name'];
        $correct=$data2['correct'];  
        $marks=$data2['correct'];
        if($correct >= $p_marks){
          $estatus="pass";
        } 
        else{
        	$estatus="fail";
        } 

         if($estatus=="fail")
		 {
			$status="notactive";
			$this->load->Model('stud_exame');
			$this->stud_exame->Fail_status($sid,$status,$mid);		
		 }
		 else if($estatus=="pass")
		 {
			$status="active";
			$this->load->Model('stud_exame');
			$res12=$this->stud_exame->Pass_status($sid,$status,$estatus,$mid,$module);
		 }  

		 $query2=$this->db->get_where('admission',array('stud_id'=>$sid)); 
        $res=$query2->result_array();
        //$res[0]['id'];
        $dt=date('Y-m-d');
    	$data=array(
    		  'siid'=>$res[0]['id'],
              'stud_id'=>$sid,
              'fid'=>$fid,
              'status'=>$estatus,
              'marks'=>$marks,
              'p_mark'=>$p_marks,
              'course'=>$course,
              'module'=>$module,
              'exm_date'=>$dt,
			  'certi_status'=>"NotIssued"
    		);

        $data1=array(
        	'stud_id'=>$sid,
        	'stud_name'=>$res[0]['name'],
        	'f_id'=>$res[0]['f_id'],
        	'fname'=>$res[0]['fran_Name'],
        	'exame_date'=>$dt,
        	'admission_dt'=>$res[0]['course_date'],
        	'course'=>$course,
        	'status'=>'Not Issued',
        	'stud_mark'=>$marks,
        	'p_mark'=>$p_marks,
        	'result'=>$estatus,
			'Module'=>$module
        	); 

    	$this->load->Model('stud_exame');
    	$res1=$this->stud_exame->insert_result($data,$sid,$data1); 
        

		if($res34)
		{
			$dataa['msg']="success";
			print_r(json_encode($dataa));
		}
		else
		{
			$dataa['msg']="failed";
			print_r(json_encode($dataa));
		}
	}

   public function Change_adm_stud_state() 
   {
   	  $sid=$_POST['sid'];
   	  $this->load->Model('stud_exame');
      $this->stud_exame->adm_stud_state_chane($sid);
   }

	public function get_pdf()
	{
$this->load->library("Pdf");
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
		

/*$html = '<h1>Test TCPDF Methods in HTML</h1>
<h2 style="color:red;">IMPORTANT:</h2>
<span style="color:red;ba">If you are using user-generated content, the tcpdf tag can be unsafe.<br />
You can disable this tag by setting to false the <b>K_TCPDF_CALLS_IN_HTML</b> constant on TCPDF configuration file.</span>
<h2>write1DBarcode method in HTML</h2>';
$borderStyle=array();
$borderStyle['cap']='butt';
$borderStyle['color']=array(0,0,0);
$borderStyle['dash']=0;
$borderStyle['join']='';    
$borderStyle['phase']=0;
$borderStyle['width']=1;

$divHeight=100;
$divWidth=100;

$divXPosition=15;
$divYPosition=80;

$pdf->writeHTMLCell($divWidth, $divHeight, $divXPosition,$divYPosition,$html, $borderStyle);*/
//$pdf->SetXY(110, 200);
$html=<<<EOD
<style>
p{
		height:800px;
		width:250px;
		}
</style>
<div style="width:200px; height:250px;  border:1px solid #CCC;">
<p>
asdsasadsadsadadsaasdasd
asdsadasdsadsdsadsadsad
asdsadsadasdasdsadsdsad
asdsadasdadsadasdasdsadsa
sadsadsadsadsadsaasdsad
asdsadasdasdsasadsadsadsa
sadsadsadsadasdsadsadsad

</p>
</div>

EOD;

$img=base_url().'uploads/Admission/comment9.jpg';
$pdf->Image($img, 10, 0, 200, 50, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);
$pdf->writeHTMLCell(0, 100, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Output('example_049.pdf', 'I');

	}


public function Mark_Sheet(){

$this->load->library("Pdf");
$grade="";

$module=$_GET['mod'];
$pmark=$_GET['pmark'];
$correct=$_GET['correct'];
$data=$this->globaldata['userdata'];
$st_id=$data->user_id;

if($correct < $pmark)
{
	$grade="Fail";
}
else if($correct >= $pmark)
{
    $grade="Pass";
}

$query=$this->db->get_where('admission',array('stud_id'=>$st_id));
$result=$query->result_array();
foreach($result as $res){
	$fname=$res['fran_Name'];
}


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 048');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$PDF_HEADER_LOGO = "http://ccaindia.in/Style/images/ccalogo.jpg";//any image file. check correct path.
$PDF_HEADER_LOGO_WIDTH = "20";
$PDF_HEADER_TITLE = "College Of Computer Application";
$PDF_HEADER_STRING = "310,311, 3rd Floor, Mahalaxmi Market,\n"
 ."Near Desai Bandhu, Shanipar Chowk,\n"
 ."Mandai Road, Shukrawar Peth, \n"
 . "Tel:- 020-32392121 / 09373703928";
 
$pdf->SetHeaderData(PDF_HEADER_LOGO, $PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING,array(0,0,0), array(255,255,255));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
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


$pdf->AddPage();


// -----------------------------------------------------------------------------
$pdf->SetFont('helvetica', '', 12);

$pdf->SetXY(15,50);
$pdf->Write(0, 'Student Marksheet', '', 0, 'L', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 8);


// Table with rowspans and THEAD
$tbl = <<<EOD
<br><br><br>
<table border="1" cellpadding="2" cellspacing="2" style="margin-left:50px;">
<thead> 
 <tr style="background-color:#4C88BA;color:#FFF;">  
   <td width="180" align="center"><b>Student Info</b></td>
   <td width="140" align="center"><b>Course</b></td>
   <td width="80" align="center"> <b>Marks</b></td>
   <td width="80" align="center"><b>Result</b></td>
   
 </tr>
</thead>
 <tr>
  
  <td width="180" rowspan="6"><span style="color:red; font-weight: bold;">Name:-</span> $data->stud_name<br /><br /><span style="color:red;font-weight: bold;">ID:-</span> $data->user_id<br /><br /><span style="color:red;font-weight: bold;">Center:-</span> $fname</td>
  <td width="140"><span style="color:red; font-weight: bold;">Course:-</span> $data->course<br /><br /><span style="color:red; font-weight: bold;">Module:-</span>  $module<br /></td>
  <td width="80" align="center">$correct</td>
  <td width="80" align="center">$grade</td>
  
 </tr>

 <tr>
 
  <td width="140" rowspan="3"></td>
  <td width="80" align="center">$correct</td>
  <td width="80" align="center">$grade</td>
 </tr>
 
 
 
 
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


//Close and output PDF document
$pdf->Output($data->stud_name.".pdf", 'D');


}


}

	