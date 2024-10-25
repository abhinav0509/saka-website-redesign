<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_cont extends CI_Controller {


      public function index()
      {
             
      }

      public function check_login()
      {

	      	 $this->load->model('login_model');	
			 try
			 {
				 $data=array();
				 $data = $this->login_model->CheckLogin($_POST);
				 if($data!=null)
		  			{
		    			$this->session->set_userdata('login_user', $data[0]);
						redirect('Admin/home');
						
		  			}
		  			else {
		  				    $data['message'] = "Username And Password is incorrect "; 
		  					$this->load->view('login',$data);
		  			}
		 	 }
			catch(Exception $e)
			{
			 	redirect('Admin');
			}
      }
  
	  public function Franchisee_Login()
	  {
			$this->load->model('login_model');	
			 try
			 {
				 $data=array();
				 $data = $this->login_model->Fran($_POST);
					if($data!=null)
		  			{
						$this->session->set_userdata('login_user1', $data[0]);
						redirect('franchisee/home');
					}
		  			else {
		  				    $data['message'] = "Username And Password is incorrect "; 
		  					$this->load->view('F_Login',$data);
						 }
		 		}
			catch(Exception $e)
			{
			 	redirect('welcome/Franchisee_Login');
			}
	  }
	  
	  public function Student()
	  {
			 $user_id=$this->input->post('name');
			 $pass=$this->input->post('pass');

			 $this->load->model('login_model');	
			 try
			 {
				 $data=array();
				 $data = $this->login_model->student($_POST);
				    if($data!=null)
		  			{
		    			    $dt=date('Y-m-d');
		  				    $data[0]->valid_upto;
		  				   
		  				    if($user_id!=$data[0]->user_id && $pass!=$data[0]->password)
		  				    {
		  				       $data['message'] = "Username And Password is incorrect "; 
		  					   $this->load->view('student/login',$data);	
		  				    }
		  				    else if($data[0]->status==1)
		  				    {
		  				    	 echo "here";
		  				    	 $data['message'] = "You Already Given A Exam.....!"; 
		  					     $this->load->view('student/login',$data);
		  				    }
		  				    else if($dt > $data[0]->valid_upto)
   		  				    {
   		  				    	 $data['message'] = "Your Account is deactivated.....!"; 
		  					     $this->load->view('student/login',$data);
		  				    }
		  				    else
		  				    {
				    			$this->session->set_userdata('login_user', $data[0]);
								$fid=$data[0]->f_id;
								$u_id=$data[0]->user_id;
								$status="notcomplete";
								$this->login_model->set_status($fid,$u_id,$status);
								$s=1;
								$this->login_model->update_act_user_stat($data[0]->user_id,$s);
								
								redirect('Student/Home');
							}	
					}
		  			else{

                           	 $data['message'] = "Please Check Username Or Password is Incorrect.....!"; 
		  					 $this->load->view('student/login',$data);		    
						 }
		 		}
			catch(Exception $e)
			{
			 	redirect('welcome/Student_Login');
			}
	  }
  }