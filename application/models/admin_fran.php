<?php
class Admin_fran extends CI_Model{
function __construct() {
parent::__construct();
$this->load->library("Pdf");
}

public function save_new_fran($data,$data1,$data2,$email)
{
     
     $query1=$this->db->get_where('customers',array('email'=>$email));
     if($query1->num_rows() > 0)
     {
             return false;        
     } 
     else
     {

		     $this->db->insert('customers',$data);
		     $query=$this->db->get_where('customers',array('email'=>$email));
		     $result=$query->result_array();
		     foreach($result as $res)
		     {
		     	$id=$res['cus_id'];
		     } 

		     $data1['cus_id']=$id;
		     $data2['f_id']=$id;
		     $this->db->insert('locations',$data2);
		     if($this->db->insert('customers_info',$data1))
		     {
		     	return true;
		     }		     
		     else
		     {
		     	return false;
		     }
	 }      	     
}

public function adm_enq_remark_update($id,$remark)
{
	 $this->db->set(array('remark'=>$remark,'adm_rem_state'=>'unread'));
	 $this->db->where('id',$id);
	 $query=$this->db->update('enquiry');
     if($query)
     {
     	 return true;
     }
     else
     {
     	return false;
     }
}
public function fran_update($data,$data1,$cus_id)
{
	$this->db->where('cus_id', $cus_id);
    $query1=$this->db->update('customers', $data);
    if($query1)
    {
         $this->db->where('cus_id', $cus_id);
	     $query2=$this->db->update('customers_info', $data1);
	     if($query2)
	     {
	     	return true;
	     }	
	     else
	     {
	     	return false;
	     }
    }

    
}

public function pdf_single($id)
{
          $this->db->select('customers.cus_id,customers.fname,customers.status,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where(array('customers.cus_id'=>$id));
          $query=$this->db->get();
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
		<TD>'.$d['cus_id'].'</TD>
		</TR>
		<TR>
		<TD>Owner Name:</TD>
		<TD>'.$d['fname'].'</TD>
		</TR>
		<TR>
		<TD>Franchisee Name:</TD>
		<TD>'.$d['institute_name'].'</TD>
		</TR>
		<TR>
		<TD>Mobile:</TD>
		<TD>'.$d['cus_mobile'].'</TD>
		</TR>
		<TR>
		<TD>Email:</TD>
		<TD>'.$d['femail'].'</TD>
		</TR>
		<TR>
		<TD>State:</TD>
		<TD>'.$d['State'].'</TD>
		</TR>
		<TR>
		<TD>City:</TD>
		<TD>'.$d['City'].'</TD>
		</TR>
		<TR>
		<TD>Address:</TD>
		<TD>'.$d['address'].'</TD>
		</TR>
		<TR>
		<TD>Status:</TD>
		<TD>'.$d['status'].'</TD>
		</TR>
		</TABLE>';
		$pdf->WriteHTML2("<br><br><br>$htmlTable");
		$file_name=$d['institute_name'].".pdf";
        }

		$pdf->Output($file_name,'D');
}


public function Excel_single($id,$name)
{
	  $query = "select customers.cus_id As Franchisee_Id,customers.fname As OwnerName,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers.status As Franchisee_Status from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.cus_id='".$id."' ";
 	    
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
		
		$filename=$name.".xlsx";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
}

public function get_pdf_cat($from_dt,$to_dt,$sname,$cname,$sid)
{
		$srr=array();
		$srr=explode(",",$sid);
	    $dt=date('Y-m-d');
	    $array=array();
        if($from_dt!="" && $to_dt!="" && $sname!="" && $cname!="" && $sid=="")
        {
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname,'customers_info.city'=>$cname);
		   $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
        else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="" && $sid=="")
        {
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname);
		   $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
        else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname!="" && $sid=="")
        {
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.city'=>$cname);
		   $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
        else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname!="" && $sid=="")
        {
           $array=array('customers.date >='=>$from_dt,'customers_info.state'=>$sname,'customers_info.city'=>$cname);
		   $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
        else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname!="" && $sid=="")
        {
           $array=array('customers.date <='=>$to_dt,'customers_info.state'=>$sname,'customers_info.city'=>$cname);
		   $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
		 else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="" && $sid=="")
		 {
			  $array=array('customers_info.state'=>$sname,'customers_info.city'=>$cname);
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname=="" && $cname!="" && $sid=="")
		 {
			  $array=array('customers.date <='=>$to_dt,'customers_info.city'=>$cname);
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname=="" && $sid=="")
		 {
			  $array=array('customers.date <='=>$to_dt,'customers_info.state'=>$sname);
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname=="" && $sid=="")
		 {
			  $array=array('customers.date >='=>$from_dt,'customers_info.state'=>$sname);
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname!="" && $sid=="")
		 {
			  $array=array('customers.date >='=>$from_dt,'customers_info.city'=>$cname);
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname=="" && $sid=="")
		 {
			  $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt);
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
          $this->db->from('customers');
          $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
          $this->db->join('state', 'customers_info.state = state.state_id');
          $this->db->join('city', 'customers_info.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else  if($from_dt!="" && $to_dt!="" && $sname!="" && $cname!="" && $sid!="")
        {	
				  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
        }
        else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="" && $sid!="")
        {
           $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
        }
        else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname!="" && $sid!="")
        {
           $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
        }
        else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname!="" && $sid!="")
        {
           $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
        }
        else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname!="" && $sid!="")
        {
           $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
        }
		 else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="" && $sid!="")
		 {
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname=="" && $cname!="" && $sid!="")
		 {
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				 $result['data']=$query->result_array();
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname=="" && $sid!="")
		 {
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname=="" && $sid!="")
		 {
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname!="" && $sid!="")
		 {
			  $this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
		 }
		else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname=="" && $sid!="")
		 {
				$this->db->select('customers.fran_id,customers.fname,customers.status,customers_info.pincode As Pincode,customers.password,customers_info.address,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
				  $this->db->from('customers');
				  $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
				  $this->db->join('state', 'customers_info.state = state.state_id');
				  $this->db->join('city', 'customers_info.city = city.city_id');
                  $this->db->where_in('id',$srr);
				  $query = $this->db->get();
				  $result['data']=$query->result_array();
		 }
		 
		
		 

        
       
		$this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 10);
        $pdf->AddPage();
        $pdf->Image(base_url()."Style/images/logo.jpg",18,13,33);
		$pdf->SetFont('Arial','B',14);

		$pdf->WriteHTML('<center><para><h1 style="margin-left:50px;">College Of Computer Accounts</h1><br>
		Website: <u>www.ccaindia.in</u><br><br><br><br></para></center>');
		if(count($result['data'])>0)
		{
        foreach($result['data'] as $d)
        {  	
        
        $pdf->WriteHTML('<center><para>Franchise:-'.ucfirst(strtolower($d['institute_name'])).'</para></center>');
		$pdf->SetFont('Arial','B',8); 
		$htmlTable='<TABLE style="height:500px;">
		<TR>
		<TD>Franchise Id:</TD>
		<TD>'.$d['fran_id'].'</TD>
		</TR>
		<TR>
		<TD>Owner Name:</TD>
		<TD>'.$d['fname'].'</TD>
		</TR>
		<TR>
		<TD>Franchisee Name:</TD>
		<TD>'.$d['institute_name'].'</TD>
		</TR>
		<TR>
		<TD>Mobile:</TD>
		<TD>'.$d['cus_mobile'].'</TD>
		</TR>
		<TR>
		<TD>Email:</TD>
		<TD>'.$d['femail'].'</TD>
		</TR>
		<TR>
		<TD>State:</TD>
		<TD>'.$d['State'].'</TD>
		</TR>
		<TR>
		<TD>City:</TD>
		<TD>'.$d['City'].'</TD>
		</TR>
		<TR>
		<TD>Address:</TD>
		<TD>'.$d['address'].'</TD>
		</TR>
		<TR>
		<TD>Pincode:</TD>
		<TD>'.$d['Pincode'].'</TD>
		</TR>
		<TR>
		<TD>Status:</TD>
		<TD>'.$d['status'].'</TD>
		</TR>
		</TABLE>';
		
		$pdf->WriteHTML2("<br>$htmlTable");
		}
		}
		else
		{
			$htmlTable = "<br>No Data Available</br>";
			$pdf->WriteHTML2("<br>$htmlTable");
		}
		$pdf->Output('Franch_Details.pdf','D');
}

public function get_excel_cat($from_dt,$to_dt,$sname,$cname,$sid)
{
		 $srr=array();
		 $srr=str_replace(",","','",$sid);
	    $dt=date('Y-m-d');
		if($from_dt!="" && $to_dt!="" && $sname!="" && $cname!="" && $sid=="")
        {
           $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date >='".$from_dt."' And customers.date<='".$to_dt."' And customers_info.state='".$sname."' And customers_info.city='".$cname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
        else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="" && $sid=="")
        {
            $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date >='".$from_dt."' And customers.date<='".$to_dt."' And customers_info.state='".$sname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
        else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname!="" && $sid=="")
        {
           $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date >='".$from_dt."' And customers.date<='".$to_dt."' And customers_info.city='".$cname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
        else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname!="" && $sid=="")
        {
            $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date >='".$from_dt."' And customers_info.state='".$sname."' And customers_info.city='".$cname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
        else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname!="" && $sid=="")
        {
           $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date<='".$to_dt."' And customers_info.state='".$sname."' And customers_info.city='".$cname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
		 else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="" && $sid=="")
		 {
			   $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers_info.state='".$sname."' And customers_info.city='".$cname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname=="" && $cname!="" && $sid=="")
		 {
			  $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date<='".$to_dt."' And customers_info.city='".$cname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname=="" && $sid=="")
		 {
			   $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date<='".$to_dt."' And customers_info.state='".$sname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname=="" && $sid=="")
		 {
			   $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date >='".$from_dt."' And customers_info.state='".$sname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname!="" && $sid=="")
		 {
			   $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date >='".$from_dt."' And customers_info.city='".$cname."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname=="" && $sid=="")
		 {
			  $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And customers.date >='".$from_dt."' And customers.date<='".$to_dt."' ";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
        
		if($from_dt!="" && $to_dt!="" && $sname!="" && $cname!="" && $sid!="")
        {
           $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
        else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="" && $sid!="")
        {
            $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
        else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname!="" && $sid!="")
        {
           $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
        else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname!="" && $sid!="")
        {
            $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
        else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname!="" && $sid!="")
        {
           $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
        }
		 else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="" && $sid!="")
		 {
			   $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname=="" && $cname!="" && $sid!="")
		 {
			  $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname=="" && $sid!="")
		 {
			   $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname=="" && $sid!="")
		 {
			   $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname!="" && $sid!="")
		 {
			   $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
		else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname=="" && $sid!="")
		 {
			 
			  $query = "select customers.cus_id As Franchisee_Id,customers.fname As Owner_Name,customers_info.institute_name As Franchisee_Name,customers_info.cus_mobile As Mobile,customers_info.femail As Email,state.name As State,city.name As City,customers_info.address As Address,customers_info.pincode As Pincode,customers.status As Franchisee_Status
	    	    from customers,customers_info,state,city where customers.cus_id = customers_info.cus_id And customers_info.state=state.state_id And customers_info.city=city.city_id And id in('".$srr."')";
 	    
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
				
				$filename="Franch_Details.xls";

		        header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment;filename=".$filename);
				header("Pragma: no-cache");
				header("Expires: 0");
				print "$header\n$data";
		 }
        
}



 public function status_change($id,$status)
 {
 	     //echo $status;
 	     //die("dsdsd");
 	     $this->db->where('cus_id', $id);
	     $query2=$this->db->update('customers',array('status'=>$status));
	     if($query2)
	     {
	     	return true;
	     }	
	     else
	     {
	     	return false;
	     }
 }



}