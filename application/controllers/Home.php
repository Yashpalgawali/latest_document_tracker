<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('encryption');
	}	
	
	
	public function index()
	{
		if($this->session->userdata('vendor_type_id')==1)
		{
			$this->load->view('fragments/header');
			$this->load->view('home');
			$this->load->view('fragments/footer');
		}
		else {
			$this->session->set_flashdata('reserr','You Are Not Authorized. Please Login to continue.');
			redirect('Login');
		}
	}
}
