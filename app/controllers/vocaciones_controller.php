<?php
class VocacionesController extends AppController {

	var $name = 'Vocaciones';

	function index() {
		$this->Vocacion->recursive = 0;
		$this->set('vocaciones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid vocacion', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('vocacion', $this->Vocacion->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Vocacion->create();
			if ($this->Vocacion->save($this->data)) {
				$this->Session->setFlash(__('The vocacion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocacion could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid vocacion', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Vocacion->save($this->data)) {
				$this->Session->setFlash(__('The vocacion has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocacion could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Vocacion->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for vocacion', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Vocacion->delete($id)) {
			$this->Session->setFlash(__('Vocacion deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Vocacion was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
