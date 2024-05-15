<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->model(array('vendor_type_model','vendor_model','login_model'));
	}	

	public function index()
	{
		if($this->session->userdata('vendor_type_id')==1)
		{
			$data['vendortype'] = $this->vendor_type_model->getallvendortype();
			$this->load->view('fragments/header');
			$this->load->view('addvendor',$data);
			$this->load->view('fragments/footer');
		}
		else {
			$this->session->set_flashdata('reserr','You are not Authorized Please Login to continue');
			redirect('Login');
		}

	}
	
	public function savevendor()
	{	
		$enc_pass = $this->encryption->encrypt($_POST['password']);

		$data = array( 
				'vendor_type_id' => $_POST['vendor_type_id'],
				'vendor_name' 	 => $_POST['vendor_name'],
				'vendor_email'	 => $_POST['vendor_email'],
				'enabled'		 => 1
		);

		 $res = $this->vendor_model->savevendor($data);
		 
		 if($res==1)
		 {
			$lid = $this->vendor_model->getLastInsertedId();
			$newdata = array(
				'username'  => $_POST['vendor_name'],
				'password'  => $enc_pass,
				'vendor_id' => $lid,
				'email'	    => $_POST['vendor_email']
			);
			$result = $this->login_model->saveuser($newdata);
			
			$this->session->set_flashdata('response','Vendor '.$_POST['vendor_name'].' is registered successfully ');
			redirect('Vendor/viewvendor');
		 }
		 else {
			$this->session->set_flashdata('reserr','Vendor '.$_POST['vendor_name'].' is not registered');
			redirect('Vendor/viewvendor');
		 }
		 
		
	}

	public function viewvendor() {
		if($this->session->userdata('vendor_type_id')==1)
		{
			$data['vendors']=$this->vendor_model->getallvendors();
			$this->load->view('fragments/header');
			$this->load->view('viewvendors',$data);
			$this->load->view('fragments/footer');
		}
		else {
			$this->session->set_flashdata('reserr','You are not Authorized Please Login to continue');
			redirect('Login');
		}
	}

	public function editvendorbyid($id) {
		if($this->session->userdata('vendor_type_id')==1)
		{
			$data['vendor'] = $this->vendor_model->getvendorbyid($id);
			$data['vendors']=$this->vendor_model->getallvendors();
			$data['vendortype'] = $this->vendor_type_model->getallvendortype();

			$this->load->view('fragments/header');
			$this->load->view('editvendor',$data);
			$this->load->view('fragments/footer');
		}
		else {
			$this->session->set_flashdata('reserr','You are not Authorized Please Login to continue');
			redirect('Login');
		}
	}

	public function addvendortype() {
		if($this->session->userdata('vendor_type_id')==1)
		{
			$this->load->view('fragments/header');
			$this->load->view('addvendortype');
			$this->load->view('fragments/footer');
		}
		else {
			$this->session->set_flashdata('reserr','You are not Authorized Please Login to continue');
			redirect('Login');
		}
	}
	
	public function savevendortype() {

		$data = array(
			'vendor_type'=> $_POST['vendor_type']
		);
		$res = $this->vendor_type_model->savevendortype($data);
		if($res==1) {
			$this->session->set_flashdata('response','Vendor Type '.$_POST['vendor_type'].' saved successfully');
			redirect('vendor/viewvendortype');
		}
		else{
			$this->session->set_flashdata('reserr','Vendor Type '.$_POST['vendor_type'].' is not saved');
			redirect('vendor/viewvendortype');
		}
	}
	public function viewvendortype(){
		if($this->session->userdata('vendor_type_id')==1)
		{
		$data['vendortype'] = $this->vendor_type_model->getallvendortype();
		$this->load->view('fragments/header');
		$this->load->view('viewvendortype',$data);
		$this->load->view('fragments/footer');
		}
		else {
			$this->session->set_flashdata('reserr','You are not Authorized Please Login to continue');
			redirect('Login');
		}
	}


	public function getVendorTypeByid($id)
	{
		if($this->session->userdata('vendor_type_id')==1)
		{
			$data['vendortype'] = $this->vendor_type_model->getVendorTypeById($id);

			if($data['vendortype']['vendor_type_id']=='')
			{
				$this->session->set_flashdata('reserr','No Vendor Type found for given ID');
				redirect('Vendor/viewvendortype');
			}
			else
			{
				$this->load->view('fragments/header');
				$this->load->view('editvendortype',$data);
				$this->load->view('fragments/footer');
			}
		}
		else {
			$this->session->set_flashdata('reserr','You are not Authorized Please Login to continue');
			redirect('Login');
		}
	}

	public function updatevendortype()
	{
		$data = array(
			'vendor_type'=> $_POST['vendor_type']
		);

		$id=$_POST['vendor_type_id'];
		$res= $this->vendor_type_model->updateVendorTypeById($id,$data);
		if($res==1)
		{
			$this->session->set_flashdata('response','Vendor Type '.$_POST['vendor_type'].' updated successfully');
			redirect('Vendor/viewvendortype');
		}
		else{
			$this->session->set_flashdata('reserr','Vendor Type '.$_POST['vendor_type'].' is not updated');
			redirect('Vendor/viewvendortype');
		}
	}
}
