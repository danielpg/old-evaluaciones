<?php
class ClavesravenController extends AppController {

	var $name = 'Clavesraven';
	var $paginate = array("limit" => 15);

	function index() {

		$answers = array(
			1 => 2,
			2 => 6,
			3 => 1,
			4 => 2,
			5 => 1,
			6 => 3,
			7 => 5,
			8 => 6,
			9 => 4,
			10 => 3,
			11 => 4,
			12 => 5
		);
		$this->set('clavesraven', $answers);

		//$this->Clavesraven->recursive = 0;
		//$this->set('clavesraven', $this->paginate());
	}

	function view($id = null) {
		$this->layout=false;
		/*if (!$id) {
			$this->Session->setFlash(__('Invalid Clavesraven', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('clavesraven', $this->Clavesraven->read(null, $id));*/
		$this->set('id',$id);
	}


	function add() {
		if (!empty($this->data)) {
			$this->Clavesraven->create();
			if ($this->Clavesraven->save($this->data)) {
				$this->Session->setFlash(__('The Clavesraven ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Clavesraven no pudo ser guardado.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Clavesraven', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Clavesraven->save($this->data)) {
				$this->Session->setFlash(__('The Clavesraven ha sido actualizado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Clavesraven no pudo ser actualizado', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Clavesraven->read(null, $id);
		}
	}



}
