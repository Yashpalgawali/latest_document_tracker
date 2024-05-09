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

	public function getallvendortype()
	{	
		return $this->db->get('tbl_vendor')->result_array();
	}
}

?>