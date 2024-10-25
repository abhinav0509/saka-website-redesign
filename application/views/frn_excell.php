<?php
class Frn_Excell extends CI_Model{
function __construct() {
parent::__construct();
$this->load->library("Pdf");
}
     public function get_datewise_Excell($fromdt,$todt,$session)
     {
        $query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where enq_date >='$fromdt' AND enq_date<='$todt' AND f_id='".$session->cus_id."' ";
 	    
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
		
		$filename="DatewiseExcell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
     }

     public function get_datewise_Excell1($session)
     {
        $query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where fid='".$session->cus_id."' ";
 	    
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
		
		$filename="EnquiryExcell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
     }

      public function get_datewise_Excell3($from_dt,$to_dt,$session)
     {
        $query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where enq_date>='".$from_dt."' And enq_date<='".$to_dt."' And fid='".$session->cus_id."' ";
 	    
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
		
		$filename="EnquiryExcell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
     }

      public function get_datewise_Excell4($from_dt,$to_dt,$course,$session)
     {
        $query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where enq_date>='".$from_dt."' And enq_date<='".$to_dt."' And course='".$course."'  And fid='".$session->cus_id."' ";
 	    
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
		
		$filename="EnquiryExcell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
     }


     public function get_datewise_Excell5($course,$session)
     {
        $query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where course='".$course."'  And fid='".$session->cus_id."' ";
 	    
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
		
		$filename="EnquiryExcell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
     }

    public function get_today_datewise_Excell($fromdt,$session)
    {
    	$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where enq_date='$fromdt' AND f_id='".$session->cus_id."' ";
 	    
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
		
		$filename="TodaysEnquiryExcell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
    }

    public function get_today_datewise_Excell1($session)
    {
    	$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where  fid='".$session->cus_id."' ";
 	    
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
		
		$filename="EnquiryExcell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
    }

    public function get_today_datewise_Excell2($session)
    {
    	$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where  fid='".$session->cus_id."' ";
 	    
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
		
		$filename="EnquiryExcell.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
    }

    public function get_all_frn_excel($session)
    {
    	$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where f_id='".$session->cus_id."' ";
 	    
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
		
		$filename="AllEnquiry.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
    }

    public function get_demo_enquiry_pdf($from_dt,$to_dt,$course,$stud,$session)
    {
    	 
         $dt=date('Y-m-d'); 
         $array=array();
         if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud=="")
         {
         	         $this->db->where(array('fid'=>$session->cus_id));
					 $query=$this->db->get('demoenquiry');
					 $result['data']=$query->result_array();
			       
					$this->load->view('WriteHTML');
					$logo=base_url()."Style/images/logo.jpg";
			        $pdf=new PDF_HTML();

					$pdf->AliasNbPages();
					$pdf->SetAutoPageBreak(true, 15);
			       
			        foreach($result['data'] as $d)
			        {       

					$pdf->AddPage();
					$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
					$pdf->SetFont('Arial','B',14);
					$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
					Website: <u>www.ccaindia.in</u></para>');

					$pdf->SetFont('Arial','B',10); 
					$htmlTable='<TABLE>
					<TR>
					<TD>Franchise Id:</TD>
					<TD>'.$d['fid'].'</TD>
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
					</TABLE>';
					$pdf->WriteHTML2("<br><br><br>$htmlTable");
			        }

					$pdf->Output("Enquiry_details.pdf",'D');
         }
         else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud=="")
         {
             $array=array('enq_date>='=>$from_dt,'enq_date<='=>$to_dt,'fid'=>$session->cus_id);
         }
         else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud=="")
         {
             $array=array('enq_date>='=>$from_dt,'enq_date<='=>$to_dt,'fid'=>$session->cus_id);
         }
         else if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud=="")
         {
             $array=array('course'=>$course,'fid'=>$session->cus_id);
         }
         else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud=="")
         {
             $array=array('enq_date>='=>$from_dt,'enq_date<='=>$to_dt,'course'=>$course,'fid'=>$session->cus_id);
         }
         else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud=="")
         {
             $array=array('enq_date>='=>$from_dt,'enq_date<='=>$to_dt,'course'=>$course,'fid'=>$session->cus_id);
         }
         
         else if($from_dt==$dt && $to_dt==$dt && $course!="" && $stud!="")
         {
             $array=array('stud_name'=>$stud,'fid'=>$session->cus_id);
         }
         else if($from_dt!=$dt && $to_dt==$dt && $course!="" && $stud!="")
         {
             $array=array('stud_name'=>$stud,'fid'=>$session->cus_id);
         }
         else if($from_dt!=$dt && $to_dt!=$dt && $course!="" && $stud!="")
         {
             $array=array('stud_name'=>$stud,'fid'=>$session->cus_id);
         }

         else if($from_dt==$dt && $to_dt==$dt && $course=="" && $stud!="")
         {
             $array=array('stud_name'=>$stud,'fid'=>$session->cus_id);
         }
         else if($from_dt!=$dt && $to_dt==$dt && $course=="" && $stud!="")
         {
             $array=array('stud_name'=>$stud,'fid'=>$session->cus_id);
         }
         else if($from_dt!=$dt && $to_dt!=$dt && $course=="" && $stud!="")
         {
             $array=array('stud_name'=>$stud,'fid'=>$session->cus_id);
         }


    	 $this->db->where($array);
		 $query=$this->db->get('demoenquiry');
		 $result['data']=$query->result_array();
       
		$this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);
       
        foreach($result['data'] as $d)
        {       

		$pdf->AddPage();
		$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
		$pdf->SetFont('Arial','B',14);
		$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
		Website: <u>www.ccaindia.in</u></para>');

		$pdf->SetFont('Arial','B',10); 
		$htmlTable='<TABLE>
		<TR>
		<TD>Franchise Id:</TD>
		<TD>'.$d['fid'].'</TD>
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
		</TABLE>';
		$pdf->WriteHTML2("<br><br><br>$htmlTable");
        }

		$pdf->Output("Datewise.pdf",'D');
    }


    public function get_demo_admission_pdf($from_dt,$to_dt,$course,$session)
    {
    	 $dt=date('Y-m-d');
    	 $array=array();
    	 
    	 if($from_dt==$dt && $to_dt==$dt && $course=="")
    	 {
    	 		 $this->db->where(array('fid'=>$session->cus_id));
				 $query=$this->db->get('demoadmission');
				 $result['data']=$query->result_array();
		       
				$this->load->view('WriteHTML');
				$logo=base_url()."Style/images/logo.jpg";
		        $pdf=new PDF_HTML();

				$pdf->AliasNbPages();
				$pdf->SetAutoPageBreak(true, 15);
		       
		        foreach($result['data'] as $d)
		        {       

				$pdf->AddPage();
				$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
				$pdf->SetFont('Arial','B',14);
				$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
				Website: <u>www.ccaindia.in</u></para>');

				$pdf->SetFont('Arial','B',10); 
				$htmlTable='<TABLE>
				<TR>
				<TD>Franchise Id:</TD>
				<TD>'.$d['fid'].'</TD>
				</TR>
				<TR>
				<TD>Franchisee Name:</TD>
				<TD>'.$d['fran_Name'].'</TD>
				</TR>
				<TR>
				<TD>Student Name:</TD>
				<TD>'.$d['name'].'</TD>
				</TR>
				<TR>
				<TD>Admission Date:</TD>
				<TD>'.$d['course_date'].'</TD>
				</TR>
				<TR>
				<TD>Course:</TD>
				<TD>'.$d['course_Name'].'</TD>
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
				<TD>Address:</TD>
				<TD>'.$d['add'].'</TD>
				</TR>
				</TABLE>';
				$pdf->WriteHTML2("<br><br><br>$htmlTable");
				
           }
           		$pdf->Output("Datewise.pdf",'D');
       }

	
    	 else if($from_dt!=$dt && $to_dt==$dt && $course=="")
    	 {
    	     $array=array('course_date>='=>$from_dt,'course_date<='=>$to_dt,'fid'=>$session->cus_id);	
    	 }
    	 else if($from_dt!=$dt && $to_dt!=$dt && $course=="")
    	 {
    	     $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fid'=>$session->cus_id);	
    	    
    	 }
    	 else if($from_dt==$dt && $to_dt==$dt && $course!="")
    	 {
    	 	 $array=array('course_Name'=>$course,'fid'=>$session->cus_id);
    	 }
    	 else if($from_dt!=$dt && $to_dt==$dt && $course!="")
    	 {
    	 	 $array=array('course_date>='=>$from_dt,'course_date<='=>$to_dt,'course_Name'=>$course,'fid'=>$session->cus_id);
    	 }
    	 else if($from_dt!=$dt && $to_dt!=$dt && $course!="")
    	 {
    	 	 $array=array('course_date>='=>$from_dt,'course_date<='=>$to_dt,'course_Name'=>$course,'fid'=>$session->cus_id);
    	 }


		         $this->db->where($array);
				 $query=$this->db->get('demoadmission');
				 $result['data']=$query->result_array();
		       
				$this->load->view('WriteHTML');
				$logo=base_url()."Style/images/logo.jpg";
		        $pdf=new PDF_HTML();

				$pdf->AliasNbPages();
				$pdf->SetAutoPageBreak(true, 15);
		       
		        foreach($result['data'] as $d)
		        {       

				$pdf->AddPage();
				$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
				$pdf->SetFont('Arial','B',14);
				$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
				Website: <u>www.ccaindia.in</u></para>');

				$pdf->SetFont('Arial','B',10); 
				$htmlTable='<TABLE>
				<TR>
				<TD>Franchise Id:</TD>
				<TD>'.$d['fid'].'</TD>
				</TR>
				<TR>
				<TD>Franchisee Name:</TD>
				<TD>'.$d['fran_Name'].'</TD>
				</TR>
				<TR>
				<TD>Student Name:</TD>
				<TD>'.$d['name'].'</TD>
				</TR>
				<TR>
				<TD>Admission Date:</TD>
				<TD>'.$d['course_date'].'</TD>
				</TR>
				<TR>
				<TD>Course:</TD>
				<TD>'.$d['course_Name'].'</TD>
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
				<TD>Address:</TD>
				<TD>'.$d['add'].'</TD>
				</TR>
				</TABLE>';
				$pdf->WriteHTML2("<br><br><br>$htmlTable");
				
             }
           		$pdf->Output("Datewise.pdf",'D');
    }



    public function get_datewise_pdf($fromdt,$todt,$session)
    {
    	 $this->db->where('enq_date >=', $fromdt);
		 $this->db->where('enq_date <=', $todt);
		 $this->db->where(array('f_id'=>$session->cus_id));
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
       
		$this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);
       
        foreach($result['data'] as $d)
        {       

		$pdf->AddPage();
		$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
		$pdf->SetFont('Arial','B',14);
		$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
		Website: <u>www.ccaindia.in</u></para>');

		$pdf->SetFont('Arial','B',10); 
		$htmlTable='<TABLE>
		<TR>
		<TD>Franchise Id:</TD>
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
		</TABLE>';
		$pdf->WriteHTML2("<br><br><br>$htmlTable");
		
        }

		$pdf->Output("Datewise.pdf",'D');
    }

   public function get_today_datewise_pdf($fromdt,$session)
   {
   		 $this->db->where('enq_date >=', $fromdt);
		 $this->db->where(array('f_id'=>$session->cus_id));
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
       
		$this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);
       
        foreach($result['data'] as $d)
        {       

			$pdf->AddPage();
			$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
			$pdf->SetFont('Arial','B',14);
			$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
			Website: <u>www.ccaindia.in</u></para>');

			$pdf->SetFont('Arial','B',10); 
			$htmlTable='<TABLE>
			<TR>
			<TD>Franchise Id:</TD>
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
			</TABLE>';
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
        }

		$pdf->Output("TodaysEnquiry.pdf",'D');
   }
   
   public function get_all_frn_pdf($session)
   {

		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
       
		$this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);
       
        foreach($result['data'] as $d)
        {       

		$pdf->AddPage();
		$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
		$pdf->SetFont('Arial','B',14);
		$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
		Website: <u>www.ccaindia.in</u></para>');

		$pdf->SetFont('Arial','B',10); 
		$htmlTable='<TABLE>
		<TR>
		<TD>Franchise Id:</TD>
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
		</TABLE>';
		$pdf->WriteHTML2("<br><br><br>$htmlTable");
        }

		$pdf->Output("AllEnquiries.pdf",'D');
   }

   /**************************   Admission Pdf  **************************************/

   public function getaddsinglepdf($id)
   {

		 $this->db->where(array('id'=>$id));
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
           
         $this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);
       
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
		
        }
        //print_r($htmlTable);
        $pdf->WriteHTML2("<br>$htmlTable");
		$pdf->Output($nm.".pdf",'D');

   }

   public function getaddsinglepdf1($id)
   {

		 $this->db->where(array('id'=>$id));
		 $query=$this->db->get('demoadmission');
		 $result['data']=$query->result_array();
           
         $this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);

        foreach($result['data'] as $d)
        {       

		$pdf->AddPage();
		$pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
		$pdf->SetFont('Arial','B',14);
		$pdf->WriteHTML('<para><h1>College Of Computer Accounts</h1><br>
		Website: <u>www.ccaindia.in</u></para>');

		$pdf->SetFont('Arial','B',10); 
		$img='http://ccaindia.in/uploads/Admission/'.$d['image'];
		$img1="<img src='".$img."' style='height:100px;width:100px;' />";
		
		$htmlTable='<TABLE>
		<TD>Stud Id:</TD>
		<TD>'.$d['id'].'</TD>
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
		<TD>Admin Remark:</TD>
		<TD>'.$d['remark'].'</TD>
		</TR>
		
		</TABLE>';
		$pdf->WriteHTML2("<br><br><br>$htmlTable");
        }

		$pdf->Output("AllEnquiries.pdf",'D');

   }

   public function getaddsingleexcel($id,$name)
   {
   		$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id='".$id."'";
 	    
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
		
		$filename=$name.".xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";

   }

    public function getaddsingleexcel1($id,$name)
   {
   		$query = "SELECT fid as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from demoadmission where id='".$id."'";
 	    
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
		
		$filename=$name.".xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";

   }
  
  
  
    
public function get_all_course_date_excel($from_date,$to_date,$course,$session)
{
	$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where f_id='".$session->cus_id."' And course_date >='".$from_date."' And course_date <='".$to_date."' And course_Name='".$course."'  ";
 	    
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
		
		$filename="Date&CourseWiseDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}



public function get_date_course_date_excel($from_date,$course,$session)
{
	$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where f_id='".$session->cus_id."' And course_date >='".$from_date."' And course_Name='".$course."'  ";
 	    
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
		
		$filename="Date&CourseWiseDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}



public function get_course_wise_excel($course,$session)
{
    $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where f_id='".$session->cus_id."' And course_Name='".$course."'  ";
 	    
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
		
		$filename="CourseWiseDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";

}



public function get_date_wise_excel($from_date,$session)
{
     $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where f_id='".$session->cus_id."' And course_date='".$from_date."'  ";
 	    
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
		
		$filename="DateWiseDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";

}



public function get_all_excel($session)
{
	$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from demoadmission where f_id='".$session->cus_id."'";
 	    
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
		
		$filename="AllAdmissionDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";

}



/*****************************   Admin Admission  **************************************/


public function get_admin_all_cat($cname,$from_dt,$to_dt,$sname,$sid)
{
	$srr=array();
	$srr=explode(",",$sid);
	
	    $dt = date('Y-m-d');
		if($sid!=""){
			$this->db->where_in('id',$srr);
		}
		else{
	     $this->db->where(array('course_date >='=>$from_dt));
	     $this->db->where(array('course_date <='=>$to_dt));
	     $this->db->where(array('course_Name'=>$cname,'fran_Name'=>$sname));
		}
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
		  if(count($result['data'])>0)
		  {
		  foreach($result['data'] as $d)
             {  
		     
		   
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
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
		
  		   }
		  }
		  else{
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;"> 
					<span>No Data Available...</span>
EOD;
				
				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
			}
		  $filename="AllDetails.pdf"; 
    $pdf->Output($filename, 'D');
}
 

public function get_admin_fromdt_cat($cname,$from_dt,$to_dt,$sname,$sid)
{
		$srr=array();
		$srr=explode(",",$sid);
		if($sid!="")
		{
			$this->db-where_in('id',$srr);
		}
		else
		{
		 $this->db->where(array('course_date'=>$from_dt));
		}
	     $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
			if(count($result['data'])>0)
			{
		  foreach($result['data'] as $d)
             {  
		     
		   
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
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
		
  		   }
			}
			else
			{
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;"> 
					<span>No Data Available...</span>
EOD;
				
				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
			}
		  $filename="AllDetails.pdf"; 
    $pdf->Output($filename, 'D');
}

public function get_admin_fromtodt_cat($cname,$from_dt,$to_dt,$sname,$sid)
{
		$srr = array();
		$srr = explode(",",$sid);
		if($sid!="")
		{
			$this->db->where_in('id',$srr);
		}
		else
		{
		$this->db->where(array('course_date >='=>$from_dt));	
	    $this->db->where(array('course_date <='=>$to_dt));
		}
	     $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
		  if(count($result['data'])>0)	
		  {		
		  foreach($result['data'] as $d)
             { 
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
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
		
  		   }
		  }
		  else
		  {
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;"> 
					<span>No Data Available...</span>
EOD;
				
				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
			}
		  $filename="AllDetails.pdf"; 
    $pdf->Output($filename, 'D');
}

public function get_admin_datefran_cat($cname,$from_dt,$to_dt,$sname,$sid)
{
		 $srr = array();
		 $srr = explode(",", $sid);
	     $dt = date('Y-m-d');
		 if($sid!="")
		 {
			 $this->db->where_in('id',$srr); 
		 }
		 else
		 {
		 $this->db->where(array('course_date >='=>$from_dt));	
	     $this->db->where(array('course_date <='=>$to_dt));
	     $this->db->where(array('fran_Name'=>$sname));
		 }
	     $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
			if(count($result['data'])>0)
			{
		  foreach($result['data'] as $d)
             {  
		     
		   
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
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
		
  		   }
			}
			else
			{
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;"> 
					<span>No Data Available...</span>
EOD;
				
				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
			}
		  $filename="AllDetails.pdf"; 
    $pdf->Output($filename, 'D');
}

public function get_admin_datecourse_cat($cname,$from_dt,$to_dt,$sname,$sid)
{
		$srr = array();
		$srr = explode(",",$sid);
	    $dt = date('Y-m-d');
		if($sid!="")
		{
			 $this->db->where_in('id',$srr);
		}
		else{
		$this->db->where(array('course_date >='=>$from_dt));	
	    $this->db->where(array('course_date <='=>$to_dt));
	     $this->db->where(array('course_Name'=>$cname));
		}
	     $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
			if(count($result['data'])>0)
			{			
		    foreach($result['data'] as $d)
             {  
		     
		   
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
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
		
  		   }
			}
			else
			{
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;"> 
					<span>No Data Available...</span>
EOD;
				
				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
			}
		  $filename="AllDetails.pdf"; 
    $pdf->Output($filename, 'D');
}

  public function get_admin_coursefran_cat($cname,$from_dt,$to_dt,$sname,$sid)
  {
		$srr = array();
		$srr = explode(",",$sid);
		if($sid!="")
		{
			$this->db->where_in('id',$srr);
		}
		else{
  		//$this->db->where(array('course_date >='=>$from_dt));	
	     //$this->db->where(array('course_date <='=>$to_dt));
	     $this->db->where(array('course_Name'=>$cname,'fran_Name'=>$sname));
		}
	     $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
if(count($result['data'])>0){			
		  foreach($result['data'] as $d)
             {  
		     
		   
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
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
		
  		   }
		}
		else
		{
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;"> 
					<span>No Data Available...</span>
EOD;
				
				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
			}
		  $filename="AllDetails.pdf"; 
    $pdf->Output($filename, 'D');
  }
 
  
  public function get_admin_coursee_cat($cname,$from_dt,$to_dt,$sname,$sid)
  {
		$srr = array();
		$srr = explode(",",$sid);
		if($sid!="")
		{
			$this->db->where_in('id',$srr);
		}
		else
		{
  	   //$this->db->where(array('course_date >='=>$from_dt));	
	     //$this->db->where(array('course_date <='=>$to_dt));
	     $this->db->where(array('course_Name'=>$cname));
		}
	     $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
			if(count($result['data'])>0)
			{
		  foreach($result['data'] as $d)
             {  
		     
		   
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
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
		
  		   }
			}
			else
			{
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;"> 
					<span>No Data Available...</span>
EOD;
				
				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
			}
		  $filename="AllDetails.pdf"; 
    $pdf->Output($filename, 'D');
  } 

  public function get_admin_frann_cat($cname,$from_dt,$to_dt,$sname,$sid)
  {
	  $srr=array();
	  $srr = explode(",",$sid);
	  if($sid!="")
	  {
		  $this->db->where_in('id',$srr);
	  }
	  else
	  {
  	  //$this->db->where(array('course_date >='=>$from_dt));	
	     //$this->db->where(array('course_date <='=>$to_dt));
	     $this->db->where(array('fran_Name'=>$sname));
	  }
	     $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
if(count($result['data'])>0)
{	
		  foreach($result['data'] as $d)
             {  
		     
		   
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
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
		
  		   }
		}
		else
		{
			
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;"> 
					<span>No Data Available...</span>
EOD;
				
				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
			}
		  $filename="AllDetails.pdf"; 
    $pdf->Output($filename, 'D');
  }
  
  public function get_admin_alll_cat($cname,$from_dt,$to_dt,$sname,$sid)
  {
		$srr=array();
		$srr = explode(",",$sid);
		if($sid!="")
		{
			$this->db->where_in('id',$srr);
		}
		else
		{
		}
  	  //$this->db->where(array('course_date >='=>$from_dt));	
	     //$this->db->where(array('course_date <='=>$to_dt));
	    
	     $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
           if(count($result['data'])>0)
		   {			   
		  foreach($result['data'] as $d)
             {  
		     
		   
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
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
		
  		   }
		   }
		   else
		   {
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;"> 
					<span>No Data Available...</span>
EOD;
				
				$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
			}
		  $filename="AllDetails.pdf"; 
          $pdf->Output($filename, 'D');
    }


  public function get_admin_all_Excell($cname,$from_dt,$to_dt,$sname,$sid)
  {
	  $srr=array();
	  $srr=str_replace(",","','",$sid);
	  $dt = date('Y-m-d');
	  if($sid!=""){
		$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."')  ";
	  }
	  else{
  	    $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where course_date >='".$from_dt."' And course_date<='".$to_dt."' And course_Name='".$cname."' And fran_Name='".$sname."'  ";
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
		
		$filename="AllDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
  }

  public function get_admin_fromdt_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid)
  {
		$srr=array();
		$srr = str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
		}
		else{
  	   $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where course_date ='".$from_dt."' ";
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
		
		$filename="AllDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
  }

  public function get_admin_fromtodt_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid)
  {
		$srr = array();
		$srr = str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
		}
		else
		{
  			$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where course_date >='".$from_dt."' And course_date <='".$to_dt."' ";
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
		
		$filename="AllDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
  }
   
   public function get_admin_datefran_cat_excell($cname,$from_dt,$to_dt,$sname,$sid)
   {
	   $srr = array();
	   $srr = str_replace(",","','",$sid);
	   $dt = date('Y-m-d');
	   if($sid!="")
	   {
		   $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
	   }
	   else
	   {
   	     $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where course_date >='".$from_dt."' And course_date <='".$to_dt."' And fran_Name='".$sname."' ";
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
		
		$filename="AllDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
   }
    
   public function get_admin_datecourse_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid)
   {
		$srr = array();
		$srr = str_replace(",","','",$sid);
	   $dt = date('Y-m-d');
	   if($sid!="")
	   {
		$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
	   }
	   else{
   	    $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where course_date >='".$from_dt."' And course_date <='".$to_dt."' And course_Name='".$cname."' ";
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
		
		$filename="AllDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
   }
   
   public function get_admin_coursefran_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid)
   {
	    $srr=array();
		$srr=str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
		}
		else{
   	     $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where course_Name='".$cname."' And fran_Name='".$sname."' ";
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
		
		$filename="AllDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
   }
   
   public function get_admin_coursee_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid)
   {
	    $srr=array();
		$srr=str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
		}
		else{
   	     $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where course_Name='".$cname."' ";
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
		
		$filename="AllDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
   }

   public function get_admin_frann_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid)
   {
	   $srr=array();
	   $srr=str_replace(",","','",$sid);
	   if($sid!="")
	   {
		    $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."') ";
	   }
	   else{
   	    $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where fran_Name='".$sname."' ";
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
		
		$filename="AllDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
   }

   public function get_admin_alll_cat_Excell($cname,$from_dt,$to_dt,$sname,$sid)
   {
		$srr=array();
		$srr=str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission where id in ('".$srr."')";
		}
		else{
   	   $query = "SELECT f_id as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from admission ";
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
		
		$filename="AllDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
   }
   
   
public function get_all_course_date_excel1($from_date,$to_date,$course,$session)
{
	$query = "SELECT fid as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from demoadmission where fid='".$session->cus_id."' And course_date >='".$from_date."' And course_date <='".$to_date."' And course_Name='".$course."'  ";
 	    
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
		
		$filename="Date&CourseWiseDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}







public function get_date_course_date_excel1($session,$from_date,$to_date,$course)
{
	$query = "SELECT fid as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from demoadmission where fid='".$session->cus_id."' And course_date >='".$from_date."' And course_date <='".$to_date."'  And course_Name='".$course."'  ";
 	    
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
		
		$filename="Date&CourseWiseDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}




public function get_course_wise_excel1($course,$session)
{
    $query = "SELECT fid as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from demoadmission where fid='".$session->cus_id."' And course_Name='".$course."'  ";
 	    
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
		
		$filename="CourseWiseDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";

}


public function get_date_wise_excel1($session,$from_date,$to_date,$course)
{
     $query = "SELECT fid as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from demoadmission where fid='".$session->cus_id."' And course_date>='".$from_date."' And course_date<='".$to_date."'  ";
 	    
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
		
		$filename="DateWiseDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";

}

public function get_all_excel1($session,$from_dt,$to_dt,$course)
{
	$query = "SELECT fid as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from demoadmission where course_date>='".$from_dt."' And course_date<='".$to_dt."' And fid='".$session->cus_id."' ";
 	    
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
		
		$filename="AllAdmissionDetails.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";

}


public function get_all_excel2($session,$from_dt,$to_dt)
{
	$query = "SELECT fid as Franchisee_Id,fran_Name as Franchise_Name,name as Student_Name,course_Name as Course,course_date as Admission_Date,timing as Time,email as Student_Email,contact as Student_Contact
	    from demoadmission where course_date>='".$from_dt."' And course_date<='".$to_dt."' And fid='".$session->cus_id."' ";
 	    
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
		$filename="AllAdmissionDetails.xls";
        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

 public function get_all_course_date_pdf($from_date,$to_date,$course,$session)
  {
  		 $this->db->where(array('course_date >='=>$from_date));
  		 $this->db->where(array('course_date <='=>$to_date));
  		 $this->db->where(array('f_id'=>$session->cus_id,'course_Name'=>$course));
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
		  foreach($result['data'] as $d)
             {  
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
									</tr>
									
				                </thead>
				                <tbody>
				                 
				                    
				                </tbody>
				               

				            </table>	
							<div>
							
							</div>
					</div>
EOD;
          $filename="DateWise.pdf";
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
  		   }
		   
		   
    // Print text using writeHTMLCell()
      
    $pdf->Output($filename, 'D');
  }
 

 public function get_date_course_date_pdf($from_date,$course,$session)
   {
   		 $this->db->where(array('course_date'=>$from_date));
   		 $this->db->where(array('course_Name'=>$course));
   		 $this->db->where(array('f_id'=>$session->cus_id));
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
           
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
		  foreach($result['data'] as $d)
             {  
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
									</tr>
									
				                </thead>
				                <tbody>
				                 
				                    
				                </tbody>
				               

				            </table>	
							<div>
							
							</div>
					</div>
EOD;
          $filename="CourseWise.pdf";
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  		   }
		   
		   
    // Print text using writeHTMLCell()
    
    $pdf->Output($filename, 'D');
	
   }
  


 public function get_course_wise_pdf($course,$session)
  {
  			
   		 $this->db->where(array('course_Name'=>$course));
   		 $this->db->where(array('f_id'=>$session->cus_id));
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
           
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
		  foreach($result['data'] as $d)
             {  
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
									</tr>
									
				                </thead>
				                <tbody>
				                 
				                    
				                </tbody>
				               

				            </table>	
							<div>
							
							</div>
					</div>
EOD;
          $filename="CourseWise.pdf";
           $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  		   }
		   
		   
    // Print text using writeHTMLCell()
   
    $pdf->Output($filename, 'D');
  }
 

 public function get_date_wise_pdf($from_date,$session)
  { 
  		$this->db->where(array('course_date'=>$from_date));
   		 $this->db->where(array('f_id'=>$session->cus_id));
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
           
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
		  foreach($result['data'] as $d)
             {  
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
									</tr>
									
				                </thead>
				                <tbody>
				                 
				                    
				                </tbody>
				               

				            </table>	
							<div>
							
							</div>
					</div>
EOD;
          $filename="DateWise.pdf";
          $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  		   }
		   
		   
    // Print text using writeHTMLCell()
   
    $pdf->Output($filename, 'D');
  }
 

 public function get_all_pdf($session)
  {
  	     $this->db->where(array('f_id'=>$session->cus_id));
		 $query=$this->db->get('admission');
		 $result['data']=$query->result_array();
       
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
		  foreach($result['data'] as $d)
             {  
		     
		   
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
					<img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
					</div>
					<div style="border-top: 2px solid #F0AD55;">   
					
					<p>
					</p>
					
					 <table class="table">
				               <thead >
				                    
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;" width:10%>Franchisee Id:</th>
										<td>$d[f_id]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Franchisee Name:</th>
										<td>$d[fran_Name]</td>
									</tr>
									
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>

									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Course Name:</th>
										<td>$d[course_Name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Admission Date:</th>
										<td>$d[course_date]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Batch Time:</th>
										<td>$d[timing]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Name:</th>
										<td>$d[name]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Qualification:</th>
										<td>$d[qualification]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Contact:</th>
										<td>$d[contact]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Email:</th>
										<td>$d[email]</td>
									</tr>
									<tr style="background-color:#F5F5F5;">
										<th style="font-size:20px;">Student Image:</th>
										<td><img src="http://ccaindia.in/uploads/Admission/$d[image]" style="height:74px; width:64px;" /></td>
									</tr>
									
				                </thead>
				                <tbody>
				                 
				                    
				                </tbody>
				               

				            </table>	
							<div>
							
							</div>
					</div>
EOD;
          $filename="DateWise.pdf";   
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 
  		   }
		   
		  
    $pdf->Output($filename, 'D');
  }



}