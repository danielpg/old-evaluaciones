<?php
class VocacionalController extends AppController {

	var $name = 'Vocacional';

	function index() {
		$this->Vocacional->recursive = 0;
		$this->set('vocacional', $this->paginate());


		APP::import("Model","Exam");
		$exam = new Exam();
		$obj = $exam->findById( ID_TEST_VOCACIONAL);
		$this->set('testname', $obj["Exam"]["name"]);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid vocacional', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('vocacional', $this->Vocacional->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Vocacional->create();
			if ($this->Vocacional->save($this->data)) {
				$this->Session->setFlash(__('The vocacional ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocacional no pudo ser guardado.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid vocacional', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Vocacional->save($this->data)) {
				$this->Session->setFlash(__('The vocacional ha sido actualizado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocacional no pudo ser actualizado', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Vocacional->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for vocacional', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Vocacional->delete($id)) {
			$this->Session->setFlash(__('Vocacional deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Vocacional was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
