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

		// $this->data['states'] = $states->all();

		$this->language->load('welcome');
	}

	public function platenumber(){
		$platenumber = $this->complaint->all();
		$result['header'] = 200;
		foreach($platenumber as $item){
			$res[] = $item->plate_number;
		}
		
		$result['plate_number'] = $res;

		echo json_encode($result);
	}

	public function search($platenumber){
		$complaint = new \models\complaint;

		

		if(isset($_GET['plate_number']) && !empty($_GET['plate_number'])){
			$this->data['search_results'] = $complaint->search($_GET['plate_number']);
			// $result_count = count($this->data['search_results']);
		}


		// var_dump(count($this->data['search_results']));
		$i=0; foreach($this->data['search_results'] as $item){
			$result[$i]['vehicle_number'] = $item->plate_number;
			$result[$i]['from_state'] = $item->state_from;
			$result[$i]['from_station'] = $item->from_city;
			$result[$i]['to_state'] = $item->state_to;
			$result[$i]['to_station'] = $item->to_city;
			$result[$i]['complaint_type'] = $item->comp_type;
			$result[$i]['response_count'] = $item->response;
			$result[$i]['complaint_description'] = $item->description;
			$result[$i]['photo_url'] = DIR.'app/templates/default/'.$item->image;
			$result[$i]['date'] =  date('M, d Y', strtotime($item->created));
		$i++;}


		$response = new \models\response;
		
		$i=0; foreach($this->data['search_results'] as $item){
			if($item->response > 0){
				$resp[] = $response->by_complaint($item->id);
			}
		}

		$data['search'] = $result;
		$data['response'] = $resp;
		// echo json_encode($result);

		echo json_encode($data);

	}


	public function complaint_type(){
		 $model = new \models\complaint_type;
		$complaint_type = $model->all();

		echo json_encode($complaint_type);
	}


	public function transportcompany(){
		 $model = new \models\transportcompany;
		$transportcompany = $model->all();

		echo json_encode($transportcompany);
	}


	public function addcomplaint($post){
		// setcookie("use_eagle_as_anonymous", 'set');

		// $this->data['title'] = 'Welcome';
		$state = new \models\state;

		$complaint = new \models\complaint;

		$transport_company = new \models\transportcompany;
		// $this->data['transport_autocomplete'] = $transport_company->all(); 


		//CALL COMPLAINT TYPE MODEL
		// $complaint_type = new \models\complaint_type;
		// $this->data['complaint_type'] = $complaint_type->all();

		// $this->data['complaint_search'] = true;

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
			$this->data['success'] = 'Thanks, report submitted';
		} else {
			$this->data['error'] = 'Sorry, something went wrong!, Try again';
		}

		}
	}

	public function responsebynumber($post){

		if(isset($_GET['complaint_id'])){
			$complaint_id = $_GET['complaint_id'];
		} else if(isset($_POST['complaint_id'])){
			$complaint_id = $_POST['complaint_id'];
		}

		$response = new \models\response;

		$result = $response->by_complaint($complaint_id);

		echo json_encode($result);
	}

}
