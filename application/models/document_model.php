<?php
class Document_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
	}

	public function savedocument($data)
	{	
		return $this->db->insert('tbl_document',$data);
	}
	
	public function getalldocuments()
	{
		return $this->db->get('tbl_document')->result_array();
	}	
	
	public function getdocumentbyid($did)
	{
		return $this->db->from('tbl_document')->where('regulation_id',$did)->get()->row_array();
	}

	public function getdocumentbyvendorid($vendor_id)
	{
		return $this->db->select("*")
						->from('tbl_document')
						->where('vendor_id',$vendor_id)
						->get()
						->result_array();
	}

	public function getdocumentbyvendoriddocid($vendor_id,$regulation_id)
	{
		return $this->db->select("*")
						->from('tbl_document')
						->where('vendor_id',$vendor_id)
						->where('regulation_id',$regulation_id)
						->get()
						->row_array();
	}

	public function getdocumentbyvendoriddocidforadmin($regulation_id)
	{
		return $this->db->select("*")
						->from('tbl_document')
						->where('regulation_id',$regulation_id)
						->get()
						->row_array();
	}
  
	public function updatedocument($data,$did)
	{
		$this->db->where('regulation_id',$did);
		return $this->db->update('tbl_document',$data);
	}

	public function getLastInsertedId()
	{
		return $this->db->insert_id();
	}
}

?>