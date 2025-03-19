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
	$subject=$this->input->post('subject');
    $mobile=$this->input->post('mobile');
	$this->load->Model('Insert_mod');
	$res = $this->Insert_mod->enquiry_insert($data);
	$op="";
	$op.="<body style='font-family: Poppins, sans-serif;padding:20px;background: #f1f1f1;'>";
	$op.="<div style='background-color:#000000;width:80%;max-width:600px;margin-left:auto;margin-right:auto;'>";
	$op.="<div style='background-color:#ffffff;padding:50px;'>";
	$op.="<header style='text-align:center;'>";
	$op.="<img src='https://sakaindia.com/assets/img/about/saka-logo-hd.png' style='width:150px'/>";
	$op.="<h1>Enquiry </h1>";
	$op.="</header>";
	$op.="<hr style='height:5px;background-color:hsl(192, 82.90%, 52.00%);border-color:rgb(31, 170, 234);'>";
	$op.="<div>";
	$op.="<div style='padding:20px 0 50px 0;'>";
	$op.="<section>";
	$op.="<h3 style='color: #15c;'>Hello, you have a new enquiry submission from Saka Engineering System Pvt Ltd Website</h3>";
	$op.="</section>";
	$op.="<section style='text-align:left;margin-top:50px;'>";
	$op.="<table style='text-align:left;margin-top:50px;'>";
	$op.="<tbody style='width: 30%;vertical-align:top;'>";
	$op.="<tr style='width: 30%;vertical-align:top;'>";
	$op.="<th style='width: 30%;vertical-align:top;color: #EA5C1F;font-weight:900;display: block;width: 100% !important; padding: 10px;margin:0;'>Name</th>";
	$op.="<td style='padding: 10px;margin:0;font-weight:100;display: block;width: 100% !important;'>$name</td>";
	$op.="</tr>";
	$op.="<tr style='width: 30%;vertical-align:top;'>";
	$op.="<th style='width: 30%;vertical-align:top;color: #EA5C1F;font-weight:900;display: block;width: 100% !important; padding: 10px;margin:0;'>Email Address</th>";
	$op.="<td style='padding: 10px;margin:0;font-weight:100;display: block;width: 100% !important;'>$email</td>";
	$op.="</tr>";
	$op.="<tr style='width: 30%;vertical-align:top;'>";
	$op.="<th style='width: 30%;vertical-align:top;color: #EA5C1F;font-weight:900;display: block;width: 100% !important; padding: 10px;margin:0;'>Contact Number</th>";
	$op.="<td style='padding: 10px;margin:0;font-weight:100;display: block;width: 100% !important;'>$mobile</td>";
	$op.="</tr>";
	$op.="<tr style='width: 30%;vertical-align:top;'>";
	$op.="<th style='width: 30%;vertical-align:top;color: #EA5C1F;font-weight:900;display: block;width: 100% !important; padding: 10px;margin:0;'>Message</th>";
	$op.="<td style='padding: 10px;margin:0;font-weight:100;display: block;width: 100% !important;'>$message.</td>";
	$op.="</tr>";
	$op.="</tbody>";
	$op.="</table>";
	$op.="</section>";
	$op.="</div>";
	$op.="</div>";
	$op.="</div>";
	$op.="<footer style='text-align:center;'>";
	$op.="<section style='font-size:10px;color:#000000;padding:20px 0;background-color:#ffffff !important;'>";
	$op.="<img src='https://sakaindia.com/assets/img/about/saka-logo-hd.png' style='width:100px'/>";
	$op.="<p>";
	$op.="<a href='https://www.sakaindia.com/'>www.sakaindia.com</a>";
	$op.="</p>";
	$op.="<p>TEERTH BUSINESS CENTER,UNIT 11, 5th FLOOR, EL BLOCK, MIDC Bhosari, Pune 411026, Maharashtra, India.</p>";
	$op.="<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Saka Engineering System Pvt Ltd. All Rights Reserved</p>";
	$op.="</section>";
	$op.="</footer>";
	$op.="</div>";
	$op.="</body>";
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
             $mail->setFrom('sales@sakaindia.com', 'SAKA INDIA');     //Set who the message is to be sent from
             $mail->addAddress('sales@sakaindia.com', 'SAKA INDIA');  // Add a recipient
          
             $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
             $mail->isHTML(true);                                  // Set email format to HTML
          
             $mail->Subject = "Website Enquiry";
            //  $mail->Body    = "Name:-  $name<br>Email:-  $email<br>Subject:- $subject<br>Message:- $message<br>Mobile:- $mobile";
			$mail->Body    = $op;
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
        // $txt  ="<div style='width:90%; height:auto; border:1px solid #CCC; border-top:none;'>";
		// 	$txt .="<div style='width:100%;height:40px;background-color:#00569D; color:#FFF;'>";
		// 	$txt .="<p style='padding-left:20px;padding-top:9px;'><b style='font-size:19px;'>Welcome Mail... (SAKA INDIA)</b></p></div>";
		// 	$txt .="<div style='width:100%; margin-top:20px; margin-bottom:20px; padding-left:20px;'>";
		// 	$txt .="Dear Madam/Sir,   <br /> <b>Greeting from SAKA INDIA.</b>,   <br />We have received your Enquiry.   <br />For other detailes please call us at the following numbers- +91 9370751997 <br />Thanking You .";
		// 	$txt .="</div>";
		// 	$txt .="<p style='padding-left:20px;'>Team SAKAINDIA</p>";
		// 	$txt .="</div>";
		$op = "<body style='font-family: Poppins, sans-serif;padding:20px;background: #f1f1f1;'>";
			$op .= "<div style='background-color:#000000;width:80%;max-width:600px;margin-left:auto;margin-right:auto;'>";
			$op .= "<div style='background-color:#ffffff;padding:50px;'>";
			$op .= "<header style='text-align:center;'>";
			$op .= "<img src='https://sakaindia.com/assets/img/about/saka-logo-hd.png' style='width:150px'/>";
			$op .= "<h2>Saka Engineering System Pvt Ltd.</h2>";
			$op .= "</header>";
			$op .= "<hr style='height:5px;background-color: #EA5C1F;border-color: #EA5C1F;'>";
			$op .= "<div>";
			$op .= "<div style='padding:20px 0 50px 0;'>";
			$op .= "<section>";
			$op .= "<h3 style='color: #15c;'>Hello, $name  <br /> <b>Thank you for contacting Saka Engineering System Pvt Ltd. We have received your query. We will get back to you soon.</h3>";
			$op .= "</section>";
			$op .= "<section style='text-align:left;margin-top:50px;'>";
			$op .= "</section>";
			$op .= "</div>";
			$op .= "</div>";
			$op .= "</div>";
			$op .= "<footer style='text-align:center;'>";
			$op .= "<section style='font-size:10px;color:#000000;padding:20px 0;background-color:#ffffff !important;'>";
			$op .= "<img src='https://sakaindia.com/assets/img/about/saka-logo-hd.png' style='width:100px'/>";
			$op .= "<p><a href='https://www.sakaindia.com/'>www.sakaindia.com</a></p>";
			$op .= "<p>TEERTH BUSINESS CENTER,UNIT 11, 5th FLOOR, EL BLOCK, MIDC Bhosari, Pune 411026, Maharashtra, India.</p>";
			$op .= "<p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Saka Engineering System Pvt Ltd. All Rights Reserved</p>";
			$op .= "</section>";
			$op .= "</footer>";
			$op .= "</div>";
			$op .= "</body>";

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
			  $mail->setFrom('sales@sakaindia.com', 'SAKA INDIA');     //Set who the message is to be sent from
			  $mail->addAddress($email, 'SAKA INDIA');  // Add a recipient
			  $mail->AddReplyTo('sales@sakaindia.com', ' Reply to SAKA INDIA');
			  $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			  $mail->isHTML(true);                                  // Set email format to HTML
			  

			  $mail->Subject = "no-reply";
			  $mail->Body    = $op;
              $mail->send();
		      //redirect('welcome/Franchisee_Enq');
			  
			  $data['message']="Mail Sent...!";
		      print_r(json_encode($data));	
		}
	}
	
 }
}