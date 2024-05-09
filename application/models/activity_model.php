<?php
class Activity_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
	}

	public function saveactivity($data)
	{	
		return $this->db->insert('tbl_activity',$data);
	}
}

?>