<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Set_paper extends CI_Controller {
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

     public function get_Exame()
     {
        $cname=$_POST['cname'];
        $this->load->model('paper_mod');
        $data=$this->paper_mod->Exame_get($cname);
        print_r(json_encode($data));
     }

     public function save_paper()
     {
         $data=array(
            'quiz_cat_id'=>$this->input->post('exame'),
            'question'=>$this->input->post('content1'),
            'option_a'=>$this->input->post('opt1'),
            'option_b'=>$this->input->post('opt2'),
            'option_c'=>$this->input->post('opt3'),
            'option_d'=>$this->input->post('opt4'),
            'answer'=>$this->input->post('active1')
      
          );

        

         $this->load->Model('paper_mod');
         $res=$this->paper_mod->save_paper($data);
         if($res)
         {
             $mess="Question Saved.....!";
             $this->session->set_userdata('msg',$mess);
             redirect('Admin/Paper');
         }
         else
         {
             $mess="Error In Saving The Question.....!";
             $this->session->set_userdata('msg',$mess);
             redirect('Admin/Paper'); 
         }
     }

      public function save_paper1()
     {
         $data=array(
            'quiz_cat_id'=>$this->input->post('exame'),
            'question'=>$this->input->post('content1'),
            'option_a'=>$this->input->post('opt1'),
            'option_b'=>$this->input->post('opt2'),
            'option_c'=>$this->input->post('opt3'),
            'option_d'=>$this->input->post('opt4'),
            'answer'=>$this->input->post('active1')
      
          );

        

         $this->load->Model('paper_mod');
         $res=$this->paper_mod->save_paper($data);
         if($res)
         {
             $mess="Question Saved.....!";
             $this->session->set_userdata('msg',$mess);
             redirect('Employee/Paper');
         }
         else
         {
             $mess="Error In Saving The Question.....!";
             $this->session->set_userdata('msg',$mess);
             redirect('Employee/Paper'); 
         }
     }

     public function get_Exame_det()
     {
        $course=$_POST['cname'];
        $module=$_POST['module'];
        $pindex=$_POST['pindex'];

        $this->load->Model('paper_mod');
        $data1=$this->paper_mod->Set_Exame_det_count($module);
        $data2=$this->paper_mod->Set_Exame_det($course,$module,$pindex);

        $result['count']=$data1;
        $result['res']=$data2;

        print_r(json_encode($result));

     }
     public function update_paper()
     {
          $up_id=$this->input->post('bid');

          $data=array(
            'quiz_cat_id'=>$this->input->post('exame'),
            'question'=>$this->input->post('content1'),
            'option_a'=>$this->input->post('opt1'),
            'option_b'=>$this->input->post('opt2'),
            'option_c'=>$this->input->post('opt3'),
            'option_d'=>$this->input->post('opt4'),
            'answer'=>$this->input->post('active1')
      
          );

        

         $this->load->Model('paper_mod');
         $res=$this->paper_mod->update_paper($data,$up_id);
         if($res)
         {
             $mess="Question Updated.....!";
             $this->session->set_userdata('msg',$mess);
             redirect('Admin/Paper');
         }
         else
         {
             $mess="Error In Updating The Question.....!";
             $this->session->set_userdata('msg',$mess);
             redirect('Admin/Paper'); 
         }

     }

     public function update_paper1()
     {
          $up_id=$this->input->post('bid');

          $data=array(
            'quiz_cat_id'=>$this->input->post('exame'),
            'question'=>$this->input->post('content1'),
            'option_a'=>$this->input->post('opt1'),
            'option_b'=>$this->input->post('opt2'),
            'option_c'=>$this->input->post('opt3'),
            'option_d'=>$this->input->post('opt4'),
            'answer'=>$this->input->post('active1')
      
          );

        

         $this->load->Model('paper_mod');
         $res=$this->paper_mod->update_paper($data,$up_id);
         if($res)
         {
             $mess="Question Updated.....!";
             $this->session->set_userdata('msg',$mess);
             redirect('Employee/Paper');
         }
         else
         {
             $mess="Error In Updating The Question.....!";
             $this->session->set_userdata('msg',$mess);
             redirect('Employee/Paper'); 
         }

     }

   public function get_ques()
   {
         $id=$_GET['id'];
         $name= $this->input->post('term'); 
         $this->load->model('paper_mod');   
         $this->paper_mod->ques_get($name,$id);
   }
   public function get_q_det()
   {
     $id=$_POST['qid'];
     $this->load->Model('paper_mod');
     $data=$this->paper_mod->q_get($id);
     print_r(json_encode($data));
   }

   public function get_Exame_det1()
   {
        $id=$_POST['id'];
       
        $this->load->Model('paper_mod');
        $data=$this->paper_mod->Set_Exame_det1($id);
        print_r(json_encode($data));
   }

}