<?php
class Regulation_history_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
	}

	public function savehistory($data) {
		return $this->db->insert('tbl_regulation_history',$data);
	}

	public function gethistorybyvendorid($vendor_id,$regulation_id)
	{   
	    	return $this->db
		                ->from('tbl_regulation_history')
						->join('tbl_document','tbl_document.regulation_id=tbl_regulation_history.hist_regulation_id')
						->join('tbl_vendor','tbl_vendor.vendor_id=tbl_regulation_history.hist_vendor_id')
						->where('tbl_regulation_history.hist_vendor_id',$vendor_id)
						->where('tbl_regulation_history.hist_regulation_id',$regulation_id)
						->get()->result_array();

	}
}

?>