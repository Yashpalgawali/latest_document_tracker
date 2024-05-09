<?php
class Email_model extends CI_Model {
    function __construct()
    { 
        parent::__construct();
		
			$this->load->library('email','encrypt'); 
			$this->load->helper(array('form','url')); 
		    $this->load->config('email_config');
	} 
	
	public function send_mail($to,$msg)
	{
		$from_email = $this->config->item('smtp_user');
		$this->email->from($from_email)
					->to($to)
					->message($msg);

		$this->email->send();
	}
  }
?>