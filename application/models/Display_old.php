<?php
class Display extends CI_Model{
function __construct() {
parent::__construct();
}

public function About_Display()
	{
	    $this->load->database();
		  return $this->db->count_all("about");
	}

  public function Get_user_details()
  {
     $query=$this->db->get('userlogin');
     return $query->result_array();
  }

  public function Insert_user($data)
  {
    $query=$this->db->insert('userlogin',$data);
    if($query)
    {
       return true;
    }
    else
    {
       return false;
    }
  }

  public function user_update($data,$up_id)
  {
     $this->db->where('id',$up_id);
     $query=$this->db->update('userlogin',$data);
     if($query)
     {
        return true;
     }
     else
     {
        return false;
     }
  }

  public function Userr_Delete($id)
  {
     $this->db->where('id',$id);
     $query=$this->db->delete('userlogin');
     if($query)
     {
        return true;
     }
     else
    {
        return false;
    }
  }

public function frn_admision_Display($cname,$from_dt,$to_dt,$sname)
{
        
        $array=array();
        if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_Name'=>$sname);
        }
        else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_Name'=>$sname);
        }
        else if($cname!="" && $from_dt!="" && $to_dt!="" && $sname=="")
        {
             $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
        }
        else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname!="")
        {
             $array=array('fran_Name'=>$sname,'course_Name'=>$cname);   
        }
        else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname=="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt);   
        }
        else if($cname=="" && $from_dt!="" && $to_dt=="" && $sname=="")
        {
             $array=array('course_date >='=>$from_dt);   
        }
        else
        {
            $dt=date('Y-m-d');
            $array=array('course_date'=>$dt);
        }
       
        $this->db->where($array);
        $query=$this->db->get('admission');
        return $query->num_rows();
       
}

public function getmax_id($session)
{
  $row = $this->db->query('SELECT MAX(ad_id) AS maxid FROM admission where f_id='.$session->cus_id.' ')->row();
  
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
	
public function About_Paging($limit, $start)
     {
        $this->db->limit($limit, $start);
        $query = $this->db->get("about");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }	
	



 function Enquiry_Display($cp,$fname,$from_date,$to_date)
    {
       
      $array=array();
      $dt=date("Y-m-d");

      if($from_date!=$dt && $to_date!="" && $fname!="" && $cp=="")
      {
         $array=array('enq_date >='=>$from_date,'enq_date <='=>$to_date,'Franchisee_Name'=>$fname);
      }  
      else if($from_date==$dt && $to_date==$dt && $fname!="" && $cp!="")
      {
         $array=array('Franchisee_Name'=>$fname,'stud_name'=>$cp);
      }
      else if($from_date!=$dt && $to_date==$dt && $fname!="" && $cp=="")
      {
         $array=array('enq_date'=>$from_date,'Franchisee_Name'=>$fname);
      }
      else if($from_date==$dt && $to_date==$dt && $fname!="" && $cp=="")
      {
         $array=array('Franchisee_Name'=>$fname);
      }
      else if($from_date!=$dt && $to_date==$dt && $fname!="" && $cp=="")
      {
         $array=array('enq_date >='=>$form_dt,'enq_date <='=>$to_date);
      }
      else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp=="")
      {
         $array=array('enq_date'=>$dt);
      } 
         //print_r($array);
         $this->db->where($array);
         $query = $this->db->get("enquiry");
         return $query->num_rows();
    }


public function Active_Fran_Enquiry_Display($limit, $start,$cp,$fname,$from_date,$to_date)
{
	    $array=array();
      $dt=date("Y-m-d");

      if($from_date!=$dt && $to_date!="" && $fname!="" && $cp=="")
      {
         $array=array('enq_date >='=>$from_date,'enq_date <='=>$to_date,'Franchisee_Name'=>$fname);
      }  
      else if($from_date==$dt && $to_date==$dt && $fname!="" && $cp!="")
      {
         $array=array('Franchisee_Name'=>$fname,'stud_name'=>$cp);
      }
      else if($from_date!=$dt && $to_date==$dt && $fname!="" && $cp=="")
      {
         $array=array('enq_date'=>$from_date,'Franchisee_Name'=>$fname);
      }
      else if($from_date==$dt && $to_date==$dt && $fname!="" && $cp=="")
      {
         $array=array('Franchisee_Name'=>$fname);
      }
      else if($from_date!=$dt && $to_date==$dt && $fname!="" && $cp=="")
      {
         $array=array('enq_date >='=>$form_dt,'enq_dt <='=>$to_date);
      }
      else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp=="")
      {
            $this->db->limit($limit, $start); 
            $this->db->order_by('enq_date','desc');
            $query = $this->db->get("enquiry");
            
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
      } 
          
              $this->db->limit($limit, $start); 
              $this->db->where($array);
              $this->db->order_by('enq_date','desc');
              $query = $this->db->get("enquiry");
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;

}	
function Book_Display($bname,$course,$author)
{
      $array=array();
        if($bname!="" && $author=="" && $course=="")
        {
           $array=array('book_name'=>$bname);
        }
        else if($bname=="" && $author!="" && $course=="")
        {
           $array=array('author_name'=>$author);
        }
        else if($bname=="" && $author=="" && $course!="")
        {
           $array=array('Course_name'=>$course);
        }
        else if($bname!="" && $author!="" && $course!="")
        {
           $array=array('Course_name'=>$course);
        }
        else if($bname=="" && $author=="" && $course=="")
        {
                $query=$this->db->get('book');
                $query->num_rows();
                return $query->num_rows();
        }
        
        $this->db->where($array);
        $query=$this->db->get('book');
        return $query->num_rows();
}   
public function Book_Paging($limit,$start,$bname,$course,$author)
     {
        
        $array=array();
        if($bname!="" && $author=="" && $course=="")
        {
           $array=array('book_name'=>$bname);
        }
        else if($bname=="" && $author!="" && $course=="")
        {
           $array=array('author_name'=>$author);
        }
        else if($bname=="" && $author=="" && $course!="")
        {
           $array=array('Course_name'=>$course);
        }
        else if($bname!="" && $author!="" && $course!="")
        {
           $array=array('Course_name'=>$course);
        }
        else if($bname=="" && $author=="" && $course=="")
        {
              
                $this->db->limit($limit, $start);
                $query1 = $this->db->get("book");
         
                if ($query1->num_rows() > 0) {
                    foreach ($query1->result() as $row) {
                        $data[] = $row;
                    }
                    return $data;
                }
                return false;
        }
        
        $this->db->limit($limit, $start);
        $this->db->where($array);
        $query = $this->db->get("book");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

public function ad_order_count($from_dt,$to_dt,$fname)
{
     $array=array();
     $dt=date('Y-m-d');
     if($from_dt==$dt && $to_dt==$dt && $fname!="")
     {
         $array=array('Customer_Name'=>$fname);
     } 
     else if($from_dt!=$dt && $to_dt==$dt && $fname!="")
     { 
        $array=array('o_date'=>$from_dt,'Customer_Name'=>$fname); 
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $fname!="")
     {
        $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt,'Customer_Name'=>$fname);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $fname=="")
     {
        $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt);
     }
     else if($from_dt==$dt && $to_dt==$dt && $fname=="")
     {
        $array=array('o_date'=>$dt);
     }
     $this->db->where($array);
     $query=$this->db->get('forder');
     return $query->num_rows();
}

public function order_Data($limit,$start,$from_dt,$to_dt,$fname)
{
 	   $array=array();
     $dt=date('Y-m-d');
     if($from_dt==$dt && $to_dt==$dt && $fname!="")
     {
         $array=array('Customer_Name'=>$fname);
     } 
     else if($from_dt!=$dt && $to_dt==$dt && $fname!="")
     { 
        $array=array('o_date'=>$from_dt,'Customer_Name'=>$fname); 
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $fname!="")
     {
        $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt,'Customer_Name'=>$fname);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $fname=="")
     {
        $array=array('o_date >='=>$from_dt,'o_date <='=>$to_dt);
     }
     else if($from_dt==$dt && $to_dt==$dt && $fname=="")
     {
        $array=array('o_date'=>$dt);
     }

     $this->db->limit($limit, $start);
     $this->load->database();
     $this->db->select('O_id,o_date,f_id,Customer_Name,SUM(Quanitity) AS Total_quantity,SUM(Price) AS Total_Price,Status');
	 $this->db->group_by('o_date');
     $this->db->where($array);
     $query=$this->db->get('forder');
	   return $query->result();
}

public function Exam_Data()
{
$this->load->database();
$query=$this->db->get('exam');
return $query->result();
}
public function get_franchisee()
{
     $this->load->database();
     $query=$this->db->get('customers_info');
     return $query->result();
}
public function get_state()
{
     $this->load->database();
     $query=$this->db->get('state');
     return $query->result(); 
}
public function get_city()
{
     $this->load->database();
     $query=$this->db->get('city');
     return $query->result(); 
}
public function getcourse()
{
     $this->load->database();
     $query=$this->db->get('course');
     return $query->result();   
}
function jobcard_Display()
    {
      
        $this->load->database();
        return $this->db->count_all("jobcard");
    }
    
public function jobcard_Paging($limit, $start,$cp)
     {
        if($cp=="")
        {
            $this->db->limit($limit, $start);
            $query = $this->db->get("jobcard");
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
        else if($cp!="")
        {
             $data=array('fname'=>$cp);
             $query = $this->db->get_where("jobcard",$data);
     
            if ($query->num_rows() > 0) {
               
                
                return $query->result();
            }
            return false;
        }    
   }    

public function Franchisee_Detail_count($from_dt,$to_dt,$sname,$cname)
{
        $array=array();
        $dt=date('Y-m-d');
        
        if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname!="")
        {
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt!=$dt && $to_dt==$dt && $sname!="" && $cname!="")
        {
          
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname!="")
        {
           
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt);
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname=="")
        {
           
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname=="")
        {
           
           $array=array('customers_info.state'=>$sname);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname!="")
        {
           
           $array=array('customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname=="")
        {
           
           $array=array('customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
          else if($from_dt!=$dt && $to_dt!=$dt && $sname =="" && $cname =="")
        {
          
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
        {
              
                $this->db->select('customers.cus_id,customers.date,customers.fran_id,customers.status,customers_info.address,customers.password,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City,customers_info.address,customers_info.pincode,customers_info.district');
                $this->db->from('customers');
                $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
                $this->db->join('state', 'customers_info.state = state.state_id');
                $this->db->join('city', 'customers_info.city = city.city_id');
                $this->db->order_by('customers.cus_id','Asc');
                
                $query=$this->db->get();
                //print_r($query->result_array());
                //die("dsdasds");
                 return $query->num_rows();
 
    
        }
        //print_r($array);

        $this->db->select('customers.cus_id,customers.date,customers.fran_id,customers.status,customers_info.address,customers.password,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City,customers_info.address,customers_info.pincode,customers_info.district');
        $this->db->from('customers');
        $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
        $this->db->join('state', 'customers_info.state = state.state_id');
        $this->db->join('city', 'customers_info.city = city.city_id');
        $this->db->where($array);
        $this->db->order_by('customers.cus_id','Asc');
        $query=$this->db->get();
        return $query->num_rows();
}   
public function Franchisee_Detail($limit,$start,$from_dt,$to_dt,$sname,$cname)
{
        $array=array();
        $dt=date('Y-m-d');
        
        if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname!="")
        {
          
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt!=$dt && $to_dt==$dt && $sname!="" && $cname!="")
        {
           
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname!="")
        {
           
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt);
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $sname!="" && $cname=="")
        {
           
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname=="")
        {
           
           $array=array('customers_info.state'=>$sname);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname!="")
        {
          
           $array=array('customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname=="")
        {
           
           $array=array('customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
          else if($from_dt!=$dt && $to_dt!=$dt && $sname =="" && $cname =="")
        {
          
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
        {
              
                $this->db->select('customers.cus_id,customers.date,customers.fran_id,customers.status,customers_info.address,customers.password,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City,customers_info.address,customers_info.pincode,customers_info.district');
                $this->db->from('customers');
                $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
                $this->db->join('state', 'customers_info.state = state.state_id');
                $this->db->join('city', 'customers_info.city = city.city_id');
                $this->db->order_by('customers.cus_id','Asc');
                $this->db->limit($limit, $start);
                $query=$this->db->get();
                //print_r($query->result_array());
                //die("dsdasds");
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $data[] = $row;
                    }
                    return $data;
                }
              
                return false;

    
        }
      
        $this->db->select('customers.cus_id,customers.date,customers.fran_id,customers.status,customers_info.address,customers.password,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City,customers_info.address,customers_info.pincode,customers_info.district');
        $this->db->from('customers');
        $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
        $this->db->join('state', 'customers_info.state = state.state_id');
        $this->db->join('city', 'customers_info.city = city.city_id');
        $this->db->where($array);
        $this->db->order_by('customers.cus_id','Asc');
        $this->db->limit($limit, $start);
        $query=$this->db->get();
        //print_r($query->result_array());
        //die("dsdasds");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

}

public function Gallery_Data()
{
	$this->load->database();
	$query=$this->db->get('gallery');
	return $query->result();
}

function Placement_Display()
{
	$this->load->database();
	//$query=$this->db->get('placement');
	//return $query->result();
	return $this->db->count_all('placement');
}

public function Placement_Paging($limit, $start)
     {
        $this->db->limit($limit, $start);
        $query = $this->db->get("placement");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

function Testimonial_Data()
{
	$this->load->database();
	//$query=$this->db->get('testimonial');
	//return $query->result();
	return $this->db->count_all('testimonial');
}

public function Testimonial_Paging($limit, $start,$cp)
     {

            $this->load->database();

        /*************************************/
        if($cp!="")
        {

             $data=array('Name'=>$cp);
             $query = $this->db->get_where("testimonial",$data);
     
            if ($query->num_rows() > 0) {
               
                
                return $query->result();
            }
            return false;
        }

         else if($cp=="")
        {
                $query = $this->db->get("testimonial");
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;

         }

        /***************************************
        $this->db->limit($limit, $start);
        $query = $this->db->get("testimonial");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;*/
   }

function Download_Data()
{
	$this->load->database();
	return $this->db->count_all("download");
}

public function Download_Paging($limit, $start)
     {
        $this->db->limit($limit, $start);
        $query = $this->db->get("download");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

function Slider_Data()
{
	$this->load->database();
	return $this->db->count_all('slider');
	//return $query->result();
}

public function Slider_Paging($limit, $start,$cp)
     {
        
        if($cp!="")
        {
             //$this->db->limit($limit, $start);
            $data=array('Caption'=>$cp);
             $query = $this->db->get_where("slider",$data);
     
            if ($query->num_rows() > 0) {
               
                
                return $query->result();
            }
            return false;
        }
        else if($cp=="")
        {
            $this->db->limit($limit, $start);
            $query = $this->db->get("slider");
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }    
   }

public function front_stud_enq_count($from_dt,$to_dt,$cname)
{
       $dt=date('Y-m-d');
       $array=array();
       if($from_dt==$dt && $to_dt==$dt && $cname=="")
       {
          $query=$this->db->get('student_enquiry');
          return $query->num_rows();
       }
       else if($from_dt!=$dt && $to_dt==$dt && $cname=="")
       {
          $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt);
       }
       else if($from_dt!=$dt && $to_dt!=$dt && $cname=="")
       {
          $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt);
       }
       else if($from_dt!=$dt && $to_dt!=$dt && $cname!="")
       {
          $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt,'fran_name'=>$cname);
       }
       else if($from_dt!=$dt && $to_dt==$dt && $cname!="")
       {
          $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt,'fran_name'=>$cname);
       }
       else if($from_dt==$dt && $to_dt==$dt && $cname!="")
       {
          
          $array=array('fran_name'=>$cname);
       }
       
       $this->db->where($array);
       $query=$this->db->get('student_enquiry');
       return $query->num_rows();


}

public function Student_Enquiry_Display($limit,$start,$from_dt,$to_dt,$cname)
{
       
       $dt=date('Y-m-d');
       $array=array();
       if($from_dt==$dt && $to_dt==$dt && $cname=="")
       {
            $this->db->limit($limit, $start);
            $query = $this->db->get("student_enquiry");     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;   
       }
       else if($from_dt!=$dt && $to_dt==$dt && $cname=="")
       {
          $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt);
       }
       else if($from_dt!=$dt && $to_dt!=$dt && $cname=="")
       {
          $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt);
       }
       else if($from_dt!=$dt && $to_dt!=$dt && $cname!="")
       {
          $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt,'fran_name'=>$cname);
       }
       else if($from_dt!=$dt && $to_dt==$dt && $cname!="")
       {
          $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt,'fran_name'=>$cname);
       }
       else if($from_dt==$dt && $to_dt==$dt && $cname!="")
       {
          $array=array('fran_name'=>$cname);
       }

            $this->db->limit($limit, $start);
            $this->db->where($array);
            $query = $this->db->get("student_enquiry");
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
}

function Contact_Us_Display()
{
	$this->load->database();
	$query=$this->db->get('contact');
	return $query->result();
}
public function Franchisee_admission_count($session,$from_dt,$to_dt,$sname,$cname)
{
    $array=array();
     $dt=date('Y-m-d');
     if($from_dt==$dt && $to_dt!=$dt && $cname=="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt==$dt && $cname=="" && $sname=="")
     {
       
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname=="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt!=$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt==$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname!="" && $sname=="")
     {
        $array=array('course_Name'=>$cname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname=="" && $sname!="")
     {
        $array=array('name'=>$sname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname=="" && $sname=="")
     {
         $this->db->where(array('fran_name'=>$session->institute_name));
         $this->db->order_by('course_date','desc');
         $query=$this->db->get('admission');
         return $query->num_rows();    
     }
     $this->db->order_by('course_date','desc');
     $this->db->where($array);
     $query=$this->db->get('admission');
     return $query->num_rows();
}

public function Admission($limit,$start,$session,$sname,$cname,$from_dt,$to_dt)
{
	 
     $array=array();
     $dt=date('Y-m-d');
     if($from_dt==$dt && $to_dt!=$dt && $cname=="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt==$dt && $cname=="" && $sname=="")
     {
       
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname=="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt!=$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt==$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname!="" && $sname=="")
     {
        $array=array('course_Name'=>$cname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname=="" && $sname!="")
     {
        $array=array('name'=>$sname,'fran_name'=>$session->institute_name);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname=="" && $sname=="")
     {
         $this->db->limit($limit,$start);
         $this->db->where(array('fran_name'=>$session->institute_name));
         $this->db->order_by('course_date','desc');
         $query=$this->db->get('admission');
         return $query->result();    
     }
     $this->db->limit($limit,$start);
     $this->db->order_by('course_date','desc');
     $this->db->where($array);
     $query=$this->db->get('admission');
     return $query->result();
   
}


public function fran_enq_Display($from_dt,$to_dt,$st,$ct)
{
   $array=array();
     $dt=date('Y-m-d');
   if($from_dt!="" && $to_dt!="" && $st!="" && $ct!="")
   {
      
      $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt,'state_id'=>$st,'city_id'=>$ct);
   }
   else if($from_dt!="" && $to_dt!="" && $st=="" && $ct=="")
   {
      $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt);
   }
   else if($from_dt!="" && $to_dt=="" && $st!="" && $ct!="")
   {
      $array=array('enq_dt >='=>$from_dt,'state_id'=>$st,'city_id'=>$ct); 
   }
   else if($from_dt!="" && $to_dt=="" && $st!="" && $ct=="")
   {
      $array=array('enq_dt >='=>$from_dt,'state_id'=>$st); 
   }
   else if($from_dt==$dt && $to_dt==$dt && $st=="" && $ct=="")
   {
        
        $query=$this->db->get('franch_enquiry');
        return $query->num_rows();
   }
  
   $this->db->where($array);
   $query=$this->db->get('franch_enquiry');
   return $query->num_rows();
   
}

function Fran_Enquiry_Display($limit,$start,$from_dt,$to_dt,$st,$ct)
{

   $array=array();
     $dt=date('Y-m-d');
   if($from_dt!="" && $to_dt!="" && $st!="" && $ct!="")
   {
     
      $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt,'state_id'=>$st,'city_id'=>$ct);
   }
   else if($from_dt==$dt && $to_dt!=$dt && $st=="" && $ct=="")
   {
      $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt);
   }
   else if($from_dt!=$dt && $to_dt!=$dt && $st=="" && $ct=="")
   {
      $array=array('enq_dt >='=>$from_dt,'enq_dt <='=>$to_dt);
   }
   else if($from_dt!="" && $to_dt=="" && $st!="" && $ct!="")
   {
      $array=array('enq_dt >='=>$from_dt,'state_id'=>$st,'city_id'=>$ct); 
   }
   else if($from_dt!="" && $to_dt=="" && $st!="" && $ct=="")
   {
      $array=array('enq_dt >='=>$from_dt,'state_id'=>$st); 
   }
   else if($from_dt==$dt && $to_dt==$dt && $st=="" && $ct=="")
   {
    
        $this->db->limit($limit, $start);
        $this->db->order_by('enq_dt','desc');
        $query=$this->db->get('franch_enquiry');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
  
        $this->db->limit($limit, $start);
        $this->db->where($array);
        $this->db->order_by('enq_dt','desc');
        $query=$this->db->get('franch_enquiry');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
          
            return $data;
        }
       
        return false;
}


function News_Display()
{
$this->load->database();
return $this->db->count_all("news");
}
public function News_Paging($limit, $start)
     {
        $this->db->limit($limit, $start);
        $query = $this->db->get("news");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

function Course_Display()
{
$this->load->database();
return $this->db->count_all('course');
//return $query->result();
}
public function Course_Paging($limit, $start)
     {
        $this->db->limit($limit, $start);
        $query = $this->db->get("course");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	
	
function Student_Admission($limit,$start,$cname,$from_dt,$to_dt,$sname)
{

     
       $array=array();
        if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_Name'=>$sname);
        }
        else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_Name'=>$sname);
        }
        else if($cname!="" && $from_dt!="" && $to_dt!="" && $sname=="")
        {
             $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
        }
        else if($cname!="" && $from_dt=="" && $to_dt=="" && $sname!="")
        {
             $array=array('fran_Name'=>$sname,'course_Name'=>$cname);   
        }
        else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname=="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt);   
        }
        else if($cname=="" && $from_dt!="" && $to_dt=="" && $sname=="")
        {
             $array=array('course_date >='=>$from_dt);   
        }
      
        else
        {
            $dt=date('Y-m-d');
            $array=array('course_date'=>$dt);
        }
        print_r($array);
        $this->db->limit($limit, $start);
        $this->db->where($array);
        $query=$this->db->get('admission');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;     
}	

public function get_pass_stud_count($from_dt,$course,$stud,$fran,$res)
{
        $dt=date('Y-m-d');
        $array=array();
        if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt);
        }
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran=="" && $res=="")
        {
            $array=array('exm_status.course'=>$course);
        }
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran=="" && $res!="")
        {
            $array=array('exm_status.course'=>$course,'exm_status.status'=>$res);
        }
        else if($from_dt==$dt && $course=="" && $stud!="" && $fran=="" && $res=="")
        {
            $array=array('admission.name'=>$stud);
        }
        else if($from_dt==$dt && $course=="" && $stud!="" && $fran=="" && $res!="")
        {
            $array=array('admission.name'=>$stud);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course!="" && $stud=="" && $fran=="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'exm_status.course'=>$course);
        }
        else if($from_dt!=$dt && $course!="" && $stud=="" && $fran=="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'exm_status.course'=>$course,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course=="" && $stud!="" && $fran=="" && $res=="")
        {
            $array=array('admission.name'=>$stud);
        }
        else if($from_dt!=$dt && $course=="" && $stud!="" && $fran=="" && $res!="")
        {
            $array=array('admission.name'=>$stud);
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran);
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran);
        }
        else if($from_dt!=$dt && $course!="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course);
        }
        else if($from_dt!=$dt && $course!="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course,'exm_status.status'=>$res);
        }
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran!="" && $res1="")
        {
            $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course!="" && $stud!="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course);
        }
        else if($from_dt!=$dt && $course!="" && $stud!="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course);
        }
         else if($from_dt==$dt && $course!="" && $stud!="" && $fran!="" && $res=="")
        {
             $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course!="" && $stud!="" && $fran!="" && $res!="")
        {
             $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res!="")
        {
             $array=array('exm_status.status'=>$res);
        }

        $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
        $this->db->from('admission');
        $this->db->join('exm_status','exm_status.siid=admission.id');
        $this->db->where($array);
        $query=$this->db->get();
        return $query->num_rows();
}
	public function get_pass_stud($limit,$start,$from_dt,$course,$stud,$fran,$res)
    {
        $dt=date('Y-m-d');
        $array=array();
        if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt);
        }
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran=="" && $res=="")
        {
            $array=array('exm_status.course'=>$course);
        }
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran=="" && $res!="")
        {
            $array=array('exm_status.course'=>$course,'exm_status.status'=>$res);
        }
        else if($from_dt==$dt && $course=="" && $stud!="" && $fran=="" && $res=="")
        {
            $array=array('admission.name'=>$stud);
        }
        else if($from_dt==$dt && $course=="" && $stud!="" && $fran=="" && $res!="")
        {
            $array=array('admission.name'=>$stud);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course!="" && $stud=="" && $fran=="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'exm_status.course'=>$course);
        }
        else if($from_dt!=$dt && $course!="" && $stud=="" && $fran=="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'exm_status.course'=>$course,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course=="" && $stud!="" && $fran=="" && $res=="")
        {
            $array=array('admission.name'=>$stud);
        }
        else if($from_dt!=$dt && $course=="" && $stud!="" && $fran=="" && $res!="")
        {
            $array=array('admission.name'=>$stud);
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran);
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran);
        }
        else if($from_dt!=$dt && $course!="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course);
        }
        else if($from_dt!=$dt && $course!="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course,'exm_status.status'=>$res);
        }
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran!="" && $res1="")
        {
            $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course!="" && $stud!="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course);
        }
        else if($from_dt!=$dt && $course!="" && $stud!="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course);
        }
         else if($from_dt==$dt && $course!="" && $stud!="" && $fran!="" && $res=="")
        {
             $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course!="" && $stud!="" && $fran!="" && $res!="")
        {
             $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res!="")
        {
             $array=array('exm_status.status'=>$res);
        }
        
        $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
        $this->db->from('admission');
        $this->db->join('exm_status','exm_status.siid=admission.id');
        $this->db->where($array);
        $query=$this->db->get();
        return $query->result_array();
    }
	public function get_stud_info($name)  
    {

           $query = $this->db->query("SELECT admission.name
                FROM admission,exm_status where admission.id=exm_status.siid
                And admission.name LIKE '%".$name."%' 
                GROUP BY admission.name");
            echo json_encode($query->result_array());
    }
    
public function Savebatchdatamodel($arraydata,$Action)  
{
    if($Action == "Active")
    {
        for($i=0;$i < count($arraydata);$i++ )
        {
          $data[$i]['cus_id']=$arraydata[$i];
          $data[$i]['status']=1;
        }
        $this->db->trans_start(); 
        $this->db->update_batch('customers', $data, 'cus_id');
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE)? FALSE : TRUE;
    }
    else if($Action=="Notactive")
    {
        for($i=0;$i < count($arraydata);$i++ )
        {
          $data[$i]['cus_id']=$arraydata[$i];
          $data[$i]['status']=0;
        }
        $this->db->trans_start(); 
        $this->db->update_batch('customers', $data, 'cus_id');
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE)? FALSE : TRUE; 
    }
    else if($Action=="Delete")
    {
         foreach($arraydata as $arr)
         {
             $this->db->where('cus_id',$arr);
             $query1=$this->db->delete('customers');

             $this->db->where('cus_id',$arr);
             $query2=$this->db->delete('customers_info');
         }
         if($query1 && $query2)
         {
             return true;
         }
         else
         {
             return false;
         }
    }

    
}
    
	
  
public function State_Data($limit,$start,$sname)
{

$this->load->database();
$arr=array();
if($sname!="")
{
  $arr=array('name'=>$sname);
}
else if($sname=="")
{
$this->db->limit($limit,$start);
$query=$this->db->get('state');
return $query->result();

}
$this->db->limit($limit,$start);
$this->db->where($arr);
$query=$this->db->get('state');
return $query->result();

}


public function count_state_Display($sname)
{
$arr=array();
if($sname!="")
{
  $arr=array('name'=>$sname);
}
else if($sname=="")
{
$query=$this->db->get('state');
return $query->num_rows();

}
$this->db->where($arr);
$query=$this->db->get('state');
return $query->num_rows();

} 

public function State_Data1()
{
$this->load->database();
$query=$this->db->get('state');
return $query->result_array();
}

public function State_Data2($limit,$start,$st_name,$ct_name)
{
$this->load->database();
$arr=array();
$arr=array();
if($st_name!="" && $ct_name!="")
{  
    $arr=array('state.state_id'=>$st_name,'city.city_id'=>$ct_name);
}
else if($st_name!="" && $ct_name=="")
{
   $arr=array('state.state_id'=>$st_name);
}
else if($st_name=="" && $ct_name=="")
{
$this->db->limit($limit,$start);
$this->db->select('state.name As State_Name,city.city_id,city.name As City_Name'); 
$this->db->from('city');
$this->db->join('state','state.state_id=city.state_id');
$query=$this->db->get();
return $query->result();
}
$this->db->limit($limit,$start);
$this->db->select('state.name As State_Name,city.city_id,city.name As City_Name');
$this->db->from('city');
$this->db->join('state','state.state_id=city.state_id');
$this->db->where($arr);
$query=$this->db->get();
return $query->result();
}

public function count_city_Display($st_name,$ct_name)
{
$arr=array();
if($st_name!="" && $ct_name!="")
{  
    $arr=array('state.state_id'=>$st_name,'city.city_id'=>$ct_name);
}
else if($st_name!="" && $ct_name=="")
{
   $arr=array('state.state_id'=>$st_name);
}
else if($st_name=="" && $ct_name=="")
{
$this->db->select('state.name As State_Name,city.city_id,city.name As City_Name'); 
$this->db->from('city');
//$this->db->from('state');
$this->db->join('state','state.state_id=city.state_id');
$query=$this->db->get();
return $query->num_rows();
}

$this->db->select('state.name As State_Name,city.city_id,city.name As City_Name');
$this->db->from('city');
$this->db->join('state','state.state_id=city.state_id');
$this->db->where($arr);
$query=$this->db->get();
return $query->num_rows();
} 

  
public function fran_Placement()
{
$this->load->database();
$query=$this->db->get('fran_placement');
return $query->result();
} 
  




  
	
}

?>