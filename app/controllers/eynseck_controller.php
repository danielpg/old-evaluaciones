<?php
class EynseckController extends AppController {

	var $name = 'Eynseck';

	function index() {
		$this->Eynseck->recursive = 0;
		$this->set('eynseck', $this->paginate());

		APP::import("Model","Exam");
		$exam = new Exam();
		$obj = $exam->findById( ID_TEST_EYNSECK);
		$this->set('testname', $obj["Exam"]["name"]);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid eynseck', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eynseck', $this->Eynseck->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Eynseck->create();
			if ($this->Eynseck->save($this->data)) {
				$this->Session->setFlash(__('The eynseck ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eynseck no pudo ser guardado.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid eynseck', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Eynseck->save($this->data)) {
				$this->Session->setFlash(__('The eynseck ha sido actualizado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eynseck no pudo ser actualizado', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Eynseck->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for eynseck', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Eynseck->delete($id)) {
			$this->Session->setFlash(__('Eynseck deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Eynseck was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

}
