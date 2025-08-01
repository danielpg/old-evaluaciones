<?php
class Setting extends AppModel {

	var $useTable = "settings";
	var $name = 'Setting';
	var $displayField = "name";
	//var $order = "Network.name ASC";
	var $belongsTo = array(
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
