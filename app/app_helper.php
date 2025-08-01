<?php

class AppHelper extends Helper {
	
	function customMethod ($title , $url) {
		$link = $this->Html->link($title, $url, array('class' => 'edit'));
		return $this->output("<div class=\"editOuter\">$link</div>");
	}
	
	function fview ($id , $con,$title = "") {
		if(empty($title))$title = $id;
		$link = $this->link($title, array("controller" => $con , "action" => "view" , $id));
		return $link;
		//return $this->output("<div class=\"editOuter\">$link</div>");
	}	
	

	function say_test ($id) {
		if($id == ID_TEST_PERSONALIDAD)return "Test de Personalidad";
		if($id == ID_TEST_VOCACIONAL)return "Test Vocacional";
		if($id == ID_TEST_COEFICIENTE)return "Test de Coeficiente";
		if($id == ID_TEST_COLORES)return "Test de los Colores";
		if($id == ID_TEST_LABORAL)return "Test laboral";
		if($id == ID_TEST_CONDUCTUAL)return "Test Conductual";
		if($id == ID_TEST_UMBVOCACIONAL)return "Test Conductual";
		if($id == ID_TEST_PEN_EYNSECK)return "Test de Eynseck";
		return "TestNOID";
		//return $this->output("<div class=\"editOuter\">$link</div>");
	}
	
	function simdate($udate){
		list($date,$time) = explode(" ",$udate);
		list($y,$m,$d) =  explode("-",$date);
		list($h,$min,$s) =  explode(":",$time);
		return $d."/".$m."/".$y." &nbsp; ".$h.":".$min;
	}
}

?>
