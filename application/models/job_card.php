<?php
class Job_card extends CI_Model{
function __construct() {
parent::__construct();
$this->load->library("Pdf");
}

public function save_job_card($data,$fid)
{
        $this->load->database();
		
		$this->db->select('state.name as State,city.name as City');
		$this->db->from('customers');
		$this->db->join('customers_info','customers.cus_id=customers_info.cus_id');
		$this->db->join('state','customers_info.state=state.state_id');
		$this->db->join('city','customers_info.city=city.city_id'); 
		$this->db->where('customers.fran_id',$fid);
		$query1=$this->db->get();
		$res=$query1->result_array();
	    $data['state']=$res[0]['State'];
	    $data['city']=$res[0]['City'];

	    $this->db->select('MAX(id) as id');
	    $this->db->from('jobcard');
	    $query2=$this->db->get();
	    $idres=$query2->result_array();
	    $mid=$idres[0]['id'];
	    if($mid=="" || $mid==0)
	    {
	    	 $mid=1;
	    }
	    else
	    {
	    	 $mid=$mid+1;
	    }
	    $job_id="T".$mid;
        $data['job_id']=$job_id;
	    $data['sname'];
		
		$query3=$this->db->get_where('jobcard',array('f_id'=>$fid,'sname'=>$data['sname']));
		if($query3->num_rows() > 0)
		{
         
		}
		else
		{
				$query=$this->db->insert('jobcard',$data);
				if($query)
				{
				 return true;
				}
				else
				{
				return false;
				}
		}		
}

public function update_job_card($data,$up_id,$fid)
{
        $this->db->select('state.name as State,city.name as City');
		$this->db->from('customers');
		$this->db->join('customers_info','customers.cus_id=customers_info.cus_id');
		$this->db->join('state','customers_info.state=state.state_id');
		$this->db->join('city','customers_info.city=city.city_id'); 
		$this->db->where('customers.fran_id',$fid);
		$query1=$this->db->get();
		$res=$query1->result_array();
	    $data['state']=$res[0]['State'];
	    $data['city']=$res[0]['City'];


	    $this->db->where('id',$up_id);
	    $query2=$this->db->update('jobcard',$data);
	    if($query2)
	    {
	    	 return true;
	    }
	    else
	    {
	    	 return false;
	    }
}

public function getStud($name,$session)
{

	    $query = $this->db->query("SELECT name,stud_id,course_date
              FROM admission
              WHERE name LIKE '%".$name."%' And f_id='".$session->cus_id."' And course_Name = 'Tally Professional'
              GROUP BY name");
          echo json_encode($query->result_array());
}
public function getjobStud($name,$session)
{
     $query = $this->db->query("SELECT sname
              FROM jobcard
              WHERE sname LIKE '%".$name."%' And f_id='".$session->fran_id."'
              GROUP BY sname");
          echo json_encode($query->result_array());	
}
public function getjobFranch($name)
{
	$query = $this->db->query("SELECT fname
              FROM jobcard
              WHERE fname LIKE '%".$name."%' 
              GROUP BY fname");
          echo json_encode($query->result_array());	
}

public function get_jobcard_pdf($from_dt,$to_dt,$fran,$sid)
{
	
	       $srr=array();
		   $srr=explode(",",$sid);
	       $dt=date('Y-m-d');
	       $array=array();
	       $fill=false;
	       $image_height = 30;
		   $image_width = 30;
	       $data=array();
	       if($from_dt==$dt && $to_dt==$dt && $fran=="" && $sid=="")
           { 
				  $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt); 
				  $this->db->select('img,job_id');
				  $this->db->where($array);
                  $query = $this->db->get("jobcard");
                  $data=$query->result_array();                  
            }
            else if($from_dt==$dt && $to_dt==$dt && $fran!="" && $sid=="")
            {
				
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran); 
				$this->db->select('img,job_id');
				$this->db->where($array);
				$query = $this->db->get("jobcard");
				$data=$query->result_array();				
            }
            else if($from_dt!=$dt && $to_dt==$dt && $fran!="" && $sid=="")
            {
					
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran);
				$this->db->select('img,job_id');
				$this->db->where($array);
				$query = $this->db->get("jobcard");
				$data=$query->result_array();
            }
            else if($from_dt!=$dt && $to_dt!=$dt && $fran=="" && $sid=="")
            {
				
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt); 
				$this->db->select('img,job_id');
				$this->db->where($array);
				$query = $this->db->get("jobcard");
				$data=$query->result_array();
            }
			else if($from_dt!=$dt && $to_dt!=$dt && $fran!="" && $sid=="")
            {
				
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran); 
				$this->db->select('img,job_id');
				$this->db->where($array);
				$query = $this->db->get("jobcard");
				$data=$query->result_array();
            }
            else if($from_dt==$dt && $to_dt!=$dt && $fran!="" && $sid=="")
            {
			
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran); 
				$this->db->select('img,job_id');
				$this->db->where($array);
				$query = $this->db->get("jobcard");
				$data=$query->result_array();
            }
            else if($from_dt!=$dt && $to_dt==$dt && $fran=="" && $sid=="")
            {
					
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt);
				$this->db->select('img,job_id');
				$this->db->where($array);
				$query = $this->db->get("jobcard");
				$data=$query->result_array();
            }
			else if($from_dt!=$dt && $to_dt==$dt && $fran=="" && $sid!="")
			{
				 
				  //$array=array('id'=>$sid);
				  $this->db->select('id,img,job_id');
				  $this->db->where_in('id',$srr);
				  $query = $this->db->get("jobcard");
				  $data=$query->result_array();
			}
			else if($from_dt==$dt && $to_dt!=$dt && $fran=="" && $sid!="")
			{
				 
				  //$array=array('id'=>$sid);
				  $this->db->select('id,img,job_id');
				  $this->db->where_in('id',$srr);
				  $query = $this->db->get("jobcard");
				  $data=$query->result_array();
			}
			else if($from_dt==$dt && $to_dt==$dt && $fran=="" && $sid!="")
			{
							
				  //$array=array('id'=>$sid);
				  $this->db->select('id,img,job_id');
				  $this->db->where_in('id',$srr);
				  $query = $this->db->get("jobcard");
				  $data=$query->result_array();
			}
			else if($from_dt!=$dt && $to_dt!=$dt && $fran!="" && $sid!="")
			{
				 	
				  //$array=array('id'=>$sid); 
                  $this->db->select('id,img,job_id');
				  $this->db->where_in('id',$srr);
				  $query = $this->db->get("jobcard");
				  $data=$query->result_array();				  
			}
			else if($from_dt==$dt && $to_dt==$dt && $fran!="" && $sid!="")
			{     
		        
				  //$array=array('id'=>$sid); 
				  $this->db->select('id,img,job_id');
				  $this->db->where_in('id',$srr);
				  $query = $this->db->get("jobcard");
				  $data=$query->result_array();
			}
			else if($from_dt!=$dt && $to_dt!=$dt && $fran=="" && $sid!="")
			{
				  
				  //$array=array('id'=>$sid); 
				  $this->db->select('id,img,job_id');
				  $this->db->where_in('id',$srr);
				  $query = $this->db->get("jobcard");
				  $data=$query->result_array();
			}

            

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
      
       $tempvar = 0;
       $tempvar1 = "";
       $tempvar2 = "";
       $tempvar3 = "";
       $tempvar4 = "";
       $demoHtml = "<style>p{font-size:10px;line-height:5px}table,td,th{font-size:12px;padding:4px}th{background-color:green;color:white;font-size:10px}img{height:50px}</style><table style=\"border:none;\"><tr><th style='display:none'></th><th style='display:none'></th><th style='display:none'></th><th style='display:none'></th></tr>";
       $demobottem ="</table><div></div></div>";
       $actu = "";
	   if(count($data)>0){
       	    for($i=0; $i<count($data); $i++)
        {
     		if(count($data) == $tempvar)
     		{     				
     				break;
     		}
     		else{
     			 $tempvar1 =  "<td style=\"text-align:center;\"><img src=\"http://ccaindia.in/uploads/job_card/".$data[$tempvar]['img']."\"style=\"height:100px; width:100px; border:1px solid black;\"><br><div style=\"text-align:center; margin-top:40px;\">".$data[$tempvar]['job_id']."</div></td>";
       		    
       		     $tempvar++;
     		}
     		if(count($data) == $tempvar)
     		{
     		       $actu .= '<tr>'. $tempvar1 . '</tr>';
     		       break;
     		}
     		else{
     			
       		     $tempvar2 = "<td style=\"text-align:center;\"><img src=\"http://ccaindia.in/uploads/job_card/".$data[$tempvar]['img']."\"style=\"height:100px; width:100px; border:1px solid black;\"><br><div style=\"text-align:center; margin-top:40px;\">".$data[$tempvar]['job_id']."</div></td>";
       			
       		     $tempvar++;
     		}   
     		if(count($data) == $tempvar)
     		{
     		       $actu .= '<tr>'. $tempvar1 . $tempvar2 . '</tr>';

     		       break;
     		}
     		else{
     			
       		     $tempvar3 = "<td style=\"text-align:center;\"><img src=\"http://ccaindia.in/uploads/job_card/".$data[$tempvar]['img']."\"style=\"height:100px; width:100px;border:1px solid black;\"><br><div style=\"text-align:center; margin-top:40px;\">".$data[$tempvar]['job_id']."</div></td>";
       		     $tempvar++;
     		}
     		if(count($data) == $tempvar)
     		{      

     		       $actu .= '<tr>'. $tempvar1 . $tempvar2 . $tempvar3 . '</tr>';
     		       break;
     		}
     		else{
     			 
     			
       		     $tempvar4 = "<td style=\"text-align:center;\"><img src=\"http://ccaindia.in/uploads/job_card/".$data[$tempvar]['img']."\"style=\"height:100px;width:100px; border:1px solid black;\"><br><div style=\"text-align:center; margin-top:40px;\">".$data[$tempvar]['job_id']."</div></td>";
       		     $tempvar++;
     		}  		

     		
     		$actu .= '<tr>'. $tempvar1 . $tempvar2 . $tempvar3 . $tempvar4 . '</tr>';
     	}
     	$demofin = $demoHtml . $actu . $demobottem ;
    $html = <<<EOD
   <div style="text-align:center;padding-top: -120px">
	   <img height="120px" src="http://ccaindia.in/Style/images/cca-logo2.png"/>
	   <h1 style="text-align:center; margin-top:-100px;">College Of Computer Accountants</h1>
	    <p style="text-align:center;">www.ccaindia.in<p>
   </div>
					<hr />

	$demofin
EOD;
     // print_r($html);
     
    
     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);  
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
	
	$filename='Jobcard.pdf';
	$pdf->Output($filename, 'D');


}



public function get_jobcard_Excell($from_dt,$to_dt,$fran,$sid)
{
	       $srr=array();
		   $srr=str_replace(",","','",$sid);
	       $dt=date('Y-m-d');
	       $array=array();	      
	       if($from_dt==$dt && $to_dt==$dt && $fran=="" && $sid=="")
           {
                   $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where entry_dt >='".$from_dt."' And entry_dt <='".$to_dt."' ";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
           }
            else if($from_dt==$dt && $to_dt==$dt && $fran!="" && $sid=="")
            {
                   $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where entry_dt >='".$from_dt."' And entry_dt <='".$to_dt."' And fname='".$fran."' ";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
            }
            else if($from_dt!=$dt && $to_dt==$dt && $fran!="" && $sid=="")
            {
                  $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where entry_dt >='".$from_dt."' And entry_dt <='".$to_dt."' And fname='".$fran."' ";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
            }
			else if($from_dt!=$dt && $to_dt!=$dt && $fran!="" && $sid=="")
            {
                  $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where entry_dt >='".$from_dt."' And entry_dt <='".$to_dt."' And fname='".$fran."' ";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
            }
            else if($from_dt!=$dt && $to_dt!=$dt && $fran=="" && $sid=="")
            {
                    $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where entry_dt >='".$from_dt."' And entry_dt <='".$to_dt."' ";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
            }
            else if($from_dt==$dt && $to_dt!=$dt && $fran!="" && $sid=="")
            {
                   $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where entry_dt >='".$from_dt."' And entry_dt <='".$to_dt."' And fname='".$fran."' ";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
            }
            else if($from_dt!=$dt && $to_dt==$dt && $fran=="" && $sid=="")
            {
                 $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where entry_dt >='".$from_dt."' And entry_dt <='".$to_dt."' ";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
            }
			else if($from_dt!=$dt && $to_dt==$dt && $fran=="" && $sid!="")
			{
				 $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where id in ('".$srr."')";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
			}
			else if($from_dt==$dt && $to_dt!=$dt && $fran=="" && $sid!="")
			{
				 $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where id in ('".$srr."')";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
			}
			else if($from_dt==$dt && $to_dt==$dt && $fran=="" && $sid!="")
			{
				 $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where id in ('".$srr."')";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
			}
			else if($from_dt!=$dt && $to_dt!=$dt && $fran!="" && $sid!="")
			{	
                        $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where id in ('".$srr."')";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";		
			}
			else if($from_dt==$dt && $to_dt==$dt && $fran!="" && $sid!="")
			{  
		 $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where id in ('".$srr."')";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
			}
			else if($from_dt!=$dt && $to_dt!=$dt && $fran=="" && $sid!="")
			{
				 $query = "SELECT job_id as JobCard_Id,fname as Franchise_Name,sname as Student_Name,scode as Student_Code,state as State,city as City,vupto as Valid_Upto
					    from jobcard where id in ('".$srr."')";
				 	    
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
						
						$filename="Jobcard_Excel.xls";

				        header("Content-type: application/octet-stream");
						header("Content-Disposition: attachment;filename=".$filename);
						header("Pragma: no-cache");
						header("Expires: 0");
						print "$header\n$data";
			}
}



}