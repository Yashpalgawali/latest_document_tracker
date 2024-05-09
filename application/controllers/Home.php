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
		$this->load->view('fragments/header');
		$this->load->view('home');
		$this->load->view('fragments/footer');
	}
}
