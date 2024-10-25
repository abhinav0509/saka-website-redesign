<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Franch extends CI_Controller {
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
     	  $this->load->library("Pdf");
		 $var=$this->session->userdata;
	   	 if(isset($var['login_user']))
     	 {
          
	          $this->globaldata=array(
			  'userdata'=>$var['login_user']
		        );
         }

     }

     public function save_adm_enq_remark()
     {
        $id=$_POST['id'];
        $remark=$_POST['remark'];
        $this->load->Model('admin_fran');
        $res=$this->admin_fran->adm_enq_remark_update($id,$remark);
        if($res)
        {
           $data['message']="Remark Saved.....!";
           print_r(json_encode($data));
        }
        else
        {
           $data['message']="Error In Saving The Remark.....!";
           print_r(json_encode($data));
        }
     }

     public function Insert_new_Fran()
     {
     	$email=$this->input->post('mail');
     	$dt=date('Y-m-d');

      $state=$this->input->post('state');
      $city=$this->input->post('city');
      $query=$this->db->get_where("state",array('state_id'=>$state));
      $result=$query->result_array();
      $query1=$this->db->get_where("city",array('city_id'=>$city));
      $result1=$query1->result_array();
      $state_name=$result[0]['name'];
      $city_name=$result1[0]['name'];
    
      $this->db->select('Max(cus_id) As idd');
      $query12=$this->db->get('customers');
      $des=$query12->result_array();
      $id1=$des[0]['idd'];
      if($id1=="")
      {
        $id1=1;
      }
      else
      {
        $id1=$id1+1;
      }

      $str=substr($state_name, 0,1);
      $str1=substr($state_name, 2,1);

      $str3=strtoUpper(substr($city_name, 0,2));//city
      $str2=strtoUpper($str.$str1);//state

      $frn_id=$str2."CF".$id1;
          
     	$data=array(
           'email'=>$this->input->post('mail'),
           'fran_id'=>$frn_id,
           'password'=>$this->input->post('pwd'),
           'fname'=>$this->input->post('fname'),
           'role'=>'franchisee',
           'date'=>$dt,
           'status'=>$this->input->post('status'),
           'type'=>$this->input->post('ftype')
          );

     	$data1=array(
           'femail'=>$this->input->post('mail'),
           'fran_id'=>$frn_id,
           'state'=>$this->input->post('state'),
           'city'=>$this->input->post('city'),
           'cus_mobile'=>$this->input->post('cont'),
           'institute_name'=>$this->input->post('ins'),
           'type'=>$this->input->post('ftype')
          );
      
      $add1=$this->input->post('add')." ".$state_name." ".$city_name;
      $data2=array(
          'address'=>$add1,
          'lati'=>$this->input->post('lat'),
          'longi'=>$this->input->post('lng')
        );

     	$this->load->Model('admin_fran');
     	$mess=$this->admin_fran->save_new_fran($data,$data1,$data2,$email);
        if($mess)
    	{
    		$mess="New Franchisee Created.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/Franchisee');
    	}
    	else
    	{
    		$mess="Error in Saving or Franchisee already exists.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Admin/Franchisee');
    	}

     }


     public function Insert_new_Fran1()
     {
      $email=$this->input->post('mail');
      $dt=date('Y-m-d');

      $state=$this->input->post('state');
      $city=$this->input->post('city');
      $query=$this->db->get_where("state",array('state_id'=>$state));
      $result=$query->result_array();
      $query1=$this->db->get_where("city",array('city_id'=>$city));
      $result1=$query1->result_array();
      $state_name=$result[0]['name'];
      $city_name=$result1[0]['name'];
    
      $this->db->select('Max(cus_id) As idd');
      $query12=$this->db->get('customers');
      $des=$query12->result_array();
      $id1=$des[0]['idd'];
      if($id1=="")
      {
        $id1=1;
      }
      else
      {
        $id1=$id1+1;
      }

      $str=substr($state_name, 0,1);
      $str1=substr($state_name, 2,1);

      $str3=strtoUpper(substr($city_name, 0,2));//city
      $str2=strtoUpper($str.$str1);//state

      $frn_id=$str2."CF".$id1;
          
      $data=array(
           'email'=>$this->input->post('mail'),
           'fran_id'=>$frn_id,
           'password'=>$this->input->post('pwd'),
           'fname'=>$this->input->post('fname'),
           'role'=>'franchisee',
           'date'=>$dt,
           'status'=>$this->input->post('status')
          );

      $data1=array(
           'femail'=>$this->input->post('mail'),
           'fran_id'=>$frn_id,
           'state'=>$this->input->post('state'),
           'city'=>$this->input->post('city'),
		   'address'=>$this->input->post('add'),
           'cus_mobile'=>$this->input->post('cont'),
           'institute_name'=>$this->input->post('ins')
          );
      
      $add1=$this->input->post('add')." ".$state_name." ".$city_name;
      $data2=array(
          'address'=>$add1,
          'lati'=>$this->input->post('lat'),
          'longi'=>$this->input->post('lng')
        );

      $this->load->Model('admin_fran');
      $mess=$this->admin_fran->save_new_fran($data,$data1,$data2,$email);
        if($mess)
      {
        $mess="New Franchisee Created.....!";
          $this->session->set_userdata('msg',$mess);
          redirect('Employee/Franchisee');
      }
      else
      {
        $mess="Error in Saving or Franchisee already exists.....!";
          $this->session->set_userdata('msg',$mess);
          redirect('Employee/Franchisee');
      }

     }
    
    public function update_fran()
    {

        $cus_id=$this->input->post('bid');
        $dt=date('Y-m-d');
        $data=array(
           'email'=>$this->input->post('mail'),
           'password'=>$this->input->post('pwd'),
           'fname'=>$this->input->post('fname'),
           'role'=>'franchisee',
           'date'=>$dt,
           'status'=>$this->input->post('status'),
           'type'=>$this->input->post('ftype')
          );

       $data1=array(
           'femail'=>$this->input->post('mail'),
           'state'=>$this->input->post('state'),
           'city'=>$this->input->post('city'),
           'cus_mobile'=>$this->input->post('cont'),
           'institute_name'=>$this->input->post('ins'),
           'type'=>$this->input->post('ftype'),
		   'address'=>$this->input->post('add')	
          );

      $this->load->Model('admin_fran');
      $mess=$this->admin_fran->fran_update($data,$data1,$cus_id);
        if($mess)
        {
          $mess="Franchisee Record Updated.....!";
          $this->session->set_userdata('msg',$mess);
          redirect('Admin/Franchisee');
        }
      else
      {
        $mess="Error in Updating Franchisee Record.....!";
          $this->session->set_userdata('msg',$mess);
          redirect('Admin/Franchisee');
      }
    }

     public function update_fran1()
    {

        $cus_id=$this->input->post('bid');
        $dt=date('Y-m-d');
        $data=array(
           'email'=>$this->input->post('mail'),
           'password'=>$this->input->post('pwd'),
           'fname'=>$this->input->post('fname'),
           'role'=>'franchisee',
           'date'=>$dt,
           'status'=>$this->input->post('status')
          );

       $data1=array(
           'femail'=>$this->input->post('mail'),
           'state'=>$this->input->post('state'),
           'city'=>$this->input->post('city'),
           'cus_mobile'=>$this->input->post('cont'),
           'institute_name'=>$this->input->post('ins')
          );

      $this->load->Model('admin_fran');
      $mess=$this->admin_fran->fran_update($data,$data1,$cus_id);
        if($mess)
        {
          $mess="Franchisee Record Updated.....!";
          $this->session->set_userdata('msg',$mess);
          redirect('Employee/Franchisee');
        }
      else
      {
        $mess="Error in Updating Franchisee Record.....!";
          $this->session->set_userdata('msg',$mess);
          redirect('Employee/Franchisee');
      }
    }
    
    public function getsinglepdf()
    {
         $id=$_GET['id'];
         $this->load->Model('admin_fran');
         $this->admin_fran->pdf_single($id);
    }
    public function getsingleexcell()
    {
        $id=$_GET['id'];
        $name=$_GET['name1'];

         $this->load->Model('admin_fran');
         $this->admin_fran->Excel_single($id,$name);    
    }
    public function get_enquiry_pdf()
    {
         $fdt=$this->input->post('from');
         $tdt=$this->input->post('to');
         $state=$this->input->post('stt');
         $city=$this->input->post('ct');
		 $sid=$this->input->post('storedArrayvalue');

        $farr=array();
        $arr=array();
          
        $farr =explode("/",$fdt); 
        $farr=array_reverse($farr);
        $newfdate1 =implode($farr,"/");
        $from_dt=str_replace("/","-",$newfdate1);

        $arr =explode("/",$tdt); 
        $arr=array_reverse($arr);
        $newtdate1 =implode($arr,"/");
        $to_dt=str_replace("/","-",$newtdate1); 

        $this->load->Model('admin_fran');
        $this->admin_fran->get_pdf_cat($from_dt,$to_dt,$state,$city,$sid);

      
    }
    public function get_enquiry_excel()
    {
        $fdt=$this->input->post('from1');
         $tdt=$this->input->post('to1');
         $state=$this->input->post('stt1');
         $city=$this->input->post('ct1');
		 $sid=$this->input->post('storedArrayvalue1');

        $farr=array();
        $arr=array();
          
        $farr =explode("/",$fdt); 
        $farr=array_reverse($farr);
        $newfdate1 =implode($farr,"/");
        $from_dt=str_replace("/","-",$newfdate1);

        $arr =explode("/",$tdt); 
        $arr=array_reverse($arr);
        $newtdate1 =implode($arr,"/");
        $to_dt=str_replace("/","-",$newtdate1); 

        $this->load->Model('admin_fran');
        $this->admin_fran->get_excel_cat($from_dt,$to_dt,$state,$city,$sid);
    }

    public function change_status()
    {
       $status=$_POST['status'];
       $id=$_POST['id'];
       $this->load->Model('admin_fran');
       $ress=$this->admin_fran->status_change($id,$status);
       if($ress)
       {
          $data['message']="Status Updated Successfully.....!"; 
          print_r(json_encode($data));
       }
       else
       {
          $data['message']="Error In Updating Status.....!"; 
          print_r(json_encode($data));
       }
    }
    
    public function send_crdintials()
    {
		$mmail="enquiry@mavericksoftware.in";
		$pass="enquiry@123";
		$query1=$this->db->get_where('mail_config',array('status'=>'Active'));
		$result=$query1->result_array();
		if($query1->num_rows() > 0){
		  $mmail=$result[0]['email'];      
		  $pass=$result[0]['paswrd'];
		}
      $id=$_POST['id'];
      $this->db->where('cus_id',$id);
      $query=$this->db->get('customers');
      $result=$query->result_array();
      $username=$result[0]['email'];
      $password=$result[0]['password'];
      
      $this->load->view("front_view/PHPMailerAutoload");
    
            $mail = new PHPMailer;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $mmail;                   // SMTP username
            $mail->Password = $pass;               // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
            $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
            $mail->setFrom($mmail, 'CCA INDIA');     //Set who the message is to be sent from
            $mail->addAddress($username, 'CCA');  // Add a recipient 
			//$mail->addAddress("yogesh@mavericksoftware.in", 'CCA');  // Add a recipient         
            $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
            $mail->isHTML(true);                                  // Set email format to HTML
            //$mail->AddAttachment();
             
            $mail->Subject = "Password Credintials";
            $mail->Body    = "Wellcome To CCA...! Your Password Credintials as follows:-<br><br>User Name :- $username<br><br>Password:- $password";
                
         if(!$mail->send()) {
              //delfile($fname);
             //$data['message']=$mail->ErrorInfo;
			 $data['message']="Error! Please Try Again";
             print_r(json_encode($data));             
             exit;
          }
          else
          {
             $data['message']="Mail Send....!";
             print_r(json_encode($data));
          }

		
    }

 }