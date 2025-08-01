<?php
class Ticket extends AppModel {

	var $useTable = "tickets";
	var $name = 'Ticket';
	var $displayField = "exam_id";
	
	//var $order = "Network.name ASC";
	/*var $belongsTo = array(
		'Exam' => array(
			'className' => 'Exam',
			'foreignKey' => 'exam_id',
			'conditions' => '',
			'fields' => 'Exam.name',
			'order' => ''
		),
 );*/

}


?>
