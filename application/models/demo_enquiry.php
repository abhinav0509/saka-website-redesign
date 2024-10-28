<?php
class Demo_Enquiry extends CI_Model{
function __construct() {
parent::__construct();
}
function Insert_Data($data,$data1)
	{
		$this->load->database();
		$query=$this->db->insert('franchisee',$data);
		$query1=$this->db->insert('userlogin',$data1);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}


public function Fran_Data_Enquiry_Save($data1)
{

		$this->load->database();
		$query=$this->db->insert('demoenquiry',$data1);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}

}	
	

public function Fran_Data_Enquiry_Update($data1,$up_id)
{

		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('demoenquiry', $data1); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}
/*
public function Fran_Daily_Enquiry_Update($data,$up_id)
{
        $this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('enquiry', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}
*/	
public function dele($a)
{
		$this->load->database();
		$this->db->where('id',$a); 
		$query=$this->db->delete('demoenquiry');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}


public function dele1($a)
{
		$this->load->database();
		$this->db->where('id',$a); 
		$query=$this->db->delete('demoadmission');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}
	
/*
public function fran_place_update($data,$up_id)
	{
		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('fran_placement', $data); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
*/	
	
	function Demo_Admission($data)
	{
		$this->load->database();
		$query=$this->db->insert('demoadmission',$data);
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	
	
	public function Update_Demo_Admiossion($data1,$up_id)
{
		$this->load->database();
		$this->db->where('id', $up_id);
		$query=$this->db->update('demoadmission', $data1); 
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
}
public function getAddmissionstud($name,$session)
{
	$query = $this->db->query("SELECT name
	            FROM demoadmission
	            WHERE name LIKE '%".$name."%' 
	            GROUP BY name");
	        echo json_encode($query->result_array());
}	

public function getdata($term)
	{
		$query = $this->db->query("SELECT stud_name
	            FROM demoenquiry
	            WHERE stud_name LIKE '%".$term."%'
	            GROUP BY stud_name");
	        echo json_encode($query->result_array());
	}
	
	 public function count_enquery($session,$from_dt,$to_dt,$sname,$cname)
        {
        	$dt=date("Y-m-d");
				$array=array();
				if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					
					$array=array('fid'=>$session->cus_id,'enq_date'=>$dt);
				}
				
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'stud_name'=>$sname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'stud_name'=>$sname);
				}
				else if($from_dt!=$dt && $to_dt!="" && $sname=="" && $cname!="")
				{
					
					$array=array('fid'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$cname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'course'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt);
				}
		    $this->load->database();
			$this->db->where($array);
			$query=$this->db->get("demoenquiry");
			return $query->num_rows();
		}
	
		public function daliy_enquiry($limit,$start,$session,$from_dt,$to_dt,$sname,$cname)
		{
				$dt=date("Y-m-d");
				$array=array();
				if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id);
				}
				
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'stud_name'=>$sname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'stud_name'=>$sname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'course'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!="" && $sname=="" && $cname!="")
				{
					
					$array=array('fid'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt,'course'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'enq_date >='=>$from_dt,'enq_date <='=>$to_dt);
				}
				   					
   					
			        $this->db->where($array);
			        $this->db->limit($limit, $start);
			        $this->db->order_by('enq_date','desc');
			        $query=$this->db->get("demoenquiry"); 
			        if ($query->num_rows() > 0) {
			            foreach ($query->result() as $row) {
			                $data[] = $row;
			            }
			            return $data;
			        }
			        return false;
			     
 		} 
		
		 public function count_enquery1($session,$from_dt,$to_dt,$sname,$cname)
        {
        	$dt=date("Y-m-d");
				$array=array();
				if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					
					$array=array('fid'=>$session->cus_id,'course_date'=>$dt);
				}
				
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
				else if($from_dt!=$dt && $to_dt!="" && $sname=="" && $cname!="")
				{
					
					$array=array('fid'=>$session->cus_id,'course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'course_Name'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'course_date >='=>$from_dt,'course_date <='=>$to_dt);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'course_date >='=>$from_dt,'course_date <='=>$to_dt);
				}

				else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname!="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
		    $this->load->database();
			$this->db->where($array);
			$query=$this->db->get("demoadmission");
			return $query->num_rows();
		}
	
		
		public function daliy_enquiry1($limit,$start,$session,$from_dt,$to_dt,$sname,$cname)
		{
				$dt=date("Y-m-d");
				$array=array();
				if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id);
				}
				
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
				else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'course_Name'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!="" && $sname=="" && $cname!="")
				{
					
					$array=array('fid'=>$session->cus_id,'course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'course_date >='=>$from_dt,'course_date <='=>$to_dt);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname=="" && $cname=="")
				{
					$array=array('fid'=>$session->cus_id,'course_date >='=>$from_dt,'course_date <='=>$to_dt);
				}
				
				else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
				else if($from_dt!=$dt && $to_dt==$dt && $sname!="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
				else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname!="")
				{
					$array=array('fid'=>$session->cus_id,'name'=>$sname);
				}
				
   					
   					
			        $this->db->where($array);
			        $this->db->limit($limit, $start);
			        $this->db->order_by('course_date','desc');
			        $query=$this->db->get("demoadmission"); 
			        if ($query->num_rows() > 0) {
			            foreach ($query->result() as $row) {
			                $data[] = $row;
			            }
			            return $data;
			        }
			        return false;
			     
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
        $book=$data['Book_Name'];
        
        for($i=0; $i < count($sname); $i++) {
           
           $order[$i]['f_id']=$f_id;
           $order[$i]['stud_name']=$sname[$i];
           $order[$i]['Customer_name']=$fname;
           $order[$i]['course_name']=$cname[$i];
           $order[$i]['Book_Name']=$book[$i];
           $order[$i]['Quanitity']=$qt[$i];
           $order[$i]['price']=$pr[$i];
           $order[$i]['total']=$t[$i];
           $order[$i]['o_date']=$dt;
           $order[$i]['Status']=$status;
		   
		   $order1[$i]['O_Status']=1;
		   $order1[$i]['name']=$sname[$i];
        }	
       $query=$this->db->insert_batch('demoorder', $order);
	   
	   $this->db->update_batch('demoadmission', $order1,'name');
       if($query)
       {
       	   return true;
       } 
       else
       {
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
            $this->db->from("demoorder");
            $query=$this->db->get();
            return $query->num_rows();
    }
    public function get_order_det($limit,$start,$from_dt,$to_dt,$session)
    {
        $array=array();
        $dt=date('Y-m-d');

		//print_r($session);
		//die();



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
        $this->db->select("SUM(Quanitity) AS Total_quantity,SUM(total) AS Total_Price,f_id,o_date,Book_name,Status,disp_no,Admin_Remark");
        $this->db->where($array);
        $this->db->group_by('o_date');
        $this->db->from("demoorder");
        $query=$this->db->get();
        
        if($query->num_rows() > 0)
        {
          foreach ($query->result() as $row) {
                  $data[] = $row;
              }
              return $data;
         }     
    }
		
		
	public function save_new_fran($data,$data1,$data2,$email)
{
     
     $query1=$this->db->get_where('democustomer',array('email'=>$email));
     if($query1->num_rows() > 0)
     {
             return false;        
     } 
     else
     {

		     $this->db->insert('democustomer',$data);
		     $query=$this->db->get_where('democustomer',array('email'=>$email));
		     $result=$query->result_array();
		     foreach($result as $res)
		     {
		     	$id=$res['cus_id'];
		     } 

		     $data1['cus_id']=$id;
		     $data2['f_id']=$id;
		     $this->db->insert('locations',$data2);
		     if($this->db->insert('democustomerinfo',$data1))
		     {
		     	return true;
		     }		     
		     else
		     {
		     	return false;
		     }
	 }      	     
}		
		
		
public function fran_update($data,$data1,$cus_id)
{
	$this->db->where('cus_id', $cus_id);
    $query1=$this->db->update('democustomer', $data);
    if($query1)
    {
         $this->db->where('cus_id', $cus_id);
	     $query2=$this->db->update('democustomerinfo', $data1);
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
		
public function del_act_fran($a)
	{
		$this->db->where('cus_id',$a); 
		$query=$this->db->delete('democustomer');

		$this->db->where('cus_id',$a); 
		$query1=$this->db->delete('democustomerinfo');
		if($query1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
		
	public function getdata1($term)
	{
		$query = $this->db->query("SELECT stud_name
	            FROM demoenquiry
	            WHERE stud_name LIKE '%".$term."%'
	            GROUP BY stud_name");
	        echo json_encode($query->result_array());
	}	

	public function getdata2($term)
	{
		$query = $this->db->query("SELECT Franchisee_Name
	            FROM demoenquiry
	            WHERE Franchisee_Name LIKE '%".$term."%'
	            GROUP BY Franchisee_Name");
	        echo json_encode($query->result_array());
	}	

	public function stud_res($session)
    {
         $this->db->select('name');
         $query=$this->db->get_where('demoadmission',array('fid'=>$session->cus_id,'O_Status'=>0));
         return $query->result_array();

    }

public function course_res()
    {
    	 $this->db->select('Course_Name');
       $query=$this->db->get('course');
       return $query->result_array();
    }
	
	public function Add_Admin_Remark($dt,$id,$data)
	{
			$this->load->database();
			$this->db->where(array('f_id'=>$id, 'o_date'=>$dt));
			$query=$this->db->update('demoorder', $data); 
			if($query)
			{
		 		return true;
			}
				else
			{
				return false;
			}
	}
	
	
	public function getAddmissionstud1($name,$session)	
	{

	       $query = $this->db->query("SELECT name
	            FROM demoadmission
	            WHERE name LIKE '%".$name."%' And fid='".$session->cus_id."'
	            GROUP BY name");
	        echo json_encode($query->result_array());
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
	
		public function dele2($a)
		{
		$this->load->database();
		$this->db->where('id',$a); 
		$query=$this->db->delete('demoadmission');
		if($query)
		{
		 return true;
		}
		else
		{
		return false;
		}
	}
	
	
	
	public function adm_enq_remark_update($id,$remark)
{
	 $this->db->set(array('remark'=>$remark,'adm_rem_state'=>'unread'));
	 $this->db->where('id',$id);
	 $query=$this->db->update('demoenquiry');
     if($query)
     {
     	 return true;
     }
     else
     {
     	return false;
     }
}


public function adm_enq_remark_update1($id,$remark)
{
	 $this->db->set(array('Admin_Remark'=>$remark,'adm_rem_state'=>'unread'));
	 $this->db->where('id',$id);
	 $query=$this->db->update('demoorder');
     if($query)
     {
     	 return true;
     }
     else
     {
     	return false;
     }
}
	
	
 public function Add_Admin_Remark1($dt,$id,$data)
  {
      $this->load->database();
      $this->db->where(array('f_id'=>$id, 'o_date'=>$dt));
      $query=$this->db->update('demoorder', $data); 
      if($query)
      {
        return true;
      }
        else
      {
        return false;
      }
  }	


/***********************************************PDF AND Excel *************************************************/



public function get_excel_cat($from_dt,$to_dt,$sname,$cname,$sid)
{
		$srr=array();
		$srr=str_replace(",","','",$sid);
	    $dt=date('Y-m-d');
        if($from_dt!="" && $to_dt!="" && $sname!="" && $cname!="" && $sid=="")
        {
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date >='".$from_dt."' And democustomer.date <='".$to_dt."' And democustomerinfo.state='".$sname."' And democustomerinfo.city='".$cname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date >='".$from_dt."' And democustomer.date <='".$to_dt."' And democustomerinfo.state='".$sname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date >='".$from_dt."' And democustomer.date <='".$to_dt."' And democustomerinfo.city='".$cname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date >='".$from_dt."' And democustomerinfo.state='".$sname."' And democustomerinfo.city='".$cname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date <='".$to_dt."' And democustomerinfo.state='".$sname."' And democustomerinfo.city='".$cname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomerinfo.state='".$sname."' And democustomerinfo.city='".$cname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date <='".$to_dt."' And democustomerinfo.city='".$cname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date <='".$to_dt."' And democustomerinfo.state='".$sname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date >='".$from_dt."' And democustomerinfo.state='".$sname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date >='".$from_dt."' And democustomerinfo.city='".$cname."' ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And democustomer.date >='".$from_dt."' And democustomer.date <='".$to_dt."' ";

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
		else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname!="" && $sid!="")
        {
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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
			
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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
		
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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
		 
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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
		 
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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
		 
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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
		
	   else if($from_dt=="" && $to_dt!="" && $sname=="" && $cname!="" && $sid!="")
	   {
		 
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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

			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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
		 
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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
		  
			$query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomerinfo.pincode As Pincode,democustomer.status As Franchisee_Status
	    	    from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id  And id in ('".$srr."') ";

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


 
public function get_pdf_cat($from_dt,$to_dt,$sname,$cname,$sid)
{
		$srr=array();
		$srr=explode(",",$sid);
	    $dt=date('Y-m-d');
	    $array=array();
       if($from_dt!="" && $to_dt!="" && $sname!="" && $cname!="" && $sid=="")
        {
           $array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt,'democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
		   $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
         else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="" && $sid=="")
        {
           $array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt,'democustomerinfo.state'=>$sname);
		   $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
         else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname!="" && $sid=="")
        {
           $array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt,'democustomerinfo.city'=>$cname);
		   $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
		else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname!="" && $sid=="")
        {
          $array=array('democustomer.date >='=>$from_dt,'democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
		  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
        else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname!="" && $sid=="")
        {
           $array=array('democustomer.date <='=>$to_dt,'democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
		   $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
        }
		 else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="" && $sid=="")
		 {
			  $array=array('democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
			  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname=="" && $cname!="" && $sid=="")
		 {
			  $array=array('democustomer.date <='=>$to_dt,'democustomerinfo.city'=>$cname);
			  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname=="" && $sid=="")
		 {
			  $array=array('democustomer.date <='=>$to_dt,'democustomerinfo.state'=>$sname);
			  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname=="" && $sid=="")
		 {
			  $array=array('democustomer.date >='=>$from_dt,'democustomerinfo.state'=>$sname);
			  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname!="" && $sid=="")
		 {
			  $array=array('democustomer.date >='=>$from_dt,'democustomerinfo.city'=>$cname);
			  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname=="" && $sid=="")
		 {
			  $array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt);
			  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where($array);
          $query=$this->db->get();
		  $result['data']=$query->result_array();
		 }
		 else  if($from_dt!="" && $to_dt!="" && $sname!="" && $cname!="" && $sid!="")
        {	
		  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
        }
        else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="" && $sid!="")
        {
               $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
        }
        else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname!="" && $sid!="")
        {
           $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
        }
        else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname!="" && $sid!="")
        {
            $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
        }
        else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname!="" && $sid!="")
        {
            $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
        }
		 else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="" && $sid!="")
		 {
			   $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname=="" && $cname!="" && $sid!="")
		 {
			 $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
		 }
		 else if($from_dt=="" && $to_dt!="" && $sname!="" && $cname=="" && $sid!="")
		 {
			   $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname!="" && $cname=="" && $sid!="")
		 {
			  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
		 }
		 else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname!="" && $sid!="")
		 {
			  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
		  $result['data']=$query->result_array(); 
		 }
		else if($from_dt!="" && $to_dt!="" && $sname=="" && $cname=="" && $sid!="")
		 {
		  $this->db->select('democustomer.fran_id,democustomer.fname,democustomer.status,democustomerinfo.pincode As Pincode,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where_in('id',$srr);
          $query=$this->db->get();
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
		else{
			$htmlTable = "<br>NO Data Available</br>";
			$pdf->WriteHTML2("<br>$htmlTable");
		}

		$pdf->Output('Franch_Details.pdf','D');
}
 
  
  
public function pdf_single($id)
{
          $this->db->select('democustomer.cus_id,democustomer.fname,democustomer.status,democustomer.password,democustomerinfo.address,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
          $this->db->from('democustomer');
          $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
          $this->db->join('state', 'democustomerinfo.state = state.state_id');
          $this->db->join('city', 'democustomerinfo.city = city.city_id');
          $this->db->where(array('democustomer.cus_id'=>$id));
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
	//echo $id;
	//echo $name;
	//die();
	 $query = "select democustomer.cus_id As Franchisee_Id,democustomer.fname As Owner_Name,democustomerinfo.institute_name As Franchisee_Name,democustomerinfo.cus_mobile As Mobile,democustomerinfo.femail As Email,state.name As State,city.name As City,democustomerinfo.address As Address,democustomer.status As Franchisee_Status  from democustomer,democustomerinfo,state,city where democustomer.cus_id = democustomerinfo.cus_id And democustomerinfo.state=state.state_id And democustomerinfo.city=city.city_id And democustomer.cus_id='".$id."' ";
 	    
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























  public function Get_all_cat_excel($fdate,$todate,$fnm,$sid)     
	{
		$srr=array();
		$srr=str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where id in ('".$srr."') ";
		}
		else
		{
		  $query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where enq_date >='$fdate' AND enq_date<='$todate' AND Franchisee_Name='".$fnm."' ";
		}
 	///die();
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
	
	
	
	public function Get_today_excel($fdate,$todate,$fnm,$sid)
	{
		$srr=array();
		$srr=str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where id in ('".$srr."') ";
		}
		else
		{
		$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where enq_date >='$fdate' AND enq_date<='$todate' AND Franchisee_Name='".$fnm."' ";
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
		
	
  public function Get_by_fran_excel($fnm)	 
	{
		$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where Franchisee_Name='".$fnm."' ";
 	
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
	  
	    public function Get_fran_all_excel($fdate,$todate,$sid)
    {
		$srr=array();
		$srr=str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where id in ('".$srr."') ";
		}
		else
		{
    	$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where enq_date >='$fdate' AND enq_date<='$todate' ";
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
		
		$filename="AllEnquiries.xls";

        header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";	
    }
  
  
  public function Get_fran_all_today_excel($fromdt)
    {
         $query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where enq_date='".$fromdt."' ";
 	
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


public function Get_date_excel($newfdate,$newtdate,$sid)
    {
		$srr=array();
		$srr=str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where id in ('".$srr."') ";
		}
		else
		{
    	 $query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where enq_date >='$newfdate' AND enq_date<='$newtdate' ";
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

	
public function Get_all_excel($newfdate,$newtdate,$fnm,$sid)
    {
		$srr=array();
		$srr=str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where id in ('".$srr."') ";
		}
		else
		{
    	 $query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where enq_date >='$newfdate' AND enq_date<='$newtdate' AND Franchisee_Name='".$fnm."' ";
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
	

public function Get_cat_excel($newtdate,$fnm,$sid)
    {
		$srr=array();
		$srr=str_replace(",","','",$sid);
		if($sid!="")
		{
			$query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where id in ('".$srr."') ";
		}
		else
		{
    	 $query = "SELECT fid as Franchisee_Id,Franchisee_Name as Franchise_Name,stud_name as Student_Name,enq_date as Enquiry_Date,course as Interested_Course,contact as Student_Contact,email as Student_Email
	    from demoenquiry where enq_date<='$newtdate' AND Franchisee_Name='".$fnm."' ";
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
	
	
	
	/*************************Enquiry PDF******************************/
	
	
    /**********************Franchisee Enquiry pdf start**************************************/

    public function Get_all_cat_pdf($fromdt,$todt,$fnm,$sid) 
    {
		$srr=array();
		$srr=explode(",",$sid);
		$dt=date('Y-m-d');
		if($sid!="")
		{
			 $this->db->where_in('id',$srr);
		}
		else{
    	 $this->db->where('enq_date >=', $fromdt);
		 $this->db->where('enq_date <=', $todt);
		 $this->db->where(array('Franchisee_Name'=>$fnm));
		}
		 $query=$this->db->get('demoenquiry');
		 $result['data']=$query->result_array();

		$this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);
        
		$filename = "Franchisse_list.pdf";
            

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
		}
		else{
			$htmlTable = "NO Data Available";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output($filename,'D');

    }

  public function Get_today_pdf($fdt,$fnm,$sid)
  {
		$srr=array();
		$srr=explode(",",$sid);
		$dt=date('Y-m-d');
		if($sid!="")
		{
			 $this->db->where_in('id',$srr);
		}
		else{        
         $this->db->where(array('enq_date'=>$fdt,'Franchisee_Name'=>$fnm));
		}
		 $query=$this->db->get('demoenquiry');
		 $result['data']=$query->result_array(); 

        $this->load->view('WriteHTML');
		$logo=base_url()."Style/images/logo.jpg";
        $pdf=new PDF_HTML();

		$pdf->AliasNbPages();
		$pdf->SetAutoPageBreak(true, 15);
       if(count($result['data'])>0){
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
	   }
	   else{
		   $htmlTable = "No Data Available";
		   $pdf->WriteHTML2("<br><br><br>$htmlTable");
	   }

		$pdf->Output("Franchisse_list.pdf",'D');
  }

   public function Get_by_fran_pdf($fnm,$sid)
   {
	   $srr=array();
		$srr=explode(",",$sid);
		$dt=date('Y-m-d');
		if($sid!="")
		{
			 $this->db->where_in('id',$srr);
		}
		else{ 
   	   $this->db->where(array('Franchisee_Name'=>$fnm));
		}
		 $query=$this->db->get('demoenquiry');
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
		}
		else{
			$htmlTable = "No Data Available";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output("Franchisse_list.pdf",'D');
   }
   
   public function Get_fran_all_pdf($sid)
   {
	   $srr=array();
		$srr=explode(",",$sid);
		$dt=date('Y-m-d');
		if($sid!="")
		{
			 $this->db->where_in('id',$srr);
		}
		else{ 
		}
   	      //$this->db->where(array('Franchisee_Name'=>$fnm));
		 $query=$this->db->get('demoenquiry');
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
		}
		else{
			$htmlTable = "NO Data Available";
		$pdf->WriteHTML2("<br><br><br>$htmlTable");	
		}

		$pdf->Output("Franchisse_list.pdf",'D');
   }

   public function Get_fran_all_today_pdf($newfdate,$sid)
   {
	   $srr=array();
		$srr=explode(",",$sid);
		$dt=date('Y-m-d');
		if($sid!="")
		{
			 $this->db->where_in('id',$srr);
		}
		else{ 
   	     $this->db->where(array('enq_date'=>$newfdate));
		}
		 $query=$this->db->get('demoenquiry');
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
		}
		else{
			$htmlTable = "NO Data Available";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output("Franchisse_list.pdf",'D');
   }
   
   public function Get_date_pdf($newfdate,$newtdate,$sid)
   {
	   $srr=array();
		$srr=explode(",",$sid);
		$dt=date('Y-m-d');
		if($sid!="")
		{
			 $this->db->where_in('id',$srr);
		}
	   else
	   {
   	     $this->db->where('enq_date >=', $newfdate);
		 $this->db->where('enq_date <=', $newtdate);
		 $query=$this->db->get('demoenquiry');
	   }
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
		}
		else{
			$htmlTable = "No Data Available";
			$pdf->WriteHTML2("<br><br><br>$htmlTable");
		}

		$pdf->Output("Franchisse_list.pdf",'D');
   }

	
	
	
public function get_single_fran_enquiry_excel($regid,$name)
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
		$pdf->WriteHTML2("<br><br><br><br><br>$htmlTable");
		$pdf->Output($result[0]['stud_name'].'.pdf','D');
	}

	

}
?>