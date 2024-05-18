<?php
class Vendor_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
	}

	public function savevendor($data)
	{	
		return $this->db->insert('tbl_vendor',$data);
	}

	public function getallvendors()
	{	
		return $this->db->select('*')
						->from('tbl_vendor')
						->join('tbl_vendor_type','tbl_vendor.vendor_type_id=tbl_vendor_type.vendor_type_id')
						->get()
						->result_array();
	}

	public function getvendorbyid($id)
	{
		return $this->db->from('tbl_vendor')
						->where('vendor_id',$id)
						->get()
						->row_array();
	}

	public function getLastInsertedId()
	{
		return $this->db->insert_id();
	}

	public function updatevendor($vid,$data)
	{	
		$this->db->where('vendor_id',$vid);
		return $this->db->update('tbl_vendor',$data);
	}
}

?>