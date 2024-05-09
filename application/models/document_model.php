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
		return $this->db->from('tbl_document')->where('doc_id',$did)->get()->row_array();
	}
	
	public function updatedocument($data,$did)
	{
		$this->db->where('doc_id',$did);
		return $this->db->update('tbl_document',$data);
	}
}

?>