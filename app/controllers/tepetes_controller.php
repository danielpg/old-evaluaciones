<?php
class TepetesController extends AppController {

	var $name = 'Tepetes';
  	  var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
 	   var $components = array('Alaxos.AlaxosFilter');

	function index() {
		$this->AlaxosFilter->set_auto_append_wildcard_characters(true);
		$conditions = $this->AlaxosFilter->get_filter();


		App::import("Model","Seccion");
		$seccion = new Seccion();
		$this->set("secciones", $seccion->find("list"));

		$this->Tepete->recursive = 0;
		$this->set('tepetes', $this->paginate($this->Tepete,$conditions));


		APP::import("Model","Exam");
		$exam = new Exam();
		$obj = $exam->findById( ID_TEST_TEPETE);
		$this->set('testname', $obj["Exam"]["name"]);

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tepete', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('tepete', $this->Tepete->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tepete->create();
			if ($this->Tepete->save($this->data)) {
				$this->Session->setFlash(__('The tepete has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tepete could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tepete', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tepete->save($this->data)) {
				$this->Session->setFlash(__('The tepete has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tepete could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tepete->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tepete', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tepete->delete($id)) {
			$this->Session->setFlash(__('Tepete deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tepete was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
