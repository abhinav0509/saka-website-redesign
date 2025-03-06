<?php
class display extends CI_Model{
function __construct() {
  
parent::__construct();
}

function Adm_jobcard_display($fran,$from_dt,$to_dt)
    {
        $dt=date('Y-m-d');
        $array=array();
         if($from_dt==$dt && $to_dt==$dt && $fran=="")
            {
             
				  $this->db->order_by('id','desc');
                  $query = $this->db->get("jobcard");
				  return $query->num_rows();
            }
            else if($from_dt==$dt && $to_dt==$dt && $fran!="")
            {
                $array=array('fname'=>$fran);  
            }
            else if($from_dt!=$dt && $to_dt==$dt && $fran!="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran);  
            }
            else if($from_dt!=$dt && $to_dt!=$dt && $fran=="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt);  
            }
			else if($from_dt!=$dt && $to_dt!=$dt && $fran!="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran);  
            }
            else if($from_dt==$dt && $to_dt!=$dt && $fran!="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran);  
            }
            else if($from_dt!=$dt && $to_dt==$dt && $fran=="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt);  
            }
       
            $this->db->where($array);
            $query= $this->db->get("jobcard");  
            return $query->num_rows();
    }

    public function get_branch()
    {
       $this->db->where('type','Branch');
       $query=$this->db->get('customers_info');
       return $query->result();
    }
    
public function Adm_jobcard_Paging($limit,$start,$fran,$from_dt,$to_dt)
     {
            $array=array();
            $dt=date('Y-m-d');
            if($from_dt==$dt && $to_dt==$dt && $fran=="")
            {
                  $this->db->limit($limit, $start);
				  $this->db->order_by('id','desc');
                  $query = $this->db->get("jobcard");
           
                  if ($query->num_rows() > 0) {
                      foreach ($query->result() as $row) {
                          $data[] = $row;
                      }
                      return $data;
                  }
                  return false;
            }
            else if($from_dt==$dt && $to_dt==$dt && $fran!="")
            {
                $array=array('fname'=>$fran);  
            }
            else if($from_dt!=$dt && $to_dt==$dt && $fran!="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran);  
            }
            else if($from_dt!=$dt && $to_dt!=$dt && $fran=="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt);  
            }
			else if($from_dt!=$dt && $to_dt!=$dt && $fran!="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran);  
            }
            else if($from_dt==$dt && $to_dt!=$dt && $fran!="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt,'fname'=>$fran);  
            }
            else if($from_dt!=$dt && $to_dt==$dt && $fran=="")
            {
                $array=array('entry_dt >='=>$from_dt,'entry_dt <='=>$to_dt);  
            }

               $this->db->limit($limit, $start);
			   $this->db->order_by('id','desc');
               $this->db->where($array);
               $query = $this->db->get("jobcard");
       
              if ($query->num_rows() > 0) {
                  foreach ($query->result() as $row) {
                      $data[] = $row;
                  }
                  return $data;
              }
              return false;
   }




public function About_display()
	{
	    $this->load->database();
		  return $this->db->count_all("about");
	}

  public function Get_user_details()
  {
	  $this->db->order_by('id','desc');
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
		$this->db->order_by('id','desc');
        $query = $this->db->get("about");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }	
	



 function Enquiry_display($cp,$fname,$from_date,$to_date)
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
	  else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp!="")
      {
         $array=array('stud_name'=>$cp);
      }
      else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp=="")
      {
        
         $this->db->order_by('enq_date','desc');
         $query = $this->db->get("enquiry");
		 return $query->num_rows();
      } 
         //print_r($array);
         $this->db->where($array);
         $query = $this->db->get("enquiry");
         return $query->num_rows();
    }


public function Active_Fran_Enquiry_display($limit, $start,$cp,$fname,$from_date,$to_date)
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
	  else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp!="")
      {
         $array=array('stud_name'=>$cp);
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
              $this->db->order_by('id','desc');
              $query = $this->db->get("enquiry");
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;

}	
function Book_display($bname,$course,$author)
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
				$this->db->order_by('id','desc');
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
        $this->db->order_by('id','desc');
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
	 else if($from_dt==$dt && $to_dt!=$dt && $fname!="")
     { 
        $array=array('o_date'=>$to_dt,'Customer_Name'=>$fname); 
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
         $this->db->group_by('f_id');
         $query=$this->db->get('forder');
         return $query->num_rows();
     }
     $this->db->where($array);
     $this->db->group_by('f_id');
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
	 else if($from_dt==$dt && $to_dt!=$dt && $fname!="")
     { 
        $array=array('o_date'=>$to_dt,'Customer_Name'=>$fname); 
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
        $this->db->limit($limit, $start);
         
         $this->db->select('f1.o_date,f1.f_id,f1.Customer_Name,SUM(f1.Quanitity) AS Total_quantity,SUM(f1.Price) AS Total_Price,f1.Status');
         $this->db->from('forder as f1');
         $this->db->join('forder as f2','f1.O_Id=f2.O_Id');
         $this->db->group_by('f1.o_date');
         $this->db->group_by('f1.f_id');         
         $this->db->order_by('f1.o_date','desc');
         $query=$this->db->get();
         return $query->result();
     }

     $this->db->limit($limit, $start);
     $this->load->database();
     $this->db->select('O_id,o_date,f_id,Customer_Name,SUM(Quanitity) AS Total_quantity,SUM(Price) AS Total_Price,Status');
	   $this->db->group_by('f_id','o_date');
     $this->db->order_by('O_Id','desc');
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
function jobcard_display($stud,$session)
    {
       
        $array=array();
        if($stud!="")
        {
           $array=array('sname'=>$stud,'fname'=>$session->institute_name);
        }
        else if($stud=="")
        {
           $this->load->database();
           $this->db->where(array('fname'=>$session->institute_name));
          $query= $this->db->get("jobcard");  
          return $query->num_rows();
        }
         $this->db->where($array);

        $query= $this->db->get("jobcard");  
          return $query->num_rows();
    }
    
public function jobcard_Paging($limit,$start,$stud,$session)
     {
            $array=array();
            if($stud!="")
            {
                $array=array('sname'=>$stud,'fname'=>$session->institute_name);  
            }
            else if($stud=="")
            {
              $this->db->limit($limit, $start);
              $this->db->where(array('fname'=>$session->institute_name));
              $query = $this->db->get("jobcard");
       
              if ($query->num_rows() > 0) {
                  foreach ($query->result() as $row) {
                      $data[] = $row;
                  }
                  return $data;
              }
              return false;
          }  

               $this->db->limit($limit, $start);
			   $this->db->order_by('id','desc');
               $this->db->where($array);
               $query = $this->db->get("jobcard");
       
              if ($query->num_rows() > 0) {
                  foreach ($query->result() as $row) {
                      $data[] = $row;
                  }
                  return $data;
              }
              return false;
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
                $this->db->order_by('customers.cus_id','Desc');
                
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
        $this->db->order_by('customers.cus_id','Desc');
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
              
                $this->db->select('customers.cus_id,customers.date,customers.fran_id,customers.status,customers_info.address,customers.password,customers_info.state,customers_info.city,customers_info.cus_mobile,customers.email,customers.fname,customers_info.femail,customers_info.institute_name,state.name As State,city.name As City,customers_info.address,customers_info.pincode,customers_info.district,customers.type');
                $this->db->from('customers');
                $this->db->join('customers_info', 'customers.cus_id = customers_info.cus_id');
                $this->db->join('state', 'customers_info.state = state.state_id');
                $this->db->join('city', 'customers_info.city = city.city_id');
                $this->db->order_by('customers.cus_id','Desc');
                $this->db->limit($limit, $start);
                $query=$this->db->get();
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
        $this->db->order_by('customers.cus_id','Desc');
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
	$this->db->order_by('id','desc');
	$query=$this->db->get('gallery');
	return $query->result();
}

function Placement_display()
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
			$this->db->order_by('S_id','desc');
             $query = $this->db->get_where("slider",$data);
     
            if ($query->num_rows() > 0) {
               
                
                return $query->result();
            }
            return false;
        }
        else if($cp=="")
        {
            $this->db->limit($limit, $start);
			$this->db->order_by('S_id','desc');
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
            $query = $this->db->get("student_enquiry");     
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

public function Student_Enquiry_display($limit,$start,$from_dt,$to_dt,$cname)
{
       
       $dt=date('Y-m-d');
       $array=array();
       if($from_dt==$dt && $to_dt==$dt && $cname=="")
       {
		    $this->db->order_by('s_id','desc');
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
			$this->db->order_by('id','desc');
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

function Contact_Us_display()
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
       
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'f_id'=>$session->cus_id);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname=="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'f_id'=>$session->cus_id);
     }
     else if($from_dt==$dt && $to_dt!=$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'f_id'=>$session->cus_id);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'f_id'=>$session->cus_id);
     }
     else if($from_dt!=$dt && $to_dt==$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'f_id'=>$session->cus_id);
     }
      else if($from_dt!=$dt && $to_dt==$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
     }
      else if($from_dt!=$dt && $to_dt==$dt && $cname=="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname!="" && $sname=="")
     {
        $array=array('course_Name'=>$cname,'f_id'=>$session->cus_id);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname=="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
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
       
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'f_id'=>$session->cus_id);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname=="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'f_id'=>$session->cus_id);
     }
     else if($from_dt==$dt && $to_dt!=$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'f_id'=>$session->cus_id);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'f_id'=>$session->cus_id);
     }
     else if($from_dt!=$dt && $to_dt==$dt && $cname!="" && $sname=="")
     {
        $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'f_id'=>$session->cus_id);
     }
      else if($from_dt!=$dt && $to_dt==$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
     }
      else if($from_dt!=$dt && $to_dt==$dt && $cname=="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $cname!="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname!="" && $sname=="")
     {
        $array=array('course_Name'=>$cname,'f_id'=>$session->cus_id);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname=="" && $sname!="")
     {
        $array=array('name'=>$sname,'f_id'=>$session->cus_id);
     }
     else if($from_dt==$dt && $to_dt==$dt && $cname=="" && $sname=="")
     {
         $this->db->limit($limit,$start);
         $this->db->where(array('f_id'=>$session->cus_id));
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


public function fran_enq_display($from_dt,$to_dt,$st,$ct)
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
        
        $query=$this->db->get('franch_enquiry');
        return $query->num_rows();
   }
  
   $this->db->where($array);
   $query=$this->db->get('franch_enquiry');
   return $query->num_rows();
   
}

function Fran_Enquiry_display($limit,$start,$from_dt,$to_dt,$st,$ct)
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
        $this->db->order_by('id','desc');
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


function News_display()
{
$this->load->database();
return $this->db->count_all("news");
}
public function News_Paging($limit, $start)
     {
		 $this->db->order_by('n_id','desc');
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

function Course_display()
{
$this->load->database();
return $this->db->count_all('course');
//return $query->result();
}
public function Course_Paging($limit, $start)
     {
		 $this->db->order_by('id','desc');
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
	public function Demofrn_admision_display($cname,$from_dt,$to_dt,$sname)
{
        $dt=date('Y-m-d');
        $array=array();
         if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				$array=array('course_Name'=>$cname,'fran_Name'=>$sname);
			}
			else{
                $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_Name'=>$sname);
			}
        }
        else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				 $array=array('fran_Name'=>$sname);
			}
			else
			{
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_Name'=>$sname);
			}
        }
        else if($cname!="" && $from_dt!="" && $to_dt!="" && $sname=="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				$array=array('course_Name'=>$cname);
			}
			else
			{
             $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
			}
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
            $array=array('course_date'=>$dt);
        }
       
        $this->db->where($array);
        $query=$this->db->get('demoadmission');
        return $query->num_rows();
       
}
public function frn_admision_display($cname,$from_dt,$to_dt,$sname)
{
        
       $dt=date('Y-m-d');
       $array=array();
        if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				 $array=array('course_Name'=>$cname,'fran_Name'=>$sname);
			}
			else
			{
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_Name'=>$sname);
			}
        }
        else if($cname=="" && $from_dt!=$dt && $to_dt!=$dt && $sname!="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_Name'=>$sname);
        }
        else if($cname=="" && $from_dt!=$dt && $to_dt==$dt && $sname!="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_Name'=>$sname);
        }
        else if($cname=="" && $from_dt==$dt && $to_dt==$dt && $sname!="")
        {
            $array=array('fran_Name'=>$sname);
        }
        else if($cname!="" && $from_dt!=$dt && $to_dt!=$dt && $sname=="")
        {
             $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
        }
        else if($cname!="" && $from_dt!=$dt && $to_dt==$dt && $sname=="")
        {
             $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
        }
        else if($cname!="" && $from_dt==$dt && $to_dt==$dt && $sname=="")
        {
             $array=array('course_Name'=>$cname);
        }
        else if($cname=="" && $from_dt==$dt && $to_dt==$dt && $sname=="")
        {
              
             
              $this->db->order_by('id','desc');
              $query=$this->db->get('admission');
                return $query->num_rows();
        }
        else if($cname=="" && $from_dt!=$dt && $to_dt==$dt && $sname=="")
        {
              $array=array('course_date >='=>$from_dt, 'course_date <='=>$to_dt);
        }
      
       
       $this->db->where($array);
       $query=$this->db->get('admission');
       return $query->num_rows();


       
}

function Student_Admission($limit,$start,$cname,$from_dt,$to_dt,$sname)
{

       $dt=date('Y-m-d');
       $array=array();
        if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				 $array=array('course_Name'=>$cname,'fran_Name'=>$sname);
			}
			else
			{
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_Name'=>$sname);
			}
        }
        else if($cname=="" && $from_dt!=$dt && $to_dt!=$dt && $sname!="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_Name'=>$sname);
        }
        else if($cname=="" && $from_dt!=$dt && $to_dt==$dt && $sname!="")
        {
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_Name'=>$sname);
        }
        else if($cname=="" && $from_dt==$dt && $to_dt==$dt && $sname!="")
        {
            $array=array('fran_Name'=>$sname);
        }
        else if($cname!="" && $from_dt!=$dt && $to_dt!=$dt && $sname=="")
        {
             $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
        }
        else if($cname!="" && $from_dt!=$dt && $to_dt==$dt && $sname=="")
        {
             $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
        }
        else if($cname!="" && $from_dt==$dt && $to_dt==$dt && $sname=="")
        {
             $array=array('course_Name'=>$cname);
        }
        else if($cname=="" && $from_dt==$dt && $to_dt==$dt && $sname=="")
        {
              
              $this->db->limit($limit, $start);
              $this->db->order_by('id','desc');
              $query=$this->db->get('admission');
              
              if ($query->num_rows() > 0) {
                  foreach ($query->result() as $row) {
                      $data[] = $row;
                  }
                  return $data;
              }
              return false;
        }
        else if($cname=="" && $from_dt!=$dt && $to_dt==$dt && $sname=="")
        {
              $array=array('course_date >='=>$from_dt, 'course_date <='=>$to_dt);
        }
      
       
        
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

/*public function get_pass_stud_count($from_dt,$course,$stud,$fran,$res)
{
        $dt=date('Y-m-d');
        $array=array();
        if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res=="")
        {
              $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
              $this->db->from('admission');
              $this->db->join('exm_status','exm_status.siid=admission.id');
              $query=$this->db->get();
              return $query->num_rows();
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
            $array=array('admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('admission.fran_name'=>$fran,'exm_status.status'=>$res);
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
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran!="" && $res!="")
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
}*/


public function get_pass_stud_count($from_dt,$course,$stud,$fran,$res)
{
        $dt=date('Y-m-d');
        $array=array();
        if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res=="")
        {
              
              $this->db->order_by('exm_status.stud_id');
              $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
              $this->db->from('admission');
              $this->db->join('exm_status','exm_status.siid=admission.id');
              $query=$this->db->get();
              return $query->num_rows();
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran=="" && $res=="")
        {
              $array=array('exm_status.exm_date'=>$from_dt);
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran=="" && $res!="")
        {
              $array=array('exm_status.exm_date'=>$from_dt,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
              $array=array('exm_status.exm_date'=>$from_dt,'exm_status.status'=>$res,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
              $array=array('exm_status.exm_date'=>$from_dt,'exm_status.status'=>$res,'admission.fran_name'=>$fran);
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
            $array=array('admission.fran_name'=>$fran);
        }
        else if($from_dt==!$dt && $course=="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('admission.fran_name'=>$fran,'exm_status.status'=>$res);
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
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course!="" && $stud!="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course,'admission.name'=>$stud);
        }
        else if($from_dt!=$dt && $course!="" && $stud!="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course,'admission.name'=>$stud);
        }
         else if($from_dt==$dt && $course!="" && $stud!="" && $fran!="" && $res=="")
        {
             $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran,'admission.name'=>$stud);
        }
        else if($from_dt==$dt && $course!="" && $stud!="" && $fran!="" && $res!="")
        {
             $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran,'admission.name'=>$stud);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res!="")
        {
             $array=array('exm_status.status'=>$res);
        }
		else if($from_dt==$dt && $course=="" && $stud!="" && $fran!="" && $res=="")
        {
             $array=array('admission.fran_name'=>$fran,'admission.name'=>$stud);
        }

        $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
        $this->db->from('admission');
        $this->db->join('exm_status','exm_status.siid=admission.id');
        $this->db->where($array);
        $query=$this->db->get();
        return $query->num_rows();
}



/*	public function get_pass_stud($limit,$start,$from_dt,$course,$stud,$fran,$res)
    {
        $dt=date('Y-m-d');
        $array=array();
        if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res=="")
        {
              $this->db->limit($limit,$start);
              $this->db->order_by('exm_status.stud_id');
              $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
              $this->db->from('admission');
              $this->db->join('exm_status','exm_status.siid=admission.id');
              $query=$this->db->get();
              return $query->result_array();
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
            $array=array('admission.fran_name'=>$fran);
        }
        else if($from_dt==!$dt && $course=="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('admission.fran_name'=>$fran,'exm_status.status'=>$res);
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
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran!="" && $res!="")
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
        
       
        $this->db->limit($limit,$start);
        $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
        $this->db->from('admission');
        $this->db->join('exm_status','exm_status.siid=admission.id');
        $this->db->where($array);
        $query=$this->db->get();
        return $query->result_array();
    }*/


 public function get_pass_stud($limit,$start,$from_dt,$course,$stud,$fran,$res)
    {
        $dt=date('Y-m-d');
        $array=array();
        if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res=="")
        {
              $this->db->limit($limit,$start);
              $this->db->order_by('exm_status.id','desc');
              $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
              $this->db->from('admission');
              $this->db->join('exm_status','exm_status.siid=admission.id');
              $query=$this->db->get();
              return $query->result_array();
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran=="" && $res=="")
        {
              $array=array('exm_status.exm_date'=>$from_dt);
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran=="" && $res!="")
        {
              $array=array('exm_status.exm_date'=>$from_dt,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
              $array=array('exm_status.exm_date'=>$from_dt,'exm_status.status'=>$res,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
              $array=array('exm_status.exm_date'=>$from_dt,'exm_status.status'=>$res,'admission.fran_name'=>$fran);
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
            $array=array('admission.fran_name'=>$fran);
        }
        else if($from_dt==!$dt && $course=="" && $stud=="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('admission.fran_name'=>$fran,'exm_status.status'=>$res);
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
        else if($from_dt==$dt && $course!="" && $stud=="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran,'exm_status.status'=>$res);
        }
        else if($from_dt!=$dt && $course!="" && $stud!="" && $fran!="" && $res=="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course,'admission.name'=>$stud);
        }
        else if($from_dt!=$dt && $course!="" && $stud!="" && $fran!="" && $res!="")
        {
            $array=array('exm_status.exm_date'=>$from_dt,'admission.fran_name'=>$fran,'exm_status.course'=>$course,'admission.name'=>$stud);
        }
         else if($from_dt==$dt && $course!="" && $stud!="" && $fran!="" && $res=="")
        {
             $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran,'admission.name'=>$stud);
        }
        else if($from_dt==$dt && $course!="" && $stud!="" && $fran!="" && $res!="")
        {
             $array=array('exm_status.course'=>$course,'admission.fran_name'=>$fran,'admission.name'=>$stud);
        }
        else if($from_dt==$dt && $course=="" && $stud=="" && $fran=="" && $res!="")
        {
             $array=array('exm_status.status'=>$res);
        }
		else if($from_dt==$dt && $course=="" && $stud!="" && $fran!="" && $res=="")
        {
             $array=array('admission.fran_name'=>$fran,'admission.name'=>$stud);
        }
        
       
        $this->db->limit($limit,$start);
        $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
        $this->db->from('admission');
        $this->db->join('exm_status','exm_status.siid=admission.id');
        $this->db->order_by('exm_status.id','desc');
        $this->db->where($array);
        $query=$this->db->get();
        return $query->result_array();
    }

	public function get_stud_info($name)  
    {

           $query = $this->db->query("SELECT admission.name
                FROM admission,exm_status where admission.id=exm_status.siid
                And admission.name LIKE '%".$name."%' 
                GROUP BY admission.id");
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
$this->db->order_by('state_id','desc');
$query=$this->db->get('state');
return $query->result();

}
$this->db->limit($limit,$start);
$this->db->where($arr);
$query=$this->db->get('state');
return $query->result();

}


public function count_state_display($sname)
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
$this->db->order_by('city_id','desc');
$query=$this->db->get();
return $query->result();
}
$this->db->limit($limit,$start);
$this->db->select('state.name As State_Name,city.city_id,city.name As City_Name');
$this->db->from('city');
$this->db->join('state','state.state_id=city.state_id');
$this->db->order_by('city_id','desc');
$this->db->where($arr);
$query=$this->db->get();
return $query->result();
}

public function count_city_display($st_name,$ct_name)
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
$this->db->order_by('id','desc');
$query=$this->db->get('fran_placement');
return $query->result();
} 

/****************Mukesh Work Start********************/


function Demo_Enquiry_display($cp,$fname,$from_date,$to_date)
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
	  else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp!="")
      {
         $array=array('stud_name'=>$cp);
      }
      else if($from_date!=$dt && $to_date==$dt && $fname!="" && $cp=="")
      {
         $array=array('enq_date >='=>$form_dt,'enq_dt <='=>$to_date);
      }
      else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp=="")
      {
         $array=array('enq_date'=>$dt);
      } 
         //print_r($array);
         $this->db->where($array);
         $query = $this->db->get("demoenquiry");
         return $query->num_rows();
    }


public function Demo_Active_Fran_Enquiry_display($limit, $start,$cp,$fname,$from_date,$to_date)
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
	  else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp!="")
      {
         $array=array('stud_name'=>$cp);
      }
      else if($from_date!=$dt && $to_date==$dt && $fname!="" && $cp=="")
      {
         $array=array('enq_date >='=>$form_dt,'enq_dt <='=>$to_date);
      }
      else if($from_date==$dt && $to_date==$dt && $fname=="" && $cp=="")
      {
         $array=array('enq_date'=>$dt);
      } 
			  $this->db->order_by('id','Desc');
              $this->db->limit($limit, $start); 
              $this->db->where($array);
              $query = $this->db->get("demoenquiry");
     
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;

} 
	
	
public function Demo_order_count($from_dt,$to_dt,$fname)
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
	 else if($from_dt==$dt && $to_dt!=$dt && $fname!="")
     { 
        $array=array('o_date'=>$to_dt,'Customer_Name'=>$fname); 
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
     $query=$this->db->get('demoorder');
     return $query->num_rows();
}
	
	public function Demo_order_Data($limit,$start,$from_dt,$to_dt,$fname)
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
	 else if($from_dt==$dt && $to_dt!=$dt && $fname!="")
     { 
        $array=array('o_date'=>$to_dt,'Customer_Name'=>$fname); 
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
     $this->db->order_by('o_id','desc');
     $this->db->limit($limit, $start);
     $this->load->database();
     $this->db->select('O_id,o_date,f_id,Customer_Name,SUM(Quanitity) AS Total_quantity,SUM(Price) AS Total_Price,Status');
	 $this->db->group_by('o_date');
     $this->db->where($array);
     $query=$this->db->get('demoorder');
	   return $query->result();
}


	
	function Demo_Student_Admission($limit,$start,$cname,$from_dt,$to_dt,$sname)
{
       $dt = date('Y-m-d');
       $array=array();
        if($cname!="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				$array=array('course_Name'=>$cname,'fran_Name'=>$sname);
			}
			else{
                $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname,'fran_Name'=>$sname);
			}
        }
        else if($cname=="" && $from_dt!="" && $to_dt!="" && $sname!="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				 $array=array('fran_Name'=>$sname);
			}
			else
			{
            $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'fran_Name'=>$sname);
			}
        }
        else if($cname!="" && $from_dt!="" && $to_dt!="" && $sname=="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				$array=array('course_Name'=>$cname);
			}
			else
			{
             $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'course_Name'=>$cname);
			}
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
            $array=array('course_date'=>$dt);
        }
        $this->db->order_by('id','desc');
        $this->db->limit($limit, $start);
        $this->db->where($array);
        $query=$this->db->get('demoadmission');
        //print_r($query->result_array());
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;     
}	



public function Franchisee_Detail_count1($from_dt,$to_dt,$sname,$cname)
{
        $array=array();
        $dt=date('Y-m-d');
        if($from_dt!=$dt && $to_dt!="" && $sname!="" && $cname!="")
        {
           $array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt,'democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
        }
        else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				$array=array('democustomerinfo.state'=>$sname);
			}
			else
			{
				$array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt,'democustomerinfo.state'=>$sname);
			}
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname!="")
        {
           $array=array('democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
        }
        else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="")
        {
           $array=array('democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
        }
        else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname=="")
        {
           $array=array('democustomer.date'=>$from_date);
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
        {
          
           $array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
        {
              
                $this->db->select('democustomer.cus_id,democustomer.status,democustomer.password,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
                $this->db->from('democustomer');
                $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
                $this->db->join('state', 'democustomerinfo.state = state.state_id');
                $this->db->join('city', 'democustomerinfo.city = city.city_id');
                $this->db->where($array);
                $query=$this->db->get();
                //print_r($query->result_array());
                //die("dsdasds");
                 return $query->num_rows();
 
    
        }
        //print_r($array);

        $this->db->select('democustomer.cus_id,democustomer.fran_id,democustomer.status,democustomer.password,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City');
        $this->db->from('democustomer');
        $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
        $this->db->join('state', 'democustomerinfo.state = state.state_id');
        $this->db->join('city', 'democustomerinfo.city = city.city_id');
        $query=$this->db->get();
        return $query->num_rows();
}



public function Franchisee_Detail1($limit,$start,$from_dt,$to_dt,$sname,$cname)
{
        $array=array();
        $dt=date('Y-m-d');
        if($from_dt!=$dt && $to_dt!="" && $sname!="" && $cname!="")
        {
           $array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt,'democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
        }
        else if($from_dt!="" && $to_dt!="" && $sname!="" && $cname=="")
        {
			if($from_dt==$dt && $to_dt==$dt)
			{
				$array=array('democustomerinfo.state'=>$sname);
			}
			else
			{
				$array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt,'democustomerinfo.state'=>$sname);
			}
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname!="" && $cname!="")
        {
           $array=array('democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
        }
        else if($from_dt=="" && $to_dt=="" && $sname!="" && $cname!="")
        {
           $array=array('democustomerinfo.state'=>$sname,'democustomerinfo.city'=>$cname);
        }
        else if($from_dt!="" && $to_dt=="" && $sname=="" && $cname=="")
        {
           $array=array('democustomer.date'=>$from_date);
        }
        else if($from_dt!=$dt && $to_dt!=$dt && $sname=="" && $cname=="")
        {
          
           $array=array('democustomer.date >='=>$from_dt,'democustomer.date <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt && $sname=="" && $cname=="")
        {
               
                $this->db->select('democustomer.cus_id,democustomer.fran_id,democustomer.status,democustomerinfo.address,democustomer.password,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City,democustomerinfo.pincode,democustomerinfo.district');
                $this->db->from('democustomer');
                $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
                $this->db->join('state', 'democustomerinfo.state = state.state_id');
                $this->db->join('city', 'democustomerinfo.city = city.city_id');
                $this->db->order_by('democustomer.cus_id','desc');
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
       // print_r($array);
        $this->db->select('democustomer.cus_id,democustomer.fran_id,democustomer.status,democustomer.password,democustomerinfo.state,democustomerinfo.city,democustomerinfo.cus_mobile,democustomer.email,democustomer.fname,democustomerinfo.femail,democustomerinfo.institute_name,state.name As State,city.name As City,democustomerinfo.pincode,democustomerinfo.district,democustomerinfo.address');
        $this->db->from('democustomer');
        $this->db->join('democustomerinfo', 'democustomer.cus_id = democustomerinfo.cus_id');
        $this->db->join('state', 'democustomerinfo.state = state.state_id');
        $this->db->join('city', 'democustomerinfo.city = city.city_id');
        $this->db->where($array);
        $this->db->order_by('democustomer.cus_id','Asc');
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



public function get_certi_berfore_data_count($from_dt,$to_dt,$fname,$stud,$course)
{

      $dt=date("Y-m-d");
      $array=array();
      

      if($from_dt!=$dt && $to_dt==$dt && $fname=="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname=="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt);
      }
      else if($from_dt==$dt && $to_dt!=$dt && $fname=="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt);
      }
    

      else if($from_dt!=$dt && $to_dt==$dt && $fname=="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.course_Name'=>$course);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname=="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.course_Name'=>$course);
      }
      else if($from_dt==$dt && $to_dt!=$dt && $fname=="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.course_Name'=>$course);
      }
      else if($from_dt==$dt && $to_dt==$dt && $fname=="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_Name'=>$course);
      }
      
      else if($from_dt==$dt && $to_dt==$dt && $fname!="" && $stud=="" && $course=="")
      {
         $array=array('admission.fran_name'=>$fname);
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname!="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_Name >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.fran_name'=>$fname);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname!="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_Name >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.fran_name'=>$fname);
      }
      else if($from_dt==$dt && $to_dt!=$dt && $fname!="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_Name >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.fran_name'=>$fname);
      }

      else if($from_dt!=$dt && $to_dt==$dt && $fname!="" && $stud=="" && $course!="")
      {
         $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'admission.fran_name'=>$fname,'admission.course_Name'=>$course);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname!="" && $stud=="" && $course!="")
      {
         $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'admission.fran_name'=>$fname,'admission.course_Name'=>$course);
      }
      else if($from_dt==$dt && $to_dt!=$dt && $fname!="" && $stud=="" && $course!="")
      {
         $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'admission.fran_name'=>$fname,'admission.course_Name'=>$course);
      }
      else if($from_dt==$dt && $to_dt==$dt && $fname!="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_Name'=>$course,'admission.fran_name'=>$fname);
      }

      
      
      else if($from_dt==$dt && $to_dt==$dt && ($fname!="" || $fname=="") && $stud!="" && ($course!="" || $course==""))
      {
         $array=array('admission.name'=>$stud);
      }
      else if($from_dt!=$dt && $to_dt==$dt && ($fname!="" || $fname=="") && $stud!="" && ($course!="" || $course==""))
      {
         $array=array('admission.name'=>$stud);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && ($fname!="" || $fname=="") && $stud!="" && ($course!="" || $course==""))
      {
         $array=array('admission.name'=>$stud);
      }
      else if($from_dt==$dt && $to_dt!=$dt && ($fname!="" || $fname=="") && $stud!="" && ($course!="" || $course==""))
      {
         $array=array('admission.name'=>$stud);
      }
      
      else if($from_dt==$dt && $to_dt==$dt && $fname=="" && $stud=="" && $course=="")
      { 
        $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
        $this->db->from('exm_status');
        $this->db->join('admission','exm_status.siid=admission.id');
        if($fname==""){
        	$this->db->where(array('admission.e_status'=>'Complete','exm_status.certi_status'=>"NotIssued",'admission.f_id'=>'834'));
		}else
			$this->db->where(array('admission.e_status'=>'Complete','exm_status.certi_status'=>"NotIssued"));
        $this->db->group_by('admission.id');
        $query=$this->db->get('before_certi');
        return $query->num_rows();
      }  
       
        $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
        $this->db->from('exm_status');
        $this->db->join('admission','exm_status.siid=admission.id');
        if($fname==""){
        	$this->db->where(array('admission.e_status'=>'Complete','exm_status.certi_status'=>"NotIssued",'admission.f_id'=>'834'));
		}else
			$this->db->where(array('admission.e_status'=>'Complete','exm_status.certi_status'=>"NotIssued"));
        $this->db->where($array);
        $this->db->group_by('admission.id');
        $query=$this->db->get('before_certi');
        return $query->num_rows();

}


public function get_certi_berfore_data($limit,$start,$from_dt,$to_dt,$fname,$stud,$course)
{
      $dt=date("Y-m-d");
      $array=array();
      

      if($from_dt!=$dt && $to_dt==$dt && $fname=="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname=="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt);
      }
      else if($from_dt==$dt && $to_dt!=$dt && $fname=="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt);
      }
      

      else if($from_dt!=$dt && $to_dt==$dt && $fname=="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.course_Name'=>$course);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname=="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.course_Name'=>$course);
      }
      else if($from_dt==$dt && $to_dt!=$dt && $fname=="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_date >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.course_Name'=>$course);
      }
      else if($from_dt==$dt && $to_dt==$dt && $fname=="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_Name'=>$course);
      }
     

      else if($from_dt==$dt && $to_dt==$dt && $fname!="" && $stud=="" && $course=="")
      {
         $array=array('admission.fran_name'=>$fname);
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname!="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_Name >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.fran_name'=>$fname);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname!="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_Name >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.fran_name'=>$fname);
      }
      else if($from_dt==$dt && $to_dt!=$dt && $fname!="" && $stud=="" && $course=="")
      {
         $array=array('admission.course_Name >='=>$from_dt,'admission.course_date <='=>$to_dt,'admission.fran_name'=>$fname);
      }

      else if($from_dt!=$dt && $to_dt==$dt && $fname!="" && $stud=="" && $course!="")
      {
         $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'admission.fran_name'=>$fname,'admission.course_Name'=>$course);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname!="" && $stud=="" && $course!="")
      {
         $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'admission.fran_name'=>$fname,'admission.course_Name'=>$course);
      }
      else if($from_dt==$dt && $to_dt!=$dt && $fname!="" && $stud=="" && $course!="")
      {
         $array=array('course_date >='=>$from_dt,'course_date <='=>$to_dt,'admission.fran_name'=>$fname,'admission.course_Name'=>$course);
      }
      else if($from_dt==$dt && $to_dt==$dt && $fname!="" && $stud=="" && $course!="")
      {
         $array=array('admission.course_Name'=>$course,'admission.fran_name'=>$fname);
      }

      else if($from_dt==$dt && $to_dt==$dt && ($fname!="" || $fname=="") && $stud!="" && ($course!="" || $course==""))
      {
         $array=array('admission.name'=>$stud);
      }
      else if($from_dt!=$dt && $to_dt==$dt && ($fname!="" || $fname=="") && $stud!="" && ($course!="" || $course==""))
      {
         $array=array('admission.name'=>$stud);
      }
      else if($from_dt!=$dt && $to_dt!=$dt && ($fname!="" || $fname=="") && $stud!="" && ($course!="" || $course==""))
      {
         $array=array('admission.name'=>$stud);
      }
      else if($from_dt==$dt && $to_dt!=$dt && ($fname!="" || $fname=="") && $stud!="" && ($course!="" || $course==""))
      {
         $array=array('admission.name'=>$stud);
      }
     
      else if($from_dt==$dt && $to_dt==$dt && $fname=="" && $stud=="" && $course=="")
      {
          $this->db->limit(5,$start);
          $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
          $this->db->from('exm_status');
          $this->db->join('admission','exm_status.siid=admission.id');
          if($fname==""){
        	$this->db->where(array('admission.e_status'=>'Complete','exm_status.certi_status'=>"NotIssued",'admission.f_id'=>'834'));
		}else
			$this->db->where(array('admission.e_status'=>'Complete','exm_status.certi_status'=>"NotIssued"));
		  //$this->db->or_where('exm_status.certi_status'=>"NotIssued");	
          $this->db->group_by('admission.id');
          $query=$this->db->get();
          return $query->result_array();
      }  
          $this->db->limit(5,$start);
          $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark');
          $this->db->from('exm_status');
          $this->db->join('admission','exm_status.siid=admission.id');
          if($fname==""){
        	$this->db->where(array('admission.e_status'=>'Complete','exm_status.certi_status'=>"NotIssued",'admission.f_id'=>'834'));
		}else
			$this->db->where(array('admission.e_status'=>'Complete','exm_status.certi_status'=>"NotIssued"));
		  //$this->db->or_where('exm_status.certi_status'=>"NotIssued");	
          $this->db->where($array);
          $this->db->group_by('admission.id');
          $query=$this->db->get();
          return $query->result_array();

}


public function set_certi_date($id,$from_dt)
{
   $this->db->set('to_dt',$from_dt);
   $this->db->where('id',$id);
   $query=$this->db->update('before_certi');
   if($query)
   {
      return true;
   }
   else
   {
      return false;
   }
}


/*public function get_summary_details($session)
{
   $this->db->select('count(admission.id) as admission_count,admission.course_date');
   $this->db->select('count(enquiry.id) as enquiry_count,enquiry.enq_date');
   $this->db->select('count(forder.O_Id) as Order_Count,forder.o_date');
   $this->db->from('customers');
   $this->db->join("admission","customers.cus_id=admission.f_id");
   $this->db->join("enquiry","customers.cus_id=enquiry.f_id");
   $this->db->join("forder","customers.cus_id=forder.f_id");
   $this->db->where('admission.f_id',$session->cus_id);
   $this->db->where('enquiry.f_id',$session->cus_id);
   $this->db->where('forder.f_id',$session->cus_id);
   $this->db->group_by(array("admission.course_date","enquiry.enq_date",'forder.o_date') ); 
   $query=$this->db->get();
   return $query->result_array();
}*/

/********************End******************************/
 public function issued_certi_data_count($from_dt,$to_dt,$fname,$course,$stud)
 { 
      $dt=date('Y-m-d');
      $array=array();
      
      if($from_dt==$dt && $to_dt==$dt && $fname=="" && $course=="" && $stud=="")
      {
          
          $this->db->where('status','Issued');
          $query=$this->db->get('before_certi');
          return $query->num_rows();
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname=="" && $course=="" && $stud=="")
      {
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname=="" && $course=="" && $stud=="")
      {
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'status'=>'Issued');
      }
      /*************Franch Wise**********************************/
      else if($from_dt==$dt && $to_dt==$dt && $fname!="" && $course=="" && $stud=="")
      {
        $array=array('fname'=>$fname,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname!="" && $course=="" && $stud=="")
      {
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname!="" && $course=="" && $stud=="")
      {
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'status'=>'Issued');
      }

      /*******************course Wise************************/
      
      else if($from_dt==$dt && $to_dt==$dt && $fname=="" && $course!="" && $stud=="")
      {
         $array=array('course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname=="" && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname=="" && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'course'=>$course,'status'=>'Issued');
      }

      /**********************************franch and course Wise************************/

      else if($from_dt==$dt && $to_dt==$dt && $fname!="" && $course!="" && $stud=="")
      {
         $array=array('fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname!="" && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname!="" && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }      

      /*********************************Student Wise**********************************/

      else if($from_dt==$dt && $to_dt==$dt && ($fname!="" || $fname=="") && ($course!="" || $course=="") && $stud!="")
      {
         $array=array('stud_name'=>$stud,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt==$dt && ($fname!="" || $fname=="") && ($course!="" || $course=="") && $stud!="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && ($fname!="" || $fname=="") && ($course!="" || $course=="") && $stud!="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }

      
      $this->db->where($array);
      $this->db->order_by('id','desc');
      $query=$this->db->get('before_certi');
      return $query->num_rows();



 }
 
 public function issued_certi_data($from_dt,$to_dt,$fname,$course,$stud,$pageindex) 
 {
      $dt=date('Y-m-d');
      $array=array();
      $limit=5;
      if($pageindex >= 1)
      {
         $start=intval(($pageindex-1)*5);
         
      }

      if($from_dt==$dt && $to_dt==$dt && $fname=="" && $course=="" && $stud=="")
      {
          $this->db->limit($limit,$start);
          $this->db->where('status','Issued');
          $query=$this->db->get('before_certi');
          return $query->result_array();
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname=="" && $course=="" && $stud=="")
      {
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname=="" && $course=="" && $stud=="")
      {
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt);
      }
      /*************Franch Wise**********************************/
      else if($from_dt==$dt && $to_dt==$dt && $fname!="" && $course=="" && $stud=="")
      {
        $array=array('fname'=>$fname,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname!="" && $course=="" && $stud=="")
      {
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname!="" && $course=="" && $stud=="")
      {
        $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'status'=>'Issued');
      }

      /*******************course Wise************************/
      
      else if($from_dt==$dt && $to_dt==$dt && $fname=="" && $course!="" && $stud=="")
      {
         $array=array('course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname=="" && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname=="" && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'course'=>$course,'status'=>'Issued');
      }

      /**********************************franch and course Wise************************/

      else if($from_dt==$dt && $to_dt==$dt && $fname!="" && $course!="" && $stud=="")
      {
         $array=array('fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt==$dt && $fname!="" && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && $fname!="" && $course!="" && $stud=="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }      

      /*********************************Student Wise**********************************/

      else if($from_dt==$dt && $to_dt==$dt && ($fname!="" || $fname=="") && ($course!="" || $course=="") && $stud!="")
      {
         $array=array('stud_name'=>$stud,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt==$dt && ($fname!="" || $fname=="") && ($course!="" || $course=="") && $stud!="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }
      else if($from_dt!=$dt && $to_dt!=$dt && ($fname!="" || $fname=="") && ($course!="" || $course=="") && $stud!="")
      {
         $array=array('exame_date >='=>$from_dt,'exame_date <='=>$to_dt,'fname'=>$fname,'course'=>$course,'status'=>'Issued');
      }

      $this->db->limit($limit,$start);
      $this->db->where($array);
      $query=$this->db->get('before_certi');
      return $query->result_array();
 }


 
 public function get_certi_stud($name)
 {
    $query = $this->db->query("SELECT stud_name
                FROM before_certi
                Where stud_name LIKE '%".$name."%' 
                GROUP BY stud_name");
            echo json_encode($query->result_array());
 }
 
 public function get_certi_franch($name)
 {
    $query = $this->db->query("SELECT fname
                FROM before_certi
                Where fname LIKE '%".$name."%' 
                GROUP BY fname");
            echo json_encode($query->result_array());
 }

public function get_rec_max_id()
{
    $row = $this->db->query('SELECT MAX(r_id) AS maxid FROM acc_history')->row();
  
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
 
 function Reeipt_display1($std,$session)
{
      $dt=date('Y-m-d');
      if($std!="")
        {
           $array=array('particular'=>$std,'type'=>'Income','f_id'=>$session->cus_id);
        }
        else if($std=="")
        {
                $this->db->where(array('type'=>'Income','adate'=>$dt,'f_id'=>$session->cus_id));
                $query=$this->db->get('acc_history');
                $query->num_rows();
                return $query->num_rows();
        }
       
    $this->db->where($array);
    $this->load->database();
    $query=$this->db->get('acc_history');
    return $query->num_rows();
}   
public function Receipt_Paging1($limit,$start,$std,$session)
     {
        $dt=date('Y-m-d');
        $array=array();
       if($std!="")
        {
           $array=array('particular'=>$std,'type'=>'Income','f_id'=>$session->cus_id);
        }
        
        else if($std=="")
        {
                
                $this->db->limit($limit, $start);
                $this->db->where(array('type'=>'Income','adate'=>$dt,'f_id'=>$session->cus_id));
                $query1 = $this->db->get("acc_history");         
                if ($query1->num_rows() > 0) {
                    foreach ($query1->result() as $row) {
                        $data[] = $row;
                    }
                    return $data;
                }
                return false;
        }
        
        
        $this->db->where($array);
        $query = $this->db->get("acc_history");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   

function Reeipt_display($std,$session,$from_dt,$to_dt)
{
	  $array=array();
      $dt=date('Y-m-d');
      if($std!="" && $from_dt==$dt && $to_dt==$dt)
        {
           $array=array('particular'=>$std,'type'=>'Income','f_id'=>$session->cus_id);
        }
		
		
		 else if($std!="" && $from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'f_id'=>$session->cus_id,'particular'=>$std,'type'=>'Income');           
        }
		
		else if($std=="" && $from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'f_id'=>$session->cus_id,'type'=>'Income');           
        }
		
		else if($std=="" && $from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('adate >='=>$from_dt,'adate >='=>$to_dt,'f_id'=>$session->cus_id,'type'=>'Income');           
        }
		else if($std!="" && $from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('adate >='=>$from_dt,'adate >='=>$to_dt,'f_id'=>$session->cus_id,'particular'=>$std,'type'=>'Income');           
        }		
        else if($std=="" && $from_dt==$dt && $to_dt==$dt)
		{
			 $array=array('type'=>'Income','adate'=>$dt,'f_id'=>$session->cus_id);
		}

    $this->db->where($array);
    $this->load->database();
    $query=$this->db->get('acc_history');
    return $query->num_rows();
}   
public function Receipt_Paging($limit,$start,$std,$from_dt,$to_dt,$session)
     {
        $dt=date('Y-m-d');
        $array=array();
		
       if($std!="" && $from_dt==$dt && $to_dt==$dt)
        {
           $array=array('particular'=>$std,'type'=>'Income','f_id'=>$session->cus_id);
        }
		
		
		 else if($std!="" && $from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'f_id'=>$session->cus_id,'particular'=>$std,'type'=>'Income');           
        }
		
		else if($std=="" && $from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'f_id'=>$session->cus_id,'type'=>'Income');           
        }
		
		else if($std=="" && $from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('adate >='=>$from_dt,'adate >='=>$to_dt,'f_id'=>$session->cus_id,'type'=>'Income');           
        }
		else if($std!="" && $from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('adate >='=>$from_dt,'adate >='=>$to_dt,'f_id'=>$session->cus_id,'particular'=>$std,'type'=>'Income');           
        }		
        else if($std=="" && $from_dt==$dt && $to_dt==$dt)
		{
			 $array=array('type'=>'Income','adate'=>$dt,'f_id'=>$session->cus_id);
		}
       
         $this->db->limit($limit, $start);
        $this->db->where($array);
		$this->db->order_by('id','Desc');
        $query = $this->db->get("acc_history");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }






   
 function Expense_display($from_dt,$to_dt,$session)
{
       $array=array();
       $dt=date('Y-m-d');
       if($from_dt==$dt && $to_dt!=$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'type'=>'Expense','f_id'=>$session->cus_id);
        }
        
        else if($from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'type'=>'Expense','f_id'=>$session->cus_id);
        }
     else if($from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'type'=>'Expense','f_id'=>$session->cus_id);
        }
     else if($from_dt==$dt && $to_dt==$dt)
        {
           
                 $this->db->where(array('adate'=>$dt,'type'=>'Expense','f_id'=>$session->cus_id));
                 $query1 = $this->db->get("acc_history");
                if ($query1->num_rows() > 0) {
                    return $query1->num_rows();
                }
                return false;
        }
        
        
        $this->db->where($array);
        $query = $this->db->get("acc_history"); 
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
}   
public function Expense_Paging($limit,$start,$from_dt,$to_dt,$session)
     {
        
       $array=array();
     $dt=date('Y-m-d');
       if($from_dt==$dt && $to_dt!=$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'type'=>'Expense','f_id'=>$session->cus_id);
        }
        
        else if($from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'type'=>'Expense','f_id'=>$session->cus_id);
        }
     else if($from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'type'=>'Expense','f_id'=>$session->cus_id);
        }
     else if($from_dt==$dt && $to_dt==$dt)
        {
           
                $this->db->limit($limit, $start);
				$this->db->order_by('id','desc');
                $this->db->where(array('adate'=>$dt,'type'=>'Expense','f_id'=>$session->cus_id));
                $query1 = $this->db->get("acc_history");
         
                if ($query1->num_rows() > 0) {
                    foreach ($query1->result() as $row) {
                        $data[] = $row;
                    }
                    return $data;
                }
                return false;
        }
        
        
        $this->db->where($array);
        $query = $this->db->get("acc_history");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

 
 /***************************End Receipt**************************************/ 
public function Expense_Detail_count($from_dt,$to_dt)
{
        $array=array();
        $dt=date('Y-m-d');
        if($from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('edate >='=>$from_dt,'edate <='=>$to_dt);
       
        }
        else if($from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('edate >='=>$from_dt,'edate <='=>$to_dt);
        }
     else if($from_dt==$dt && $to_dt!=$dt)
        {
           $array=array('edate >='=>$from_dt,'edate <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt)
        {
                $this->db->select('id,f_id,particular,naration,edate,amount');
                $this->db->from('expense');
                $this->db->order_by('id','Asc');
                $query=$this->db->get();
                return $query->num_rows();
    }
        $this->db->select('id,f_id,particular,naration,edate,amount');
        $this->db->from('expense');
        $this->db->where($array);
        $this->db->order_by('id','Asc');
        $query=$this->db->get();
        return $query->num_rows();
}   
public function Expense_Detail($limit,$start,$from_dt,$to_dt)
{
        $array=array();
        $dt=date('Y-m-d');
      if($from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('edate >='=>$from_dt,'edate <='=>$to_dt);
        }
        else if($from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('edate >='=>$from_dt,'edate <='=>$to_dt);
        }
     else if($from_dt==$dt && $to_dt!=$dt)
        {
           $array=array('edate >='=>$from_dt,'edate <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt)
        {
                $this->db->select('id,f_id,particular,naration,edate,amount');
                $this->db->from('expense');
                $this->db->limit($limit, $start);
                $query=$this->db->get();
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $data[] = $row;
                    }
                    return $data;
                }
              return false;
    }
        $this->db->select('id,f_id,particular,naration,edate,amount');
        $this->db->from('expense');
        $this->db->limit($limit, $start);
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

}










public function Receipt_Detailed_count($from_dt,$to_dt)
{
        $array=array();
        $dt=date('Y-m-d');
        if($from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('rdate >='=>$from_dt,'rdate <='=>$to_dt);
        }
        else if($from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('rdate >='=>$from_dt,'rdate <='=>$to_dt);
        }
     else if($from_dt==$dt && $to_dt!=$dt)
        {
           $array=array('rdate >='=>$from_dt,'rdate <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt)
        {
                $this->db->select('id,f_id,receipt_id,sname,rdate,amount');
                $this->db->from('receipt');
                $this->db->order_by('id','Asc');
                $query=$this->db->get();
                return $query->num_rows();
    }
        $this->db->select('id,f_id,receipt_id,sname,rdate,amount');
        $this->db->from('receipt');
        $this->db->where($array);
        $this->db->order_by('id','Asc');
        $query=$this->db->get();
        return $query->num_rows();
}   
public function Receipt_Detailed($limit,$start,$from_dt,$to_dt)
{
        $array=array();
        $dt=date('Y-m-d');
        if($from_dt!=$dt && $to_dt!=$dt)
        {
           $array=array('rdate >='=>$from_dt,'rdate <='=>$to_dt);
        }
        else if($from_dt!=$dt && $to_dt==$dt)
        {
           $array=array('rdate >='=>$from_dt,'rdate <='=>$to_dt);
        }
       else if($from_dt==$dt && $to_dt!=$dt)
        {
           $array=array('rdate >='=>$from_dt,'rdate <='=>$to_dt);
        }
        else if($from_dt==$dt && $to_dt==$dt)
        {
                $this->db->select('id,f_id,receipt_id,sname,rdate,amount');
                $this->db->from('receipt');
                $this->db->limit($limit, $start);
                $query=$this->db->get();
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $data[] = $row;
                    }
                    return $data;
                }
              return false;
    }
        $this->db->select('id,f_id,receipt_id,sname,rdate,amount');
        $this->db->from('receipt');
        $this->db->limit($limit, $start);
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

}
public function get_account_receipt_adm_history($limit,$start,$from_dt,$to_dt,$bname)
{
   
   $array=array();
   $dt=date('Y-m-d');
   if($from_dt==$dt && $to_dt!=$dt && $bname!="")
   {
       $array=array('adate >='=>$from_dt,'adate <='=>$to_dt ,'f_id'=>$bname);
   }
   else if($from_dt!=$dt && $to_dt==$dt && $bname!="")
   {
      $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'f_id'=>$bname);
   }
   else if($from_dt!=$dt && $to_dt!=$dt && $bname!="")
   {
      $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'f_id'=>$bname);
   }
   else if($from_dt==$dt && $to_dt==$dt && $bname!="")
   {
      $this->db->limit($limit,$start);
      $this->db->where(array('adate'=>$dt,'f_id'=>$bname));
      $query=$this->db->get('acc_history');
      return $query->result();
   }
   else if($from_dt==$dt && $to_dt==$dt && $bname=="")
   {
      $this->db->limit($limit,$start);
	  $this->db->order_by('id','desc');
      $this->db->where(array('adate'=>$dt));
      $query=$this->db->get('acc_history');
      return $query->result();
   }
   $this->db->where($array);
  $this->db->order_by('id','desc');
   $query=$this->db->get('acc_history');
   return $query->result();

}


public function Acc_adm_count($from_dt,$to_dt,$bname)
{
    $array=array();
   $dt=date('Y-m-d');
   if($from_dt==$dt && $to_dt!=$dt && $bname!="")
   {
       $array=array('adate >='=>$from_dt,'adate <='=>$to_dt ,'f_id'=>$bname);
   }
   else if($from_dt!=$dt && $to_dt==$dt && $bname!="")
   {
      $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'f_id'=>$bname);
   }
   else if($from_dt!=$dt && $to_dt!=$dt && $bname!="")
   {
      $array=array('adate >='=>$from_dt,'adate <='=>$to_dt,'f_id'=>$bname);
   }
   else if($from_dt==$dt && $to_dt==$dt && $bname=="")
   {
       $this->db->where(array('adate'=>$dt,'f_id'=>$bname));
      $query=$this->db->get('acc_history');
      return $query->num_rows();
   }
   else if($from_dt==$dt && $to_dt==$dt && $bname!="")
   {
      $this->db->where(array('adate'=>$dt,'f_id'=>$bname));
      $query=$this->db->get('acc_history');
      return $query->num_rows();
   }
   $this->db->where($array);
   $query=$this->db->get('acc_history');
   return $query->num_rows();

}


public function Acc_count($session,$from_dt,$to_dt)
{
   $array=array();
   $dt=date('Y-m-d');
   if($from_dt==$dt && $to_dt!=$dt)
   {
       $array=array('f_id'=>$session->cus_id,'adate >='=>$from_dt,'adate <='=>$to_dt);
   }
   else if($from_dt!=$dt && $to_dt==$dt)
   {
      $array=array('f_id'=>$session->cus_id,'adate >='=>$from_dt,'adate <='=>$to_dt);
   }
   else if($from_dt!=$dt && $to_dt!=$dt)
   {
      $array=array('f_id'=>$session->cus_id,'adate >='=>$from_dt,'adate <='=>$to_dt);
   }
   else if($from_dt==$dt && $to_dt==$dt)
   {
      $this->db->where(array('f_id'=>$session->cus_id,'adate'=>$dt));
      $query=$this->db->get('acc_history');
      return $query->num_rows();
   }
   $this->db->where($array);
   $query=$this->db->get('acc_history');
   return $query->num_rows();

}

public function get_account_expense_adm_history($from_dt,$to_dt)
{
   
   $array=array();
   $dt=date('Y-m-d');
   if($from_dt==$dt && $to_dt!=$dt)
   {
       $array=array('edate >='=>$from_dt,'edate <='=>$to_dt);
   }
   else if($from_dt!=$dt && $to_dt==$dt)
   {
      $array=array('edate >='=>$from_dt,'edate <='=>$to_dt);
   }
   else if($from_dt!=$dt && $to_dt!=$dt)
   {
      $array=array('edate >='=>$from_dt,'edate <='=>$to_dt);
   }
   else if($from_dt==$dt && $to_dt==$dt)
   {
      $this->db->where(array('edate'=>$dt));
      $query=$this->db->get('expense');
      return $query->result();
   }  
   $this->db->where($array);
   $query=$this->db->get('expense');
   return $query->result();

}



public function get_account_receipt_history($limit,$start,$session,$from_dt,$to_dt)
{
   $array=array();
   $dt=date('Y-m-d');
   if($from_dt==$dt && $to_dt!=$dt)
   {
       $array=array('f_id'=>$session->cus_id,'adate >='=>$from_dt,'adate <='=>$to_dt);
   }
   else if($from_dt!=$dt && $to_dt==$dt)
   {
      $array=array('f_id'=>$session->cus_id,'adate >='=>$from_dt,'adate <='=>$to_dt);
   }
   else if($from_dt!=$dt && $to_dt!=$dt)
   {
      $array=array('f_id'=>$session->cus_id,'adate >='=>$from_dt,'adate <='=>$to_dt);
   }
   else if($from_dt==$dt && $to_dt==$dt)
   {
      $this->db->limit($limit,$start);
	  $this->db->order_by('id','desc');
      $this->db->where(array('f_id'=>$session->cus_id,'adate'=>$dt));
      $query=$this->db->get('acc_history');
      return $query->result();
   }
   $this->db->limit($limit,$start);
    $this->db->order_by('id','desc');
   $this->db->where($array);
   $query=$this->db->get('acc_history');
   return $query->result();

}

public function get_account_expense_history($session,$from_dt,$to_dt)
{
   
   $array=array();
   $dt=date('Y-m-d');
   if($from_dt==$dt && $to_dt!=$dt)
   {
       $array=array('f_id'=>$session->cus_id,'adate >='=>$from_dt,'adate <='=>$to_dt,'type'=>'Expense');
   }
   else if($from_dt!=$dt && $to_dt==$dt)
   {
      $array=array('f_id'=>$session->cus_id,'adate >='=>$from_dt,'adate <='=>$to_dt,'type'=>'Expense');
   }
   else if($from_dt!=$dt && $to_dt!=$dt)
   {
      $array=array('f_id'=>$session->cus_id,'adate >='=>$from_dt,'adate <='=>$to_dt,'type'=>'Expense');
   }
   else if($from_dt==$dt && $to_dt==$dt)
   {
      $this->db->where(array('f_id'=>$session->cus_id,'adate'=>$dt,'type'=>'Expense'));
      $query=$this->db->get('acc_history');
      return $query->result();
   }  
   $this->db->where($array);
   $query=$this->db->get('acc_history');
   return $query->result();

}



function Emp_display($cname)
{
      $array=array();
        if($cname!="")
        {
           $array=array('cname'=>$cname);
        }
        else if($cname=="")
        {
            $this->db->order_by('id','desc');
			$query=$this->db->get('employeeenquiry');
			return $query->num_rows();
        }
        
        $this->db->where($array);
		$this->db->order_by('id','desc');
        $query=$this->db->get('employeeenquiry');
        return $query->num_rows();
}   
public function Emp_Paging($limit,$start,$cname)
     {
        
        $array=array();
        if($cname!="")
        {
           $array=array('cname'=>$cname);
        }
        else if($cname=="")
        {
            $this->db->order_by('id','desc');
			$query=$this->db->get('employeeenquiry');
			return $query->result();
        }       
		
		$this->db->limit($limit, $start);
        $this->db->where($array);
		$this->db->order_by('id','desc');
        $query = $this->db->get("employeeenquiry");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }


   
   
function Active_display($cname,$sname)
{
	 if($cname!="")
	 {
		 $query=$this->db->get_where('customers_info',array('institute_name'=>$cname));
		 $result=$query->num_rows();
	 }
   if($sname!="")
   {
     $query1=$this->db->get_where('admission',array('name'=>$sname));
     $result1=$query1->num_rows();
   }
      $array=array();
        if($cname!="" && $sname=="")
        {
           $array=array('customers_info.cus_id'=>$result[0]['cus_id']);
        }
        else if($cname=="" && $sname!="")
        {
           $array=array('active_stud.user_id'=>$result1[0]['stud_id']); 
        }
        else if($cname!="" && $sname!="")
        {
           $array=array('active_stud.user_id'=>$result1[0]['stud_id']); 
        }
        else if($cname=="")
        {
          $this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
					$this->db->from('active_stud');
					$this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
					$this->db->order_by('active_stud.cr_dt','desc');
					$query=$this->db->get();
					return $query->num_rows();
        }
      
        $this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
    		$this->db->from('active_stud');
    		$this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
    		$this->db->where($array);
    		$this->db->order_by('active_stud.cr_dt','desc');
    		$query=$this->db->get();
    		return $query->num_rows();
}   

public function Active_Paging($limit,$start,$cname,$sname)
     {
        
   if($cname!="")
	 {
		 $query=$this->db->get_where('customers_info',array('institute_name'=>$cname));
		 $result=$query->result_array();
	 }

   if($sname!="")
   {
     $query1=$this->db->get_where('admission',array('name'=>$sname));
     $result1=$query1->result_array();
   }

      $array=array();
        if($cname!="" && $sname=="")
        {
           $array=array('customers_info.cus_id'=>$result[0]['cus_id']);
        }
        else if($cname=="" && $sname!="")
        {
           $array=array('active_stud.user_id'=>$result1[0]['stud_id']); 
        }
        else if($cname!="" && $sname!="")
        {
           $array=array('active_stud.user_id'=>$result1[0]['stud_id']); 
        }
        else if($cname=="" && $sname=="")
        {
					$this->db->limit($limit,$start);
					$this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
					$this->db->from('active_stud');
					$this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
					$this->db->order_by('active_stud.valid_upto','desc');
					$query=$this->db->get();
					return $query->result();
        }       
		
		$this->db->limit($limit, $start);
    $this->db->select('customers_info.institute_name,active_stud.f_id,active_stud.a_id,active_stud.stud_name,active_stud.user_id,active_stud.password,active_stud.cr_dt,active_stud.valid_upto');
		$this->db->from('active_stud');
		$this->db->join('customers_info','customers_info.cus_id = active_stud.f_id');
		$this->db->order_by('active_stud.valid_upto','desc');
		$this->db->where($array);
		$query=$this->db->get();
	
		
       
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }





public function Jobs_display()
 {
      $this->db->where('status','Show');
           $query=$this->db->get('employeeenquiry');
       return $query->num_rows();
 } 
 
 public function job_Paging($limit,$start)
     {
    
       $this->db->limit($limit,$start);
		$this->db->where('status','Show');
       $query = $this->db->get("employeeenquiry");
         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
      return $data;
      
        }
    else
    {
        return false;
    }
   }
   
   
   
 public function Testi_display()
 {
	 $query=$this->db->get('testimonial');
	 return $query->result();
 }



function Testimonial_display($cname)
{
     /* $array=array();
        if($cname!="")
        {
           $array=array('cname'=>$cname);
        }
        else if($cname=="")
        {
            $this->db->order_by('id','desc');
			$query=$this->db->get('testimonial');
			return $query->num_rows();
        }
        
        $this->db->where($array);
		$this->db->order_by('id','desc');*/
        $query=$this->db->get('testimonial');
        return $query->num_rows();
}   
public function Testimonial1_Paging($limit,$start,$cname)
     {
        /*
        $array=array();
        if($cname!="")
        {
           $array=array('cname'=>$cname);
        }
        else if($cname=="")
        {
            $this->db->order_by('id','desc');
			$query=$this->db->get('testimonial');
			return $query->result();
        }       
		
		$this->db->limit($limit, $start);
        $this->db->where($array);*/
		$this->db->order_by('T_id','desc');
        $query = $this->db->get("testimonial");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }


public function Get_Gallery_count()
{
   $this->db->where('status','Active');
   $query=$this->db->get('gallery');
   return $query->num_rows();
}
public function Get_Gallery($limit,$start)
 {
	 $this->db->limit($limit,$start);
   $this->db->where('status','Active');
   $query=$this->db->get('gallery');
	 return $query->result();
 }

 public function Get_Gallery_Detail($id)
{
	$this->db->where('id',$id);
	$query=$this->db->get('gallery');
	return $query->result();
}


public function Module_Get($name)
{
		$this->db->select('quiz_cat_name');
        $this->db->from('quiz_category');
        $this->db->where('course',$name);
        $query=$this->db->get();
		return $query->num_rows();
		
}	

public function Get_Det($name,$fid)
{
	$this->db->select('exame_date,stud_id,course_Name,module_name,module_id');
	$query=$this->db->get_where('admission',array('stud_id'=>$name,'f_id'=>$fid));
	return $query->result_array();
}	
 
	
public function Module_Get1($name)
{
		$this->db->select('quiz_cat_name');
        $this->db->from('quiz_category');
        $this->db->where('course',$name);
        $query=$this->db->get();
		return $query->num_rows();
		
}



public function More_Test($id)
{
	$this->db->where('T_id',$id);
	$query=$this->db->get('testimonial');
	return $query->result();
}


public function get_news()
{
       //$this->db->limit(3,0);
       $this->db->order_by('n_id','desc');
       $query=$this->db->get('news');
       return $query->result_array();
}

public function get_News_id($id)
{
       $query=$this->db->get_where('news',array('n_id'=>$id));
       return $query->result_array(); 
}


public function getcertificateno($name)
{
        $query = $this->db->query("SELECT certi_id
                FROM issued_certificates where
                certi_id LIKE '%".$name."%' 
                GROUP BY certi_id order by siid");
            echo json_encode($query->result_array());
}

public function get_certi_stud_data($cid)
{
    $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id,issued_certificates.issued_date');
    $this->db->from('exm_status');
    $this->db->join('admission','exm_status.siid=admission.id');
    $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
    $this->db->where(array('issued_certificates.certi_id'=>$cid));
    $query=$this->db->get();
    return $query->result_array();
}


public function generate_certificate_stud_pdf($id)
{
    $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id,issued_certificates.issued_date');
    $this->db->from('exm_status');
    $this->db->join('admission','exm_status.siid=admission.id');
    $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
    $this->db->where(array('issued_certificates.certi_id'=>$id));
    $query=$this->db->get();
    $result=$query->result_array();

    $course=$result[0]['course_Name'];
    $mark=$result[0]['Total_mark'];
    $grade="";

    $farr=array();
    $farr =explode("-",$result[0]['issued_date']); 
    $farr=array_reverse($farr);
    $newfdate1 =implode($farr,"-");
    $fdt=str_replace("-","/",$newfdate1);

    if($course=="Tally Professional")
    {
       
        if($mark >= 150)
        {
           $grade="A";
        }
        else if($mark < 150)
        {
           $grade="B";
        }
    }
    if($course=="Master In Excel")
    {
       
        if($mark >= 110)
        {
           $grade="A";
        }
        else if($mark < 110)
        {
           $grade="B";
        }
    }
    if($course=="Smart Tally")
    {
       
        if($mark >= 75)
        {
           $grade="A";
        }
        else if($mark < 75)
        {
           $grade="B";
        }
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
    Website: <u>www.ccaindia.in</u></para><br><br><br><br><br><hr>');

    $pdf->SetFont('Arial','B',10); 
    $htmlTable= $result[0]['name']."<br>";
    $htmlTable .='<TABLE style="">
    <TR>
    <TD>Student Id</TD>
    <TD>'.$result[0]['stud_id'].'</TD>
    </TR>
    <TR>
    <TD>Student Name</TD>
    <TD>'.$result[0]['name'].'</TD>
    </TR>
    <TR>
    <TD>Course</TD>
    <TD>'.$result[0]['course_Name'].'</TD>
    </TR>
    <TR>
    <TD>Center Name</TD>
    <TD>'.$result[0]['fran_name'].'</TD>
    </TR>
    <TR>
    <TD>Certificate Id</TD>
    <TD>'.$result[0]['certi_id'].'</TD>
    </TR>
    <TR>
    <TD>Grade</TD>
    <TD>'.$grade.'</TD>
    </TR>
    <TR>
    <TD>Issued Date</TD>
    <TD>'.$fdt.'</TD>
    </TR>
    </TABLE>';
        
    $pdf->WriteHTML2("<br><br><br>$htmlTable");
    $pdf->Output("Details.pdf",'D');

    
}

public function issued_certificates($start,$fnm,$snm)
{
        $limit=5;
        $start=intval($start-1)*5;
        $array=array();
        if($fnm!="" && $snm=="")
        {
           $array=array('admission.fran_name'=>$fnm);
        }
        else if($fnm=="" && $snm!="")
        {
           $array=array('admission.name'=>$snm);    
        }
        else if($fnm!="" && $snm!="")
        {
          $array=array('admission.fran_name'=>$fnm);
        }  
        else if($fnm=="" && $snm=="")
        {
              $this->db->limit($limit,$start);
              $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id');
              $this->db->from('exm_status');
              $this->db->join('admission','exm_status.siid=admission.id');
              $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
              $this->db->where(array('admission.e_status'=>'Complete'));
              $this->db->group_by('admission.id');
              $query=$this->db->get();
              return $query->result_array();
        }      
              $this->db->limit($limit,$start);
              $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id');
              $this->db->from('exm_status');
              $this->db->join('admission','exm_status.siid=admission.id');
              $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
              $this->db->where(array('admission.e_status'=>'Complete'));
              $this->db->where($array);
              $this->db->group_by('admission.id');
              $query=$this->db->get();
              return $query->result_array();
}

public function issued_certificates_count($start,$fnm,$snm)
{
        $array=array();
        if($fnm!="" && $snm=="")
        {
           $array=array('admission.fran_name'=>$fnm);
        }
        else if($fnm=="" && $snm!="")
        {
           $array=array('admission.name'=>$snm);    
        }
        else if($fnm!="" && $snm!="")
        {
          $array=array('admission.fran_name'=>$fnm);
        }  
        else if($fnm=="" && $snm=="")
        {
              $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id');
              $this->db->from('exm_status');
              $this->db->join('admission','exm_status.siid=admission.id');
              $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
              $this->db->where(array('admission.e_status'=>'Complete'));
              $this->db->group_by('admission.id');
              $query=$this->db->get();
              return $query->num_rows();
        }      
              $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id');
              $this->db->from('exm_status');
              $this->db->join('admission','exm_status.siid=admission.id');
              $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
              $this->db->where(array('admission.e_status'=>'Complete'));
              $this->db->where($array);
              $this->db->group_by('admission.id');
              $query=$this->db->get();
              return $query->num_rows();
}




/* Original Certificate Code*/


public function get_final_Smart_Excel_certi($id)
{

    $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id,issued_certificates.issued_date');
    $this->db->from('exm_status');
    $this->db->join('admission','exm_status.siid=admission.id');
    $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
    $this->db->where(array('issued_certificates.certi_id'=>$id));
    $query=$this->db->get();
    $result=$query->result_array();

    $course=$result[0]['course_Name'];
    $mark=$result[0]['Total_mark'];
    $grade="";

    $farr=array();
    $farr =explode("-",$result[0]['issued_date']); 
    $farr=array_reverse($farr);
    $newfdate1 =implode($farr,"-");
    $fdt=str_replace("-","/",$newfdate1);


    $farr1=array();
    $farr1 =explode("-",$result[0]['course_date']); 
    $farr1=array_reverse($farr1);
    $newfdate11 =implode($farr1,"-");
    $from_dt=str_replace("-","/",$newfdate11);

    $tarr=array();
    $tarr =explode("-",$result[0]['exm_date']); 
    $tarr=array_reverse($tarr);
    $tdate =implode($farr,"-");
    $to_dt=str_replace("-","/",$tdate);

    $carr=array();
    $carr =explode("-",date('Y-m-d')); 
    $carr=array_reverse($carr);
    $cdate =implode($carr,"-");
    $cur_date=str_replace("-","/",$cdate);



    if($course=="Tally Professional")
    {
       
        if($mark >= 150)
        {
           $grade="A";
        }
        else if($mark < 150)
        {
           $grade="B";
        }
    }
    if($course=="Master In Excel")
    {
       
        if($mark >= 110)
        {
           $grade="A";
        }
        else if($mark < 110)
        {
           $grade="B";
        }
    }
    if($course=="Smart Tally")
    {
       
        if($mark >= 75)
        {
           $grade="A";
        }
        else if($mark < 75)
        {
           $grade="B";
        }
    }


$a="Certificate";
$exa = new TCPDF();
$exa->SetPrintHeader(false);
$exa->SetPrintFooter(false);  
$exa->addPage ();
$exa->SetMargins(10, 10, 10, 10, false);
$exa->SetAutoPageBreak(TRUE, -100);
$exa->SetXY(70, 210);
$exa->Rotate(90);
$exa->Cell(0,0, $result[0]['name'], 0, 0);
$exa->SetXY(70, 240);
$exa->Cell(0,0, $result[0]['fran_name'], 0, 0);
$exa->SetXY(85, 255);
$exa->Cell(0,0, $grade, 0, 0);
$exa->SetXY(69, 272);
$exa->Cell(0,0, $from_dt, 0, 0);
$exa->SetXY(119, 272);
$exa->Cell(0,0, $to_dt, 0, 0);
$exa->SetXY(68, 290);
$exa->Cell(0,0, $cur_date, 0, 0);
$exa->SetXY(48, 293);
$exa->Cell(30,30, date('Y-m-d'), 0, 0);
$exa->Output ($a.'.pdf', 'D' );
   if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
    }
  

}

public function get_final_tally_prof_certi($id)
{

    $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id,issued_certificates.issued_date');
    $this->db->from('exm_status');
    $this->db->join('admission','exm_status.siid=admission.id');
    $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
    $this->db->where(array('issued_certificates.certi_id'=>$id));
    $query=$this->db->get();
    $result=$query->result_array();

    $course=$result[0]['course_Name'];
    $mark=$result[0]['Total_mark'];
    $grade="";

    $farr=array();
    $farr =explode("-",$result[0]['issued_date']); 
    $farr=array_reverse($farr);
    $newfdate1 =implode($farr,"-");
    $fdt=str_replace("-","/",$newfdate1);


    $farr1=array();
    $farr1 =explode("-",$result[0]['course_date']); 
    $farr1=array_reverse($farr1);
    $newfdate11 =implode($farr1,"-");
    $from_dt=str_replace("-","/",$newfdate11);

    $tarr=array();
    $tarr =explode("-",$result[0]['exm_date']); 
    $tarr=array_reverse($tarr);
    $tdate =implode($farr,"-");
    $to_dt=str_replace("-","/",$tdate);

    $carr=array();
    $carr =explode("-",date('Y-m-d')); 
    $carr=array_reverse($carr);
    $cdate =implode($carr,"-");
    $cur_date=str_replace("-","/",$cdate);



    if($course=="Tally Professional")
    {
       
        if($mark >= 200)
        {
           $grade="A";
        }
        else if($mark < 200)
        {
           $grade="B";
        }
    }
    

$a="Certificate";
$exa = new TCPDF();
$exa->SetPrintHeader(false);
$exa->SetPrintFooter(false);  
$exa->addPage ();
$exa->SetMargins(10, 10, 10, 10, false);
$exa->SetAutoPageBreak(TRUE, -100);
$exa->SetXY(70, 185);
$exa->Rotate(90);
$exa->Cell(0,0, strtoupper($result[0]['name']), 0, 0);
$exa->SetXY(71, 224);
$exa->Cell(0,0, strtoupper($result[0]['fran_name']), 0, 0);
$exa->SetXY(95, 242);
$exa->Cell(0,0, $grade, 0, 0);
$exa->SetXY(65, 271);
$exa->Cell(0,0, $result[0]['certi_id'], 0, 0);
$exa->SetXY(55, 285);
$exa->Cell(0,0, date('Y-m-d'), 0, 0);
$exa->Output ($a.'.pdf', 'D' );

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
    }
  

}

public function get_final_smart_tally_certi($id)
{

    $this->db->select('exm_status.id,admission.image,admission.course_date,admission.name,admission.fran_name,admission.stud_id,exm_status.exm_date,admission.stud_id,admission.course_Name,sum(exm_status.p_mark) As pass_marks,sum(exm_status.marks) As Total_mark,issued_certificates.certi_id,issued_certificates.issued_date');
    $this->db->from('exm_status');
    $this->db->join('admission','exm_status.siid=admission.id');
    $this->db->join('issued_certificates','exm_status.siid=issued_certificates.siid');
    $this->db->where(array('issued_certificates.certi_id'=>$id));
    $query=$this->db->get();
    $result=$query->result_array();

    $course=$result[0]['course_Name'];
    $mark=$result[0]['Total_mark'];
    $grade="";

    $farr=array();
    $farr =explode("-",$result[0]['issued_date']); 
    $farr=array_reverse($farr);
    $newfdate1 =implode($farr,"-");
    $fdt=str_replace("-","/",$newfdate1);


    $farr1=array();
    $farr1 =explode("-",$result[0]['course_date']); 
    $farr1=array_reverse($farr1);
    $newfdate11 =implode($farr1,"-");
    $from_dt=str_replace("-","/",$newfdate11);

    $tarr=array();
    $tarr =explode("-",$result[0]['exm_date']); 
    $tarr=array_reverse($tarr);
    $tdate =implode($farr,"-");
    $to_dt=str_replace("-","/",$tdate);

    $carr=array();
    $carr =explode("-",date('Y-m-d')); 
    $carr=array_reverse($carr);
    $cdate =implode($carr,"-");
    $cur_date=str_replace("-","/",$cdate);



    if($course=="Smart Tally")
    {
       
        if($mark >= 75)
        {
           $grade="A";
        }
        else if($mark < 75)
        {
           $grade="B";
        }
    }
    

$a="Certificate";
$exa = new TCPDF();
$exa->SetPrintHeader(false);
$exa->SetPrintFooter(false);  
$exa->addPage ();
$exa->SetMargins(10, 10, 10, 10, false);
$exa->SetAutoPageBreak(TRUE, -100);
$exa->SetXY(70, 110);
$exa->Cell(0,0, strtoupper($result[0]['name']), 0, 0);
$exa->SetXY(68, 152);
$exa->Cell(0,0, strtoupper($result[0]['fran_name']), 0, 0);
$exa->SetXY(95, 172);
$exa->Cell(0,0, $grade, 0, 0);
$exa->SetXY(60, 220);
$exa->Cell(0,0, $result[0]['certi_id'], 0, 0);
$exa->SetXY(55, 234);
$exa->Cell(0,0, date('Y-m-d'), 0, 0);
$exa->Output ($a.'.pdf', 'D' );

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
    }

}



public function Ad_payment_histry_count($from_dt,$to_dt,$fname)
{
     $array=array();
     $dt=date('Y-m-d');
	 if($from_dt==$dt && $to_dt==$dt && $fname!="")
     {
         $array=array('fname'=>$fname);
     } 
     else if($from_dt!=$dt && $to_dt==$dt && $fname!="")
     { 
        $array=array('pdate'=>$from_dt,'fname'=>$fname); 
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $fname!="")
     {
        $array=array('pdate >='=>$from_dt,'pdate <='=>$to_dt,'fname'=>$fname);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $fname=="")
     {
        $array=array('pdate >='=>$from_dt,'pdate <='=>$to_dt);
     }
     else if($from_dt==$dt && $to_dt==$dt && $fname=="")
     {
		 $this->load->database();
         $this->db->order_by('id','Desc');
         $query=$this->db->get('payment_history');
		
        return $query->num_rows();
     }
		$this->load->database();
		$this->db->where($array);
		 $this->db->order_by('id','Desc');
		$query=$this->db->get('payment_history');
		
     return $query->num_rows();
}

public function payme_histry_Data($limit,$start,$from_dt,$to_dt,$fname)
{
 	   $array=array();
     $dt=date('Y-m-d');
     if($from_dt==$dt && $to_dt==$dt && $fname!="")
     {
         $array=array('fname'=>$fname);
     } 
     else if($from_dt!=$dt && $to_dt==$dt && $fname!="")
     { 
        $array=array('pdate'=>$from_dt,'fname'=>$fname); 
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $fname!="")
     {
        $array=array('pdate >='=>$from_dt,'pdate <='=>$to_dt,'fname'=>$fname);
     }
     else if($from_dt!=$dt && $to_dt!=$dt && $fname=="")
     {
        $array=array('pdate >='=>$from_dt,'pdate <='=>$to_dt);
     }
     else if($from_dt==$dt && $to_dt==$dt && $fname=="")
     {
			$this->db->limit($limit, $start);
			$this->load->database();
        	 $this->db->order_by('id','Desc');
            $query=$this->db->get('payment_history');
		  return $query->result();
     }

			$this->db->limit($limit, $start);
			$this->load->database();
			$this->db->where($array);
		 $this->db->order_by('id','Desc');
			$query=$this->db->get('payment_history');
		return $query->result();
}


public function Convert_data()
{
	$this->load->database();
	$this->db->where('quiz_cat_id','12');
	$query=$this->db->get('quiz');
	$res['que']=$query->result_array();
	 foreach ($res['que'] as $row)
	 {
       	  $qid=$row['quiz_id'];
		  $que=$row['question'];
		  $opta=$row['option_a'];
		  $optb=$row['option_b'];
		  $optc=$row['option_c'];
		  $optd=$row['option_d'];
		  $ans=$row['answer'];
		  
		  
		  $data = array(
		  'question' =>$que,
		  'option_a' =>$opta,
		  'option_b' =>$optb,
		  'option_c' =>$optc,
		  'option_d' =>$optd,
		  'answer' =>$ans,
		  'quiz_cat_id' =>'18'
		  );
		  
		  $query=$this->db->insert('quiz',$data);
	 }

}




public function get_pass_stud_count1($course,$stud,$res,$fid)
{
        $dt=date('Y-m-d');
        $array=array();
       if($course=="" && $stud=="" && $res=="")
        {
             
              $this->db->order_by('exm_status.stud_id');
              $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
			
			   
              $this->db->join('exm_status','exm_status.siid=admission.id');
			  $this->db->where('admission.f_id',$fid);
			  $this->db->from('admission');
              $query=$this->db->get();
              return $query->num_rows();
        }
         else if($course!="" && $stud=="" && $res=="")
        {
            $array=array('exm_status.course'=>$course,'admission.f_id'=>$fid);
        }
        else if($course!="" && $stud=="" && $res!="")
        {
            $array=array('exm_status.course'=>$course,'exm_status.status'=>$res,'admission.f_id'=>$fid);
        }
        else if($course=="" && $stud!="" && $res=="")
        {
            $array=array('admission.name'=>$stud,'admission.f_id'=>$fid);
        }
        else if($course=="" && $stud!="" && $res!="")
        {
            $array=array('admission.name'=>$stud,'admission.f_id'=>$fid);
        }
        else if($course=="" && $stud=="" && $res!="")
        {
            $array=array('exm_status.status'=>$res,'admission.f_id'=>$fid);
        }
      
      
        else if($course!="" && $stud!="" && $res=="")
        {
            $array=array('exm_status.course'=>$course,'admission.f_id'=>$fid);
        }
        else if($course!="" && $stud!="" && $res!="")
        {
            $array=array('exm_status.course'=>$course,'admission.f_id'=>$fid);
        }
     
        else if($course=="" && $stud=="" && $res!="")
        {
             $array=array('exm_status.status'=>$res,'admission.f_id'=>$fid);
        }

        $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
        $this->db->from('admission');
        $this->db->join('exm_status','exm_status.siid=admission.id');
        $this->db->where($array);
        $query=$this->db->get();
        return $query->num_rows();
}

	public function get_pass_stud1($limit,$start,$course,$stud,$res,$fid)
    {
        $dt=date('Y-m-d');
        $array=array();
       if($course=="" && $stud=="" && $res=="")
        {
              $this->db->limit($limit,$start);
              $this->db->order_by('exm_status.stud_id');
              $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
			
			   
              $this->db->join('exm_status','exm_status.siid=admission.id');
			  $this->db->where('admission.f_id',$fid);
			 $this->db->from('admission');
              $query=$this->db->get();
              return $query->result_array();
        }
         else if($course!="" && $stud=="" && $res=="")
        {
            $array=array('exm_status.course'=>$course,'admission.f_id'=>$fid);
        }
        else if($course!="" && $stud=="" && $res!="")
        {
            $array=array('exm_status.course'=>$course,'exm_status.status'=>$res,'admission.f_id'=>$fid);
        }
        else if($course=="" && $stud!="" && $res=="")
        {
            $array=array('admission.name'=>$stud,'admission.f_id'=>$fid);
        }
        else if($course=="" && $stud!="" && $res!="")
        {
            $array=array('admission.name'=>$stud,'admission.f_id'=>$fid);
        }
        else if($course=="" && $stud=="" && $res!="")
        {
            $array=array('exm_status.status'=>$res,'admission.f_id'=>$fid);
        }
      
      
        else if($course!="" && $stud!="" && $res=="")
        {
            $array=array('exm_status.course'=>$course,'admission.f_id'=>$fid);
        }
        else if($course!="" && $stud!="" && $res!="")
        {
            $array=array('exm_status.course'=>$course,'admission.f_id'=>$fid);
        }
     
        else if($course=="" && $stud=="" && $res!="")
        {
             $array=array('exm_status.status'=>$res,'admission.f_id'=>$fid);
        }
		
        $this->db->limit($limit,$start);		
        $this->db->order_by('exm_status.stud_id');
        $this->db->select('admission.fran_name,admission.name,exm_status.stud_id,exm_status.exm_date,exm_status.status,exm_status.marks,exm_status.p_mark,exm_status.course,exm_status.module');
        $this->db->from('admission');
        $this->db->join('exm_status','exm_status.siid=admission.id');
        $this->db->where($array);
        $query=$this->db->get();
        return $query->result_array();
    }


public function getcourse1()
{
     $this->load->database();
     $query=$this->db->get('course');
     return $query->result();   
}


public function get_stud_info1($name,$fid)  
    {
			 $query = $this->db->query("SELECT admission.name
                FROM admission,exm_status where admission.id=exm_status.siid
                And admission.name LIKE '%".$name."%' And admission.f_id='$fid'
                GROUP BY admission.name");
            echo json_encode($query->result_array());
    }

   public function meta_details($limit,$start){
	    $this->db->limit($limit,$start);
  	   $this->db->order_by('id','desc');
       $query=$this->db->get('meta');
	   return $query->result_array();
   }
   public function meta_count(){
	   $this->db->order_by('id','desc');
       $query=$this->db->get('meta');
	   return $query->num_rows();
   }
   public function meta_insert($data){
	   $query=$this->db->insert('meta',$data);
	   if($query){
		   return true;
	   }
	   else{
		   return false;
	   }
   }
   
   public function meta_update($data,$id){
	   $this->db->where('id',$id);
	   $query=$this->db->update('meta',$data);
	   if($query){
		   return true;
	   }
	   else{
		   return false;
	   }
   }
   
   public function meta_delete($id){
	   $this->db->where('id',$id);
	   $query=$this->db->delete('meta');
	   if($query){
		   return true;
	   }
	   else{
		   return false;
	   }
   }
   
   public function mailconfig_count()
   {
	    $query=$this->db->get('mail_config');
	   return $query->num_rows();
   }
   
   public function mailconfig_details($limit,$start)
   {
	   $this->db->limit($limit,$start);
	   $this->db->order_by('id','desc');
	   $query  = $this->db->get('mail_config');
	   return $query->result_array();
   }

   function banner_count()
	{
		$this->load->database();
		return $this->db->count_all('banner');
	}

	
	public function get_banner()
	{
		$this->db->limit($limit,$start);
		$this->db->order_by('seq','asc');
		$query = $this->db->get('banner');
		return $query->result_array();
	}	

	public function get_contact_details()
	{
     $this->load->database();
     $query=$this->db->get('contact');
     return $query->result_array();
	}

   public function Blogd_display()
   {  
      $this->db->limit(3,0);
      $this->db->order_by('B_id','desc');
      $query=$this->db->get('tbl_blog');
      return $query->result();
   }
   
   public function Blogdispaly_display()
   {  
      // $this->db->limit(3,0);
      $this->db->order_by('B_id','desc');
      $query=$this->db->get('tbl_blog');
      return $query->result();
   }
  
  function Blog_display($cname)
  {
       /* $array=array();
          if($cname!="")
          {
             $array=array('cname'=>$cname);
          }
          else if($cname=="")
          {
              $this->db->order_by('id','desc');
           $query=$this->db->get('testimonial');
           return $query->num_rows();
          }
          
          $this->db->where($array);
        $this->db->order_by('id','desc');*/
          $query=$this->db->get('tbl_blog');
          return $query->num_rows();
  }   
  public function Blog1_Paging($limit,$start,$cname)
       {
          /*
          $array=array();
          if($cname!="")
          {
             $array=array('cname'=>$cname);
          }
          else if($cname=="")
          {
              $this->db->order_by('id','desc');
           $query=$this->db->get('testimonial');
           return $query->result();
          }       
        
        $this->db->limit($limit, $start);
          $this->db->where($array);*/
        $this->db->order_by('B_id','desc');
          $query = $this->db->get("tbl_blog");
   
          if ($query->num_rows() > 0) {
              foreach ($query->result() as $row) {
                  $data[] = $row;
              }
              return $data;
          }
          return false;
     }
     public function get_singleblog($urll)
      {
      if($urll!="")
      {
         $this->db->limit(1,0);
         $this->db->select('tbl_blog.B_id,tbl_blog.title,tbl_blog.name,tbl_blog.content,tbl_blog.image,tbl_blog.insertdate');
         $this->db->from('tbl_blog');
         $this->db->where(trim('tbl_blog.title'),trim($urll));
         $query = $this->db->get();
         return $query->result_array();		
      }
      else
      {
         $this->db->select('tbl_blog.B_id,tbl_blog.title,tbl_blog.name,tbl_blog.content,tbl_blog.image,tbl_blog.insertdate');
         $this->db->from('tbl_blog');
         $this->db->order_by('id','asc');
         $query = $this->db->get();
         return $query->result_array();		
      }
   }
   public function Teamd_display()
   {  
      $this->db->limit(3,0);
      $this->db->order_by('id','desc');
      $query=$this->db->get('tbl_team');
      return $query->result();
   }
   function Team_display($cname)
  {
       /* $array=array();
          if($cname!="")
          {
             $array=array('cname'=>$cname);
          }
          else if($cname=="")
          {
              $this->db->order_by('id','desc');
           $query=$this->db->get('testimonial');
           return $query->num_rows();
          }
          
          $this->db->where($array);
        $this->db->order_by('id','desc');*/
          $query=$this->db->get('tbl_team');
          return $query->num_rows();
  }   
  public function Team1_Paging($limit,$start,$cname)
       {
          /*
          $array=array();
          if($cname!="")
          {
             $array=array('cname'=>$cname);
          }
          else if($cname=="")
          {
              $this->db->order_by('id','desc');
           $query=$this->db->get('testimonial');
           return $query->result();
          }       
        
        $this->db->limit($limit, $start);
          $this->db->where($array);*/
        $this->db->order_by('id','desc');
          $query = $this->db->get("tbl_team");
   
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