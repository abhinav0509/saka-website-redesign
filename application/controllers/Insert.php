<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert extends CI_Controller {

public function insert_enquiry()
{
     $date = date('Y-m-d');
     $this->load->view('PHPMailerAutoload');
 	 $mmail="enquiry@mavericksoftware.in";
 	 $pass="enquiry@1234";
	 
	$data = array(
	'name'=>$this->input->post('name'),
	'email'=>$this->input->post('email'),
	'mobile'=>$this->input->post('mobile'),
	'subject'=>$this->input->post('subject'),
	'pdesc'=>$this->input->post('message'),
	// 'site'=>$this->input->post('site'),
	'status'=>'unread',
	'entry_dt'=>$date
	);
	$name=$this->input->post('name');
    $email=$this->input->post('email');
    $message=$this->input->post('message');
    $mobile=$this->input->post('mobile');
	$this->load->Model('Insert_mod');
	$res = $this->Insert_mod->enquiry_insert($data);
	if($res)
	{
	try{
             $mail = new PHPMailer;
             $mail->isSMTP();                                      // Set mailer to use SMTP
             $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
             $mail->SMTPAuth = true;                               // Enable SMTP authentication
             $mail->Username = $mmail;                   // SMTP username
             $mail->Password = $pass;               // SMTP password
             $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
             $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
             $mail->setFrom('msipl@mavericksoftware.in', 'MSIPL');     //Set who the message is to be sent from
             $mail->addAddress('msipl@mavericksoftware.in', 'MSIPL');  // Add a recipient
          
             $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
             $mail->isHTML(true);                                  // Set email format to HTML
          
             $mail->Subject = "Website Enquiry";
             $mail->Body    = "Name:-  $name<br>Email:-  $email<br>Message:- $message<br>Mobile:- $mobile";
             if(!$mail->send()) {
               echo "faild";
             }
             else
             {
                 echo "success";
             }
       }
       catch(Exception $e){
         print_r($e);
       }
        $txt  ="<div style='width:90%; height:auto; border:1px solid #CCC; border-top:none;'>";
			$txt .="<div style='width:100%;height:40px;background-color:#00569D; color:#FFF;'>";
			$txt .="<p style='padding-left:20px;padding-top:9px;'><b style='font-size:19px;'>Welcome Mail... (SAKA INDIA)</b></p></div>";
			$txt .="<div style='width:100%; margin-top:20px; margin-bottom:20px; padding-left:20px;'>";
			$txt .="Dear Madam/Sir,   <br /> <b>Greeting from SAKA INDIA.</b>,   <br />We have received your Enquiry.   <br />For other detailes please call us at the following numbers- +91 9370751997 <br />Thanking You .";
			$txt .="</div>";
			$txt .="<p style='padding-left:20px;'>Team SAKAINDIA</p>";
			$txt .="</div>";

	    $this->load->model('Insert_mod');
		$res = $this->Insert_mod->enquiry_insert($data);
		if($res)
		{
		     $mess="Thank you for Contacting (SAKA INDIA).....!";
		     $this->session->set_userdata('msg',$mess);
		      $mail->isSMTP();                                      // Set mailer to use SMTP
			  $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
			  $mail->SMTPAuth = true;                               // Enable SMTP authentication
			  $mail->Username = $mmail;                   // SMTP username
			  $mail->Password = $pass;               // SMTP password
			  $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			  $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
			  $mail->setFrom('msipl@mavericksoftware.in', 'MSIPL');     //Set who the message is to be sent from
			  $mail->addAddress($email, 'Inlaks Budhrani');  // Add a recipient
			  $mail->AddReplyTo('msipl@mavericksoftware.in', ' Reply to MSIPL');
			  $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			  $mail->isHTML(true);                                  // Set email format to HTML
			  

			  $mail->Subject = "no-reply";
			  $mail->Body    = $txt;
              $mail->send();
		      //redirect('welcome/Franchisee_Enq');
			  
			  $data['message']="Mail Sent...!";
		      print_r(json_encode($data));	
		}
	}
	
 }
}