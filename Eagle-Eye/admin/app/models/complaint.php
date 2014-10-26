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

	public function getAll(){
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
								 ORDER BY id DESC
								 ");
	}
	public function getAllByCo($co_id){
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
								 WHERE transport_company ='$co_id' ORDER BY id DESC");
	}
	public function getLatest($limit){
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
		 ORDER BY id DESC LIMIT $limit");

	}
	public function getComplaint($id){
		return $this->db->select("SELECT c.*,
								 t.title as trans_comp,
								 fs.title as state_from,
								 ts.title as state_to,
								 ct.title as comp_type,(SELECT COUNT(*) as count from response r where r.complaint_id = c.id ) as response
								 FROM complaints c
								 LEFT JOIN states fs ON fs.id=c.from_state
								 LEFT JOIN states ts ON ts.id=c.to_state
								 LEFT JOIN complaint_type ct ON ct.id=c.complaint_type_id
								 LEFT JOIN transport_company t ON t.id=c.transport_company WHERE c.id =$id");
	}
public function getTreatedComp(){
	return $this->db->select("SELECT COUNT(DISTINCT cp.complaint_id) as total
         FROM response AS cp 
        left outer join  complaints AS pt on cp.complaint_id = pt.id");
}
	

	public function autocomplete_all(){

		return $this->db->select("SELECT * FROM $this->table GROUP BY plate_number");
	}
	
} 
