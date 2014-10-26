<?php namespace controllers;
use core\view as View;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Mydetails extends \controllers\app{

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

		// $lagos = $state->create(array('title'=>'sola'));
		$user = new \models\user;

		// $this->data['platenumber'] = $complaint->all();
		// var_dump($lagos);

		if(isset($_POST) && !empty($_POST)){

			$insert_array = array(
				'name'=>$_POST['name'],
				'phone'=>$_POST['phone'],
				'email'=>$_POST['email']
				);

			$insert_id = $user->create($insert_array);

			if($insert_id > 0){
				// setcookie('eagle_user_id',$insert_id);
				\helpers\session::set('user_id',$insert_id);
				// var_dump($_SESSION['eagleeyeuser_id']);
				$this->data['success'] = 'Details received, Click button to submit report';
				\helpers\url::redirect('complaint/add');
			}
			// $this->data['search_results'] = $complaint->search($_POST['pnumber']);
			// $result_count = count($this->data['search_results']);
		}

		View::rendertemplate('header', $this->data);
		View::render('user/add_details',$this->data);
		View::rendertemplate('footer', $this->data);
	}




}
