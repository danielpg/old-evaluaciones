<?php
class LaboralController extends AppController {

	var $name = 'Laboral';

	function index() {
		$this->Laboral->recursive = 0;
		$this->set('laboral', $this->paginate());

		APP::import("Model","Exam");
		$exam = new Exam();
		$obj = $exam->findById( ID_TEST_LABORAL);
		$this->set('testname', $obj["Exam"]["name"]);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid laboral', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('laboral', $this->Laboral->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Laboral->create();
			if ($this->Laboral->save($this->data)) {
				$this->Session->setFlash(__('The laboral ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The laboral no pudo ser guardado.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid laboral', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Laboral->save($this->data)) {
				$this->Session->setFlash(__('The laboral ha sido actualizado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The laboral no pudo ser actualizado', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Laboral->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for laboral', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Laboral->delete($id)) {
			$this->Session->setFlash(__('Laboral deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Laboral was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
