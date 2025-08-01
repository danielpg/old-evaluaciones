<?php
class Exam extends AppModel {

	var $name = 'Exam';
	var $displayField = "name";
	var $useTable = "exams";
	//var $order = "Pregunta.nombre ASC";

	/*var $belongsTo = array(
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $validate = array(
        'nombre' => array(
			'rule' => 'notEmpty',
			'allowEmpty' => false,
			'message' => 'Dato invalido.'
		));*/


}


?>
