<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quality extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('encryption');
	}	
	
	public function index()
	{
		if( $this->session->userdata('vendor_type_id')==2)
		{
			$this->load->view('fragments/vendor_header');
			$this->load->view('quality');
			$this->load->view('fragments/footer');
		}
		else {
			$this->session->set_flashdata('reserr','You Are Not Authorized. Please Login to Continue');
			redirect('Login');
		}
	}
}
