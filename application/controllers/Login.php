<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('encryption');
	}	
	
	
	public function index()
	{
		$this->load->view('fragments/header');
		$this->load->view('Login');
		$this->load->view('fragments/footer');
	}
	
	public function login()
	{
		print_r( $_POST['username']);
		die();
	}
}
