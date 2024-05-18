<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('encryption','upload'));
		$this->load->model(array('document_model','email_model','activity_model','regulation_history_model','vendor_model'));
		$this->load->config('email_config');
	}
	
	public function index()
	{
		if($this->session->userdata('vendor_type_id')==1) {
			$this->load->view('fragments/header');
			$this->load->view('adddocument');
			$this->load->view('fragments/footer');
		}
		else if($this->session->userdata('vendor_type_id')==2 || $this->session->userdata('vendor_type_id')==3) {
			$this->load->view('fragments/vendor_header');
			$this->load->view('adddocument');
			$this->load->view('fragments/footer');
		}
		else {
			$this->session->set_flashdata('reserr','You are not Authorized. Please Login to continue.');
			redirect("Login");
		}
	}
	
	private function ensure_upload_directory() {
        $upload_path = './uploads/'.$this->session->userdata('vendor_type').'/'.$this->session->userdata('vendor_id').'/';
		if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
    }

	public function savedocument() { 	
		$this->ensure_upload_directory();
		$config['upload_path'] = 'uploads/' .$this->session->userdata('vendor_type').'/'.$this->session->userdata('vendor_id').'/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 2048;
		$this->upload->initialize($config);
		
		if (!$this->upload->do_upload('regulation')) {
			$data['error'] = $this->upload->display_errors();
			$this->session->set_flashdata('reserr',$data['error']);
			redirect('Document');
		}
		else {
			$upload_data = $this->upload->data();
			$file_path = 'uploads/' .$this->session->userdata('vendor_type').'/'.$this->session->userdata('vendor_id').'/'. $upload_data['file_name'];
		
			$data = array(
					'regulation_name' => $_POST['regulation_name'],
					'regulation_description' =>	$_POST['regulation_description'],
					'regulation_frequency' => $_POST['regulation_frequency'],
					'regulation_issued_date' =>	$_POST['regulation_issued_date'],
					'vendor_id'	=> $this->session->userdata('vendor_id'),
					'file_path' => $file_path,
					'file_name' => $upload_data['file_name']
			);
					
			$res = $this->document_model->savedocument($data);
			$lastdocid =  $this->vendor_model->getLastInsertedId();

			if($res==1) {
				$histdata = array(
								'vendor_id'=> $this->session->userdata('vendor_id'),
								'regulation_id' => $lastdocid,
								'operation_date' => date('d-m-Y'),
								'operation_time' => date('H:i:s')
							);
				$output = $this->regulation_history_model->savehistory($histdata);
						print_r($output);

				$activity = array(
									"activity" => $_POST['regulation_name']." is added successfully",
									"activity_date"	=>	date('d-m-Y H:i:s')
								);
				$this->activity_model->saveactivity($activity);
			
				$this->session->set_flashdata('response','Regulation '.$_POST['regulation_name'].' is Added successfully');
				redirect('document/viewdocuments');
		}
		else{
			$this->session->set_flashdata('reserr','Regulation '.$_POST['regulation_name'].' is not added');
			redirect("document/viewdocuments");
		}
	}
}
	public function viewdocuments()
	{
		if($this->session->userdata('vendor_type_id')==1)
		{
			$data['docs'] = $this->document_model->getalldocuments();
			$this->load->view('fragments/header');
			$this->load->view('viewdocuments',$data);
			$this->load->view('fragments/footer');
		}
		else if($this->session->userdata('vendor_type_id')==2 || $this->session->userdata('vendor_type_id')==3)
		{
			$vendor_id =$this->session->userdata('vendor_id');
			
			$data['docs'] = $this->document_model->getdocumentbyvendorid($vendor_id);
			$this->load->view('fragments/vendor_header');
			$this->load->view('viewdocuments',$data);
			$this->load->view('fragments/footer');
		}
		else {
			$this->session->set_flashdata('reserr','You are not Authorized. Please Login to continue.');
			redirect("Login");
		}
	}
	
	public function editdocumentbyid($did) {
		if($this->session->userdata('vendor_type_id')!='')
		{
			$data['doc'] = $this->document_model->getdocumentbyvendoriddocid($this->session->userdata('vendor_id'),$did);	
			if($this->session->userdata('vendor_type_id')==2 || $this->session->userdata('vendor_type_id')==3)
			{
				if($data['doc']!=null) {	
					$this->load->view('fragments/vendor_header');
					$this->load->view('editdocument',$data);
					$this->load->view('fragments/footer');
				}
				else {
					$this->session->set_flashdata('reserr','No Document found for given ID');
					redirect('document/viewdocuments');
				}
			}
			else{
				if($data['doc']!=null) {	
					$this->load->view('fragments/header');
					$this->load->view('editdocument',$data);
					$this->load->view('fragments/footer');
				}
				else {
					$this->session->set_flashdata('reserr','No Document found for given ID');
					redirect('document/viewdocuments');
				}
			}
		}
		else {
			$this->session->set_flashdata('reserr','You are not Authorized. Please Login to continue.');
			redirect("Login");
		}
	}
	
	public function updatedocument()
	{ 
		$did = $_POST['regulation_id'];
		$this->ensure_upload_directory();
		$config['upload_path'] = 'uploads/' .$this->session->userdata('vendor_type').'/'.$this->session->userdata('vendor_id').'/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 2048;
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('regulation')) {
			$this->session->set_flashdata('reserr','No file is selected');
			redirect('Document/editdocumentbyid/'.$did);
		}
		else {
			$upload_data = $this->upload->data();
			$file_path = 'uploads/' .$this->session->userdata('vendor_type').'/'.$this->session->userdata('vendor_id').'/'. $upload_data['file_name'];		
			
			$data = array(
				'regulation_name' => $_POST['regulation_name'],
				'regulation_description' =>	$_POST['regulation_description'],
				'regulation_frequency' => $_POST['regulation_frequency'],
				'regulation_issued_date' =>	$_POST['regulation_issued_date'],
				'vendor_id'	=> $this->session->userdata('vendor_id'),
				'file_path' => $file_path,
				'file_name' => $upload_data['file_name']
			);

		$res = $this->document_model->updatedocument($data,$did);
		
		if($res==1) {
			$activity = array(
								'activity' => $_POST['regulation_name'].' updated successfully',
								'activity_date' =>	date('d-m-Y H:i:s')
			);
			$this->activity_model->saveactivity($activity);
			$this->session->set_flashdata('response','Regulation '.$_POST['regulation_name'].' is updated successfully');
			redirect('document/viewdocuments');
		}
		else{
			$this->session->set_flashdata('reserr','Regulation '.$_POST['regulation_name'].' is not updated');
			redirect('document/viewdocuments');
		}
	}
}

public function viewregulationhistory($vendor_id)
{
	// $data = $this->regulation_history_model->gethistorybyvendorid($id,$vendor_id);
	$data = $this->regulation_history_model->gethistorybyvendorid($vendor_id);
	echo "<br>Vendor ID is ".$vendor_id;
	print_r($data);
}
	public function getdocumentdates()
	{
		$data['docs'] = $this->document_model->getalldocuments();
		
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
			
			if($days<=30 && $days>=0) {
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

	public function upload()
	{
		echo "upload() called";
		die();
	}
}
?>