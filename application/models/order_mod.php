<?php
class Order_mod extends CI_Model{
function __construct() {
parent::__construct();
$this->load->library('pdf');
}

    public function stud_res($session)
    {
         $this->db->select('name');
         $query=$this->db->get_where('admission',array('f_id'=>$session->cus_id,'O_Status'=>0));
         return $query->result_array();
    }

    public function stud_res1($session)
    {
          $this->db->select('name');
         $query=$this->db->get_where('demoadmission',array('fid'=>$session->cus_id,'O_Status'=>0));
         return $query->result_array();

    }

     public function Add_Ord_Remark($id,$data,$dt)
    {
       $this->db->where(array('f_id'=>$id,'o_date'=>$dt));
       $query=$this->db->update('forder',$data);
       if($query)
       {
         return true;
       }
       else
       {
          return false;
       }
    }



    public function Add_Ord_Remark_msg($id,$doc_no,$doc_dt)
    {
       $msg="";
       $query=$this->db->get_where('customers_info',array('cus_id'=>$id));
       $result=$query->result_array();
       $mobile=$result[0]['cus_mobile'];

       $msg .="Ur Docate No:- $doc_no  ";
       $msg .="Send on dated:- $doc_dt  ";
       $msg .="contact when u collect   ";
       $msg .="For any query   ";
       $msg .="call: 9372136550   ";
             
       $this->load->view('sendsms');
       $sendsms=new sendsms("http://alerts.valueleaf.com/api/v3",'sms'
                   , "A46dc1705723c21960a525f9ce18b705e", "OOOCCA");
       $api=$sendsms->send_sms("8551022077", $msg, 'http://alerts.valueleaf.com/index.php&custom=1,2', 'xml');      
       print_r($api);
    }

   public function Add_Admin_Remark($id,$data)
  {
      $this->load->database();
      $this->db->where(array('O_Id'=>$id));
      $query=$this->db->update('forder', $data); 
      if($query)
      {
        return true;
      }
        else
      {
        return false;
      }
  }

  public function Add_Admin_mult_Remark($data1,$arraydata)
  {
       $cnt=0;
       $count=count($arraydata);
       foreach($arraydata as $arr)
       {
            $this->db->where(array('O_Id'=>$arr));
            $query=$this->db->update('forder', $data1); 
            $cnt++;
       }
       if($cnt==$count)
       {
          return true;
       }
       else
       {
          return false;
       }
  }

  public function order_stat_rem($data1,$arraydata)
  {
       $cnt=0;
       $count=count($arraydata);
       foreach($arraydata as $arr)
       {
            $this->db->where(array('O_Id'=>$arr));
            $query=$this->db->update('forder', $data1); 
            $cnt++;
       }
       if($cnt==$count)
       {
          return true;
       }
       else
       {
          return false;
       }
  }
  


     public function stud_res_admin($fid)
    {
         $this->db->select('name');
         $query=$this->db->get_where('admission',array('f_id'=>$session->cus_id));
         return $query->result_array();

    }
    public function course_res()
    {
    	 $this->db->select('Course_Name');
       $query=$this->db->get('course');
       return $query->result_array();
    }
    public function course_price($cname,$stid)
    {
    	   $query=$this->db->get_where('state',array('state_id'=>$stid));
         $result=$query->result_array();
         foreach($result as $res)
         {
           $snm=$res['name'];

         }
         if($snm=="Maharashtra")
         {
            $this->db->Select("book_name,lprice As Price");
            $query=$this->db->get_where('book',array('Course_name'=>$cname));
            return $query->result_array(); 
         }
         else
         {
            $this->db->Select('book_name,oprice As Price');
            $query=$this->db->get_where('book',array('Course_name'=>$cname));
           
            return $query->result_array(); 
         }
         
    }
    

    public function order_insert($data,$session)
    {
        
        $sname=$data['student_name'];
        $cname=$data['course_name']; 
        $pr=$data['price'];
        $qt=$data['quantity'];
        $t=$data['total'];
        $f_id=$session->cus_id;
        $fname=$session->institute_name;
        $dt=date('Y-m-d');
        $status="Pending";
       
        
        for($i=0; $i < count($sname); $i++) {
           
           $order[$i]['f_id']=$f_id;
           $order[$i]['stud_name']=$sname[$i];
           $order[$i]['Customer_name']=$fname;
           $order[$i]['course_name']=$cname[$i];
           $order[$i]['Quanitity']=$qt[$i];
           $order[$i]['price']=$pr[$i];
           $order[$i]['total']=$t[$i];
           $order[$i]['o_date']=$dt;
           $order[$i]['Status']=$status;
       
           $order1[$i]['O_Status']=1;
           $order1[$i]['name']=$sname[$i];
        } 
       $query=$this->db->insert_batch('tmp_order', $order);     
       //$this->db->update_batch('admission', $order1,'name');
       if($query)
       {
           return true;
       } 
       else
       {
           return false; 
       }
    }


	

	public function order_insert1($data,$data1,$session)
    {
        $sname=$data['student_name'];
        $cname=$data['course_name']; 
        $pr=$data['price'];
        $qt=$data['quantity'];
        $t=$data['total'];
        $f_id=$session->cus_id;
        $fname=$session->institute_name;
        $dt=date('Y-m-d');
        $status="Pending";
       $sum=0;
	   for($j=0; $j < count($sname); $j++) {
	      $sum=intval($sum+$pr[$j]);
	   }
	    $data1['amount']=$sum;
        $query1=$this->db->insert('payment_history', $data1);
		if($query1){
        for($i=0; $i < count($sname); $i++) {
           
           $order[$i]['f_id']=$f_id;
           $order[$i]['stud_name']=$sname[$i];
           $order[$i]['Customer_name']=$fname;
           $order[$i]['course_name']=$cname[$i];
           $order[$i]['Quanitity']=$qt[$i];
           $order[$i]['price']=$pr[$i];
           $order[$i]['total']=$t[$i];
           $order[$i]['o_date']=$dt;
           $order[$i]['Status']=$status;
       
           $order1[$i]['O_Status']=1;
           $order1[$i]['name']=$sname[$i];
			
		} 
	   
	   $query=$this->db->insert_batch('forder', $order);     
       $this->db->update_batch('admission', $order1,'name');     
       if($query)
       {
           return true;
       } 
       else
       {
           return false; 
       }
	  }
      else{
	  return false;
		}	  
	   
    }





    public function fr_order_count($session,$from_dt,$to_dt)
    {     
        $array=array();
        $dt=date('Y-m-d');

        if($from_dt==$dt && $to_dt==$dt)
        {
           $array=array('o_date'=>$dt,'f_id'=>$session->cus_id);
        }
        else if($from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt,'f_id'=>$session->cus_id);           
        }
        else if($from_dt!=$dt && $to_dt!=$dt)
        {
          $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt,'f_id'=>$session->cus_id); 
        }
          
            
            $this->db->where($array);
            $this->db->group_by('o_date');
            $this->db->from("forder");
            $query=$this->db->get();
            return $query->num_rows();
    }
    public function get_order_det($limit,$start,$from_dt,$to_dt,$session)
    {
        $array=array();
        $dt=date('Y-m-d');

        if($from_dt==$dt && $to_dt==$dt)
        {
           $array=array('o_date'=>$dt,'f_id'=>$session->cus_id);
        }
        else if($from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt,'f_id'=>$session->cus_id);           
        }
        else if($from_dt!=$dt && $to_dt!=$dt)
        {
          $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt,'f_id'=>$session->cus_id); 
        }
       
        $this->db->limit($limit, $start);
        $this->db->select("SUM(Quanitity) AS Total_quantity,SUM(total) AS Total_Price,f_id,o_date,Book_name,Status,Admin_Remark,adm_ord_state,disp_no");
        $this->db->where($array);
        $this->db->group_by('o_date');
        $this->db->from("forder");
        $query=$this->db->get();
        
        if($query->num_rows() > 0)
        {
          foreach ($query->result() as $row) {
                  $data[] = $row;
              }
              return $data;
         }     
    }
    public function get_ord_det_count($odate,$fid)
    {
        $this->db->where(array('f_id'=>$fid,'o_date'=>$odate));
        $this->db->from("forder");
        $query=$this->db->get();
        return $query->num_rows(); 
    }

    public function get_ord_det_admin($start,$odate,$fid)
    {
        
        $start=intval($start-1)*10;
        $limit=10;

        $this->db->where(array('f_id'=>$fid,'o_date'=>$odate));
        $this->db->from("forder");
        $this->db->limit($limit,$start);
        $query=$this->db->get();
        foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
    }

          

    public function get_ord_det($odate,$fid)
    {
        $query=$this->db->get_where('forder',array('f_id'=>$fid,'o_date'=>$odate));

        return $query->result_array();

    }

    
     public function get_ord_det1($odate,$fid)
    {
        $query=$this->db->get_where('demoorder',array('f_id'=>$fid,'o_date'=>$odate));

        return $query->result_array();

    } 
    public function order_delete($oid)
    {
        $query1=$this->db->get_where('forder',array('O_Id'=>$oid)); 
        $res=$query1->result_array();
        foreach($res as $r)
        {
           $st_nm=$r['stud_name'];
           $fid=$r['f_id'];
        }
        
        $this->db->set('O_Status',0);
        $this->db->where(array('f_id'=>$fid,'name'=>$st_nm));
        $this->db->update('admission');
        
        $this->db->where(array('O_Id'=>$oid));
        $query=$this->db->delete('forder');
         

        
  
        if($query)
        {
           return true;
        }
        else
        {
           return false;
        }
    }
    public function order_update($data,$order_id,$fid,$session)
    {
        $ooid=$order_id['oid'];

        $O_Id=$data['ooid'];
        $sname=$data['student_name'];
        $cname=$data['course_name']; 
        $pr=$data['price'];
        $qt=$data['quantity'];
        $t=$data['total'];
        $f_id=$session->cus_id;
        $fname=$session->institute_name;
        $dt=date('Y-m-d');
        $status="Pending";
        $book=$data['Book_Name'];
        
        for($i=0; $i < count($ooid); $i++) {
           
           $order[$i]['O_Id']=$O_Id[$i];
           $order[$i]['f_id']=$f_id;
           $order[$i]['stud_name']=$sname[$i];
           $order[$i]['Customer_name']=$fname;
           $order[$i]['course_name']=$cname[$i];
           $order[$i]['Quanitity']=$qt[$i];
           $order[$i]['price']=$pr[$i];
           $order[$i]['total']=$t[$i];
           $order[$i]['o_date']=$dt;
           $order[$i]['Status']=$status;

           //$ord[$i]['O_Id']=$ooid[$i];
        } 
         $this->db->trans_start();
         $query=$this->db->update_batch('forder', $order, 'O_Id');
         $this->db->trans_complete();        
         return ($this->db->trans_status() === FALSE)? FALSE:TRUE;
        
    }
  public function getorderfran1($name) 
  {

         $query = $this->db->query("SELECT Customer_Name
              FROM forder
              WHERE Customer_Name LIKE '%".$name."%' 
              GROUP BY Customer_Name");
          echo json_encode($query->result_array());
  }
  public function status_change($dt,$fid,$status)
  {
     $this->db->where(array('f_id'=>$fid,'o_date'=>$dt));
     $this->db->set("Status",$status);
     $query=$this->db->update('forder');
     if($query)
     {
       return true;
     }
     else
     {
        return false;
     }
  }

  public function stud_course_det1($stud_id,$f_id)
  {
      $query=$this->db->get_where('admission',array('f_id'=>$f_id,'name'=>$stud_id));
      return $query->result_array();
  }
  public function stud_course_det2($stud_id,$f_id)
  {
      $query=$this->db->get_where('admission',array('f_id'=>$f_id,'name'=>$stud_id));
      $result=$query->result_array();
      $course=$result[0]['course_Name'];
      
      $query2=$this->db->get_where('customers_info',array('cus_id'=>$f_id));
      $result1=$query2->result_array();
      $st_id=$result1[0]['state'];

      $query2=$this->db->get_where('state',array('state_id'=>$st_id));
      $result1=$query2->result_array();
      $st_nm=$result1[0]['name'];
      
      if($st_nm=="Maharashtra")
      {
            $this->db->Select("book_name,lprice As Price");
            $query=$this->db->get_where('book',array('Course_name'=>$course));
            return $query->result_array(); 
      }
      else
      {
            $this->db->Select('book_name,oprice As Price');
            $query=$this->db->get_where('book',array('Course_name'=>$course));
            return $query->result_array(); 
      }
     
      
  }
  
  public function pdf_by_cat($from_dt,$to_dt,$fnm)
  {
        $array=array();
        $dt=date('Y-m-d');
        if($from_dt==$dt && $to_dt==$dt && $fnm!="")
        {
            $array=array('Customer_Name'=>$fnm);
        }
        else if($from_dt!=$dt && $to_dt==$dt && $fnm!="")
        {
            $array=array('o_date'=>$from_dt,'Customer_Name'=>$fnm); 
        }
		else if($from_dt==$dt && $to_dt!=$dt && $fnm!="")
        {
            $array=array('o_date'=>$to_dt,'Customer_Name'=>$fnm); 
        }
		else if($from_dt!=$dt && $to_dt!=$dt && $fnm=="")
        {
            $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt); 
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $fnm!="")
        {
            $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt,'Customer_Name'=>$fnm);
        }
        else if($from_dt==$dt && $to_dt==$dt && $fnm=="")
        {
            $array=array();
        }
        if(!empty($array))
        {
            $this->db->select("Quanitity,price,total,f_id,o_date,course_name,Book_Name,stud_name,Status,disp_no,Customer_Name");
            $this->db->where($array);
            $this->db->from("forder");
            $query=$this->db->get();
            $result['data']=$query->result_array();
        }
        else{

            $this->db->select("Quanitity,price,total,f_id,o_date,course_name,Book_Name,stud_name,Status,disp_no,Customer_Name");
            $this->db->from("forder");
            $query=$this->db->get(); 
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
     foreach($result['data'] as $d)
        { 
	 
    $pdf->SetFont('Arial','B',10); 
    $htmlTable='<TABLE>
    <TR>
    <TD>Franchisee Name:</TD>
    <TD>'.$d['Customer_Name'].'</TD>
    </TR>
    <TR>
    <TD>Student Name:</TD>
    <TD>'.$d['stud_name'].'</TD>
    </TR>
    <TR>
    <TD>Course Name</TD>
    <TD>'.$d['course_name'].'</TD>
    </TR>
    <TR>
    <TD>Book Name:</TD>
    <TD>'.$d['Book_Name'].'</TD>
    </TR>
    <TR>
    <TD>Price:</TD>
    <TD>'.$d['price'].'</TD>
    </TR>
    <TR>
    <TD>Quantity:</TD>
    <TD>'.$d['Quanitity'].'</TD>
    </TR>
    <TR>
    <TD>Total:</TD>
    <TD>'.$d['total'].'</TD>
    </TR>
    </TABLE>';
    $pdf->WriteHTML2("<br><br><br>$htmlTable");
        }

    $pdf->Output("Details.pdf",'D');
  }
  
  public function Excel_by_cat($from_dt,$to_dt,$fnm)
  {
        $array=array();
        $dt=date('Y-m-d');
        if($from_dt==$dt && $to_dt==$dt && $fnm!="")
        {
                $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                          From forder  where Customer_Name='".$fnm."'   ";
                  
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
                
                $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
        }
        else if($from_dt!=$dt && $to_dt==$dt && $fnm!="")
        {
                 $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                           From forder where o_date='".$from_dt."' AND Customer_Name='".$fnm."'   ";
                  
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
                
                $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
        }
		else if($from_dt==$dt && $to_dt!=$dt && $fnm!="")
        {
                 $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                           From forder where o_date='".$to_dt."' AND Customer_Name='".$fnm."'   ";
                  
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
                
                $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
        }
		else if($from_dt!=$dt && $to_dt!=$dt && $fnm=="")
        {
                 $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                           From forder where o_date='".$from_dt."' AND o_date='".$to_dt."' ";
                  
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
                
                $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $fnm!="")
        {
                $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                          From forder  where o_date >='".$from_dt."' AND o_date <='".$to_dt."' AND Customer_Name='".$fnm."'   ";
                  
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
                
                $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
        }
        else if($from_dt!=$dt && $to_dt==$dt && $fnm=="")
        {
               $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                          From forder  where o_date='".$from_dt."' ";
                 
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
                
                $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
        }
        else if($from_dt==$dt && $to_dt==$dt && $fnm=="")
        {
              $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                      From forder ";
               
                  
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
                
                   $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
        }
      else if($from_dt==$dt && $to_dt=="" && $fnm=="")
        {
              $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                      From forder ";
               
                  
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
                
                   $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
        }
  }

  public function singleExcel($id,$odate)
  {
      $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                      From forder where f_id='".$id."' AND o_date='".$odate."' ";
               
                  
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
                
                   $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
  }
   
  public function singlepdf($fid,$odate)
  {
     

      $this->db->select("Quanitity,price,total,f_id,o_date,course_name,Book_Name,stud_name,Status,disp_no,Customer_Name");
      $this->db->where(array('f_id'=>$fid,'o_date'=>$odate));
      $this->db->from("forder");
      $query=$this->db->get(); 
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
    <TD>Franchisee Name:</TD>
    <TD>'.$d['Customer_Name'].'</TD>
    </TR>
    <TR>
    <TD>Student Name:</TD>
    <TD>'.$d['stud_name'].'</TD>
    </TR>
    <TR>
    <TD>Course Name</TD>
    <TD>'.$d['course_name'].'</TD>
    </TR>
    <TR>
    <TD>Book Name:</TD>
    <TD>'.$d['Book_Name'].'</TD>
    </TR>
    <TR>
    <TD>Price:</TD>
    <TD>'.$d['price'].'</TD>
    </TR>
    <TR>
    <TD>Quantity:</TD>
    <TD>'.$d['Quanitity'].'</TD>
    </TR>
    <TR>
    <TD>Total:</TD>
    <TD>'.$d['total'].'</TD>
    </TR>
    </TABLE>';
    $pdf->WriteHTML2("<br><br><br>$htmlTable");
        }

    $pdf->Output("Details.pdf",'D');
  }

  public function get_fran_excel_cat($fromdate,$todate,$session)
  {
       $dt=date('Y-m-d');
       if($fromdate==$dt && $todate==$dt)
       {
              $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                      From forder where f_id='".$session->cus_id."' ";
               
                  
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
                
                   $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
       }
       else if($fromdate!=$dt && $todate==$dt)
       {
              $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                      From forder where o_date >='".$fromdate."' AND o_date <= '".$todate."' AND f_id='".$session->cus_id."' ";
               
                  
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
                
                   $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
       }
       else if($fromdate!=$dt && $todate!=$dt)
       {
              $query = "Select Customer_Name AS Franchisee_Name,stud_name AS Sudent_Name,course_name AS Course_Name,Book_Name AS Book_Name,price AS Price,Quanitity AS Quantity,total AS Total 
                      From forder where o_date >='".$fromdate."' AND o_date <= '".$todate."' AND f_id='".$session->cus_id."' ";
               
                  
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
                
                   $filename="Details.xls";

                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: attachment;filename=".$filename);
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    print "$header\n$data";
       }
  }
  
  public function get_fran_pdf_cat($from_dt,$to_dt,$session)
  {
       $array=array();
        $dt=date('Y-m-d');
        if($from_dt==$dt && $to_dt==$dt)
        {
            $array=array('f_id'=>$session->cus_id);
        }
        else if($from_dt!=$dt && $to_dt==$dt)
        {
            $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt,'f_id'=>$session->cus_id); 
        }
        else if($from_dt!=$dt && $to_dt!=$dt)
        {
            $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt,'f_id'=>$session->cus_id); 
        }
        else if($from_dt==$dt && $to_dt==$dt && $fnm=="")
        {
            $array=array();
        }
     
            $this->db->select("Quanitity,price,total,f_id,o_date,course_name,Book_Name,stud_name,Status,disp_no,Customer_Name");
            $this->db->where($array);
            $this->db->from("forder");
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
    <TD>Franchisee Name:</TD>
    <TD>'.$d['Customer_Name'].'</TD>
    </TR>
    <TR>
    <TD>Student Name:</TD>
    <TD>'.$d['stud_name'].'</TD>
    </TR>
    <TR>
    <TD>Course Name</TD>
    <TD>'.$d['course_name'].'</TD>
    </TR>
    <TR>
    <TD>Book Name:</TD>
    <TD>'.$d['Book_Name'].'</TD>
    </TR>
    <TR>
    <TD>Price:</TD>
    <TD>'.$d['price'].'</TD>
    </TR>
    <TR>
    <TD>Quantity:</TD>
    <TD>'.$d['Quanitity'].'</TD>
    </TR>
    <TR>
    <TD>Total:</TD>
    <TD>'.$d['total'].'</TD>
    </TR>
    </TABLE>';
    $pdf->WriteHTML2("<br><br><br>$htmlTable");
        }

    $pdf->Output("Details.pdf",'D');
  }

  


 /**************Code For Payment Gateway Start************************/

  public function get_franch_details($fid)
  {
      $query=$this->db->get_where('customers_info',array('cus_id'=>$fid));
      return $query->result_array();
  }
  
  public function get_tmp_Order_details($fid)
  {
     $dt=date('Y-m-d');
     $this->db->select('sum(price) as Tot_price');
     $this->db->where(array('f_id'=>$fid,'o_date'=>$dt));
     $this->db->from('tmp_order');
     $query=$this->db->get();
     return $query->result_array();
  }

 public function get_tmp_Order_details1($fid,$dt)
 {
     
     $this->db->select('sum(price) as Tot_price');
     $this->db->where(array('f_id'=>$fid,'o_date'=>$dt));
     $this->db->from('tmp_order');
     $query=$this->db->get();
     return $query->result_array();
 }

 public function get_ref_no_details()
 {
   $row = $this->db->query('SELECT MAX(id) AS maxid FROM payment_history')->row();
  
   $maxid = $row->maxid; 
   if($maxid==0)
   {
      $maxid=1; 
   }
   else
   {
       $maxid=intval($maxid+1);
   }
   return $maxid;
 }

 public function paid_data_save($data,$fid,$status)
 {
     $dt=date('Y-m-d');
     if($status=="Transaction Successful")
     {
       
          $this->db->insert('payment_history',$data);
       
     }
     else
     {
        return false;
     }     
 }

 public function dele_from_tmp($fid,$status)
 {
     $dt=date('Y-m-d');
     if($status=="Transaction Successful")
     { 
         $count=0;
         $cnt=0;
         $this->db->select('o_date,f_id,stud_name,Customer_Name,course_name,Quanitity,price,total,new_ord_stat');
         $this->db->where(array('f_id'=>$fid,'o_date'=>$dt));
         $this->db->from('tmp_order');
         $query=$this->db->get();
         $result=$query->result();
         $count=count($result);

         foreach($result as $res)
         {
             
             $this->db->set('O_Status',1);
             $this->db->where(array('name'=>$res->stud_name,'f_id'=>$fid));
             $this->db->update('admission'); 
            
             $this->db->insert('forder',$res);
             $cnt++;
         }
         if($cnt==$count)
         {
            $this->db->where(array('f_id'=>$fid,'o_date'=>$dt));
            $del_query=$this->db->delete('tmp_order');
            if($del_query)
            {
               return true;
            }
            else
            {
               return false;
            }
         }
         
     }
     else
     {
        die("Error");
        return false;

     }    
 }

 public function dele_from_tmp1($fid,$dt,$status)
 {

     if($status=="Transaction Successful")
     { 
         $count=0;
         $cnt=0;
         $this->db->select('o_date,f_id,stud_name,Customer_Name,course_name,Quanitity,price,total,new_ord_stat');
         $this->db->where(array('f_id'=>$fid,'o_date'=>$dt));
         $this->db->from('tmp_order');
         $query=$this->db->get();
         $result=$query->result();
         $count=count($result);

         foreach($result as $res)
         {
             
             $this->db->set('O_Status',1);
             $this->db->where(array('name'=>$res->stud_name,'f_id'=>$fid));
             $this->db->update('admission'); 
            
             $this->db->insert('forder',$res);
             $cnt++;
         }
         if($cnt==$count)
         {
            $this->db->where(array('f_id'=>$fid,'o_date'=>$dt));
            $del_query=$this->db->delete('tmp_order');
            if($del_query)
            {
               return true;
            }
            else
            {
               return false;
            }
         }
         
     }
     else
     {
        die("Error");
        return false;

     }
 }

 public function get_pendings($fid)
 {
    //$this->db->limit($limit, $start);
    $this->db->select("SUM(Quanitity) AS Total_quantity,SUM(total) AS Total_Price,f_id,o_date,Book_name,Status,Admin_Remark,adm_ord_state,disp_no");
    $this->db->where('f_id',$fid);
    $this->db->group_by('o_date');
    $this->db->from("tmp_order");
    $query=$this->db->get();
    return $query->result_array();
 }

 public function get_ord_det_pend($odate,$fid)
    {
        $query=$this->db->get_where('tmp_order',array('f_id'=>$fid,'o_date'=>$odate));

        return $query->result_array();

    } 

    public function del_pend_order($id,$dt)
    {
        $this->db->where(array('f_id'=>$id,'o_date'=>$dt));
        $query=$this->db->delete('tmp_order');
        if($query)
        {
           return true;
        }
        else
        {
           return false;
        }
    }
    
    public function order_delete_single($id)
    {
        $this->db->where('O_Id',$id);
        $query=$this->db->delete('tmp_order');
        if($query)
        {
           return true;
        }
        else
        {
           return false;
        }  
    }


public function Delete_Multiple_Record($id,$dt1)
	{
		$this->db->where(array('f_id'=>$id,'o_date'=>$dt1));
		$query=$this->db->delete('forder');
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}



/**************Code For Payment Gateway Start************************/










}
