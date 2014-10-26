<?php namespace controllers;
use core\view as View;
use helpers\url as URL;
use helpers\session as  Session;
/**
*
*/
class Admin extends \controllers\app{
	
	function __construct()
	{
		parent::__construct();
		
	ini_set('display_errors',1);
	}
	public function index(){
		if (Session::get('login') != true) {
			URL::redirect('admin/login');
		}
		// print_r(Session::get('role_id'));exit();
		
		//iniatialize models
		$complaint_model = new \models\complaint();
		$response_model = new \models\response();
		$user_model = new \models\user();
		$allusers =$user_model->all();
		$this->data['treatedComp'] =$complaint_model->getTreatedComp();
		$this->data['allusers'] =count($allusers);
		$allcomplaints = $complaint_model->all();
		$this->data['latest'] =$complaint_model->getLatest(5);
		$this->data['allcomplaints'] = $allcomplaints;
		$this->data['allcomplaintscount'] = count($allcomplaints);
		
		View::rendertemplate('header', $this->data);
		View::render('admin/index',$this->data);
		View::rendertemplate('footer', $this->data);
	}
	public function add_user(){
		if (Session::get('login') != true || Session::get('role_id') !='2') {
			URL::redirect('admin/login');
		}
		$user_model = new \models\user();
		$user_role_model = new \models\userrole();
		$comp_model = new \models\transportcompany();
		$this->data['allComps'] =$comp_model->all();
		
		$this->data['roles'] =$user_role_model->all();
		
		if($_POST['submit']){
			
			//insert array
			$values = array(
					'name'=>$_POST['name'],
					'phone'=>$_POST['phone'],
					'email'=>$_POST['email'],
					'password'=>md5($_POST['password']),
					'role'=>$_POST['role'],
					'institution'=>$_POST['institution'],
					'trans_comp_id'=>$_POST['transport_co_id']
				);
			$create_admin = $user_model->create($values);
			if($_FILES['image']['tmp_name'] != ''){
		
				$mypath = UPLOAD_BASE.DS.'app'.DS.'templates'.DS.'default'.DS.'gallery'.DS;
				//GET IMAGE EXTENSION
				$ext = \helpers\document::getExtension($_FILES['image']['name']);
				$image_name = uniqid().'.'.$ext;
				$destination = $mypath.$image_name;
				if(move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
					//UPDATE COMPLAINT TABLE
					$upload_imagename = 'gallery/'.$image_name;
					$update = $user_model->update( array('image'=>$upload_imagename), array('id'=>$create_admin));
			}
		}
		if($create_admin > 0){
			$this->data['success'] = 'User added successfully';
		} else {
			$this->data['error'] = 'Sorry, something went wrong!, Try again';
		}
		}
		View::rendertemplate('header', $this->data);
		View::render('admin/add_user',$this->data);
		View::rendertemplate('footer', $this->data);
	}
	public function add_transcomp(){
		if (Session::get('login') != true) {
			URL::redirect('admin/login');
		}
		$transportcompany =new \models\transportcompany();
		if($_POST['submit']){
			// var_dump($_POST);exit();
			//insert array
			$values = array(
					'title'=>$_POST['title']
				);
			$add_comp = $transportcompany->create($values);
				if($add_comp > 0){
			$this->data['success'] = 'Transport Company added successfully';
		} else {
			$this->data['error'] = 'Sorry, something went wrong!, Try again';
		}
		}
		View::rendertemplate('header', $this->data);
		View::render('admin/add_transcomp',$this->data);
		View::rendertemplate('footer', $this->data);
	}
	public function allcomplaints(){
		if (Session::get('login') != true) {
			URL::redirect('admin/login');
		}
		$complaint_model = new \models\complaint();
		$response_model = new \models\response();
		$user_model = new \models\user();
		if(Session::get('role_id')=='4'){
			$this->data['allcomplaints'] = $complaint_model->getAllByCo(Session::get('trans_comp_id'));	
		}else{
			$this->data['allcomplaints'] = $complaint_model->getAll();
		}
		
		// var_dump($this->data['allcomplaints']);exit();
		View::rendertemplate('header', $this->data);
		View::render('admin/allcomplaints',$this->data);
		View::rendertemplate('footer', $this->data);
	}
	public function view_complaint($id){
		if (Session::get('login') != true) {
			URL::redirect('admin/login');
		}
		$complaint_model = new \models\complaint();
		$response_model = new \models\response();
		$cid =(int) $id[0];
		$complaint = $complaint_model->getComplaint($cid);
		$this->data['complaint'] = $complaint[0];
		
		if($_POST['respond']){
			$response_array = array(
				'user_id'=>Session::get('id'),
				'complaint_id'=>$id[0],
				'content'=>$_POST['content']
				);
			$response_id =$response_model->create($response_array);
			if($response_id > 0){
			$this->data['success'] = 'Response sent successfully';
		} else {
			$this->data['error'] = 'Sorry, something went wrong!, Try again';
			}
		}
		// var_dump($this->data['complaint']);exit();
		View::rendertemplate('header', $this->data);
		View::render('admin/view_complaint',$this->data);
		View::rendertemplate('footer', $this->data);
	}
	public function login(){
		if (Session::get('login') == true) {
			URL::redirect('admin/index');
		}
		$user_model =new \models\user();
		
		
		if($_POST['login']){
			$email =$_POST['email'];
			$password = md5($_POST['password']);
			$auth = $user_model->login($email,$password);
			
			if(!empty($auth) && count($auth) == 1){
			
			Session::set('id', $auth[0]->id);
			Session::set('role_id',$auth[0]->role);
			Session::set('name',$auth[0]->name);
			Session::set('trans_comp_id',$auth[0]->trans_comp_id);
			Session::set('login', true);
			if (Session::get('role_id') == '4') {
			URL::redirect('admin/allcomplaints');
		}else{

			URL::redirect('admin/login');
		}
		
		}else{
			$this->data['error'] = "Ooops!!! Invalid login details.";
		}
		}
		View::render('admin/login', $this->data);
	}
	public function allusers(){
		if (Session::get('login') != true || Session::get('role_id') !='2') {
			URL::redirect('admin/index');
		}
		$user_model =new \models\user();
		$this->data['allusers'] =$user_model->all();
		View::rendertemplate('header', $this->data);
		View::render('admin/allusers',$this->data);
		View::rendertemplate('footer', $this->data);
	}
	public function change_passwd($id){
		
		if($_POST['change']){
			$user_model =new \models\user();
			$old_password = md5($_POST['old_password']);
			$new_password = $_POST['new_password'];
			$where =array(
				'password'=>$old_password,
				'id'=>$id[0]
				);
			$find = $user_model->getRow($where);
			var_dump($find);exit();
		if(!empty($find) && count($find)>0){
		}
	}
		
		
		View::rendertemplate('header', $this->data);
		View::render('admin/change',$this->data);
		View::rendertemplate('footer', $this->data);
	}
	public function signout(){
			Session::destroy('id', $auth->id);
			Session::destroy('role_id',$auth->role);
			Session::destroy('name',$auth->name);
			Session::destroy('trans_comp_id',$auth->trans_comp_id);
			Session::destroy('login', true);
			URL::redirect('admin/index');
	}
}
?>