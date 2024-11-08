<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallry extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	 
	
	public function Deleteimg()
	{
		$a= $_POST['nm'];
		$b= $_POST['id1'];
		$this->load->model('gallery_data');
		$res=$this->gallery_data->dele123($a,$b);
		if($res==true)
				{
				redirect('Admin/Gallery');
				}
				else
				{
				
				redirect('Admin/Gallery');
				}
	}
	
public function Delete()
 {
 	$a= $_POST['id'];
	$data = array(
				'name'				
				);
	$this->load->model('gallery_data');
	$res=$this->gallery_data->dele($data,$a);
				if($res==true)
				{
				redirect('Admin/Gallery');
				}
				else
				{
				///echo "Your Data Is Not Inserted";
				redirect('Admin/Gallery');
				}
 	
 }

public function doupload() {
 $b=array();
$org=array();
$files = $_FILES;
$cpt = count($_FILES['userfile']['name']);
      			    for($i=0; $i<$cpt; $i++)
      			    {

      			        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
      			        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
      			        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
      			        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
      			        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

      			        $this->load->library('upload');
      			        $this->upload->initialize($this->set_upload_options());
      			        if($this->upload->do_upload('userfile'))
      			        {
      			        	 $b[$i]=$this->upload->data();
      			        }	 
      			        $data= $this->upload->data();
  			       
        		    }
			   
			   foreach($b as $dt)
			   {
			   	  $org[]=$dt['file_name'];
			   }


			    $names= implode(',', $org);
				$this->load->database();
				$db_data = array('id'=> NULL,
				'name'=> $names,
				'album_name'=> $this->input->post('aname'),
				'status'=> $this->input->post('active')
				);
				$this->db->insert('gallery',$db_data);
				redirect('Admin/Gallery');
			   


}

public function More_upload() {
 $b=array();
 $org=array();
 $up_id=$this->input->post('aid');
$files = $_FILES;
$cpt = count($_FILES['moreimgs']['name']);
      			    for($i=0; $i<$cpt; $i++)
      			    {

      			        $_FILES['moreimgs']['name']= $files['moreimgs']['name'][$i];
      			        $_FILES['moreimgs']['type']= $files['moreimgs']['type'][$i];
      			        $_FILES['moreimgs']['tmp_name']= $files['moreimgs']['tmp_name'][$i];
      			        $_FILES['moreimgs']['error']= $files['moreimgs']['error'][$i];
      			        $_FILES['moreimgs']['size']= $files['moreimgs']['size'][$i];    

      			        $this->load->library('upload');
      			        $this->upload->initialize($this->set_upload_options());
      			        if($this->upload->do_upload('moreimgs'))
      			        {
      			        	 $b[$i]=$this->upload->data();
      			        }	 
      			        $data= $this->upload->data();
  			       
        		    }
			   
			   foreach($b as $dt)
			   {
			   	  $org[]=$dt['file_name'];
			   }

			  $query1=$this->db->get_where('gallery',array('id'=>$up_id));
			  $result=$query1->result_array();
			  $old_nm=$result[0]['name'];
			  

			    $names= implode(',', $org);
				$new_nm=$old_nm.",".$names;
				$this->load->database();
				
				$this->db->set('name',$new_nm);
				$this->db->where('id',$up_id);
				$this->db->update('gallery');
				redirect('Admin/Gallery');
			   


}
	
 private function set_upload_options()
{   
//  upload an image options
    $config = array();
    $config['upload_path'] = './uploads/Gallery/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png|txt|docs|docx|pdf|cdr';
    $config['overwrite']     = true;
    return $config;
}

public function change_status()
{
	 $str=$_POST['str'];
	 $id=$_POST['id'];

	 $this->db->set('status',$str);
	 $this->db->where('id',$id);
	 $query=$this->db->update('gallery');
	 if($query)
	 {
	 	 $data['message']="Status Changed Succesfully.....!";
	 	 print_r(json_encode($data));
	 }
	 else
	 {
	 	$data['message']="Error In Changing The Status.....!";
	 	 print_r(json_encode($data));
	 }
}


}