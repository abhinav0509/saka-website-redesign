<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

    var $globaldata;

    function __construct()
    {
        parent::__construct();
        // Load models, libraries, etc. if needed
        $this->load->model('Product_Model');
    }

    public function Insert()
    {
        $up_id = $this->input->post('bid');
        $originalDate = $this->input->post('doa');
        $b = "";
        $farr = explode("/", $originalDate); 
        $farr = array_reverse($farr);
        $newfdate1 = implode(", ", $farr);
        $pub_dt = str_replace("/", "-", $newfdate1);
        
        $config['upload_path'] = './uploads/Product/';
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
                    'product_name' => $this->input->post('tit'),
                    'capacity' => $this->input->post('nm'),
                    'description' => $this->input->post('testo'),
                    'insertdate' => $pub_dt
                );
            } else {
                $data = array(
                    'product_name' => $this->input->post('tit'),
                    'capacity' => $this->input->post('nm'),
                    'description' => $this->input->post('testo'),
                    'image' => $b,
                    'insertdate' => $pub_dt
                );
            }
            $res = $this->Product_Model->Update_Data($data, $up_id);
            redirect('Admin/Products');
        } else {
            $data = array(
                'product_name' => $this->input->post('tit'),
                'capacity' => $this->input->post('nm'),
                'description' => $this->input->post('testo'),
                'image' => $b,
                'insertdate' => $pub_dt
            );
            $res = $this->Product_Model->Insert_Data($data);
            if ($res == true) {
                redirect('Admin/Products');
            } else {
                echo "Your Data Is Not Inserted";
                redirect('Admin/Products');
            }
        }
    }

    public function Delete()
    {
        $a= $_POST['id'];
       $data = array(
                   'product_name' => $this->input->post('course')				
                   );
       $this->load->model('Product_Model');
       $res=$this->Product_Model->dele($data,$a);
                   if($res==true)
                   {
                   redirect('Admin/Products');
                   }
                   else
                   {
                   echo "Your Data Is Not Inserted";
                   redirect('Admin/Products');
                   }
        
    }
   

    public function GetTesto()
    {	
        $name = $this->input->post('term');	
        $data = $this->Product_Model->getdata1($name); // Make sure this returns the data you need
        echo json_encode($data); // Ensure you return a proper JSON response
    }
}
