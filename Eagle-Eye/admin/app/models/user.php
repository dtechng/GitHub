<?php namespace models;
 
class User extends \core\model {
 

 	protected $table = "users";
	
	function __construct(){
		parent::__construct();
	}
	public function login($email, $password){
		$sql ="SELECT * FROM users where email = '$email' && password = '$password'";
		// echo $sql;exit();
		return $this->db->select( $sql);	
		
	}
} 
