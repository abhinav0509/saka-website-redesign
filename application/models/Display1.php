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

public function getmax_id()
{
  $row = $this->db->query('SELECT MAX(id) AS maxid FROM admission')->row();
  
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
	

function Book_Display()
{
	  $this->load->database();
	 
	  return $this->db->count_all("book");
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
         $array=array('enq_date'=>$dt,'Franchisee_Name'=>$fname);
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
         $array=array('enq_date'=>$dt,'Franchisee_Name'=>$fname);
      }
      else if($from_date!=$dt && $to_date==$dt && $fname!="" && $cp=="")
      {
         $array=array('enq_date >='=>$form_dt,'enq_dt <='=>$to_date);
      }
      else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp=="")
      {
         $array=array('enq_date'=>$dt);
      } 
           print_r($array);
              $this->db->limit($limit, $start); 
              $this->db->where($array);
              $query = $this->db->get("enquiry");
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;

}	

public function Book_Paging($limit, $start)
     {
        $this->db->limit($limit, $start);
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
        if($from_dt!=$dt && $to_dt!="" && $sname!="" && $cname!="")
        {
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="")
        {
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname!="")
        {
           $array=array('customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="")
        {
           $array=array('customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname=="")
        {
           $array=array('customers.date'=>$from_date);
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
        {
          
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
        {
              
                $this->db->select('customers.cus_id,customers.status,customers.password,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
                $this->db->from('customers');
                $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
                $this->db->join('state', 'customers_info.state = state.state_id');
                $this->db->join('city', 'customers_info.city = city.city_id');
                $this->db->where($array);
                $query=$this->db->get();
                //print_r($query->result_array());
                //die("dsdasds");
                 return $query->num_rows();
 
    
        }
        //print_r($array);

        $this->db->select('customers.cus_id,customers.status,customers.password,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
        $this->db->from('customers');
        $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
        $this->db->join('state', 'customers_info.state = state.state_id');
        $this->db->join('city', 'customers_info.city = city.city_id');
        $query=$this->db->get();
        return $query->num_rows();
}   
public function Franchisee_Detail($limit,$start,$from_dt,$to_dt,$sname,$cname)
{
        $array=array();
        $dt=date('Y-m-d');
        if($from_dt!=$dt && $to_dt!="" && $sname!="" && $cname!="")
        {
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="")
        {
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt,'customers_info.state'=>$sname);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname!="")
        {
           $array=array('customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="")
        {
           $array=array('customers_info.state'=>$sname,'customers_info.city'=>$cname);
        }
        else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname=="")
        {
           $array=array('customers.date'=>$from_date);
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
        {
          
           $array=array('customers.date >='=>$from_dt,'customers.date <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
        {
               
                $this->db->select('customers.cus_id,customers.status,customers_info.address,customers.password,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
                $this->db->from('customers');
                $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
                $this->db->join('state', 'customers_info.state = state.state_id');
                $this->db->join('city', 'customers_info.city = city.city_id');
                $this->db->limit($limit,$start);
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
        print_r($array);
        $this->db->select('customers.cus_id,customers.status,customers.password,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City');
        $this->db->from('customers');
        $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
        $this->db->join('state', 'customers_info.state = state.state_id');
        $this->db->join('city', 'customers_info.city = city.city_id');
        $this->db->where($array);
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

function Student_Enquiry_Display()
{
    $this->load->database();
    $query=$this->db->get('student_enquiry');
    return $query->result();
}

function Contact_Us_Display()
{
	$this->load->database();
	$query=$this->db->get('contact');
	return $query->result();
}

function Admission($session,$sname,$cname,$fromdate,$todate)
{
	$this->load->database();
	if($fromdate!="" && $todate!="" && $cname!="" && $sname!="")
    {
         $this->db->where(array('course_date >='=>$fromdate));
         $this->db->where(array('course_date <='=>$todate));
         $this->db->where(array('f_id'=>$session->cus_id,'course_Name'=>$cname));
         $query=$this->db->get('admission');
         return $query->result_array();
    }
    else if($fromdate!="" && $todate=="" && $cname!="" && $sname=="")
    {
         $this->db->where(array('course_date'=>$fromdate));
         $this->db->where(array('f_id'=>$session->cus_id,'course_Name'=>$cname));
         $query=$this->db->get('admission');
         return $query->result_array();
    }
    else if($fromdate!="" && $todate=="" && $cname!="" && $sname=="")
    {
         $this->db->where(array('course_date'=>$fromdate));
         $this->db->where(array('f_id'=>$session->cus_id,'course_Name'=>$cname));
         $query=$this->db->get('admission');
         return $query->result_array();
    }
    else if($fromdate!="" && $todate=="" && $cname!="" && $sname!="")
    {
         $this->db->where(array('course_date'=>$fromdate));
         $this->db->where(array('f_id'=>$session->cus_id,'course_Name'=>$cname));
         $query=$this->db->get('admission');
         return $query->result_array();
    }
     
     else if($fromdate=="" && $todate=="" && $cname=="" && $sname!="")
     {

         $this->db->where(array('f_id'=>$session->cus_id,'name'=>$sname));
         $query=$this->db->get('admission');
         return $query->result_array();
     }
      else if($fromdate!="" && $todate=="" && $cname=="" && $sname=="")
      {
          $this->db->where(array('f_id'=>$session->cus_id,'course_date'=>$fromdate));
          $query=$this->db->get('admission');
          return $query->result_array();
      }
      else if($fromdate=="" && $todate=="" && $cname!="" && $sname=="")
      {
          $this->db->where(array('f_id'=>$session->cus_id,'course_Name'=>$cname));
          $query=$this->db->get('admission');
          return $query->result_array();
      }
       else if($fromdate!="" && $todate!="" && $cname=="" && $sname=="")
       {
             $this->db->where(array('course_date >='=>$fromdate));
             $this->db->where(array('course_date <='=>$todate));
             $this->db->where(array('f_id'=>$session->cus_id));
             $query=$this->db->get('admission');
             return $query->result_array();
       }
     
    else
    {
           $dt=date('Y-m-d');
           $query=$this->db->get_where('admission',array('f_id'=>$session->cus_id,'course_date'=>$dt));
           return $query->result();     
    }

    
}


public function fran_enq_Display($from_dt,$to_dt,$st,$ct)
{
   $array=array();
     $dt=date('Y-m-d');
   if($from_dt!="" && $to_dt!="" && $st!="" && $ct!="")
   {
      echo "hhhhhhhhhhhhhhh";
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
     
      $array=array('enq_dt1 >='=>$from_dt,'enq_dt <='=>$to_dt,'state_id'=>$st,'city_id'=>$ct);
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
        $this->db->where(array('enq_dt'=>$dt));
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
      
        $this->db->limit($limit, $start);
        $this->db->where($array);
        $query=$this->db->get('admission');
        //print_r($query->result_array());
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;     
}	

	
	
	
	
	
}

?>