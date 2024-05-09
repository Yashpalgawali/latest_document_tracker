<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->model(array('document_model','email_model','activity_model'));
		$this->load->config('email_config');
	}	
	
	public function index()
	{
		$this->load->view('fragments/header');
		$this->load->view('adddocument');
		$this->load->view('fragments/footer');
	}
	
	public function savedocument()
	{
		$data = array(
						'doc_name'				=>	$_POST['doc_name'],
						'doc_issue_date'		=>  $_POST['issued_date'],
						'email'					=>  $_POST['email'],
						'doc_last_renewed_date'	=>	$_POST['last_renewed_date'],
						'license_duration'  	=> 	$_POST['license_duration']
					);
		$res = $this->document_model->savedocument($data);		
		if($res==1){
			
				$activity = array(
									"activity"		=>	$_POST['doc_name']." is added successfully",
									"activity_date"	=>	date('d-m-Y H:i:s')
								);
								
				$this->activity_model->saveactivity($activity);
			
				$this->session->set_flashdata('response','Document is Added successfully');
				redirect('document/viewdocuments');
		}
		else{
			$this->session->set_flashdata('reserr','Document is not added');
			redirect("document/viewdocuments");
		}
	}
	
	public function viewdocuments()
	{
		$data['docs'] = $this->document_model->getalldocuments();
		$this->load->view('fragments/header');
		$this->load->view('viewdocuments',$data);
		$this->load->view('fragments/footer');
	}
	
	public function editdocumentbyid($did)
	{
		$data['doc'] = $this->document_model->getdocumentbyid($did);	
		
		if($data['doc']!=null)
		{	
			$this->load->view('fragments/header');
			$this->load->view('editdocument',$data);
			$this->load->view('fragments/footer');
		}
		else{
			$this->session->set_flashdata('reserr','No Dcoument found for given ID');
			redirect('document/viewdocuments');
		}
	}
	
	public function updatedocument()
	{
		$did   		= $_POST['doc_id'];
		$dname 		= $_POST['doc_name'];
		$issue_date = $_POST['issued_date'];
		$lrenewdate = $_POST['last_renewed_date'];
		$duration   = $_POST['license_duration'];
		$email		= $_POST['email'];
		
		$data = array(
						'doc_id'				=> 	$did,
						'doc_name'				=> 	$dname,
						'email'					=>	$email,
						'doc_issue_date' 		=>	$issue_date,
						'doc_last_renewed_date' => 	$lrenewdate,
						'license_duration'		=> 	$duration
					);
		$res = $this->document_model->updatedocument($data,$did);
		
		if($res==1)
		{
			$activity = array(
								'activity'		=>	$dname.' updated successfully',
								'activity_date' =>	date('d-m-Y H:i:s')
				
			);
			$this->activity_model->saveactivity($activity);
			
			$this->session->set_flashdata('response','Document is updated successfully');
			redirect('document/viewdocuments');
		}
		else{
			$this->session->set_flashdata('reserr','Document is not updated');
			redirect('document/viewdocuments');
		}
	}
	
	public function getdocumentdates()
	{
		$data['docs'] = $this->document_model->getalldocuments();
		//print_r($data['docs']);
		
		$today = date_create(date('Y-m-d'));
		
		foreach($data['docs'] as $docs)
		{
			$lastdate = strtotime($docs['doc_last_renewed_date']);
			$m = date("m",$lastdate);
			$y = date("Y",$lastdate);
			$d = date("d",$lastdate);
			
			$next_year = ($y+$docs['license_duration'])."-".$m."-".$d;
			$lrenew = date_create($next_year);
			
			$diff = date_diff($today,$lrenew);
			
			$days = $diff->format('%R%a');
			
			if($days<=30 && $days>=0)
			{
				$msg = $docs['doc_name']." will expire on ".$next_year;
				$this->email_model->send_mail($docs['email'],$msg);
			//	echo "<br>".$docs['doc_name']." will expire on ".$next_year;
			}
			elseif($days<=-1)
			{
				echo "<br>".$docs['doc_name']." is expired on ".$next_year;
			}
			else{
				echo "<br>".$docs['doc_name']." will expired on ".$next_year;
			}
		}
	}
}
?>