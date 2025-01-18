<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{   
		$this->load->view('NFront/header');
		$this->load->view('NFront/home');
		$this->load->view('NFront/footer');
	}
    
    public function Home_three()
	{   
		$this->load->model('display');
		$data1["results"] = $this->display->Blogd_display();
	
		// $data1['states']=$this->display->get_state();
		$this->load->view('NFront/header');
		$this->load->view('NFront/home-3', $data1);
		$this->load->view('NFront/footer');
	}

	public function About_us()
	{
		$this->load->view('NFront/header');
		$this->load->view('NFront/about-us');
		$this->load->view('NFront/footer');
	}

	public function Blog()
	{
		$this->load->model('display');
		$data1["results"] = $this->display->Blogdispaly_display();
		$this->load->view('NFront/header');
		$this->load->view('NFront/blog', $data1);
		$this->load->view('NFront/footer');
	}

	public function Blog_details()
	{   
		$this->load->view('NFront/header');
		$this->load->view('NFront/blog-details');
		$this->load->view('NFront/footer');
	}

	public function Project()
	{
		$this->load->view('NFront/header');
		$this->load->view('NFront/project');
		$this->load->view('NFront/footer');
	}

	public function Project_details()
	{
		$this->load->view('NFront/header');
		$this->load->view('NFront/project-details');
		$this->load->view('NFront/footer');
	}

	public function Team()
	{
		$this->load->view('NFront/header');
		$this->load->view('NFront/team');
		$this->load->view('NFront/footer');
	}

	public function Contact()
	{
		$this->load->view('NFront/header');
		$this->load->view('NFront/contact');
		$this->load->view('NFront/footer');
	}
	public function Solution()
	{
		$this->load->view('NFront/header');
		$this->load->view('NFront/project-details');
		$this->load->view('NFront/footer');
	}
    public function SingleBlog()
{
	$urll = trim(urldecode($this->uri->segment(2)));
	if($this->uri->segment(2)!="")
	{
	$urll = trim(urldecode($this->uri->segment(2)));	
	}
	else
	{
		$urll = '';
	}
	$this->load->Model('display');
	$data['results']=$this->display->Blogdispaly_display();
	$data1['result']=$this->display->get_singleblog($urll);
	$this->load->view('NFront/header',$data);
	$this->load->view('NFront/blog-details',$data1);
	$this->load->view('NFront/footer');
}

	
}
