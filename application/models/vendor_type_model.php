<?php
class Vendor_type_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
	}

	public function savevendortype($data)
	{	
		return $this->db->insert('tbl_vendor_type',$data);
	}

	public function getallvendortype()
	{	
		return $this->db->get('tbl_vendor_type')->result_array();
	}

	public function getVendorTypeById($id)
	{
		return $this->db->select("*")
				 ->from("tbl_vendor_type")
				 ->where('vendor_type_id',$id)
				 ->get()
				 ->row_array();
	}

	public function updateVendorTypeById($id,$data)
	{
		$this->db->where('vendor_type_id',$id);
		return $this->db->update('tbl_vendor_type',$data);
	}
}

?>