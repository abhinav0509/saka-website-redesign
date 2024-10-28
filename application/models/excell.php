<?php
class Excell extends CI_Model{
function __construct() {
parent::__construct();
$this->load->library("Pdf");
}

public function Jobcard_excel($regid,$name)
{
	  $query = "SELECT fname as Franchisee_Name,sname as Student_Name,scode as Student_Code,vupto as Valid_Upto,course as Course,state as State,city as City
	  from jobcard where id='".$regid."' ";

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

public function all_job_card_excel($fname)
{
   
    $fname1=str_replace("&", "&amp;", $fname);
	if($fname!="")
	{
         $query = "SELECT fname as Franchise_Name,sname as Student_Name,scode as Student_Code,vupto as Valid_Upto,course as Course,state as State,city as City
	     from jobcard where fname='".$fname1."' ";
       // die("sdad");
		$header = '';
		$data ='';
 
		$export = mysql_query($query) or die(mysql_error()); 		
 
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
		
		$filename=$fname.".xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
	}
	else
	{
		 $query = "SELECT fname as Franchisee_Name,sname as Student_Name,scode as Student_Code,vupto as Valid_Upto,course as Course,state as State,city as City
		  from jobcard";

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
			
			$filename="All_jobcard_details.xls";

	        header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment;filename=".$filename);
			header("Pragma: no-cache");
			header("Expires: 0");
			print "$header\n$data";

	}	
}

public function jobcard_pdf($id)
{

	$query=$this->db->get_where('jobcard',array('id'=>$id));
	$result=$query->result_array();

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

		$pdf->SetFont('Arial','B',10); 
		$htmlTable='<TABLE>
		<TR>
		<TD>Franchise Name:</TD>
		<TD>'.$result[0]['fname'].'</TD>
		</TR>
		<TR>
		<TD>Student Name:</TD>
		<TD>'.$result[0]['sname'].'</TD>
		</TR>
		<TR>
		<TD>Student Code:</TD>
		<TD>'.$result[0]['scode'].'</TD>
		</TR>
		<TR>
		<TD>Course:</TD>
		<TD>'.$result[0]['course'].'</TD>
		</TR>
		<TR>
		<TD>Valid Upto:</TD>
		<TD>'.$result[0]['vupto'].'</TD>
		</TR>
		<TR>
		<TD>State:</TD>
		<TD>'.$result[0]['state'].'</TD>
		</TR>
		<TR>
		<TD>City:</TD>
		<TD>'.$result[0]['city'].'</TD>
		</TR>
		</TABLE>';
		$pdf->WriteHTML2("<br><br><br>$htmlTable");
		$pdf->Output('Jobcard.pdf','D');
		
	
    
    
}


public function all_job_card_pdf()
{

	$query=$this->db->get_where('jobcard');
	$result['data']=$query->result_array();
    //print_r($result['data']);
    
   

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
		<TD>Franchise Name:</TD>
		<TD>'.$d['fname'].'</TD>
		</TR>
		<TR>
		<TD>Student Name:</TD>
		<TD>'.$d['sname'].'</TD>
		</TR>
		<TR>
		<TD>Student Code:</TD>
		<TD>'.$d['scode'].'</TD>
		</TR>
		<TR>
		<TD>Course:</TD>
		<TD>'.$d['course'].'</TD>
		</TR>
		<TR>
		<TD>Valid Upto:</TD>
		<TD>'.$d['vupto'].'</TD>
		</TR>
		<TR>
		<TD>State:</TD>
		<TD>'.$d['state'].'</TD>
		</TR>
		<TR>
		<TD>City:</TD>
		<TD>'.$d['city'].'</TD>
		</TR>
		</TABLE>';
		$pdf->WriteHTML2("<br><br><br>$htmlTable");
        }

		$pdf->Output($result[0]['stud_name'].'.pdf','D');
		
	
    
    
}

public function get_single_fran_enquiry_excel($regid,$name)
{
		$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where id='".$regid."' ";
 	
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

public function get_single_fran_enquiry_excel1($regid,$name)
{
		$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where id='".$regid."' ";
 	
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
	  
	

	public function get_single_fran_enquiry_pdf($id)
	{
		$query=$this->db->get_where('enquiry',array('id'=>$id));
		$result=$query->result_array();

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

		$pdf->SetFont('Arial','B',10); 
		$htmlTable='<TABLE>
		<TR>
		<TD>Franchise Id:</TD>
		<TD>'.$result[0]['f_id'].'</TD>
		</TR>
		<TR>
		<TD>Franchisee Name:</TD>
		<TD>'.$result[0]['Franchisee_Name'].'</TD>
		</TR>
		<TR>
		<TD>Student Name:</TD>
		<TD>'.$result[0]['stud_name'].'</TD>
		</TR>
		<TR>
		<TD>Enquiry Date:</TD>
		<TD>'.$result[0]['enq_date'].'</TD>
		</TR>
		<TR>
		<TD>Interested Course:</TD>
		<TD>'.$result[0]['course'].'</TD>
		</TR>
		<TR>
		<TD>Student Contact:</TD>
		<TD>'.$result[0]['contact'].'</TD>
		</TR>
		<TR>
		<TD>Student Email:</TD>
		<TD>'.$result[0]['email'].'</TD>
		</TR>
		<TR>
		<TD>Admin Remark:</TD>
		<TD>'.$result[0]['remark'].'</TD>
		</TR>
		</TABLE>';
		$pdf->WriteHTML2("<br><br><br><br><br>$htmlTable");
		$pdf->Output($result[0]['stud_name'].'.pdf','D');
	}  

	public function get_single_fran_enquiry_pdf1($id)
	{
		$query=$this->db->get_where('demoenquiry',array('id'=>$id));
		$result=$query->result_array();

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

		$pdf->SetFont('Arial','B',10); 
		$htmlTable='<TABLE>
		<TR>
		<TD>Franchise Id:</TD>
		<TD>'.$result[0]['fid'].'</TD>
		</TR>
		<TR>
		<TD>Franchisee Name:</TD>
		<TD>'.$result[0]['Franchisee_Name'].'</TD>
		</TR>
		<TR>
		<TD>Student Name:</TD>
		<TD>'.$result[0]['stud_name'].'</TD>
		</TR>
		<TR>
		<TD>Enquiry Date:</TD>
		<TD>'.$result[0]['enq_date'].'</TD>
		</TR>
		<TR>
		<TD>Interested Course:</TD>
		<TD>'.$result[0]['course'].'</TD>
		</TR>
		<TR>
		<TD>Student Contact:</TD>
		<TD>'.$result[0]['contact'].'</TD>
		</TR>
		<TR>
		<TD>Student Email:</TD>
		<TD>'.$result[0]['email'].'</TD>
		</TR>
		<TR>
		<TD>Admin Remark:</TD>
		<TD>'.$result[0]['remark'].'</TD>
		</TR>
		</TABLE>';
		$file_name=$result[0]['stud_name']."."."pdf";
		$pdf->WriteHTML2("<br><br><br><br><br>$htmlTable");
		$pdf->Output($file_name,'D');
	}  
	  
	public function Get_all_cat_excel($fromdt,$todt,$fnm,$sid)     
	{
		$srr = array();
		$srr = str_replace(",","','",$sid);
		$dt = date('Y-m-d');		
        /* $this->db->where('enq_date >=', $fromdt);
		 $this->db->where('enq_date <=', $todt);
		 $this->db->where(array('Franchisee_Name'=>$fnm));
		 $query=$this->db->get('enquiry');*/
        if($sid!="")
		{
			$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where id in ('".$srr."') ";
		}
		else
		{
		 $query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where enq_date='".$fromdt."' AND enq_date='".$todt."' AND Franchisee_Name='".$fnm."' ";
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
		
		$filename=$fnm.".xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
		
	}
		 
		 
	public function Get_today_excel($fromdt,$fnm,$sid)
	{
		$srr=array();
		$srr = str_replace(",","','",$sid);
		if($sid!=""){
			$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where id in ('".$srr."') ";
		}
		else{
			$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where enq_date='".$fromdt."' AND Franchisee_Name='".$fnm."' ";
		}		
 	
		$header = '';
		$data ='';
 
		$export = mysql_query($query) or die(mysql_error()); 		
 
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
		
		$filename=$fnm.".xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
	}	 
		
		 
	public function Get_by_fran_excel($fnm,$sid)	 
	{
		$srr = array();
		$srr = str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where id in ('".$srr."') ";
		}
		else
		{
		$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where Franchisee_Name='".$fnm."' ";
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
		
		$filename=$fnm.".xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
	}
	  
    public function Get_fran_all_today_excel($fromdt,$sid)
    {
		$srr = array();
		$srr = str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where id in ('".$srr."') ";
		}
		else{
         $query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where enq_date='".$fromdt."' ";
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
		
		$filename="TodaysEnquiries.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";	
    }


    public function Get_fran_all_excel()
    {
    	$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry ";
 	
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
		
		$filename="AllEnquiries.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";	
    }
    public function Get_date_excel($newfdate,$newtdate,$sid)
    {
		$srr = array();
		$srr = str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where id in ('".$srr."') ";
		}
		else{
    	 $query = "SELECT f_id as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from enquiry where enq_date >='$newfdate' AND enq_date<='$newtdate' ";
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
		
		$filename="DateWise_Excel.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
    }

    /**********************Franchisee Enquiry pdf start**************************************/

    public function Get_all_cat_pdf($fromdt,$todt,$fnm,$sid) 
    {
		$srr = array();
		$srr = explode(",",$sid);
		$dt=date('Y-m-d');
    	 //$this->db->where($this->db->where('enq_date >=', $newfdate);
		 //$this->db->where('enq_date <=', $newtdate););
		 //$this->db->where();
		 if($sid!=""){
			$this->db->where_in('id',$srr);
		 }
		 else{
		    $this->db->where(array('enq_date >='=>$fromdt,'enq_date <='=>$todt,'Franchisee_Name'=>$fnm));
		 }
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();

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
		}
		else{
			$htmlTable ="<b>No Data Available</b>";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output("Student.pdf",'D');
    }
	
	public function Get_all_pdf($fnm)
	{
		$this->db->where('Franchisee_Name',$fnm);
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();
		 print_r($result); die("SSSSS");

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
		
		foreach($result['data'] as $d)
        {  

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
		$pdf->Output("Student.pdf",'D');
	}

  public function Get_today_pdf($fdt,$fnm,$sid)
  {
        $srr=array();
		$srr=explode(",",$sid);
		if($sid!="")
		{
			$this->db->where_in('id',$srr);
		}
		else
		{
			 $this->db->where(array('enq_date'=>$fdt,'Franchisee_Name'=>$fnm));
		}
        
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array(); 

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
        if(count($result['data'])>0){
			
		 foreach($result['data'] as $d)
        {   
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
		}
		else
		{
			$htmlTable = "<b>No data available</b>";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output($d['Franchisee_Name'].".pdf",'D');
  }

   public function Get_by_fran_pdf($fnm,$sid)
   {
	   $srr = array();
	   $srr = explode(",",$sid);
	   if($sid!="")
	   {
		  $this->db->where_in('id',$srr); 
	   }
	   else{
		    $this->db->where(array('Franchisee_Name'=>$fnm));
	   }
   	  	 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array(); 

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
		if(count($result['data'])>0){
        foreach($result['data'] as $d)
        { 
		
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
		}
		else{
			$htmlTable = "<b>No Data Available</b>";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output($d['Franchisee_Name'].".pdf",'D');
   }
   
   public function Get_fran_all_pdf($sid)
   {
	   
   	      //$this->db->where(array('Franchisee_Name'=>$fnm));
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array(); 

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
        foreach($result['data'] as $d)
        {  
		
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

		$pdf->Output($d['Franchisee_Name'].".pdf",'D');
   }

   public function Get_fran_all_today_pdf($newfdate,$sid)
   {
	   $srr = array();
	   $srr = explode(",",$sid);
	   if($sid!=""){
		   $this->db->where_in('id',$srr);
	   }
	   else{
		    $this->db->where(array('enq_date'=>$newfdate));
	   }
   	    
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array(); 

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
		if(count($result['data'])>0){
		foreach($result['data'] as $d)
        {   
		
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
		}
		else{
			$htmlTable = "<b>No Data Available</b>";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output($d['Franchisee_Name'].".pdf",'D');
   }
   
   public function Get_date_pdf($newfdate,$newtdate,$sid)
   {
	   $srr=array();
	   $srr=explode(",",$sid);
	   if($sid!="")
	   {
		   $this->db->where_in('id',$srr);
	   }
	   else{
   	     $this->db->where('enq_date >=', $newfdate);
		 $this->db->where('enq_date <=', $newtdate);
	   }
		 $query=$this->db->get('enquiry');
		 $result['data']=$query->result_array();

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
		if(count($result['data'])>0){
		foreach($result['data'] as $d)
        { 
		
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
		}
		else
		{
			$htmlTable = "<br>No data available</br>";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output("Admission.pdf",'D');
   }

}