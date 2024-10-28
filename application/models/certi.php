<?php
class certi extends CI_Model{
function __construct() {
$this->load->library("Pdf");
parent::__construct();
}




public function Smart_Tally_certi($id)
{
 $query=$this->db->get_where('before_certi',array('id'=>$id));
 $result=$query->result_array();
 foreach($result as $res)
 {
 	 $stud_name=$res['stud_name'];
 	 $certi_id=$res['certi_id'];
 	 $fname=strtoupper($res['fname']);
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
$exa->setAuthor ( 'CCA' );
$exa->setTitle ( 'CCA Certificate' );
$exa->setSubject ( 'Certificate' );
$exa->setKeywords ( 'TCPDF, pdf, PHP' );
$font_size = $exa->pixelsToUnits('40');
$exa->setFont ( 'times', '', 12);
$exa->addPage ();
$txt = <<<HDOC

 Example of TCPDF

HDOC;
$exa->Write (0, $txt );

$exa->Ln ();

$exa->setImageScale ( PDF_IMAGE_SCALE_RATIO );

$exa->setJPEGQuality ( 90 );

$exa->Image ( "http://ccaindia.in/Certi/smart_tally.jpg" , 0,0,475,600);

$exa->Ln ( 50 );
//$exa->Rotate(-20);
$exa->SetXY(50, 102);
$exa->Cell(0,0, $stud_name, 0, 0, 'L', 0, '', 0);

$exa->SetXY(30, 136);
$exa->Cell(0,0, $fname, 0, 0, 'L', 0, '', 0);

//$exa->setCellPaddings(1, 1, 1, 1);
$exa->SetXY(98, 154);
//$grade="A";
$exa->Cell(0,0, $grade, 0, 0, 'L', 0, '', 0);

$exa->SetXY(69, 169);
//$dur1="May2013";
$exa->Cell(0,0, $fdt, 0, 0, 'L', 0, '', 0);

$exa->SetXY(125, 169);
//$dur2="May2014";
$exa->Cell(0,0, $tdt, 0, 0, 'L', 0, '', 0);

$exa->SetXY(64, 187);
//$cno="C001";
$exa->Cell(0,0, $certi_id, 0, 0, 'L', 0, '', 0);



$exa->SetXY(35, 205);
$exa->Cell(0,0, $dt, 0, 0, 'L', 0, '', 0);
//$exa->WriteHTML ( $txt );

$exa->Output ($stud_name.'.pdf', 'D' );
 
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 
}


public function Insert_certificate_data($id)
{
     $mid1=0;

     $query=$this->db->get_where('exm_status',array('id'=>$id));
     $result=$query->result_array();
     

       $query2=$this->db->query('SELECT MAX(id) AS maxid FROM issued_certificates')->row();
       $maxid = $query2->maxid;
       if($maxid==0)
       {
          $maxid=1; 
       }
       else
       {
           $maxid=intval($maxid+1);
       }
     

     foreach($result as $res)
     {
     	 $s_id=explode("/",$res['stud_id']);
     	 $stud_id=$s_id[1];	
     	 $certi_id="C".$maxid."/".$res['stud_id'];
     	 $data1=array(
     	 	'siid'=>$res['siid'],
     	 	'e_id'=>$id,
     	 	'certi_id'=>$certi_id,
     	 	'status'=>"Issued",
     	 	'course'=>$res['course'],
            'stud_id'=>$res['stud_id'],
            'issued_date'=>date('Y-m-d')     	 	
     	 	);

         $siid=$res['siid'];   
     }
     
     $query3=$this->db->get_where('issued_certificates',array('siid'=>$siid));
     if($query3->num_rows()==0)
     {
         $this->db->set('certi_status','Issued');
         $this->db->where('siid',$siid);
         $this->db->update('exm_status');
         
         $query1=$this->db->insert('issued_certificates',$data1);
         if($query1)
         {
         	 return true;
         }
         else
         {
         	 return false;
         }
      }    
}



}