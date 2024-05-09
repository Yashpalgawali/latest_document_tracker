<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->model(array('vendor_type_model'));
	}	

	public function index()
	{
		$data['vendortype'] = $this->vendor_type_model->getallvendortype();
		$this->load->view('fragments/header');
		$this->load->view('addvendor',$data);
		$this->load->view('fragments/footer');
	}
	
	public function savevendor()
	{
		$data = array( 
				'vendor_type' => $_POST['vendor_type']
		);
		echo "inside savevendor()";
		die();
	}

	public function viewvendor(){
		echo "inside viewvendor()";
		die();
	}

	public function addvendortype(){

		$this->load->view('fragments/header');
		$this->load->view('addvendortype');
		$this->load->view('fragments/footer');
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

		$data['vendortype'] = $this->vendor_type_model->getallvendortype();
		$this->load->view('fragments/header');
		$this->load->view('viewvendortype',$data);
		$this->load->view('fragments/footer');
	}


	public function getVendorTypeByid($id)
	{
		$data['vendortype'] = $this->vendor_type_model->getVendorTypeById($id);

		 print_r($data['vendortype']['vendor_type_id']);
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
