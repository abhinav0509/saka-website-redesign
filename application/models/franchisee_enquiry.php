<?php
class Franchisee_Enquiry extends CI_Model{
function __construct() {
parent::__construct();
}
public function Insert_Data($data1)
	{
		$this->load->database();
		$query=$this->db->insert('franch_enquiry',$data1);
		if($query)
		{
		   return true;
		}
		else
		{
		   return false;
		}
	}

	public function convert_fran($id)
	{
		$mmail="enquiry@mavericksoftware.in";
		$pass="enquiry@123";
		$query1=$this->db->get_where('mail_config',array('status'=>'Active'));
		$result=$query1->result_array();
		if($query1->num_rows() > 0){
		  $mmail=$result[0]['email'];      
		  $pass=$result[0]['paswrd'];
		}
		  
     $this->load->view("front_view/PHPMailerAutoload");
      
      $query=$this->db->get_where('franch_enquiry',array('id'=>$id));
    	$result=$query->result_array();

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
     
    	foreach($result as $res)
    	{
    		$onm=$res['Name'];
    		$fnm=$res['Inst_name'];
    		$add=$res['Badd'];
    		$state=$res['State']; //naem
    		$state_id=$res['state_id'];
    		$ct=$res['City'];//name
    		$ct_id=$res['city_id'];
    		$email=$res['Email'];
    		$mobile=$res['Mobile'];
    		$unm=$res['username'];
    		$pass=$res['password'];
    		$dt=date('Y-m-d');
        $pin=$res['pincode'];
        $dist=$res['district'];
        $lat=$res['lat'];
        $long=$res['longi'];

    	}


      
      $str=substr($state, 0,1);
      $str1=substr($state, 2,1);

      $str3=strtoUpper(substr($ct, 0,2));//city
      $str2=strtoUpper($str.$str1);//state

      $frn_id=$str2."CF".$id1;
     
    	$data=array(
           'email'=>$email,
           'password'=>$pass,
           'fname'=>$fnm,
           'role'=>'franchisee',
           'date'=>$dt,
           'fran_id'=>$frn_id,
           'status'=>1
          );


    	
    	 $search=$this->db->get_where('customers',array('email'=>$email));
    	 $row=$search->result();
    	 if($search->num_rows() > 0)
    	 {
    	 	return false;
    	 }
    	 else
    	 {
	    	 $this->db->insert('customers',$data);	    	 
	    	 $this->db->where(array('email'=>$email));
	    	 $query1=$this->db->get('customers');
	    	 $result1=$query1->result_array();
	    	 foreach($result1 as $res1)
	    	 {
	    	 	 $cid=$res1['cus_id'];
			   }

			 $data1=array(
           'cus_id'=>$cid,
           'femail'=>$email,
           'pincode'=>$pin,
           'address'=>$add,
           'district'=>$dist,
           'state'=>$state_id,
           'city'=>$ct_id,
           'cus_mobile'=>$mobile,
           'fran_id'=>$frn_id,
           'institute_name'=>$fnm

          );
         
         $add1=$add." ".$ct." ".$state;
         $data2=array(
          'f_id'=>$cid,
          'address'=>$add1,
          'lati'=>$lat,
          'longi'=>$long
        );
			 $this->db->insert('locations',$data2);
			 if($this->db->insert('customers_info',$data1))
			 {
 					 $this->db->where(array('id'=>$id));
			     $this->db->delete('franch_enquiry');
          
           $vupto = date('d-m-Y',strtotime('+1 years',strtotime($dt)));
           
             $txt  ="<div id='introduction' style='border: 1px solid #ccc; width: 550px; height: auto; margin: auto;  border-top:none;'>";
             $txt .="<div class='intro_header' style='height: 48px; background: #3498db;'>";
             $txt .="<h1 style='color: #fff; font-size:30px; padding-top:8px; font-weight: normal; text-align: center;margin-bottom: -17px; line-height: 100%;'>Franchisee activation mail</h1>";
             $txt .="</div>";
             $txt .="<div id='confirm' style='height: 100px;'>";
             $txt .="<div class='wel' style='margin-top: 5px; text-align:left;  padding: 10px;  font-size:13px;'>Welcome to CCA Network!!! You have been registered for CCA Website. User Name: $email & Password: $pass All Online Services are activated. For Query Call: 9326427400</div>";
             /*$txt .="<div class='container' style='width: 500px; padding-top: 20px; margin-left: 30px;'>";
             $txt .="<div class='left_con' style='width: 245px;  border:1px solid #CCC;; height: 150px; float: left; border-right:none;'>";
             $txt  .="<div class='lheader' style='border-bottom:1px solid #CCC; background-color:#E5E6E6;  text-align:center; font-family:calibri;'><h3 style='color: #5F5F5F; line-height: 125%; font-size: 16px; font-weight: normal; margin-top: 0; margin-bottom: 3px;'>Login Details</h3></div>";
             $txt  .="<div class='uid' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> User Id :</div>";
             $txt .="<div class='uid_txt' style='margin-top:5px; float: left; font-family:calibri; font-size:14px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$email</div>";
             $txt .="<div class='uid' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> Password :</div>";
             $txt .="<div class='uid_txt' style='margin-top:5px; float: left; font-family:calibri; font-size:14px;'>&nbsp;&nbsp;$pass</div>";
             $txt .="</div>";
             $txt .="<div class='right_con' style='width: 240px; border:1px solid #CCC; height: 150px; float: left;'>";
             $txt .="<div class='rheader' style='border-bottom:1px solid #CCC; background-color:#E5E6E6; text-align:center; font-family:calibri;'><h3 style='color: #5F5F5F; line-height: 125%; font-size: 16px; font-weight: normal; margin-top: 0; margin-bottom: 3px;'>Registration Details</h3></div>";
             $txt .="<div class='reg_no' style='margin-top:5px; float: left;font-family:calibri; padding-left:5px; font-size:14px;'>Registration No : </div>";
             $txt .="<div class='reg_no_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$cid</div>";
             $txt .="<div class='reg_dt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>Registration date : </div>";
             $txt .="<div class='reg_dt_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> &nbsp;&nbsp;$dt</div>";
             $txt .="<div class='valid' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>Valid Up to : </div>";
             $txt .="<div class='valid_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$vupto</div>";
             $txt .="<div class='support_no' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'> Your Support no : </div>";
             $txt .="<div class='support_no_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>&nbsp;&nbsp;&nbsp;&nbsp;02032392121</div>";
             $txt .="<div class='assis' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>For Assistance : </div>";
             $txt .="<div class='assis_txt' style='margin-top:5px; float: left; font-family:calibri; padding-left:5px; font-size:14px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9326427400</div>";
             $txt .="</div>";
             $txt .="<div class='clear' style='clear: both;'></div>";
             $txt .="<div style='font-family:calibri;font-size:12px;color:#000;text-align:center;line-height:120%; margin-top:10px;'>";
             $txt .="<div>(you can use online service for Daily Enquiry,Admission,order, exam, certificates ,Online training or marketing)</div>";
             $txt .="<div style='margin-top:5px;'>Copyright &#169; CCA . All&nbsp;rights&nbsp;reserved.</div>";
             $txt .="</div></div></div>*/

              $mail = new PHPMailer;
              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username = $mmail;                   // SMTP username
              $mail->Password = $pass;               // SMTP password
              $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
              $mail->Port = 465;                                    //Set the SMTP port number - 587 for authenticated TLS
              $mail->setFrom($mmail, 'CCA Contact Us');     //Set who the message is to be sent from
              $mail->addAddress($email, 'CCA');  // Add a recipient
			  $mail->AddReplyTo($mmail, 'Reply to CCA');
              
              $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
              $mail->isHTML(true);                                  // Set email format to HTML
              
               $mail->Subject = "CCA Franchisee Activation Mail";
               $mail->Body=$txt;
               $mail->send();

			     return true;
			 } 
			 else
			 {
		  		return false;
			 }
    }

	}



	  public function send_fran_single_msg($id)
    {
         $msg="";
         $query=$this->db->get_where('franch_enquiry',array('id'=>$id));
         $result=$query->result_array();

      foreach($result as $res)
      {
        
        $mobile=$res['Mobile'];
        $unm=$res['username'];
        $pass=$res['password'];
        
      }

      $msg .="Welcome to CCA Network..!  ";
      $msg .="Ur center Register @  CCA Website  ";
      $msg .="Ur User Name:-$unm ";
      $msg .="Password:$pass  ";
      $msg .="All Online Services are activate. ";
      $msg .="For Query Call :9326427400";
      
               $this->load->view('sendsms');
               $sendsms=new sendsms("http://alerts.valueleaf.com/api/v3",'sms'
                      , "A46dc1705723c21960a525f9ce18b705e", "OOOCCA");
               $api=$sendsms->send_sms($mobile, $msg, 'http://alerts.valueleaf.com/index.php&custom=1,2', 'xml');      
               print_r($api);

    }

	
}

?>