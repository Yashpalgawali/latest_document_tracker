<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session'));
	}	
	
	public function index()
	{
		if($this->session->userdata('vendor_type_id')==3  )
		{
			$this->load->view('fragments/vendor_header');
			$this->load->view('social');
			$this->load->view('fragments/footer');
		}
		
		else {
			$this->session->set_flashdata('reserr','Not authorized Please Login to continue');
			redirect('Login');
		}

	}
}
