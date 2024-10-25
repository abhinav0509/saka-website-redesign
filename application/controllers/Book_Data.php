<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_Data extends CI_Controller {

	
	 var $globaldata;
     function __construct()
     {
     	 parent::__construct();
	
     }
	 
	public function GetInboxData()
	{	
	    
	    $name= $this->input->post('term');	
	    $this->load->model('book_ins');	
	    $this->book_ins->GetInbox($name);
	
	}
	 public function Search()
	 {
	 /*echo "fgfd";
	 die();
	 $this->load->database();
	 if($_POST)
	{
	$q=$_POST['search'];
	$sql_res=mysql_query("select id,book_name,author_name from book where book_name like '%$q%' or author_name like '%$q%' order by id LIMIT 5");
	while($row=mysql_fetch_array($sql_res))
	{
	$username=$row['book_name'];
	$email=$row['author_name'];
	$b_username='<strong>'.$q.'</strong>';
	$b_email='<strong>'.$q.'</strong>';
	$final_username = str_ireplace($q, $b_username, $username);
	$final_email = str_ireplace($q, $b_email, $email);
	?>
	<div class="show" align="left">
	<img src="author.PNG" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><?php echo $final_email; ?><br/>
	</div>
<?php
}
}*/
	 }
	 
	public function Insert1()
	{

	$up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/Book/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if ( !$this->upload->do_upload('upload'))
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
	    if($up_id!="")
	    {
					if($b==null)
					{
			    	 $data = array(
					'book_name' => $this->input->post('book'),
					'author_name' => $this->input->post('author'),
					'book_title' => $this->input->post('title'),
					'book_price' => $this->input->post('price'),
					'description' => $this->input->post('Desc')
					);
					}
					else
					{
					$data = array(
					'book_name' => $this->input->post('book'),
					'author_name' => $this->input->post('author'),
					'book_title' => $this->input->post('title'),
					'book_price' => $this->input->post('price'),
					'description' => $this->input->post('Desc'),
					'image' => $b
					);
					
					}
			    	$this->load->model('book_ins');
					$res=$this->book_ins->Update_Data($data,$up_id);
					redirect('Franchisee/Book_Order');
			    	 
	    }
	    else
	    {
	    $data = array(
		'book_name' => $this->input->post('book'),
		'author_name' => $this->input->post('author'),
		'book_title' => $this->input->post('title'),
		'book_price' => $this->input->post('price'),
		'description' => $this->input->post('Desc'),
		'image' =>$b
		);
		$this->load->model('book_ins');
		$res=$this->book_ins->Insert_Data($data);
		if($res==true)
		{
		redirect('Franchisee/Book_Order');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Franchisee/Book_Order');
		}
		}

}	
	 
	 
	public function Insert()
	{
	    $b="";
	    $up_id = $this->input->post('bid');
		$config['upload_path'] = './uploads/Book/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if ( !$this->upload->do_upload('upload'))
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
	    if($up_id!="")
	    {
					if($b!="")
					{
			    	$data = array(
						'Course_name' => $this->input->post('course'),
						'book_name' => $this->input->post('book'),
						'author_name' => $this->input->post('author'),
						'lprice' => $this->input->post('lprice'),
						'oprice' => $this->input->post('price'),
						'description' => strip_tags($this->input->post('Desc')),
						'image' =>$b
						);
					}
					else
					{
					$data = array(
						'Course_name' => $this->input->post('course'),
						'book_name' => $this->input->post('book'),
						'author_name' => $this->input->post('author'),
						'lprice' => $this->input->post('lprice'),
						'oprice' => $this->input->post('price'),
						'description' => strip_tags($this->input->post('Desc'))
						
						);
					
					}
			    	$this->load->model('book_ins');
					$res=$this->book_ins->Update_Data($data,$up_id);
					redirect('Admin/Book');
			    	 
	    }
	    else
	    {
	      if($b=="")
					{
			    	$data = array(
						'Course_name' => $this->input->post('course'),
						'book_name' => $this->input->post('book'),
						'author_name' => $this->input->post('author'),
						'lprice' => $this->input->post('lprice'),
						'oprice' => $this->input->post('price'),
						'description' => strip_tags($this->input->post('Desc'))
						
						);
					}
					else
					{
					$data = array(
						'Course_name' => $this->input->post('course'),
						'book_name' => $this->input->post('book'),
						'author_name' => $this->input->post('author'),
						'lprice' => $this->input->post('lprice'),
						'oprice' => $this->input->post('price'),
						'description' => strip_tags($this->input->post('Desc')),
						'image' =>$b
						);
					
					}
		$this->load->model('book_ins');
		$res=$this->book_ins->Insert_Data($data);
		if($res==true)
		{
		redirect('Admin/Book');
		}
		else
		{
		echo "Your Data Is Not Inserted";
		redirect('Admin/Book');
		}
		}
	}
	
 public function Delete()
 {
 	$a= $_POST['id'];
	$data = array(
				'book_name' => $this->input->post('book'),
				'author_name' => $this->input->post('author'),
				'book_title' => $this->input->post('title'),
				'book_price' => $this->input->post('price'),
				'description' => $this->input->post('Desc')
				);
	$this->load->model('book_ins');
	$res=$this->book_ins->dele($data,$a);
				if($res==true)
				{
				redirect('Admin/Book');
				}
				else
				{
				echo "Your Data Is Not Inserted";
				redirect('Admin/Book');
				}
 	
 }
 public function get_book_name()
 {
 	$name=$this->input->post('term');
 	$this->load->Model('book_ins');
 	$this->book_ins->get_name_book($name);
 }
 
 public function get_auth_name()
 {
 	$name=$this->input->post('term');
 	$this->load->Model('book_ins');
 	$this->book_ins->get_name_Auth($name);
 }	

}