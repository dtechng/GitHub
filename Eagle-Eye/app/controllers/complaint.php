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

		$this->data['title'] = 'Add Report';
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

				if($_POST['trans_comp'] != ''){
					//INSERT TRANSPORT COMPANY INTO DATABASE
					$insert = $transport_company->create(array('title'=>$_POST['trans_comp']));
					$trans_comp_id = $insert;
				}
			}

			// $user_id_temp = \helpers\session::get('user');
			if(isset($this->data['auth']) && !empty($this->data['auth'])){
				if($_POST['anonymous'] == 'yes'){
				$user_id = $this->data['auth']->id;
				}
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
		
		View::rendertemplate('header', $this->data);
		View::render('complaint/addc', $this->data);
		View::rendertemplate('footer', $this->data);
	}

	public function detail($param){
		$complaint_id = $param[0];
		$complaint = new \models\complaint;
		// var_dump($platenumber);
		$this->data['detail'] = $complaint->detail($complaint_id);

		$this->data['title'] = $this->data['detail']->plate_number;

		$response = new \models\response;
		//GET complaint response
		$this->data['response'] =  $response->by_complaint($complaint_id);

		//CHECK IF REPORT IS MORE THAN 5 DAYS
		 $now = time(); // or your date as well
     	 $old_date = strtotime($this->data['detail']->created);
     	$datediff = $now - $old_date;
     	$this->data['days'] = floor($datediff/(60*60*24));

     	// var_export($days);

		$this->data['complaint_detail_page'] = true;

		// View::rendertemplate('header', $this->data);
		View::render('complaint/detail', $this->data);
		// View::rendertemplate('footer', $this->data);
	}

	public function search(){
		$complaint = new \models\complaint;

		$this->data['platenumber'] = $complaint->all();

		// var_export($complaint);

		if(isset($_GET['pnumber']) && !empty($_GET['pnumber'])){
			$this->data['search_results'] = $complaint->search($_GET['pnumber']);
			$result_count = count($this->data['search_results']);
		}

		if($result_count > 1)
			\helpers\url::redirect('complaint/results/'.$_GET['pnumber']);
		else if($result_count == 1)
			\helpers\url::redirect('complaint/detail/'.$this->data['search_results'][0]->id);
		else
			\helpers\url::redirect('complaint/noresult/'.$_GET['pnumber']);
	}

	public function results($param){
		$platenumber = $param[0];


		$complaint = new \models\complaint;

		$this->data['complaint_detail_page'] = true;

		$this->data['complaints'] = $complaint->search($platenumber);

		$this->data['title'] = strtoupper($platenumber);


		View::rendertemplate('header', $this->data);
		View::render('complaint/manycomplaint', $this->data);
		View::rendertemplate('footer', $this->data);

	}

	public function noresult($param){
		$this->data['platenumber'] = $param[0];





		View::rendertemplate('header', $this->data);
		View::render('complaint/noresult', $this->data);
		View::rendertemplate('footer', $this->data);	
	}

}
