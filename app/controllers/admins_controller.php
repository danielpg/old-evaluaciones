<?php
class AdminsController extends AppController {

	var $name = 'Admins';

	function index() {
		$this->Admin->recursive = 0;
		$this->set('admins', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid admin', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('admin', $this->Admin->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Admin->create();
			if ($this->Admin->save($this->data)) {
				$this->_flash("Datos guardados." , "success");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_flash("Datos no validos." , "error");
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid admin', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if(empty($this->data["Admin"]["password"]))unset($this->data["Admin"]["password"] );


			if ($this->Admin->save($this->data)) {
				$this->_flash("Datos guardados." , "success");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_flash("Datos no validos." , "error");
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Admin->read(null, $id);
			$this->data["Admin"]["password"] = "";
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for admin', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Admin->delete($id)) {
			$this->Session->setFlash(__('Admin deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Admin was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
