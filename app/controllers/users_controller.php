<?php
class UsersController extends AppController {

	var $name = 'Users';
	//var $uses = array("User","Role");
   	 var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
  	  var $components = array('Alaxos.AlaxosFilter');


	function index() {
		$this->User->recursive = 0;
		$conditions = $this->AlaxosFilter->get_filter();
		$this->set('users', $this->paginate($this->User,$conditions));
	}

	function index_admin() {
		$this->User->recursive = 0;
		$conditions = $this->AlaxosFilter->get_filter();
		$this->set('users', $this->paginate($this->User,$conditions));
	}

	function beforeFilter(){
		parent::beforeFilter();
		
		$this->set('title_for_layout', 'Users'); 
	}


	function view($id = null) {
		if (!$id) {
			$this->_flash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('User', $this->User->read(null, $id));
	//	$this->set('roles', $this->User->Role->find('list'));
	}

	function add() {
			
			if (!empty($this->data)) {
				$this->User->create();
				if ($this->User->save($this->data)) {
					$this->_flash(__('The User has been saved User.id : '.$this->User->id, true));
					$this->redirect(array('action' => 'index_admin'));
				} else {
					$this->_flash(__('The User could not be saved. Please, try again.', true));
				}
			}
	}


	function status($id = null) {
		if (!$id && empty($this->data)) {
			$this->_flash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}


		if (!empty($this->data)) {
			//if(empty($this->data["User"]["contrasena"]))unset($this->data["User"]["contrasena"]);

			if ($this->User->save($this->data)) {
				$this->_flash(__('Datos Guardados.', true));
				$this->redirect(array('action' => 'index_admin'));
			} else {
				$this->_flash(__('The User could not be saved. Please, try again.', true));
			}
		}

		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}

	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->_flash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}

		if(!empty($this->data) && empty($this->data["User"]["password"])){
			unset($this->data["User"]["password"]);
		//	$this->_flash("La confirmación de contraseña no coincide.","error");
		
		}
		//} else {
			if (!empty($this->data)) {
				//if(empty($this->data["User"]["contrasena"]))unset($this->data["User"]["contrasena"]);

				if ($this->User->save($this->data)) {
					$this->_flash(__('The User has been saved', true));
					$this->redirect(array('action' => 'index_admin'));
				} else {
					$this->_flash(__('The User could not be saved. Please, try again.', true));
				}
			}
	//	}
			if (empty($this->data)) {
				$this->data = $this->User->read(null, $id);
			}

	}

	function delete($id = null) {
		if (!$id) {
			$this->_flash(__('Invalid id for User', true));
			$this->redirect(array('action'=>'index_admin'));
		}
		if ($this->User->delete($id)) {
			$this->_flash(__('User deleted', true));
			$this->redirect(array('action'=>'index_admin'));
		}
		$this->_flash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index_admin'));
	}

	function exams($id = null){
		App::import("Model","Resultado");
		$resultado = new Resultado();
		$this->set("resultados",$resultado->find("all",array(
		"limit" => 100, 
		"fields" => ["Resultado.id","Exam.name","User.name","Resultado.created"],
		"order" => "Resultado.created DESC", 
		"conditions" => array("Resultado.user_id" => $id ) ) ));
	}

	function android_list(){
		$this->layout = false;

		$data = $this->User->find("all",array("limit" => 30));
		die(json_encode($data));
	}

	function approve($id = null){
		$this->data["admin_id"];
		App::import("Model","Admin");
		$admin = new Admin();
		$status = $admin->findById($admin_id,array("conditions" => array("approved" => 1) ) );
		if(!empty($status)){
			$this->User->id = $id;		
			$this->User->save($this->data["approved"]);	
			die(json_encode(array("code" => "OK")));
		} else {
			die(json_encode(array("code" => "ERROR")));
		}
	}

	function tickets($id){
		$tickets = [];
		$completed = [];
		App::import("Model","Ticket");
		$ticketobj = new Ticket();

		if(!empty($_POST)){
			$ticketobj->deleteAll(array("Ticket.user_id" => $id));
			$data = array();
			foreach($_POST["ticket"] as $val){
				if($val > 0){
					$data[] = array("Ticket" => array("exam_id" => $val , "user_id" => $id));
				}
			}
			//var_dump($data);exit;

			$ticketobj->saveAll($data);
			$this->_flash(__('Datos Guardados.', true));
			$this->redirect(array('action' => 'index'));
		}



		App::import("Model","Resultado");
		$resobj = new Resultado();
		$res = $resobj->find("all",array("fields" => "Resultado.exam_id",  "conditions" => ["Resultado.user_id" => $id ] , "limit" => 30));
		if(!empty($res)){
			foreach($res as $item){
				$completed[$item["Resultado"]["exam_id"]] = 1;
			}
		}
		//var_dump($completed);
		App::import("Model","Exam");
		$examobj = new Exam();
		$exams = $examobj->find("list");


		$ticketsres = $ticketobj->find("all",array("conditions" => ["Ticket.user_id" => $id ]));
		if(!empty($ticketsres)){
			foreach($ticketsres as $item){
				$tickets[$item["Ticket"]["exam_id"]] = 1;
			}
		}


		$this->set("exams",$exams);
		$this->set("res",$res);
		$this->set("completed",$completed);
		$this->set("tickets",$tickets);

		$this->set('User', $this->User->read(null, $id));
	}



}
