<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
	}

	public function saveuser($data)
	{	
		return $this->db->insert('tbl_user',$data);
	}

	public function validateUser($email,$typeid)
	{
		
		return $this->db->select("*")
						->from('tbl_user')
						->join('tbl_vendor','tbl_vendor.vendor_email=tbl_user.email')
						->join('tbl_vendor_type','tbl_vendor_type.vendor_type_id=tbl_vendor.vendor_type_id')
						->where('tbl_user.email',$email)
						->where('tbl_vendor_type.vendor_type_id',$typeid)
						->get()
						->row_array();
	}

	public function updateeuser($data,$userid)
	{	
		$this->db->where('user_id',$userid);
		return $this->db->update('tbl_user',$data);
	}
}

?>