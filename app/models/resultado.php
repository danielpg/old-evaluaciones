<?php
class Resultado extends AppModel {

	var $useTable = "resultados";
	var $name = 'Resultado';
	//var $displayField = "name";
	var $order = "Resultado.created DESC";


	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => 'User.name',
			'order' => ''
		), 
		'Exam' => array(
			'className' => 'Exam',
			'foreignKey' => 'exam_id',
			'conditions' => '',
			'fields' => 'Exam.name',
			'order' => ''
		),
 );

}


?>
