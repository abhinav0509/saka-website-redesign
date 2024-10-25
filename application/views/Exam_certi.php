<?php
class Exam_certi extends CI_Model{
function __construct() {
$this->load->library("Pdf");
parent::__construct();
}



public function Master_Excel_certi($id)
{


 $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
 $this->db->from('exm_status');
 $this->db->join('admission','exm_status.siid=admission.id');
 $this->db->where(array('admission.stud_id'=>$id));
 $this->db->group_by('admission.id');
 $query=$this->db->get();
 $result=$query->result_array();

 foreach($result as $res)
 {
     $stud_name=strtoupper($res['name']);
     $fname=strtoupper($res['fran_name']);
     $marks=$res['Total_mark'];
     $p_marks=$res['Total_mark'];
     $from_dt=$res['course_date'];
     $to_dt=$res['exm_date'];
 }

 $grade="";
 
        if($marks >= 200)
        {
           $grade="A";
        }
        else if($marks < 200)
        {
           $grade="B";
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

$exa->setKeywords ( 'TCPDF, pdf, PHP' );
$font_size = $exa->pixelsToUnits('40');
$exa->setFont ( 'times', '', 12);
$exa->addPage ();

//$exa->Write (0, $txt );

$exa->Ln ();

$exa->setImageScale ( PDF_IMAGE_SCALE_RATIO );

$exa->setJPEGQuality ( 90 );

$exa->Image ( "http://localhost/CCAM/Certi/master_excel.jpg" , 0,0,475,600);

$exa->Ln ( 50 );
//$exa->Rotate(-20);
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
//$exa->Cell(0,0, $certi_id, 0, 0, 'L', 0, '', 0);



$exa->SetXY(35, 205);
$exa->Cell(0,0, $dt, 0, 0, 'L', 0, '', 0);
//$exa->WriteHTML ( $txt );

$exa->Output ($stud_name.'.pdf');  
 
}

public function Smart_Excel_certi($id)
{

 $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
 $this->db->from('exm_status');
 $this->db->join('admission','exm_status.siid=admission.id');
 $this->db->where(array('admission.stud_id'=>$id));
 $this->db->group_by('admission.id');
 $query=$this->db->get();
 $result=$query->result_array();

 foreach($result as $res)
 {
     $stud_name=strtoupper($res['name']);
     $fname=strtoupper($res['fran_name']);
     $marks=$res['Total_mark'];
     $p_marks=$res['Total_mark'];
     $from_dt=$res['course_date'];
     $to_dt=$res['exm_date'];
 }

 $grade="";
 if($p_marks >= 75)
 {
    $grade="A";
 }
 else if($p_marks < 75)
 {
    $grade="B";
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

$exa->Image ( "http://localhost/CCAM/Certi/smart_excel.jpg" , 0,0,475,600);

$exa->Ln ( 50 );
//$exa->Rotate(-20);
$exa->SetXY(50, 103);
$exa->Cell(0,0, $stud_name, 0, 0, 'L', 0, '', 0);

$exa->SetXY(30, 137);
$exa->Cell(0,0, $fname, 0, 0, 'L', 0, '', 0);

//$exa->setCellPaddings(1, 1, 1, 1);
$exa->SetXY(75, 154);
//$grade="A";
$exa->Cell(0,0, $grade, 0, 0, 'L', 0, '', 0);

$exa->SetXY(62, 171);
//$dur1="May2013";
$exa->Cell(0,0, $fdt, 0, 0, 'L', 0, '', 0);

$exa->SetXY(120, 171);
//$dur2="May2014";
$exa->Cell(0,0, $tdt, 0, 0, 'L', 0, '', 0);

$exa->SetXY(64, 189);
//$cno="C001";
//$exa->Cell(0,0, $certi_id, 0, 0, 'L', 0, '', 0);



$exa->SetXY(35, 207);
$exa->Cell(0,0, $dt, 0, 0, 'L', 0, '', 0);
//$exa->WriteHTML ( $txt );

$exa->Output ($stud_name.'.pdf', 'D' );
 
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 
}


public function Smart_Tally_certi($id)
{

 $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
 $this->db->from('exm_status');
 $this->db->join('admission','exm_status.siid=admission.id');
 $this->db->where(array('admission.stud_id'=>$id));
 $this->db->group_by('admission.id');
 $query=$this->db->get();
 $result=$query->result_array();
 
 foreach($result as $res)
 {
     $stud_name=strtoupper($res['name']);
     $fname=strtoupper($res['fran_name']);
     $marks=$res['Total_mark'];
     $p_marks=$res['Total_mark'];
     $from_dt=$res['course_date'];
     $to_dt=$res['exm_date'];
 }

$grade="";
if($p_marks >= 75)
{
    $grade="A";
}
else if($p_marks < 75)
{
    $grade="B";
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

$exa->Image ( "http://localhost/CCAM/Certi/smart_tally.jpg" , 0,0,475,600);

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
//$exa->Cell(0,0, $certi_id, 0, 0, 'L', 0, '', 0);



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

public function Tally_prof_certi($id)
{
 
 $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
 $this->db->from('exm_status');
 $this->db->join('admission','exm_status.siid=admission.id');
 $this->db->where(array('admission.stud_id'=>$id));
 $this->db->group_by('admission.id');
 $query=$this->db->get();
 $result=$query->result_array();

 foreach($result as $res)
 {
 	 $stud_name=strtoupper($res['name']);
 	 $fname=strtoupper($res['fran_name']);
 	 $marks=$res['Total_mark'];
 	 $p_marks=$res['Total_mark'];
 	 $from_dt=$res['course_date'];
 	 $to_dt=$res['exm_date'];
 }

 $grade="";
 if($marks >= 200)
 {
    $grade="A";
 }
 else if($marks < 200)
 {
    $grade="B";
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

$exa->Image ( "http://localhost/CCAM/Certi/tally_professional.jpg" , 0,0,475,600);

$exa->Ln ( 50 );
//$exa->Rotate(-20);
$exa->SetXY(50, 102);
$exa->Cell(0,0, $stud_name, 0, 0, 'L', 0, '', 0);

$exa->SetXY(30, 136);
$exa->Cell(0,0, $fname, 0, 0, 'L', 0, '', 0);

//$exa->setCellPaddings(1, 1, 1, 1);
$exa->SetXY(92, 154);
//$grade="A";
$exa->Cell(0,0, $grade, 0, 0, 'L', 0, '', 0);

$exa->SetXY(69, 172);
//$dur1="May2013";
$exa->Cell(0,0, $fdt, 0, 0, 'L', 0, '', 0);

$exa->SetXY(125, 172);
//$dur2="May2014";
$exa->Cell(0,0, $tdt, 0, 0, 'L', 0, '', 0);

$exa->SetXY(64, 190);
//$cno="C001";
$exa->Cell(0,0," " , 0, 0, 'L', 0, '', 0);



$exa->SetXY(35, 207);
$exa->Cell(0,0, $dt, 0, 0, 'L', 0, '', 0);
//$exa->WriteHTML ( $txt );

$exa->Output ($stud_name.'.pdf', 'D' );
 
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 
}




/*****************************Start************************************************/

public function Smart_Tally_certi1($id)
{
$this->db->select('exm_status.id,exm_status.module,exm_status.fid,exm_status.status,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,exm_status.marks,exm_status.p_mark');
 $this->db->from('exm_status');
 $this->db->join('admission','exm_status.siid=admission.id');
 $this->db->where('exm_status.id',$id);
 $query=$this->db->get();
 $result=$query->result_array();

 foreach($result as $res)
 {
     $stud_name=strtoupper($res['name']);
     $fname=strtoupper($res['fran_name']);
     $marks=$res['marks'];
     $p_marks=$res['p_mark'];
     $from_dt=$res['course_date'];
     $to_dt=$res['exm_date'];
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
/*
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
*/
$dt=date("d/m/Y");
$exa = new TCPDF();
$exa->setCreator ( PDF_CREATOR );
$exa->setAuthor ('CCA' );
$exa->setTitle ('CCA Certificate' );
$exa->setSubject ('Certificate' );
$exa->setKeywords ('TCPDF, pdf, PHP' );
$font_size = $exa->pixelsToUnits('40');
$exa->setFont ('times', '', 12);
$exa->addPage ();
$txt = <<<HDOC



HDOC;
$exa->Write (0, $txt );

$exa->Ln ();

//$exa->setImageScale ( PDF_IMAGE_SCALE_RATIO );

$exa->Ln ( 50 );
//$exa->Rotate(-20);
$exa->SetXY(10, 130);
$exa->Rotate(90);
$exa->Cell(10,10, 'mukesh kumar dubey', 0, 0, 'L');
$exa->SetXY(10, 140);
$exa->Cell(0,0, 'COLLEGE OF COMPUTER ACCOUNTANTS', 0, 0, 'L');
//$exa->setCellPaddings(1, 1, 1, 1);
$exa->SetXY(10, 154);
//$grade="A";
$exa->Cell(0,0, 'A', 0, 0, 'L', 0, '', 0);

$exa->SetXY(10, 169);
//$dur1="May2013";
$exa->Cell(0,0, '10-10-2014', 0, 0, 'L', 0, '', 0);

$exa->SetXY(10, 179);
//$dur2="May2014";
$exa->Cell(0,0, '10-10-2015', 0, 0, 'L', 0, '', 0);
$exa->SetXY(10, 187);
//$cno="C001";
$exa->Cell(0,0, 'CABG110F', 0, 0, 'L', 0, '', 0);




$exa->Output ($stud_name.'.pdf', 'D' );
 
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 
}


/***********************************End***********************************************/

}