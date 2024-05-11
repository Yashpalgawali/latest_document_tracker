<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('encryption','session'));
		$this->load->model(array('vendor_type_model','login_model'));
	}	
	
	
	public function index()
	{
		print_r($this->session->userdata('vendor_name'));
		$data['vtype'] = $this->vendor_type_model->getallvendortype();

		$this->load->view('fragments/header');
		$this->load->view('Login',$data);
		$this->load->view('fragments/footer');
	}
	
	public function login()
	{
		$res = $this->login_model->validateUser($_POST['email'],$_POST['user_type']);
		$decrypt_pass = $this->encryption->decrypt($res['password']);
		if(!empty($res)){
		if(strcmp($decrypt_pass,$res['password']))
		{ 
			$this->session->set_userdata('vendor_name',$res['vendor_name']);
			$this->session->set_userdata('enabled',$res['enabled']);
			$this->session->set_userdata('vendor_type',$res['enabled']);
			redirect('Login');
		}
		else {
			$this->session->set_flashdata('reserr','Password not matched');
			redirect('Login');
		}
	   }
	   else {
			$this->session->set_flashdata('reserr','No Record found');
			redirect('Login');
	   }
	}
}
