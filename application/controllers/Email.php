<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
echo "Email called using taskscheduler";
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('document_model','email_model','activity_model'));
		$this->load->config('email_config');
	}	
	
	public function index()
	{
		echo "Email called using taskscheduler";
		/*$data['docs'] = $this->document_model->getalldocuments();
		//print_r($data['docs']);
		
		$today = date_create(date('Y-m-d'));
		$from = $this->config->item('smtp_user');
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
				//$res = $this->email_model->send_mail($docs['email'],$msg);
				$from_email = $this->config->item('smtp_user');
					
					$this->email->from($from)
								->to($docs['email'])
								->message($msg);

				$res =	$this->email->send();
				if($res>0)
				{
					echo "<br>Email sent for ".$docs['doc_name']." to ".$docs['email'];
				}else{
					echo "<br> Email is not sent";
				}
			}
			elseif($days<=-1)
			{
				echo "<br>".$docs['doc_name']." is expired on ".$next_year;
			}
			else{
				echo "<br>".$docs['doc_name']." will expire on ".$next_year;
			}
		}*/
	}
	
}
?>