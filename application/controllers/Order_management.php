<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_management extends CI_Controller {
	 var $globaldata;
     function __construct()
     {
	 
		
     	 parent::__construct();
		 $this->load->library("Pdf");
		 $this->load->database();
		
		 $var=$this->session->userdata;
	   	 if(isset($var['login_user']))
     	 {
          
          $this->globaldata=array(
		  'userdata'=>$var['login_user']
	 );
       }

     }

     

   public function Add_Remark()
    {

        $id=$_POST['id'];
        $msg=$_POST['remark'];
        
        $data = array(
                    'Admin_Remark' => $msg,
                    'adm_ord_state'=>'unread'
                    );
        
        $this->load->Model('order_mod');
        $res=$this->order_mod->Add_Admin_Remark($id,$data);
        if($res)
        {
            $data['message']="Remark Added.....!";
            print_r(json_encode($data));
        }
        else
        {
            $data['message']="Remark Not Added Try Again";
            print_r(json_encode($data));
        }
        
    }

    public function add_ord_remark()
    {
        $id=$_POST['id'];
        $rem=$_POST['remark'];
        $dt=$_POST['dt'];

        $doc_no=$_POST['doc_no'];
        $doc_dt=$_POST['doc_dt'];

        $data = array(
                    'Admin_Remark' => $rem." ".$doc_no." ".$doc_dt,
                    'adm_ord_state'=>'unread'
                    );
        
        $this->load->Model('order_mod');

        if($rem=="" || $rem!="")
        {
          $this->order_mod->Add_Ord_Remark_msg($id,$doc_no,$doc_dt);
        }
        if($rem!="")
        {     
            $res=$this->order_mod->Add_Ord_Remark($id,$data,$dt);
            if($res)
            {
                $data['message']="Remark Added.....!";
                print_r(json_encode($data));
            }
            else
            {
                $data['message']="Remark Not Added Try Again";
                print_r(json_encode($data));
            }
        }    


    }

    public function Add_mult_Remark()
    {

        $str=$_POST['id'];
        $msg=$_POST['remark'];
        $arraydata=explode(",", $str);
        
        
        $data1 = array(
                    'Admin_Remark' => $msg,
                    'adm_ord_state'=>'unread'
                    );
        
        $this->load->Model('order_mod');
        $res=$this->order_mod->Add_Admin_mult_Remark($data1,$arraydata);
        if($res)
        {
            $data['message']="Remark Added.....!";
            print_r(json_encode($data));
        }
        else
        {
            $data['message']="Remark Not Added Try Again";
            print_r(json_encode($data));
        }
        
    }

    public function ord_state_Remark()
    {
        $str=$_POST['id'];
        
        $arraydata=explode(",", $str);
        
        
        $data1 = array(
                    'Status' => 'Dispatch',
                    'adm_ord_state'=>'unread'
                    );
        
        $this->load->Model('order_mod');
        $res=$this->order_mod->order_stat_rem($data1,$arraydata);
        if($res)
        {
            $data['message']="Status Changed.....!";
            print_r(json_encode($data));
        }
        else
        {
            $data['message']="Error In Updating Status";
            print_r(json_encode($data));
        }
    }

public function Add_Remark1()
    {
        $dt=$_POST['hd1'];
        $id=$_POST['hd2'];
        $msg=$_POST['rem'];
        if($msg=="")
        {
            redirect('Employee/Order');
        }
        else
        {
        $data = array(
                    'Admin_Remark' => $msg,
                    'adm_ord_state'=>'unread'
                    );
        
        $this->load->Model('order_mod');
        $res=$this->order_mod->Add_Admin_Remark($dt,$id,$data);
        if($res)
        {
            echo "Remark Added.....!";
            redirect('Employee/Order');
        }
        else
        {
            echo "Remark Not Added Try Again";
            redirect('Employee/Order');
        }
        }
    }

    public function get_stud_name()
    {
    	$action=$_POST['action'];
    	if($action=="getstudent")
    	{
    	   $this->globaldata;
    	   $this->load->Model('order_mod');
    	   $data1=$this->order_mod->stud_res($this->globaldata['userdata']);
    	   print_r(json_encode($data1));

    	}
    }


    public function get_course_name()
    {
    	$action=$_POST['action'];
    	if($action=="getCourses")
    	{
    	   $this->globaldata;
    	   $this->load->Model('order_mod');
    	   $data1=$this->order_mod->course_res();
    	   print_r(json_encode($data1));

    	}
    }
    public function get_course_price()
    {    	
    	if($_POST['cname'])
    	{
    	   $cname=$_POST['cname'];
           $stid=$_POST['stid'];
    	   $this->load->Model('order_mod');
    	   $data1=$this->order_mod->course_price($cname,$stid);
    	   print_r(json_encode($data1));
    	}
    }
    public function Insert_order()
    {
        $stud=$this->input->post('stud');
        $course=$this->input->post('course');
        $price=$this->input->post('price');
        $qty=$this->input->post('qty');
        $tot=$this->input->post('tot');
        $this->globaldata;
        /*$book_name=$this->input->post('selectedval');*/
        

        $data=array('student_name'=>$stud,
        	        'course_name'=>$course,
                    'price'=>$price,
        	        'quantity'=>$qty,
        	        'total'=>$tot
        	);
        $this->load->model('order_mod');
        $res=$this->order_mod->order_insert($data,$this->globaldata['userdata']); 
        if($res)
        {
        	$this->make_payment();
        }
        else
        {
        	$mess="We recieved Mail.....! We will contact you.";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Franchisee/Book_Order');
        }
    }



	public function Insert_order1()
    {
	
	
		$b="";
				$data=$this->globaldata['userdata'];
				$fid=$data->cus_id;
				$fname1=$data->institute_name;
				$up_id = $this->input->post('bid');
				$config['upload_path'] = './uploads/Receipt/';
				$config['allowed_types'] = 'gif|jpg|png';
				
				$this->load->library('upload', $config);
				if ( !$this->upload->do_upload('preceipt'))
				{
					$error = array('error' => $this->upload->display_errors());
				} 
				else
				{
			 	$data = array('upload_data' => $this->upload->data());
			 	foreach($data as $d)
			 	{
			       $b= $d['file_name'];
			 	}
				
				}
	
	
       $stud=$this->input->post('stud');
        $course=$this->input->post('course');
        $price=$this->input->post('price');
        $qty=$this->input->post('qty');
        $tot=$this->input->post('tot');
        $this->globaldata;
       
	    $data=array('student_name'=>$stud,
        	        'course_name'=>$course,
                    'price'=>$price,
        	        'quantity'=>$qty,
        	        'total'=>$tot
        	);
	   
	 $dt=$this->globaldata['userdata'];
				$fid1=$dt->cus_id;
				$fname2=$dt->institute_name;
				$dt=date('Y-m-d');
	   
        $data1=array('receipt'=>$b,
					'f_id'=>$fid1,
					'fname'=>$fname2,
					'pdate'=>$dt
					
		);
			
		
		
		$this->load->model('order_mod');
        $res=$this->order_mod->order_insert1($data,$data1,$this->globaldata['userdata']); 
        if($res)
        {
             //$this->make_payment();
			 $mess="Order Placed Successfully...!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Franchisee/Book_Order');
			 
        }
        else
        {
        	$mess="Error in Placing The Order...!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Franchisee/Book_Order');
        }
    }




    public function get_order_det()
    {
        $odate=$_POST['odate'];
        $fid=$_POST['fid'];

        $this->load->Model('order_mod');
        $data1=$this->order_mod->get_ord_det($odate,$fid);
        $data2=$this->order_mod->stud_res($this->globaldata['userdata']);
        $data3=$this->order_mod->course_res();
        $result['data1']=$data1;
        $result['data2']=$data2;
        $result['data3']=$data3;
        print_r(json_encode($result));
        //print_r(json_encode($data1));
    }

    public function get_order_pend_det()
    {
        $odate=$_POST['odate'];
        $fid=$_POST['fid'];

        $this->load->Model('order_mod');
        $data1=$this->order_mod->get_ord_det_pend($odate,$fid);
        $data2=$this->order_mod->stud_res($this->globaldata['userdata']);
        $data3=$this->order_mod->course_res();
        $result['data1']=$data1;
        $result['data2']=$data2;
        $result['data3']=$data3;
        print_r(json_encode($result));
        //print_r(json_encode($data1));
    }

    public function get_order_det1()
    {
        $odate=$_POST['odate'];
        $fid=$_POST['fid'];

        $this->load->Model('order_mod');
        $data1=$this->order_mod->get_ord_det1($odate,$fid);
        $data2=$this->order_mod->stud_res1($this->globaldata['userdata']);
        $data3=$this->order_mod->course_res();
        $result['data1']=$data1;
        $result['data2']=$data2;
        $result['data3']=$data3;
        print_r(json_encode($result));
        //print_r(json_encode($data1));
    }

     public function get_order_det_admin()
    {
        $odate=$_POST['odate'];
        $fid=$_POST['fid'];
        $start=$_POST['pindex'];

        $this->load->Model('order_mod');
        $data1=$this->order_mod->get_ord_det_admin($start,$odate,$fid);
        $data2=$this->order_mod->get_ord_det_count($odate,$fid);
       
        $result['data1']=$data1;
        $result['data2']=$data2;
        print_r(json_encode($result));
        //print_r(json_encode($data1));
    }

        public function get_both_det()
    {
            $action=$_POST['action'];
            if($action=="getboth")
            {
               $this->globaldata;
               $this->load->Model('order_mod');
               $data1=$this->order_mod->stud_res($this->globaldata['userdata']);
               $data2=$this->order_mod->course_res();
               $result['data1']=$data1;
               $result['data2']=$data2;
               print_r(json_encode($result));
              

            }

    }

    public function Delete_order()
    {
        $id=$_POST['id'];
        $this->load->Model('order_mod');
        $data1=$this->order_mod->order_delete($id);
        if($data1)
        {
              $data['mes']="Order Successfully Removed.....!";
              print_r(json_encode($data));
        }
        else
        {
              $data['mes']="Error In Removing Order.....!";
              print_r(json_encode($data));
        }
    }

    public function update_order()
    {
        $fid=$this->input->post('fid');
        $oid=$this->input->post('oid');

        $stud=$this->input->post('stud');
        $course=$this->input->post('course');
        $price=$this->input->post('price');
        $qty=$this->input->post('qty');
        $tot=$this->input->post('tot');
        $this->globaldata;
        $book_name=$this->input->post('selectedval');
        

        $data=array('ooid'=>$oid,
                    'student_name'=>$stud,
                    'course_name'=>$course,
                    'Book_Name'=>$book_name,
                    'price'=>$price,
                    'quantity'=>$qty,
                    'total'=>$tot
            );

        $order_id=array('oid'=>$oid);
        $this->load->model('order_mod');
        $res=$this->order_mod->order_update($data,$order_id,$fid,$this->globaldata['userdata']); 
        if($res)
        {
            $mess="Order Updated.....!";
            $this->session->set_userdata('msg',$mess);
            redirect('Franchisee/Book_Order');
        }
        else
        {
            $mess="Error In Updating Order.....!";
            $this->session->set_userdata('msg',$mess);
            redirect('Franchisee/Book_Order');
        }
    }
    
    public function GetorderData1()
    {
        
         $name= $this->input->post('term'); 
         $this->load->model('order_mod');   
         $this->order_mod->getorderfran1($name);
    }
    public function getSingleExcel()
    {
        $fid=$_GET['id'];
        $odate=$_GET['odate'];
        $this->load->Model('order_mod');
        $this->order_mod->singleExcel($fid,$odate);
    }
    public function getsinglepdf()
    {
        $fid=$_GET['id'];
        $odate=$_GET['odate'];
        $this->load->Model('order_mod');
        $this->order_mod->singlepdf($fid,$odate);
    }
    public function get_pdf_by_cat()
    {
        $fdt=$_GET['fdate'];
        $tdt=$_GET['todate'];
        $fnm=$_GET['fnm'];

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

        $this->load->model('order_mod');
        $this->order_mod->pdf_by_cat($from_dt,$to_dt,$fnm);
    } 
    public function get_excel_by_cat()
    {
        $fdt=$_GET['fdate'];
        $tdt=$_GET['todate'];
        $fnm=$_GET['fnm'];

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

        $this->load->model('order_mod');
        $this->order_mod->Excel_by_cat($from_dt,$to_dt,$fnm);
    }

    public function change_status()
    {
        $dt=$_POST['dt'];
        $fid=$_POST['fid'];
        $status=$_POST['status'];

        $this->load->Model('order_mod');
        $res=$this->order_mod->status_change($dt,$fid,$status);
        if($res)
        {
            $data['mes']='Status Changed Successfully.....!';
            print_r(json_encode($data));
        }
        else
        {
            $data['mes']='Error In Updating Status.....!';
            print_r(json_encode($data));
        }
    }

    public function get_stud_course_det()
    {
         $this->load->Model('order_mod');
         $stud_id=$_POST['studid'];
         $f_id=$_POST['fid'];
         $data1=$this->order_mod->stud_course_det1($stud_id,$f_id);
         $data2=$this->order_mod->stud_course_det2($stud_id,$f_id);
         $result['data1']=$data1;
         $result['data2']=$data2;
         print_r(json_encode($result));

    }


	/*********** Payment gateway integratiopnj start *****************/


    public function make_payment()
    {
        $data1=$this->globaldata['userdata'];
        $data2['franch_details']=$this->order_mod->get_franch_details($data1->cus_id);
        $data2['order_details']=$this->order_mod->get_tmp_Order_details($data1->cus_id);
        $data2['max_id']=$this->order_mod->get_ref_no_details();
        $this->load->view('Franchisee/payment_start_page',$data2);
    }

    public function next_step()
    {
        $this->load->view('Franchisee/payment_next_step',$_POST);
    }

    public function get_payment_response()
    {
       $this->load->view('Franchisee/payment_response');    
    }

    public function save_paid_data()
    {
        $count=0;
        $this->load->Model('order_mod');
        $data1=$this->globaldata['userdata'];
        if($this->session->userdata('order'))
        {
            $arr=$this->session->userdata('order');
            $count=count($arr);
            $fid=$arr['fid'];
            $dt=$arr['odate'];
            $this->session->unset_userdata('order');
        }   
        

        if($count>0)
        {
              $dt=date('Y-m-d');
              $data=array(
                       'f_id'=>$data1->cus_id,
                       'fname'=>$data1->institute_name,
                       'ref_no'=>$this->input->post('refno'),
                       'amount'=>$this->input->post('amt'),
                       'pdate'=>$dt 
                    );
                $status=$this->input->post('rmsg');  
                $this->order_mod->paid_data_save($fid,$status);
                $res=$this->order_mod->dele_from_tmp1($fid,$dt,$status);
                if($res)
                {
                    $mess="Order Placed Successfully.....!";
                    $this->session->set_userdata('msg',$mess);
                    redirect('Franchisee/Book_Order');
                }
                else
                {
                    $mess="Error In Placing The Order,Please check Pending Orders.....!";
                    $this->session->set_userdata('msg',$mess);
                    redirect('Franchisee/Book_Order');
                }
                
        }
        else
        {

                $dt=date('Y-m-d');
                $data=array(
                       'f_id'=>$data1->cus_id,
                       'fname'=>$data1->institute_name,
                       'ref_no'=>$this->input->post('refno'),
                       'amount'=>$this->input->post('amt'),
                       'pdate'=>$dt 
                    );
                $status=$this->input->post('rmsg');    
                
                $this->order_mod->paid_data_save($data,$data1->cus_id,$status);
                $res=$this->order_mod->dele_from_tmp($data1->cus_id,$status);
                if($res)
                {
                    $mess="Order Placed Successfully.....!";
                    $this->session->set_userdata('msg',$mess);
                    redirect('Franchisee/Book_Order');
                }
                else
                {
                    $mess="Error In Placing The Order,Please check Pending Orders.....!";
                    $this->session->set_userdata('msg',$mess);
                    redirect('Franchisee/Book_Order');
                }

          }      
    }


    public function get_Pending_orders()
    {
        $ses_data=$this->globaldata['userdata'];
        
        $this->load->Model('order_mod');
        $data1=$this->order_mod->get_pendings($ses_data->cus_id);

        $result['data1']=$data1;
        print_r(json_encode($result));

    }

    public function pending_ord_paid()
    {
         $fid=$_GET['id'];
         $dt=$_GET['dt'];
         $odata=array('fid'=>$fid,'odate'=>$dt);

         $this->session->set_userdata('order',$odata);   
         $arr=$this->session->userdata('order');
         //echo "Fid=".$arr['fid'];

         $this->pending_make_payment($fid,$dt);
         
    }

    public function pending_make_payment($fid,$dt)
    {        
        $this->load->Model('order_mod');
        $data2['franch_details']=$this->order_mod->get_franch_details($fid);
        $data2['order_details']=$this->order_mod->get_tmp_Order_details1($fid,$dt);
        $data2['max_id']=$this->order_mod->get_ref_no_details();
        $this->load->view('Franchisee/payment_start_page',$data2);
    }

    public function Delete_pending_order()
    {
         $id=$_POST['id'];
         $dt=$_POST['dt'];

         $this->load->Model('order_mod');
         $res=$this->order_mod->del_pend_order($id,$dt);
         if($res)
         {
             $data['message']="Order Deleted Successfully...!";
             print_r(json_encode($data));
         }
         else
         {
             $data['message']="Error In Deleting The Order...!";
             print_r(json_encode($data));
         }
    }

    public function Delete_single_order()
    {
        $id=$_POST['id'];
        $this->load->Model('order_mod');
        $data1=$this->order_mod->order_delete_single($id);
        if($data1)
        {
              $data['mes']="Order Successfully Removed.....!";
              print_r(json_encode($data));
        }
        else
        {
              $data['mes']="Error In Removing Order.....!";
              print_r(json_encode($data));
        }
    }


	 public function Delete_Admin_Order()
   {
		$id=$_POST['id'];
		$dt1=$_POST['dt1'];
		$this->load->model('order_mod');
		$data1=$this->order_mod->Delete_Multiple_Record($id,$dt1);
		if($data1)
		{
			$data['mes']="Record Deleted Successfully";
			print_r(json_encode($data));
		}
		else
		{
			$data['mes']="Record Not Deleted";
			print_r(json_encode($data));
		}
   }
	
	




   /*********** Payment gateway integratiopnj End *****************/



 }