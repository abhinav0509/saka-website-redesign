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
				 $data = $this->login_model->checklogin($_POST);
				 if($data!=null)
		  			{
		    			$this->session->set_userdata('login_user', $data[0]);
					    if($data[0]->user_type=="Admin")
					    {
					    	 redirect('Admin/Home');
					    }
					    else if($data[0]->user_type=="Employee")
					    {
					    	redirect('Employee/Home');
					    }

						
		  			}
		  			else {
		  				    $data['message'] = "Username And Password is incorrect "; 
		  					$this->load->view('Login',$data);
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
						$this->session->set_userdata('login_user', $data[0]);
						redirect('Franchisee/Home');
					}
		  			else {
		  				    $data['message'] = "Username And Password is incorrect "; 
		  					$this->load->view('front_view/Header');
							$this->load->view('front_view/F_login',$data);
							$this->load->view('front_view/footer');
						 }
		 		}
			catch(Exception $e)
			{
			 	redirect('welcome/Franchisee_Login');
			}
	  }
	  
	  public function Demo_Franchisee_Login()
	  {
			$this->load->model('login_model');	
			 try
			 {
				 $data=array();
				 $data = $this->login_model->Demo_Fran($_POST);
					if($data!=null)
		  			{
						$this->session->set_userdata('login_user', $data[0]);
						redirect('DemoLogin/Home');
						//print_r($data);
						//die();
					}
		  			else {
		  				    $data['message'] = "Username And Password is incorrect "; 
		  					$this->load->view('Demo_Fran_Login',$data);
						 }
		 		}
			catch(Exception $e)
			{
			 	redirect('DemoLogin/Home');
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
		  				    //echo $data[0]->valid_upto;
		  				   
		  				    if($user_id!=$data[0]->user_id && $pass!=$data[0]->password)
		  				    {
		  				       $data['message'] = "Username And Password is incorrect "; 
		  					   $this->load->view('Student/Login',$data);	
		  				    }
		  				    else if($data[0]->status==1)
		  				    {
		  				    	 $data['message'] = "You Already Given A Exam.....!"; 
		  					     $this->load->view('Student/Login',$data);
		  				    }
		  				    else if($dt>$data[0]->valid_upto)
   		  				    {
   		  				    	 $data['message'] = "Your Account is deactivated.....!"; 
		  					     $this->load->view('Student/Login',$data);
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
		  					 $this->load->view('Student/Login',$data);		    
						 }
		 		}
			catch(Exception $e)
			{
			 	redirect('welcome/Student_Login');
			}
	  }
  }