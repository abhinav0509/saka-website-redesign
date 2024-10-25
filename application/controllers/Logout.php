<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
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

 public function Admin_logout()
 {
        $this->session->sess_destroy();
        redirect('Admin');

 }
 public function Franch_logout()
 {
        $this->session->sess_destroy();
        redirect('Franchisee');
 }
 
 public function Student_logout()
 {
        $data2=$this->globaldata['userdata'];
		$this->load->helper('cookie');
        $this->session->sess_destroy();
		setcookie($data2->user_id, '', time()-60*60*24*365, '/index.php');		
		redirect('welcome');

 }


}