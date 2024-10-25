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
		$this->load->view('student/Login');
		
	}
	public function Home()
	{
		$data=$this->globaldata;
		$this->load->view('student/header',$data);
		$this->load->view('student/Home');		
		$this->load->view('student/footer');
	}
	public function exame_result()
	{
		$data=$this->globaldata;
		$data1=$this->globaldata['userdata'];
		$data2['fdata']=$this->globaldata['userdata'];
		$this->load->Model('stud_exame');
		$data2['result']=$this->stud_exame->get_cor_ans($data1->user_id);
		$data2['stud_info']=$this->stud_exame->get_stud_info($data1->user_id);
		$data2['exame_det']=$this->stud_exame->get_exm_det($data1->user_id);
		$data2['correct']=$this->stud_exame->get_correct_count($data1->user_id);
		$data2['incorrect']=$this->stud_exame->get_incorrect_count($data1->user_id);
		$data2['passmark']=$this->stud_exame->get_pass_marks($data1->module);

		$this->load->view('student/header',$data);
		$this->load->view('student/exm_res',$data2);		
		$this->load->view('student/footer');
	}
	public function Exam_paper()
	{
		$data=$this->globaldata;
		$data1['fdata']=$this->globaldata['userdata'];
		$this->load->view('student/header',$data);
		$this->load->view('student/exam_paper',$data1);		
		$this->load->view('student/footer');
	}
	public function getExame()
	{
		
		$data=$this->globaldata['userdata'];
		$this->load->Model('stud_exame');
		$data1=$this->stud_exame->getExame_paper($data->module);
		$data2=$this->stud_exame->get_stud_ans($data->user_id);
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
		$data2=$this->stud_exame->get_stud_ans($data->user_id);
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
		$data2=$this->stud_exame->get_stud_ans($data->user_id);
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
		$data2=$this->stud_exame->get_stud_ans($data->user_id);
		$result['data1']=$data1;
		$result['data2']=$data2;
		print_r(json_encode($result));
		

	}
	public function getExameCount()
	{
        $data=$this->globaldata['userdata'];
		$this->load->Model('stud_exame');

		$data1=$this->stud_exame->get_stud_ans($data->module);
		$data1=$this->stud_exame->getExame_paper_count($data->module);
		$data2=$this->stud_exame->get_exam_first_id($data->module);
		$data3=$this->stud_exame->get_exam_last_id($data->module);
		$data4=$this->stud_exame->get_stud_ans($data->user_id);
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
        	'ans_stat'=>$ans_stat
        	);


		$this->load->Model('stud_exame');
		$data1=$this->stud_exame->save_user_ans($data,$qid,$s_id);
		print_r($data1);
	}
	public function end_exame()
	{
		$stud_id=$this->input->post('sid');
		$status=$this->input->post('status');
		$this->load->Model('stud_exame');
		$res=$this->stud_exame->update_status($stud_id,$status);
		if($res)
		{
			$data['msg']="success";
			print_r(json_encode($data));
		}
		else
		{
			$data['msg']="failed";
			print_r(json_encode($data));
		}
	}
    public function save_result_status()
    {
    	$estatus=$_POST['estate'];
    	$sid=$_POST['stud_id'];
    	$fid=$_POST['fid'];
    	$marks=$_POST['marks'];
    	$p_marks=$_POST['pass_mark'];
    	$course=$_POST['course'];
    	$module=$_POST['module'];
        
        $query2=$this->db->get_where('admission',array('stud_id'=>$sid)); 
        $res=$query2->result_array();
        $res[0]['id'];
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
              'exm_date'=>$dt
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
        	'result'=>$estatus
        	); 

    	$this->load->Model('stud_exame');
    	$res=$this->stud_exame->insert_result($data,$sid,$data1);
    	if($res)
    	{
    		$data1['msg']="true";
    		print_r(json_encode($data1));
    	}
    	else
    	{
    		$data1['msg']="true";
    		print_r(json_encode($data1));
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


}

	