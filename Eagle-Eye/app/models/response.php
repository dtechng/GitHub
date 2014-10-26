<?php namespace models;
 
class Response extends \core\model {
 

 	protected $table = "response";
	
	function __construct(){
		parent::__construct();
	}

	public function by_complaint($complaint_id){
		return $this->db->select("SELECT r.*,u.institution  FROM response r
								  LEFT JOIN users u ON u.id=r.user_id
								  WHERE r.complaint_id = '$complaint_id' ");
	}
	
} 
