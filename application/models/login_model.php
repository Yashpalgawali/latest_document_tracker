<?php
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
						->join('tbl_vendor','tbl_vendor.vendor_id=tbl_user.vendor_id')
						->join('tbl_vendor_type','tbl_vendor_type.vendor_type_id=tbl_vendor.vendor_type_id')
						->where('email',$email)
						->where('tbl_vendor_type.vendor_type_id',$typeid)
						->get()
						->row_array();
	}

	
}

?>