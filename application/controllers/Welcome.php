<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function About_us()
	{
		$this->load->view('header');
		$this->load->view('about-us');
		$this->load->view('footer');
	}

	public function Contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}


	
}
