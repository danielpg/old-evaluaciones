<?php
class SeccionesController extends AppController {

	var $name = 'Secciones';

	function index() {
		$this->Seccion->recursive = 0;
		$this->set('secciones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid seccion', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('seccion', $this->Seccion->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Seccion->create();
			if ($this->Seccion->save($this->data)) {
				$this->Session->setFlash(__('The seccion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seccion could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid seccion', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Seccion->save($this->data)) {
				$this->Session->setFlash(__('The seccion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seccion could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Seccion->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for seccion', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Seccion->delete($id)) {
			$this->Session->setFlash(__('Seccion deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Seccion was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
