<?php
class ColorefController extends AppController {

	var $name = 'Coloref';

	function index() {
		$this->Coloref->recursive = 0;
		$this->set('coloref', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid coloref', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('coloref', $this->Coloref->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Coloref->create();
			if ($this->Coloref->save($this->data)) {
				$this->Session->setFlash(__('The coloref ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coloref no pudo ser guardado.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid coloref', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Coloref->save($this->data)) {
				$this->Session->setFlash(__('The coloref ha sido actualizado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coloref no pudo ser actualizado', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Coloref->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for coloref', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Coloref->delete($id)) {
			$this->Session->setFlash(__('Coloref deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Coloref was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
