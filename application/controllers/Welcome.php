<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
    
    public function Home_three()
	{
		$this->load->view('header');
		$this->load->view('home-3');
		$this->load->view('footer');
	}

	public function About_us()
	{
		$this->load->view('header');
		$this->load->view('about-us');
		$this->load->view('footer');
	}

	public function Blog()
	{
		$this->load->view('header');
		$this->load->view('blog');
		$this->load->view('footer');
	}

	public function Blog_details()
	{
		$this->load->view('header');
		$this->load->view('blog-details');
		$this->load->view('footer');
	}

	public function Project()
	{
		$this->load->view('header');
		$this->load->view('project');
		$this->load->view('footer');
	}

	public function Project_details()
	{
		$this->load->view('header');
		$this->load->view('project-details');
		$this->load->view('footer');
	}

	public function Team()
	{
		$this->load->view('header');
		$this->load->view('team');
		$this->load->view('footer');
	}

	public function Contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}


	
}
