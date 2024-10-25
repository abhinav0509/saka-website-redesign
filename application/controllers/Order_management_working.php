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
        $book_name=$this->input->post('selectedval');
        

        $data=array('student_name'=>$stud,
        	        'course_name'=>$course,
                    'Book_Name'=>$book_name,
        	        'price'=>$price,
        	        'quantity'=>$qty,
        	        'total'=>$tot
        	);
        $this->load->model('order_mod');
        $res=$this->order_mod->order_insert($data,$this->globaldata['userdata']); 
        if($res)
        {
        	$mess="Order Placed.....!";
        	$this->session->set_userdata('msg',$mess);
        	redirect('Franchisee/Book_Order');
        }
        else
        {
        	$mess="We recieved Mail.....! We will contact you.";
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

        $this->load->Model('order_mod');
        $data1=$this->order_mod->get_ord_det_admin($odate,$fid);
       /* $result['data1']=$data1;
        $result['data2']=$data2;
        $result['data3']=$data3;*/
        print_r(json_encode($data1));
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

 }