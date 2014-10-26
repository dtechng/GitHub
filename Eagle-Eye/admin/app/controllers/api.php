<?php namespace controllers;
use core\view as View;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Api extends \core\controller{

	/**
	 * call the parent construct
	 */

	public $user;
	public $complaint;
	public $complaint_type;
	public $states;
	public $trans_comp;
	public $response;

	public function __construct(){
		parent::__construct();

		$this->user = new \models\user;
		$this->complaint = new \models\complaint;
		$this->complaint_type = new \models\complaint_type;
		$this->states = new \models\state;
		$this->trans_comp = new \models\transportcompany;
		$this->response = new \models\response;

		$this->data['states'] = $states->all();

		$this->language->load('welcome');
	}

	public function platenumber(){
		$platenumber = 
	}

}
