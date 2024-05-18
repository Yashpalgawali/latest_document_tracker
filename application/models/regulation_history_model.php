<?php
class Regulation_history_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
	}

	public function savehistory($data)
	{
		return $this->db->insert('tbl_regulation_history',$data);
	}

	public function gethistorybyvendorid($vendor_id)
	{
		return $this->db->from('tbl_regulation_history')->where('vendor_id',$vendor_id)->get()->result_array();
	}
}

?>