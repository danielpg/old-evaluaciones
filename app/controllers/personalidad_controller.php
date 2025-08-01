<?php
class PersonalidadController extends AppController {

	var $name = 'Personalidad';

	function index() {
		$this->Personalidad->recursive = 0;
		$this->set('personalidad', $this->paginate());

		APP::import("Model","Exam");
		$exam = new Exam();
		$obj = $exam->findById( ID_TEST_PERSONALIDAD);
		$this->set('testname', $obj["Exam"]["name"]);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid personalidad', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('personalidad', $this->Personalidad->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Personalidad->create();
			if ($this->Personalidad->save($this->data)) {
				$this->Session->setFlash(__('The personalidad ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personalidad no pudo ser guardado.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid personalidad', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Personalidad->save($this->data)) {
				$this->Session->setFlash(__('The personalidad ha sido actualizado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personalidad no pudo ser actualizado', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Personalidad->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for personalidad', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Personalidad->delete($id)) {
			$this->Session->setFlash(__('Personalidad deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Personalidad was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
