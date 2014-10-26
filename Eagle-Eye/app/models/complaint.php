<?php namespace models;
 
class Complaint extends \core\model {
 

 	protected $table = "complaints";
	
	function __construct(){
		parent::__construct();
	}

	public function search($platenumber){
		return $this->db->select("SELECT c.*,
								 t.title as trans_comp,
								 fs.title as state_from,
								 ts.title as state_to,
								 ct.title as comp_type,(SELECT COUNT(*) as count from response r where r.complaint_id = c.id ) as response
								 FROM complaints c
								 LEFT JOIN states fs ON fs.id=c.from_state
								 LEFT JOIN states ts ON ts.id=c.to_state
								 LEFT JOIN complaint_type ct ON ct.id=c.complaint_type_id
								 LEFT JOIN transport_company t ON t.id=c.transport_company
								 WHERE c.plate_number = '$platenumber' ");
	}



	public function detail($complaint_id){
		return $this->db->select_row("SELECT c.*,
								 t.title as trans_comp,
								 fs.title as state_from,
								 ts.title as state_to,
								 ct.title as comp_type,(SELECT COUNT(*) from response r where r.complaint_id = c.id ) as response
								 FROM complaints c
								 LEFT JOIN states fs ON fs.id=c.from_state
								 LEFT JOIN states ts ON ts.id=c.to_state
								 LEFT JOIN complaint_type ct ON ct.id=c.complaint_type_id
								 LEFT JOIN transport_company t ON t.id=c.transport_company
								 WHERE c.id = '$complaint_id' ");
	}





	public function autocomplete_all(){

		return $this->db->select("SELECT * FROM $this->table GROUP BY plate_number");
	}
	
} 
