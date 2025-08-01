<?php
class ConductualController extends AppController {

	var $name = 'Conductual';
	var $paginate = array("limit" => 23);

	function index() {
		$this->Conductual->recursive = 0;
		$this->set('conductual', $this->paginate());

		APP::import("Model","Exam");
		$exam = new Exam();
		$obj = $exam->findById( ID_TEST_CONDUCTUAL);
		$this->set('testname', $obj["Exam"]["name"]);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid conductual', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('conductual', $this->Conductual->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Conductual->create();
			if ($this->Conductual->save($this->data)) {
				$this->Session->setFlash(__('The conductual ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conductual no pudo ser guardado.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid conductual', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Conductual->save($this->data)) {
				$this->Session->setFlash(__('The conductual ha sido actualizado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conductual no pudo ser actualizado', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Conductual->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for conductual', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Conductual->delete($id)) {
			$this->Session->setFlash(__('Conductual deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Conductual was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
