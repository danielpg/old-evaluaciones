<?php
class LoginsController extends AppController {

/*
ALTER TABLE usuarios CHANGE  `nucleo_id`  `nucleo_id` INT( 11 ) NULL;
INSERT INTO roles (`id`, `nombre`, `fecha_creacion`, `fecha_modificacion`) VALUES (1, 'Admin', NULL, NULL);
INSERT INTO roles (`id`, `nombre`, `fecha_creacion`, `fecha_modificacion`) VALUES (2, 'Operador Nucleo', NULL, NULL);
INSERT INTO roles (`id`, `nombre`, `fecha_creacion`, `fecha_modificacion`) VALUES (3, 'Solo Consulta', NULL, NULL);

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `dni`, `estado`, `correo`, `usuario`, `contrasena`, `fecha_creacion`, `fecha_modificacion`, `role_id`, `nucleo_id`)
 VALUES (NULL, 'Lorem', 'Ipsum', '12345678', '1', NULL, 'demo', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, '1', NULL);
*/

	var $name = 'Logins';
	//var $uses = array("Login","Role");
    var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
    var $components = array('Alaxos.AlaxosFilter');


	function index() {
		$this->Login->recursive = 0;
		$conditions = $this->AlaxosFilter->get_filter();
		$this->set('logins', $this->paginate($this->Login,$conditions));
	}

	function beforeFilter(){
		parent::beforeFilter();
		
		$this->set('title_for_layout', 'Admins'); 
	}


	function view($id = null) {
		if (!$id) {
			$this->_flash(__('Invalid login', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('login', $this->Login->read(null, $id));
	//	$this->set('roles', $this->Login->Role->find('list'));
	}

	function add() {
		//if(!empty($this->data) && !empty($this->data["Login"]["contrasena"]) && ($this->data["Login"]["contrasena"] != $this->data["Login"]["confirm_contrasena"])){
		//	$this->_flash("La confirmación de contraseña no coincide.","error");
		//} else {
			
			if (!empty($this->data)) {
				$this->Login->create();
				if ($this->Login->save($this->data)) {
					$this->_flash(__('The login has been saved User.id : '.$this->Login->id, true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->_flash(__('The login could not be saved. Please, try again.', true));
				}
			}
		//}

		//$registros = $this->Login->Registro->find('list');
	//$this->set('roles', $this->Login->Role->find('list'));
		//$this->set('nucleos', $this->Login->Nucleo->find('list'));
		//$this->set(compact('registros'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->_flash(__('Invalid login', true));
			$this->redirect(array('action' => 'index'));
		}

	//	if(!empty($this->data) && !empty($this->data["Login"]["contrasena"]) && ($this->data["Login"]["contrasena"] != $this->data["Login"]["confirm_contrasena"])){
		//	$this->_flash("La confirmación de contraseña no coincide.","error");
		//} else {
			if (!empty($this->data)) {
				//if(empty($this->data["Login"]["contrasena"]))unset($this->data["Login"]["contrasena"]);

				if ($this->Login->save($this->data)) {
					$this->_flash(__('The login has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->_flash(__('The login could not be saved. Please, try again.', true));
				}
			}
	//	}
			if (empty($this->data)) {
				$this->data = $this->Login->read(null, $id);
			}

		//$this->set('nucleos', $this->Login->Nucleo->find('list'));
		//$this->set('roles', $this->Login->Role->find('list'));
		//$registros = $this->Login->Registro->find('list');
		//$this->set(compact('registros'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->_flash(__('Invalid id for login', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Login->delete($id)) {
			$this->_flash(__('Login deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->_flash(__('Login was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
