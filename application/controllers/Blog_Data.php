<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_Data extends CI_Controller {

    var $globaldata;

    function __construct()
    {
        parent::__construct();
        // Load models, libraries, etc. if needed
        $this->load->model('blog');
    }

    public function Insert()
    {
        $up_id = $this->input->post('bid');
        $originalDate = $this->input->post('pcont');
        $b = "";
        $farr = explode("/", $originalDate); 
        $farr = array_reverse($farr);
        $newfdate1 = implode($farr, "/");
        $pub_dt = str_replace("/", "-", $newfdate1);
        
        $config['upload_path'] = './uploads/Blog/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('upload')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle the error if needed
        } else {
            $data = array('upload_data' => $this->upload->data());
            $b = $data['upload_data']['file_name'];
        }

        if ($up_id != "") {
            if ($b == null) {
                $data = array(
                    'Title' => $this->input->post('tit'),
                    'Name' => $this->input->post('nm'),
                    'Content' => $this->input->post('testo'),
                    'insertdate' => $pub_dt
                );
            } else {
                $data = array(
                    'Title' => $this->input->post('tit'),
                    'Name' => $this->input->post('nm'),
                    'Content' => $this->input->post('testo'),
                    'Image' => $b,
                    'insertdate' => $pub_dt
                );
            }
            $res = $this->blog->Update_Data($data, $up_id);
            redirect('Admin/Blog');
        } else {
            $data = array(
                'Title' => $this->input->post('tit'),
                'Name' => $this->input->post('nm'),
                'Content' => $this->input->post('testo'),
                'Image' => $b,
                'insertdate' => $pub_dt
            );
            $res = $this->blog->Insert_Data($data);
            if ($res == true) {
                redirect('Admin/Blog');
            } else {
                echo "Your Data Is Not Inserted";
                redirect('Admin/Blog');
            }
        }
    }

    public function Delete()
    {
        $a= $_POST['B_id'];
    //    echo $a;
    //    die("Stop");
        $data = array(
           'Name' => $this->input->post('nm'),
           'Content' => $this->input->post('testo')
           );
       $this->load->model('blog');
       $res=$this->blog->dele($data,$a);
                   if($res==true)
                   {
                   redirect('Admin/Blog');
                   }
                   else
                   {
                   echo "Your Data Is Not Inserted";
                   redirect('Admin/Blog');
                   }
         }
   

    public function GetTesto()
    {	
        $name = $this->input->post('term');	
        $data = $this->blog->getdata1($name); // Make sure this returns the data you need
        echo json_encode($data); // Ensure you return a proper JSON response
    }
}
