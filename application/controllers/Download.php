<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {
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


     public function save_download_data()
     {
      	        
			ini_set('post_max_size', '64M');
		    ini_set('upload_max_filesize', '64M');

      	           $files = $_FILES;
                   $fdata=$this->globaldata['userdata'];
                   $b=array();
                   $org=array();
                   $cpt = count($_FILES['upload']['name']);
          for($i=0; $i<$cpt; $i++)
          {

              $_FILES['upload']['name']= $files['upload']['name'][$i];
              $_FILES['upload']['type']= $files['upload']['type'][$i];
              $_FILES['upload']['tmp_name']= $files['upload']['tmp_name'][$i];
              $_FILES['upload']['error']= $files['upload']['error'][$i];
              $_FILES['upload']['size']= $files['upload']['size'][$i];    

              $this->load->library('upload');
              $this->upload->initialize($this->set_upload_options());
              if($this->upload->do_upload('upload'))
              {
                 $b[$i]=$this->upload->data();
              }  
              $data= $this->upload->data();

          }
         
         foreach($b as $dt)
         {
            $org[]=$dt['file_name'];
         } 
         

          $caption=$this->input->post('dname');
                //$fr_id=$fdata->cus_id;
                //$fran_id=$fdata->fran_id;
                $dt=date('Y-m-d');

                $data1=array(
                  'Download_Name'=>$caption,
                    'Role'=>'Admin',
                    'entry_dt'=>$dt
                  );

               $this->load->Model('download_mod');
               $res=$this->download_mod->insert_download1($data1,$org);
               if($res)
               {
       					    $mess="File Saved succesfuly.....!";
      		        	$this->session->set_userdata('msg',$mess);
      		        	redirect('Admin/Adm_Download');
               }
               else
               {
         					  $mess="Error In Saving File.....!";
      		        	$this->session->set_userdata('msg',$mess);
      		        	redirect('Admin/Adm_Download');	
               }

     }

   
     public function save_download_data1()
     {
      	         $files = $_FILES;
      	         $fdata=$this->globaldata['userdata'];
      	        $b=array();
                $org=array();
       			    $cpt = count($_FILES['upload']['name']);
      			    for($i=0; $i<$cpt; $i++)
      			    {

      			        $_FILES['upload']['name']= $files['upload']['name'][$i];
      			        $_FILES['upload']['type']= $files['upload']['type'][$i];
      			        $_FILES['upload']['tmp_name']= $files['upload']['tmp_name'][$i];
      			        $_FILES['upload']['error']= $files['upload']['error'][$i];
      			        $_FILES['upload']['size']= $files['upload']['size'][$i];    

      			        $this->load->library('upload');
      			        $this->upload->initialize($this->set_upload_options());
      			        if($this->upload->do_upload('upload'))
      			        {
      			        	 $b[$i]=$this->upload->data();
      			        }	 
      			        $data= $this->upload->data();
  			       
        		    }
			   
			   foreach($b as $dt)
			   {
			   	  $org[]=$dt['file_name'];
			   } 


			    $caption=$this->input->post('dname');
                $fr_id=$fdata->cus_id;
                $fran_id=$fdata->fran_id;
                $dt=date('Y-m-d');

                $data1=array(
                	'Download_Name'=>$caption,
                    'Role'=>'Franchise',
                    'cus_id'=>$fr_id,
                    'fr_id'=>$fran_id,
                    'insname'=>$fdata->institute_name,
                    'entry_dt'=>$dt
                	);

               $this->load->Model('download_mod');
               $res=$this->download_mod->insert_download1($data1,$org);
               if($res)
               {
     					    $mess="File Saved succesfuly.....!";
    		        	$this->session->set_userdata('msg',$mess);
    		        	redirect('Franchisee/Download');
               }
               else
               {
       					  $mess="Error In Saving File.....!";
    		        	$this->session->set_userdata('msg',$mess);
    		        	redirect('Franchisee/Download');	
               }
			   
              
  }		

  private function set_upload_options()
{   
//  upload an image options
    $config = array();
    $config['upload_path'] = './uploads/Download/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png|txt|docs|docx|pdf|cdr';
    $config['overwrite']     = true;
	$config['max_size']	= '10240';


    return $config;
}	 	

public function Delete_Data()
{
	$id=$_POST['id'];
	$img=$_POST['image'];
	$path=base_url()."uploads/Download";
	$path="./uploads/Download"."/".$img;
  unlink($path);

	$this->load->Model('download_mod');
	$res=$this->download_mod->delete_data_down($id);
    if($res)
    {
    	return true;
    }
    else
    {
    	return false;
    }

}

public function img_download()
{
   $name=$_GET['img'];
   $data=file_get_contents("./uploads/Download/".$_GET['img']);
   force_download($name, $data);    
}





}