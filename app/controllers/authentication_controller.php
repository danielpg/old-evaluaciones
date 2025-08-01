<?php
//Configure::write('debug',2);
//require_once(APP."vendors/acl/class.acl.php");
class AuthenticationController extends AppController {

	var $uses = array();
	var $layout = "login";
	
	function index(){
		$this->redirect(array('action'=>'login'));exit;
	}
	
	
	function beforeFilter(){
		parent::beforeFilter();	
		$this->set("title_for_layout","Iniciar Sesion");	
 
 		if($this->action!='logout' && Credentials::hasCredentials()==true){
			if(Credentials::get("__credentials.Admin")){
	 			$this->redirect(array('controller'=>'users','action'=>'index'));
			} else {
	 			$this->redirect(array('controller'=>'exams','action'=>'user_main'));
			}
 			exit;
 		}
 		
	}

	function register(){

		if (!empty($this->data)) {

		App::import('Model','User');
		$login = new User();
		/*$login->save($this->data)
		$login->id;
		*/

			$login->create();

			$this->data["User"]["status"] = 1;

			if ($login->save($this->data)) {
				//$this->_flash(__('The CompanyToken has been saved', true));
				//$this->redirect(array('action' => 'tokens', $this->data["CompanyToken"]["company_id"]));
				$login->authenticate($this->data);
					
				App::import('Model','Ticket');
				$Ticket = new Ticket();
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 1))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 2))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 3))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 4))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 5))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 6))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 7))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 8))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 9))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 10))); $Ticket->id = null;
				$Ticket->save(array("Ticket" => array("user_id" => $login->id , "exam_id" => 11))); $Ticket->id = null;

				echo json_encode(array("error"=>0,"url_redirect"=>Router::url(array('controller'=>'exams','action'=>'user_main'))));exit;



			} else {
				if ($this->RequestHandler->isAjax()) {
					Configure::write('debug',0);
					echo json_encode(array("error"=>1,"validation_errors"=> $login->extract_errors_array($login->validationErrors) ));exit;
				} 
				//$this->_flash(__('The CompanyToken could not be saved. Please, try again.', true));
			}


		}

	}

	function login(){
		if (!empty($this->data)) {
			
			App::import('Model','User');
			$login = new User();

			$st = $login->authenticate($this->data);
			if ($st === true) {
				if ($this->RequestHandler->isAjax()) {
					Configure::write('debug',0);
					echo json_encode(array("error"=>0,"url_redirect"=>Router::url(array('controller'=>'exams','action'=>'user_main'))));exit;
				} 
				//$this->redirect(array('controller'=>'exams','action'=>'user_main'));	
				
			} else {
				if ($this->RequestHandler->isAjax()) {
					Configure::write('debug',0);
					//echo json_encode(array("error"=>1,"validation_errors"=> "Correo Electronico incorrecto.") );exit;
					echo json_encode(array("error"=>1,"validation_errors"=> $st) );exit;

				} 
			}
		}

	}

	function admin() {

		if (!empty($this->data)) {
			
			App::import('Model','Admin');
			$login = new Admin();

			if ($login->authenticate($this->data)) {
				$this->redirect(array("controller" => "users", 'action' => 'index'));exit;
			} else {
				$this->Session->setFlash(__('Datos Incorrectos', true));
			}
		}
		//$this->render('empty','login');
	}

	function logout($id = null) {
		$this->autoRender = false;
		App::import('Model','User');
		$login = new User();
		$login->logout();
		//$this->_flash(__('Successful Logout', true),'default',array('class'=>'box_notice'));
		$this->redirect(array('action'=>'register'));
	}
}
?>
