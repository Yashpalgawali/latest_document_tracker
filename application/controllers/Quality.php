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
		if($this->session->userdata('vendor_type')==1 && $this->session->userdata('vendor_type')==2)
		{
			$this->load->view('fragments/header');
			$this->load->view('quality');
			$this->load->view('fragments/footer');
		}
	}
}
