<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_data extends CI_Controller {
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
	public function insert_banner()
	{
			$now = new DateTime();
		  $newFileName="";
		  $img_nm=$now->getTimestamp();  
		  $newFileName = $_FILES['upload']['name'];
			
		  $fileExt1 = explode(".",$newFileName);
		  $str=array_pop($fileExt1);
		  $fileExt=strtolower($str);
		
		  $img="" ;
		  $config['upload_path'] = './uploads/Banner/';      
		  $config['overwrite'] = true;
		  $config['file_name'] = $img_nm.".".$fileExt;
		  $config['allowed_types'] = '*';
		  
		  $this->load->library('upload', $config);
		  if ( ! $this->upload->do_upload('upload'))
		  {
			  $error = array('error' => $this->upload->display_errors());   
		  }
		  else
		  {
			  $imgdata = array('upload_data' => $this->upload->data());
			  $img=$img_nm.".".$fileExt;          
		  }
		
		$data = array(
			'image'=>$img,
			'cap1'=>$this->input->post('cap1'),
			'cap2'=>$this->input->post('cap2'),
			'cap3'=>$this->input->post('cap3'),
			'imgtitle'=>$this->input->post('imgTitle')
		);
		$this->load->Model('banner_mod');
		$res = $this->banner_mod->banner_insert($data);
		if($res){
			$mess = "Inserted Successfully!";
			$this->session->set_userdata('msg',$mess);
			redirect('Admin/banner');
		}
		else{
			$mess = "Error Please Try Again!";
			$this->session->set_userdata('msg',$mess);
			redirect('Admin/banner');
		}
	}

	public function delete_banner()
	{
		$id = $_POST['id'];
		$this->load->Model('banner_mod');
		$res = $this->banner_mod->banner_delete($id);
		if($res)
		{
			$data['message']="Record Deleted!";
			print_r(json_encode($data));
		}
		else
		{
			$data['message']="Error Please Try again!";
			print_r(json_encode($data));
		}
	}

	public function update_banner()
	{
		  $now = new DateTime();
		  $newFileName="";
		  $img_nm=$now->getTimestamp();  
		  $newFileName = $_FILES['upload']['name'];
			
		  $fileExt1 = explode(".",$newFileName);
		  $str=array_pop($fileExt1);
		  $fileExt=strtolower($str);
		
		  $img="" ;
		  $config['upload_path'] = './uploads/Banner/';      
		  $config['overwrite'] = true;
		  $config['file_name'] = $img_nm.".".$fileExt;
		  $config['allowed_types'] = '*';
		  
		  $this->load->library('upload', $config);
		  if ( ! $this->upload->do_upload('upload'))
		  {
			  $error = array('error' => $this->upload->display_errors());   
		  }
		  else
		  {
			  $imgdata = array('upload_data' => $this->upload->data());
			  $img=$img_nm.".".$fileExt;          
		  }
		if($img!=""){
		$data = array(
			'image'=>$img,
			'cap1'=>$this->input->post('cap1'),
			'cap2'=>$this->input->post('cap2'),
			'cap3'=>$this->input->post('cap3'),
			'imgtitle'=>$this->input->post('imgTitle')
		);
		}
		else
		{
			$data = array(
			'cap1'=>$this->input->post('cap1'),
			'cap2'=>$this->input->post('cap2'),
			'cap3'=>$this->input->post('cap3'),
			'imgtitle'=>$this->input->post('imgTitle')
		);
		}
		$this->load->Model('banner_mod');
		$id = $this->input->post('bid');
		$res = $this->banner_mod->banner_update($data,$id);
		if($res){
			$mess = "Updated Successfully!";
			$this->session->set_userdata('msg',$mess);
			redirect('Admin/banner');
		}
		else{
			$mess = "Error Please Try Again!";
			$this->session->set_userdata('msg',$mess);
			redirect('Admin/banner');
		}
	}
	
	public function banner_status()
{
	$id=$_POST['id'];
    $oldseq=$_POST['oldseq'];
    $newseq=$_POST['newseq'];

    $this->load->model('banner_mod');
    $res=$this->banner_mod->set_banner_status($id,$oldseq,$newseq);
    if($res){
      $data['message']="success";
      print_r(json_encode($data));
    }
    else{
      $data['message']="Error";
      print_r(json_encode($data));
    }
}
	 
}
?>