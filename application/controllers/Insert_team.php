<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Insert_team extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('team'); // Load the model
        $this->load->library('upload');
    }

    public function insert()
{
    $up_id = $this->input->post('bid');
    $originalDate = $this->input->post('doa');

    // Convert date format
    if (!empty($originalDate)) {
        $farr = explode("/", $originalDate);
        $farr = array_reverse($farr);
        $newfdate1 = implode("/", $farr);
        $pub_dt = str_replace("/", "-", $newfdate1);
    } else {
        $pub_dt = date('Y-m-d'); // Default date
    }

    // File upload configuration
    $config['upload_path']   = './uploads/Gallery/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = 2048; // 2MB max
    $config['encrypt_name']  = TRUE; // Ensures unique filenames

    $this->load->library('upload', $config); // Ensure upload library is loaded
    $this->upload->initialize($config);

    $b = $this->input->post('old_image'); // Default to old image

    if (!empty($_FILES['upload']['name'])) { // Check if new file is uploaded
        if ($this->upload->do_upload('upload')) {
            $uploadData = $this->upload->data();
            $b = $uploadData['file_name'];
        } else {
            echo $this->upload->display_errors();
            return; // Stop execution if upload fails
        }
    }

    $data = array(
        'firstname'   => $this->input->post('firstname'),
        'lastname'    => $this->input->post('lastname'),
        'designation' => $this->input->post('designation'),
        'insertdate'  => $pub_dt,
        'Image' => $b,
        'updatedate'  => $pub_dt,
        'status'      => $this->input->post('active')
    );

    // Include image if set
    if (!empty($b)) {
        $data['image'] = $b;
    }

    if (!empty($up_id)) {
        $res = $this->team->Update_Team($data, $up_id);
    } else {
        $res = $this->team->Insert_Team($data);
    }

    if ($res) {
        redirect('Admin/Team');
    } else {
        echo "An error occurred. Please try again.";
    }
}


    public function delete()
    {
        $id = $this->input->post('id');

        if ($id) {
            $res = $this->team->dele($id);

            if ($res) {
                redirect('Admin/Team');
            } else {
                echo "Failed to delete the record.";
            }
        } else {
            echo "Invalid ID.";
        }
    }

    public function getTesto()
    {
        $name = $this->input->post('term');
        $data = $this->team->getdata1($name);

        echo json_encode($data);
    }
}
