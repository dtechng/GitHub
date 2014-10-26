<?php namespace controllers;
use core\view as View;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Complaint extends \controllers\app{

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

		View::rendertemplate('header', $this->data);
		View::render('home/home', $this->data);
		View::rendertemplate('footer', $this->data);
	}


	public function add(){
		setcookie("use_eagle_as_anonymous", 'set');

		$this->data['title'] = 'Welcome';
		$state = new \models\state;

		$complaint = new \models\complaint;

		$transport_company = new \models\transportcompany;
		$this->data['transport_autocomplete'] = $transport_company->all(); 


		//CALL COMPLAINT TYPE MODEL
		$complaint_type = new \models\complaint_type;
		$this->data['complaint_type'] = $complaint_type->all();

		$this->data['complaint_search'] = true;

		if(isset($_POST) && !empty($_POST)){

			//CHECK IF TRANSPORT COMPANY EXIST
			$comp_exist = $transport_company->get(array('title'=>$_POST['trans_comp']));
			if(count($comp_exist) > 0)
				$trans_comp_id = $comp_exist[0]->id;
			else{
				//INSERT TRANSPORT COMPANY INTO DATABASE
				$insert = $transport_company->create(array('title'=>$_POST['trans_comp']));
				$trans_comp_id = $insert;
			}

			// $user_id_temp = \helpers\session::get('user');
			if(isset($this->data['auth']) && !empty($this->data['auth'])){
				$user_id = $this->data['auth']->id;
			} else {
				$user_id = 0;
			}

			$insert_array = array(
								 'user_id'=>$user_id,
								 'transport_company'=>$trans_comp_id,
								 'complaint_type_id'=>$_POST['complaint_type_id'],
								 'plate_number'=>$_POST['plate_number'],
								 'description'=>$_POST['description'],
								 'from_state'=>$_POST['from_state'],
								 'from_city'=>$_POST['from_city'],
								 'to_state'=>$_POST['to_state'],
								 'to_city'=>$_POST['to_city']);


			//INSERT DATA INTO TABLE
			$insert_id = $complaint->create($insert_array);

			if($_FILES['image']['tmp_name'] != ''){
		
				$mypath = UPLOAD_BASE.DS.'app'.DS.'templates'.DS.'default'.DS.'gallery'.DS;
				//GET IMAGE EXTENSION
				$ext = \helpers\document::getExtension($_FILES['image']['name']);

				$image_name = uniqid().'.'.$ext;
				$destination = $mypath.$image_name;

				if(move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
					//UPDATE COMPLAINT TABLE
					$upload_imagename = 'gallery/'.$image_name;
					$update = $complaint->update( array('image'=>$upload_imagename), array('id'=>$insert_id));
			}

		}

		if($insert_id > 0){
			$this->data['success'] = 'Thanks, Your complaint has been added and will be treated soon';
		} else {
			$this->data['error'] = 'Sorry, something went wrong!, Try again';
		}

		}
		
		View::rendertemplate('header', $this->data);
		View::render('complaint/addc', $this->data);
		View::rendertemplate('footer', $this->data);
	}

	public function detail(){


		View::rendertemplate('header', $this->data);
		View::render('complaint/view', $this->data);
		View::rendertemplate('footer', $this->data);
	}

}
