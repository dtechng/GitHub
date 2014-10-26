<?php namespace core;
/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Model extends Controller {

	/**
	 * hold the database connection
	 * @var object
	 */
	protected $db;
	
	/**
	 * create a new instance of the database helper
	 */
	public function __construct(){
		//connect to PDO here.
		$this->db = new \helpers\database();

	}

	public function get($array){
				$i=0; foreach($array as $key => $value){

				if($i == 0){
					$append = "WHERE ".$key." = '$value'";
				} else {
					$append .= " AND ".$key." = '$value'";
				}

		$i++;
		}
		return $this->db->select("SELECT * FROM $this->table $append");
	}

	public function get_row($array){
		
		$i=0; foreach($array as $key => $value){

				if($i == 0){
					$append = "WHERE ".$key." = '$value'";
				} else {
					$append .= " AND ".$key." = '$value'";
				}

		$i++;
		}

		return $this->db->select_row("SELECT * FROM $this->table $append");
	}


	public function find($id){
		return $this->db->select_row("SELECT * FROM $this->table WHERE id = '$id' ");
	}


	public function all(){

		return $this->db->select("SELECT * FROM $this->table");
	}

	public function update($update_array,$where_array){
		return $this->db->update($this->table,$update_array,$where_array);
	}

	public function create($insert_array){
		$this->db->insert($this->table,$insert_array);

		return $this->db->lastInsertId('id');

	}


}
