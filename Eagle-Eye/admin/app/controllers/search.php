<?php namespace controllers;
use core\view as View;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Search extends \controllers\app{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();

	}

	/**
	 * define page title and load template files
	 */
	public function index(){

		$this->data['title'] = 'Welcome';
		$state = new \models\state;

		$complaint = new \models\complaint;

		$this->data['platenumber'] = $complaint->all();
		// var_dump($lagos);

		if(isset($_GET['pnumber']) && !empty($_GET['pnumber'])){

			$this->data['search_results'] = $complaint->search($_GET['pnumber']);
			$result_count = count($this->data['search_results']);
		}

		View::rendertemplate('header', $this->data);

		if($result_count > 1)
			View::render('search/search', $this->data);
		else if($result_count == 1)
			View::render('search/detail',$this->data);

		View::rendertemplate('footer', $this->data);
	}




}
