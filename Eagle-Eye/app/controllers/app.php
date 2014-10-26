<?php namespace controllers;
use core\view as View;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class App extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();

		$user = new \models\user;

		if(isset($_SESSION['eagleeyeuser_id'])){
			$this->data['auth'] = $user->find($_SESSION['eagleeye_user_id']);
		}

		// var_dump($this->data['auth'] );

		$complaint = new \models\complaint;
		$states = new \models\state;

		$this->data['states'] = $states->all();

		$this->data['autocomplete'] = $complaint->autocomplete_all();

		$this->language->load('welcome');
	}

}
