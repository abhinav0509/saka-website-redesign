<?php
class Admin_Enquiry_Excel extends CI_Model{
function __construct() {
parent::__construct();
$this->load->library("Pdf");
}

public function get_enq_Excel1($session,$sid)
{
	$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where id in ('".$srr."') ";
	}
	else{
		$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where f_id='".$session->cus_id."' ";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Enquiry_Excell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function get_enq_Excel2($from_dt,$to_dt,$session,$sid)
{
	$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where id in ('".$srr."') ";
	}
	else{
	$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where enq_date>='".$from_dt."' AND enq_date<='".$to_dt."' AND f_id='".$session->cus_id."' ";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Enquiry_Excell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function get_enq_Excel3($course,$session,$sid)
{
	$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where id in ('".$srr."') ";
	}
	else{
     $query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where course='".$course."' AND f_id='".$session->cus_id."' ";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Enquiry_Excell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function get_enq_Excel4($from_dt,$to_dt,$course,$session,$sid)
{
	$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where id in ('".$srr."') ";
	}
	else{
	$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where enq_date>='".$from_dt."' And enq_date<='".$to_dt."' AND course='".$course."' AND f_id='".$session->cus_id."' ";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Enquiry_Excell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function get_enq_Excel5($stud,$session,$sid)
{
	$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where id in ('".$srr."') ";
	}
	else{
	$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email,con_name as Counselor_Name,con_contact as Counselor_Contact,sfees as Suggested_Fees
	    from enquiry where stud_name='".$stud."' AND f_id='".$session->cus_id."' ";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Enquiry_Excell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function get_enq_pdf($from_dt,$to_dt,$course,$stud,$session,$sid)
{
	$srr=array();
	$srr=explode(",",$sid);
	  //echo  $from_dt;	
      $dt=date("Y-m-d");
      $array=array();

	  if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud=="" && $sid=="")
   	  {
          $array=array('enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'f_id'=>$session->cus_id);
		  $this->db->where($array);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud=="" && $sid=="")
   	  {
         $array=array('enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'f_id'=>$session->cus_id);
		 $this->db->where($array);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud=="" && $sid=="")
   	  {
         $array=array('enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'f_id'=>$session->cus_id);
$this->db->where($array);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();		 
   	  }

      else if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud=="" && $sid=="")
   	  {
           $array=array('enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$course,'f_id'=>$session->cus_id);
		   $this->db->where($array);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud=="" && $sid=="")
   	  {
		  $array=array('enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$course,'f_id'=>$session->cus_id);
$this->db->where($array);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();		  
   	  }
   	  else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud=="" && $sid=="")
   	  {
         $array=array('enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$course,'f_id'=>$session->cus_id);  
		$this->db->where($array);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();		 
   	  }

   	   else if($from_dt==$dt && $to_dt==$dt && ($course!="" || $course=="")  && $stud!="" && $sid=="")
   	  {
          $array=array('enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'stud_name'=>$stud,'f_id'=>$session->cus_id);
		  $this->db->where($array);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="" && $sid=="")
   	  {
         $array=array('enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'stud_name'=>$stud,'f_id'=>$session->cus_id);  
			$this->db->where($array);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt!=$dt && ($course!="" || $course=="") && $stud!="" && $sid=="")
   	  {
         $array=array('enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'stud_name'=>$stud,'f_id'=>$session->cus_id);  
			$this->db->where($array);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
	  else if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud=="" && $sid!="")
   	  {
		  $this->db->where_in('id',$srr);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud=="" && $sid!="")
   	  {
         $this->db->where_in('id',$srr);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud=="" && $sid!="")
   	  {
         $this->db->where_in('id',$srr);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }

      else if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud=="" && $sid!="")
   	  {
           $this->db->where_in('id',$srr);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud=="" && $sid!="")
   	  {
		  $this->db->where_in('id',$srr);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud=="" && $sid!="")
   	  {
         $this->db->where_in('id',$srr);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }

   	   else if($from_dt==$dt && $to_dt==$dt && ($course!="" || $course=="")  && $stud!="" && $sid!="")
   	  {
          $this->db->where_in('id',$srr);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="" && $sid!="")
   	  {
         $this->db->where_in('id',$srr);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }
   	  else if($from_dt!=$dt && $to_dt!=$dt && ($course!="" || $course=="") && $stud!="" && $sid!="")
   	  {
         $this->db->where_in('id',$srr);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
   	  }

     
		 
       
		$this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);
       
             

		$pdf->AddPage();
		$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
		$pdf->SetFont('Arial','B',14);
		$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
		Website: <u>www.ccaindia.in</u></para>');
		if(count($result['data'])>0)
		{
		 foreach($result['data'] as $d)
        { 
		
		$pdf->SetFont('Arial','B',10); 
		$htmlTable='<TABLE style="height:600px;">
		<TR>
		<TD height="50px;">Franchise Id:</TD>
		<TD>'.$d['f_id'].'</TD>
		</TR>
		<TR>
		<TD>Franchisee Name:</TD>
		<TD>'.$d['Franchisee_Name'].'</TD>
		</TR>
		<TR>
		<TD>Student Name:</TD>
		<TD>'.$d['stud_name'].'</TD>
		</TR>
		<TR>
		<TD>Enquiry Date:</TD>
		<TD>'.$d['enq_date'].'</TD>
		</TR>
		<TR>
		<TD>Interested Course:</TD>
		<TD>'.$d['course'].'</TD>
		</TR>
		<TR>
		<TD>Student Contact:</TD>
		<TD>'.$d['contact'].'</TD>
		</TR>
		<TR>
		<TD>Student Email:</TD>
		<TD>'.$d['email'].'</TD>
		</TR>
		<TR>
		<TD>Counselor Name:</TD>
		<TD>'.$d['con_name'].'</TD>
		</TR>
		<TR>
		<TD>Counselor Contact:</TD>
		<TD>'.$d['con_contact'].'</TD>
		</TR>
		<TR>
		<TD>Suggested Fees:</TD>
		<TD>'.$d['sfees'].'</TD>
		</TR>
		</TABLE>';
		$pdf->WriteHTML2("<br><br><br>$htmlTable");
		
        }
		}
		else
		{
			$htmlTable="No Data Available";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output("Enquiry_Details.pdf",'D');


}

/******************************************Franch Admission Start******************************/

public function getfranadmissionexcel1($from_dt,$to_dt,$session,$sid)
{
	$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
	}
	else{
	$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where course_date>='".$from_dt."' AND course_date<='".$to_dt."' AND f_id='".$session->cus_id."'";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Admission_Details.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";

   
}
public function getfranadmissionexcel2($from_dt,$to_dt,$session,$sid)
{
	$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
	}
	else{
	$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where course_date>='".$from_dt."' AND course_date<='".$to_dt."' AND f_id='".$session->cus_id."'";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Admission_Details.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function getfranadmissionexcel3($from_dt,$to_dt,$course,$session,$sid)
{
	$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
	}
	else{
	$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where course_date>='".$from_dt."' AND course_date<='".$to_dt."' AND course_Name='".$course."' AND f_id='".$session->cus_id."'";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Admission_Details.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function getfranadmissionexcel4($from_dt,$to_dt,$course,$session,$sid)
{
	$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
	}
	else{
	$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where course_date>='".$from_dt."' AND course_date<='".$to_dt."' AND course_Name='".$course."' AND f_id='".$session->cus_id."'";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Admission_Details.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function getfranadmissionexcel5($stud,$session,$sid)
{$srr=array();
	$srr=str_replace(",","','",$sid);
	if($sid!="")
	{
		$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
	}
	else{
	$query = "SELECT fran_Name as Franchise_Name,stud_id as Student_Id,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Batch_Time,email as Student_Email,contact as Student_Contact
	    from admission where name='".$stud."' AND f_id='".$session->cus_id."'";
	}
		$header = '';
		$data ='';
 
		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
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
		
		$filename="Admission_Details.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function get_admission_pdf($from_dt,$to_dt,$course,$stud,$session,$sid)
{
	$srr=array();
	$srr=explode(",",$sid);
     $dt=date('Y-m-d');
     $array=array(); 
	 if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud=="" && $sid=="")
      {
		  $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'f_id'=>$session->cus_id);
		  $this->db->where($array);
		  $query=$this->db->get('admission');
		  $result['data']=$query->result_array();
      } 
      else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud=="" && $sid=="")
      {
          $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'f_id'=>$session->cus_id);
		  $this->db->where($array);
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud=="" && $sid=="")
      {
          $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'f_id'=>$session->cus_id);  
		  $this->db->where($array);
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
      else if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud=="" && $sid=="")
      {
          $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$course,'f_id'=>$session->cus_id);
		  $this->db->where($array);
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      } 
      else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud=="" && $sid=="")
      {
          $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$course,'f_id'=>$session->cus_id);
		  $this->db->where($array);
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud=="" && $sid=="")
      {
          $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$course,'f_id'=>$session->cus_id);
		  $this->db->where($array);
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }

      if($from_dt==$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="" && $sid=="")
      {
          $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'name'=>$stud,'f_id'=>$session->cus_id);
		  $this->db->where($array);
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      } 
      else if($from_dt!=$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="" && $sid=="")
      {
          $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'name'=>$stud,'f_id'=>$session->cus_id);
		  $this->db->where($array);
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
      else if($from_dt!=$dt && $to_dt!=$dt && ($course!="" || $course=="") && $stud!="" && $sid=="")
      {
          $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'name'=>$stud,'f_id'=>$session->cus_id);  
		  $this->db->where($array);
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
	  else if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud=="" && $sid!="")
      {
		  $this->db->where_in('id',$srr);  
		  $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      } 
      else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud=="" && $sid!="")
      {
          $this->db->where_in('id',$srr);  
		  $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud=="" && $sid!="")
      {
         $this->db->where_in('id',$srr);  
		  $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
      else if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud=="" && $sid!="")
      {
          $this->db->where_in('id',$srr);  
		  $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      } 
      else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud=="" && $sid!="")
      {
          $this->db->where_in('id',$srr);  
		  $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud=="" && $sid!="")
      {
          $this->db->where_in('id',$srr);  
		  $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }

      if($from_dt==$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="" && $sid!="")
      {
         $this->db->where_in('id',$srr);  
		  $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      } 
      else if($from_dt!=$dt && $to_dt==$dt && ($course!="" || $course=="") && $stud!="" && $sid!="")
      {
         $this->db->where_in('id',$srr);  
		  $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
      else if($from_dt!=$dt && $to_dt!=$dt && ($course!="" || $course=="") && $stud!="" && $sid!="")
      {
          $this->db->where_in('id',$srr);  
		  $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
      }
    
         $this->load->view('WriteHTML');
		 $logo=base_url()."Style/images/logo.jpg";
         $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);
        if(count($result['data'])>0)
	    {
        foreach($result['data'] as $d)
        {       
        
        $nm=$d['name'];
        $img="http://ccaindia.in/uploads/Admission/".$d['image'];
		$img1="<img src=".$img." style=\"height:100px;width:100px;\" />";
		$pdf->AddPage();
		$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
		$pdf->SetFont('Arial','B',12);
		$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
		Website: <u>www.ccaindia.in</u><br><br><br><br><br><br>'.$d['fran_Name'].'</para>');

		$pdf->SetFont('Arial','B',8); 
		
		
		$htmlTable='<TABLE>
		<TD>Stud Id:</TD>
		<TD>'.$d['stud_id'].'</TD>
		</TR>
		<TR>
		<TD>Student Name:</TD>
		<TD>'.$d['name'].'</TD>
		</TR>
		<TR>
		<TD>Course Name:</TD>
		<TD>'.$d['course_Name'].'</TD>
		</TR>
		<TR>
		<TD>Admission Date:</TD>
		<TD>'.$d['course_date'].'</TD>
		</TR>
		<TR>
		<TD>Batch Time:</TD>
		<TD>'.$d['timing'].'</TD>
		</TR>
		<TR>
		<TD>Student Qualification:</TD>
		<TD>'.$d['qualification'].'</TD>
		</TR>
		<TR>
		<TD>Student Contact:</TD>
		<TD>'.$d['contact'].'</TD>
		</TR>
		<TR>
		<TD>Student Email:</TD>
		<TD>'.$d['email'].'</TD>
		</TR>
		<TR>
		<TR>
		<TD>Student Address:</TD>
		<TD>'.$d['add'].'</TD>
		</TR>
		<TR>
		<TD>Admin Remark:</TD>
		<TD>'.$d['remark'].'</TD>
		</TR>
				
		</TABLE>';
		 $pdf->WriteHTML2("<br>$htmlTable"); 
        }
	   }
	   else
	   {
		   $pdf->AddPage();
		   $pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
		   $pdf->SetFont('Arial','B',12);
		   $pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
		   Website: <u>www.ccaindia.in</u></para>');
		   $htmlTable = "<b>No Data Available</b>";
		   $pdf->WriteHTML2("<br><br><br><br>$htmlTable");  
	   }
        //print_r($htmlTable);
       
		$pdf->Output("Admission_Details.pdf",'D');
}

/*****************************************End************************************************/


}