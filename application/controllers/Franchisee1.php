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
	 
public function Delete_Enquiry_Data()
{
$a=$_POST['id'];
//echo  $a;
//die();
/*$data array(
	'f_id',
	'Franchisee_Name',
	'f_State',
	'f_City',
	'stud_name',
	'enq_date',
	'add',
	'contact',
	'email',
	'state',
	'city',
	'course'

);*/

$this->load->model('Fran_Data');
	$res=$this->Fran_Data->dele_Enq($a);
				if($res==true)
				{
				redirect('Admin/Active_Fran_Enquiry');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/Active_Fran_Enquiry');
				}


}	 
	 
	
public function Delete()
 {
 	$a= $_POST['F_id'];
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
	$this->load->model('Fran_Data');
	$res=$this->Fran_Data->dele($data,$a);
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
		$this->load->view('Login');
		
	}
	
	public function Book_Order()
	{
		$this->load->model('display');
		$data1['Order1']=$this->display->order_Data();
		$data=$this->globaldata;
		$this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Book',$data1);		
		$this->load->view('Franchisee/footer');
	}
	
	
	public function Admission()
	{
		$this->load->model('display');
		$data1['Order1']=$this->display->Admission();
		$data=$this->globaldata;
		$this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Admission',$data1);
		$this->load->view('Franchisee/footer');
	}
	
	
	public function Daily_Enquiry_Save()
	{
		$data=$this->globaldata['userdata'];
		$fid=$data->F_id;
		$fstate=$data->State;
		$fcity=$data->City;
		$fname1=$data->Name;
		$data1 = array(
		'f_id' => $fid,
		'Franchisee_Name' => $fname1,
		'f_State'  => $fstate,
		'f_City' => $fcity,
		'stud_name' => $this->input->post('nm'),
		'enq_date' => $this->input->post('pcont'),
		'add' => $this->input->post('testo'),
		'contact' => $this->input->post('cont'),
		'email' => $this->input->post('email1'),
		'state' => $this->input->post('stat'),
		'city' => $this->input->post('city'),
		'course' => $this->input->post('course')
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
	public function Daily_Enquiry()
	{
		//$this->load->model('display');
		//$data1['Order1']=$this->display->Active_Fran_Enquiry();
		$data=$this->globaldata;
		$this->load->view('Franchisee/header',$data);
		$this->load->view('Franchisee/Enquiry');
		$this->load->view('Franchisee/footer');
	}
	
	public function Franchisee_Download()
	{
	
		$data=$this->globaldata;
		$this->load->view('Franchisee/header',$data);
	
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
		$b=$_GET['id2'];
		$this->load->database();
		$sql="select * from franchisee where F_id='$b'";
		$res1=mysql_query($sql);
		$row=mysql_fetch_array($res1);
		$Name = $row['Name'];  
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
                        <th style="font-size:20px;">Name:</th>
                        <td>$Name</td>
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
  				   
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
 
    // ---------------------------------------------------------    
 
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    
    $filename='C:/xampp/htdocs/CCA/PDFDATA/'.$Name.ltrim(".")."pdf";
   //die("asdasdsd");
    $pdf->Output($filename, 'F'); 
    	
	redirect('Admin/Franchisee');
	}
    //============================================================+
    // END OF FILE
    //============================================================+ 


	
	
	
	/*********************************End***************************************/
}

	