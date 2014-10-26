<?php namespace controllers;
use core\view as View;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Home extends \controllers\app{

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

		$this->data['homepage_search'] = true;
		// var_dump($lagos);

		View::rendertemplate('home_header', $this->data);
		View::render('home/index', $this->data);
		View::rendertemplate('footer', $this->data);
	}

}
