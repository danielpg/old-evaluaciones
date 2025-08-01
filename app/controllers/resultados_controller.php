<?php
class ResultadosController extends AppController {

	var $name = 'Resultados';
	var $paginate = array(
             'limit' => 5,
             'order' => array('Resultado.created'=>'desc'),
             "fields"=>["Resultado.id","Exam.name","User.name","Resultado.created"]
             );

	function index() {
		$this->Resultado->recursive = 0;
		$this->set('resultados', $this->paginate() );
	}


	function view($id = null) {
		$this->layout = false;
		if (!$id) {
			$this->Session->setFlash(__('Invalid resultado', true));
			$this->redirect(array('action' => 'index'));
		}
		$show = $this->Resultado->read(null, $id);
		$this->set('resultado', $show );

		if($show["Resultado"]["exam_id"] == ID_TEST_VOCACIONAL){
			App::import("Model","Vocacion");
			$vocaciones = new Vocacion();
			$this->set("vocaciones", $vocaciones->find("list"));
		}

		if($show["Resultado"]["exam_id"] == ID_TEST_TEPETE || $show["Resultado"]["exam_id"] == ID_TEST_TEPETE_MINI ){
			App::import("Model","Seccion");
			$seccion = new Seccion();
			$this->set("secciones", $seccion->find("list"));
		}

	}

	function add() {
		if (!empty($this->data)) {
			$this->Resultado->create();
			if ($this->Resultado->save($this->data)) {
				$this->Session->setFlash(__('The resultado ha sido guardado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resultado no pudo ser guardado.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resultado', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Resultado->save($this->data)) {
				$this->Session->setFlash(__('The resultado ha sido actualizado.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resultado no pudo ser actualizado', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Resultado->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resultado', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Resultado->delete($id)) {
			$this->Session->setFlash(__('Resultado deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resultado was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}


	function android_list(){
		$this->layout = false;

		$data = $this->Resultado->find("all",array("limit" => 30));
		die(json_encode($data));
	}

	function ocr(){


	}

	function informe($id = null) {
		$duration = 0;

		$this->layout = false;
		$userids = explode(",",$id);
		App::import("Model","User");
		$userobj = new User();

		$out = "";
		App::import("Model","Exam");
		$Exam = new Exam();
		$testname = $Exam->find("list");

		App::import("Model","Seccion");
		$seccion = new Seccion();
		$this->set("secciones", $seccion->find("list"));

		$out = "";
		App::import("Model","Resultado");
		$resultado = new Resultado();
		$results = $resultado->find("all",array("conditions" => array("Resultado.id" => $userids )));


		$tepete = array();
		$examen = array();	$rasgos = "";$temperamento = "";$cestudios = "";
		$personalidad_total = "";$vocaciones = "";$capacidad = "";$puntaje_raven = "";
		$colores = array();
		$puntaje_laboral =   "";$tabla_conductual =  "";$eynseck_total  = "";

		//$sql = mysql_query("SELECT resultados.tipo, resultados.id, resultados.vars1, resultados.vars2, resultados.resultado, resultados.comentario FROM resultados WHERE resultados.user = '$id' ");
		foreach($results as $res){
			$row = $res["Resultado"];
			$duration += $row["duration"];

			switch($row['exam_id']){
			case ID_TEST_PERSONALIDAD: // Auto conocimiento  ---------------------------------
				//var_dump($row);exit;
				$examen1 = true;
				$examen[ID_TEST_PERSONALIDAD] = true;
				$desi = json_decode($row['vars1'],true);
				if($desi['E']<14){
					if($desi['N']>11)	$temperamento = 'melancolico';
					else				$temperamento = 'flematico';
				} else {
					if($desi['N']>11)	$temperamento = 'colerico';
					else				$temperamento = 'sanguineo';
				}
			
				$temps = Query::squery('SELECT name,value FROM settings WHERE exam_id = '.$row["exam_id"]."  ");	
				foreach($temps as $item) $listemp[$item["settings"]["name"]] = $item["settings"]["value"];

				$personalidad_total = 'E: '.$desi['E'].' / N: '.$desi['N'].' / L: '.(isset($desi['L']) ? $desi['L'] : 0);

				$rasgos = $listemp[$temperamento];
				$cestudios = $listemp[$temperamento."_d"];
				$temperamento = $listemp[$temperamento."_e"];
				
				/*echo "<div class='modal'>";
				var_dump($personalidad_total);
				echo "</div>";*/
				
				break;
		
			case ID_TEST_VOCACIONAL: // Vocacional  ---------------------------------
				//die("<div class='modal'>qqqqq</div>");
				$examen[ID_TEST_VOCACIONAL] = true;
				$out = '';
				$tipo_vocaciones = array();
				$id_vocaciones = json_decode($row['vars1'],true);
					$vos = Query::squery('SELECT id,name FROM vocaciones','id','name');
				foreach($vos as $item) $tipo_vocaciones[$item["vocaciones"]["id"]] = $item["vocaciones"]["name"];

				foreach($id_vocaciones as $key => $value) $out .= $tipo_vocaciones[$key].'('.$value.'), ';		
				$out = rtrim($out,', ');
				$vocaciones = $out;
				break;
		
			case ID_TEST_COEFICIENTE: //Raven ---------------------------------
				$examen3 = true;
				$examen[ID_TEST_COEFICIENTE] = true;
				$raven_categorias = array(	
					1=>'Muy Inferior',
					2=>'Inferior al T&eacute;rmino Medio',
					3=>'T&eacute;rmino Medio',
					4=>'Superior al T&eacute;rmino Medio',
					5=>'Muy Superior');
		
				$valores = json_decode($row['vars1'],true);
				$puntaje_raven = $valores["total"];	
		
				if($puntaje_raven > 10)	$diagnostico = $raven_categorias[5];
				elseif($puntaje_raven > 8)$diagnostico = $raven_categorias[4];
				elseif($puntaje_raven > 6)$diagnostico = $raven_categorias[3];
				elseif($puntaje_raven > 4)$diagnostico = $raven_categorias[2];
				else			$diagnostico = $raven_categorias[1];
				$capacidad = $diagnostico;
				//$informe[$row['exam_id']] = $diagnostico;
				break;
		
			case ID_TEST_COLORES: // Colores ---------------------------------
				$examen4 = true;
				$examen[ID_TEST_COLORES] = true;
				$exito = false;
				$orientacion = false;
				$cd = json_decode($row['vars1'],true);
				$c_elegidos = $cd["colors2"];

				$colores["orden2"] = $c_elegidos;
				// revisar si entre los 5 primeras estan : 2 3 4 ##########################################3
				$cuenta = 0;
				for($i=0; $i<5; $i++){
					if($c_elegidos[$i]==2) $cuenta++;
					if($c_elegidos[$i]==3) $cuenta++;
					if($c_elegidos[$i]==4) $cuenta++;
				}
				if($cuenta==3) $exito = true;// PRONOSTICO POSITIVO DE ÉXITO EN  ESTUDIOS SUPERIORES
				
				// revisar si entre los 4 primeras estan : 0 6 7 por lo menos 2 ###########################3
				$cuenta = 0;
				for($i=0; $i<4; $i++){
					if($c_elegidos[$i]==0) $cuenta++;
					if($c_elegidos[$i]==6) $cuenta++;
					if($c_elegidos[$i]==7) $cuenta++;
				}
				if($cuenta>1) $orientacion = true;// NECESIDADES DE ORIENTACIÓN 
				
				//buscar el codigo resultado del (primer #)(ultimo #) #####################################3
				$buscar = '+'.$c_elegidos[0].'-'.$c_elegidos[7];
				$refrow = Query::squery("select name from coloref where code='$buscar' LIMIT 1");
				//var_dump($buscar,$refrow);
				$problema = empty($refrow) ? '' : $refrow[0]["coloref"]['name']; // PROBLEMA ACTUAL
				$colores["problema"] = (string)$problema;
				
				//buscar el codigo resultado del (primer #)(segundo #) #####################################3
				$buscar = '+'.$c_elegidos[0].'+'.$c_elegidos[1];
				$refrow = Query::squery("select name from coloref where code='$buscar'  LIMIT 1");
				$colores["orientado"] = empty($refrow) ? '' : $refrow[0]["coloref"]['name']; // ORIENTADO
				
				//buscar el codigo resultado del (tercero #)(cuarto #) #####################################3
				$buscar = 'x'.$c_elegidos[2].'x'.$c_elegidos[3];
				$refrow = Query::squery("select name from coloref where code='$buscar'  LIMIT 1");
				$colores["presente"] = empty($refrow) ? '' : $refrow[0]["coloref"]['name']; // SITUACION PRESENTE
				
				//buscar el codigo resultado del (quinto #)(sexto #) #####################################3
				$buscar = '='.$c_elegidos[4].'='.$c_elegidos[5];
				$refrow = Query::squery("select name from coloref where code='$buscar'  LIMIT 1");
				$colores["coartada"] = empty($refrow) ? '' : $refrow[0]["coloref"]['name']; // CARACTERISTICAS COARTADAS
				
				//buscar el codigo resultado del (septimo #)(ocho #) #####################################3
				$buscar = '-'.$c_elegidos[6].'-'.$c_elegidos[7];
				$refrow = Query::squery("select name from coloref where code='$buscar'  LIMIT 1");
				$colores["tension"] = empty($refrow) ? '' : $refrow[0]["coloref"]['name']; // FOCO DE TENSION
				
				//buscar el codigo resultado del (primer #)  ##############################################3
				$buscar = $c_elegidos[0];
				$refrow = Query::squery("select name from coloref where code='final_$buscar'  LIMIT 1");
				$colores["general"] = empty($refrow) ? '' : $refrow[0]["coloref"]['name']; // CARACTERISTICA GENERAL

								

				
				$entorno = '';
				if(color_match(array(C_BLANCO),array(8,9),$c_elegidos)){
					$entorno .= "Reprime su conducta.";
				} elseif(color_match(array(C_BLANCO),array(6,7),$c_elegidos)){
					$entorno  .= "Controla su conducta adecuadamente.";
				}elseif(color_match(array(C_BLANCO),array(4,5),$c_elegidos)){
					$entorno  .= "Situaci&oacute;n actual lo impulsa al descontrol.";
				}elseif(color_match(array(C_BLANCO),array(2,3),$c_elegidos)){
					$entorno .= "Se descontrola f&aacute;cilmente en su conducta.";
				}elseif(color_match(array(C_BLANCO),array(0,1),$c_elegidos)){
					$entorno .= "Tendencia al descontrol de la conducta.";
				}	

				if(color_match(array(C_BLANCO),array(8,9),$c_elegidos)){
					$entorno .="No encuentra  criticas o no le interesa opinar.";
				} elseif(color_match(array(C_BLANCO),array(6,7),$c_elegidos)){
					$entorno .= "Dificultad para expresar criticas u opiniones.";
				}elseif(color_match(array(C_BLANCO),array(4,5),$c_elegidos)){
					$entorno .= "Expresa opiniones y  criticas  con moderaci&oacute;n.";
				}elseif(color_match(array(C_BLANCO),array(2,3),$c_elegidos)){
					$entorno .= "Expresa opiniones   y criticas  abiertamente.";
				}elseif(color_match(array(C_BLANCO),array(0,1),$c_elegidos)){
					$entorno .= "Impulsado  a  expresar opiniones  o cr&iacute;ticas con vehemencia.";
				}	

				if(color_match(array(C_BLANCO,C_GRIS),array(8,9),$c_elegidos)){
					$entorno .= "No encuentra criticas , no expresa nada  se inhibe.";
				} elseif(color_match(array(C_BLANCO,C_GRIS),array(6,7),$c_elegidos)){
					$entorno .= "Dificultad para expresar criticas u opiniones lo inhiben de actuar o  hablar.";
				}elseif(color_match(array(C_BLANCO,C_GRIS),array(4,5),$c_elegidos)){
					$entorno .= "Expresa opiniones y  criticas  pero situación problema lo hace perder el control.";
				}elseif(color_match(array(C_BLANCO,C_GRIS),array(2,3),$c_elegidos)){
					$entorno .= "Expresa opiniones   y criticas  abiertamente, a veces descontroladamente.";
				}elseif(color_match(array(C_BLANCO,C_GRIS),array(0,1),$c_elegidos)){
					$entorno .= "Impulsado  a  expresar opiniones  o cr&iacute;ticas con vehemencia se descontrola en su conducta.";
				}

				if(color_match(array(C_NEGRO,C_GRIS),array(8,9),$c_elegidos)){
					$entorno .= "Se ajusta  y adapta adecuadamente  a situaciones  y entornos.";
				} elseif(color_match(array(C_NEGRO,C_GRIS),array(6,7),$c_elegidos)){
					$entorno .= "Se  adecua  moderadamente  a las situaciones aunque opine en contra.";
				}elseif(color_match(array(C_NEGRO,C_GRIS),array(4,5),$c_elegidos)){
					$entorno .= "Expresa opiniones y  criticas  Radicalmente con moderaci&oacute;n.";
				}elseif(color_match(array(C_NEGRO,C_GRIS),array(2,3),$c_elegidos)){
					$entorno .= "Radicalmente Expresa opiniones   y criticas  abiertamente.";
				}elseif(color_match(array(C_NEGRO,C_GRIS),array(0,1),$c_elegidos)){
					$entorno .= "Radicalmente impulsado  a  expresar opiniones  o cr&iacute;ticas con vehemencia.";
				}		

				if(color_match(array(C_NEGRO,C_BLANCO),array(8,9),$c_elegidos)){
					$entorno .= "Ajuste y control  adaptativo.";
				} elseif(color_match(array(C_NEGRO,C_BLANCO),array(6,7),$c_elegidos)){
					$entorno .= "Controla su ideas negativas  aunque le genran cierto descontrol o ansiedad.";
				}elseif(color_match(array(C_NEGRO,C_BLANCO),array(4,5),$c_elegidos)){
					$entorno .= "Pesimismo  de percepci&oacute;n  lo alteran y piensa en descontrol.";
				}elseif(color_match(array(C_NEGRO,C_BLANCO),array(2,3),$c_elegidos)){
					$entorno .= "Mantiene control d&eacute;bil  por su radicalismo.";
				}elseif(color_match(array(C_NEGRO,C_BLANCO),array(0,1),$c_elegidos)){
					$entorno .= "Su  radicalismo lo descontrolan abiertamente.";
				}		
				
				if(color_match(array(C_NEGRO,C_GRIS,C_BLANCO),array(7,8,9),$c_elegidos)){
					$entorno .= "Adecuado ajusto al entorno.";
				} elseif(color_match(array(C_NEGRO,C_GRIS,C_BLANCO),array(4,5,6),$c_elegidos)){
					$entorno .= "Ajuste Ansioso al entorno.";
				}elseif(color_match(array(C_NEGRO,C_GRIS,C_BLANCO),array(0,1,2,3),$c_elegidos)){
					$entorno .= "Necesidad de atención urgente.";
				}
				$colores["entorno"] = $entorno;
				
				//if($exito) $colores["exito"] = 'Pronostico Positivo.';
				//else 	   $colores["exito"] = 'Posible  dificultad personal  para los estudios superiores.';
				
				if($orientacion) $colores["orientacion"] = 'Necesita desarrollar potenciales.'; //'Necesita Orientaci&oacute;n'; 
				else 			 $colores["orientacion"] = 'Planificar direccionamiento.'; // 'Se recomienda Asesor&iacute;a';
				

				break;
			case ID_TEST_LABORAL: //Laboral --------------------------------------
				$examen[ID_TEST_LABORAL] = true;
				$desi = json_decode($row['vars1'],true);
				$puntaje_laboral = 'R = '.$desi['R'].' / A = '.$desi['A'].' / O = '.$desi['O'].' / T = '.$desi['T'].' / I = '.$desi['I']; 
				
				break;

			case ID_TEST_TEPETE: //TPT -------------------------------------------
			case ID_TEST_TEPETE_MINI: //TPT -------------------------------------------
				$examen[ID_TEST_TEPETE] = true;
				$tepete = json_decode($row['vars1'],true);
				//$tepete; 
				
				break;
			case ID_TEST_CONDUCTUAL: // Conductual (115 preguntas)----------------
			case ID_TEST_CONDUCTUAL_MINI: // Conductual (115 preguntas)----------------
				$examen6 = true;
				$examen[ID_TEST_CONDUCTUAL] = true;
				$t = json_decode($row['vars1'],true);
				//$out = "( A:".$t[1]['suma'] .", "."E:".$t[2]['suma'] .", "."M:".$t[3]['suma'] .", "."S:".$t[4]['suma'] .", "."C:".$t[5]['suma'] .", "." L:" . $t[5]["L"].")";


				$user =	$userobj->read(null,$row["user_id"]);
				$user_gender = $user["User"]["gender"];

				if($row["exam_id"] == ID_TEST_CONDUCTUAL_MINI){
					$cdtable[CD_AUTONOMICA] = cd_mini_diag(1,$t[1]["suma"]);
					$cdtable[CD_EMOCIONAL]  = cd_mini_diag(2,$t[2]["suma"]);
					$cdtable[CD_MOTOR]      = cd_mini_diag(3,$t[3]["suma"]);
					$cdtable[CD_SOCIAL]     = cd_mini_diag(4,$t[4]["suma"]);
					$cdtable[CD_COGNITIVO]  = cd_mini_diag(5,$t[5]["suma"]);
					$cdtable[CD_L]          = cd_mini_diag(6,$t["L"]);
				} else {
					$cdtable[CD_AUTONOMICA] = process_scores(1,$t[1]["suma"],$user_gender);
					$cdtable[CD_EMOCIONAL]  = process_scores(2,$t[2]["suma"],$user_gender);
					$cdtable[CD_MOTOR]      = process_scores(3,$t[3]["suma"],$user_gender);
					$cdtable[CD_SOCIAL]     = process_scores(4,$t[4]["suma"],$user_gender);
					$cdtable[CD_COGNITIVO]  = process_scores(5,$t[5]["suma"],$user_gender);
					$cdtable[CD_L]          = process_scores(6,$t["L"],$user_gender);
				}

				$cd_diag = "";
				if($cdtable[CD_AUTONOMICA] == "alto" && $cdtable[CD_EMOCIONAL] == "alto" && $cdtable[CD_MOTOR] == "alto" &&
				 $cdtable[CD_COGNITIVO] == "alto" && $cdtable[CD_SOCIAL] == "alto"  ){
					$cd_diag = "Depresiòn";//$dx["dx_auto_emo"];					
				}else if ($cdtable[CD_AUTONOMICA] == "alto" && $cdtable[CD_EMOCIONAL] == "alto" && $cdtable[CD_MOTOR] == "alto" &&
				 $cdtable[CD_COGNITIVO] == "alto"  ){
					$cd_diag = "Obsesivo Compulsivo";//$dx["dx_auto_emo_moto"];

				}else if ($cdtable[CD_AUTONOMICA] == "alto" && $cdtable[CD_EMOCIONAL] == "alto" && $cdtable[CD_MOTOR] == "alto"  ){
					$cd_diag = "Fobia";//$dx["dx_cuatro"];

				}else if ($cdtable[CD_AUTONOMICA] == "alto" && $cdtable[CD_EMOCIONAL] == "alto"){
					$cd_diag = "Ansiedad";//$dx["dx_cinco"];
				}

				//sintomatologìa
				$cdsints[CD_AUTONOMICA] = "Taquicardia,fatiga,disturb. gàstricos.";
				$cdsints[CD_EMOCIONAL] = "Tristeza, llanto, hipersensibilidad.";
				$cdsints[CD_MOTOR] = "Evitaciòn,  lentitud.";
				$cdsints[CD_SOCIAL] = "Pensamiento suicida, baja autoestima.";
				$cdsints[CD_COGNITIVO] = "Miedos,insomnio, pensamientos negativos.";

				$cdusersints = "";
				foreach($cdtable as $cdkey => $cdval){
					if($cdval == "alto"){
						$cdusersints .= $cdsints[$cdkey];
					}
				}

				$this->set("cd_sint",$cdusersints);
				$this->set("cd_diag",$cd_diag);

				$out = '
				<table class="conductual" cellpadding="0" cellspacing="0">
					<tr><td>Autonòmicas</td><td>'.ucfirst($cdtable[CD_AUTONOMICA]) .'</td></tr>
					<tr><td>Emocionales</td><td>'.ucfirst($cdtable[CD_EMOCIONAL]) .'</td></tr>
					<tr><td>Motoras</td><td>'.ucfirst($cdtable[CD_MOTOR] ).'</td></tr>
					<tr><td>Sociales</td><td>'.ucfirst($cdtable[CD_SOCIAL] ).'</td></tr>
					<tr><td>Cognitivas</td><td>'.ucfirst($cdtable[CD_COGNITIVO]) .'</td></tr>
					<tr><td>Escala L</td><td>'.ucfirst($cdtable[CD_L] ).'</td></tr>
				
				</table>';
				$tabla_conductual = $out;
				break;
			case ID_TEST_EYNSECK: // EYNSECK ----------------------------
				$examen[ID_TEST_EYNSECK] = true;
				$eynseck = json_decode($row['vars1'],true);
				$eynseck_total = 'P: '.(int)$eynseck['P'].' / E: '.(int)$eynseck['E'].' / N: '.(int)$eynseck['N'].' / L: '.(isset($eynseck['L']) ? $eynseck['L'] : 0);
				//$informe[$row['exam_id']] = $eynseck_total;
				break;
			}

		}

		$this->set("examen",$examen);
		$this->set("rasgos",$rasgos);
		$this->set("temperamento",$temperamento);
		$this->set("cestudios",$cestudios);

		$this->set("tepete",$tepete);

		$this->set("personalidad_total",$personalidad_total);
		$this->set("vocaciones",$vocaciones);
		$this->set("capacidad",$capacidad);
		$this->set("puntaje_raven",$puntaje_raven);

		$this->set("colores",$colores);
		
		$this->set("puntaje_laboral",$puntaje_laboral);
		$this->set("tabla_conductual",$tabla_conductual);
		$this->set("eynseck_total",$eynseck_total);

		$this->set("testname",$testname);
		$this->set("duration",$duration);
		
	}


	function informe_laboral(){
		
		/*
		//$colors1 = array(5,2,3,1,7,0,4,6,9,8);
		//$colors2 = array(1,2,3,5,7,0,4,6,8,9);
	
		$colors1 = array(C_VERDE,C_ROJO,C_MARRON,C_AZUL,C_MORADO,C_AMARILLO,C_NEGRO,C_GRIS,C_CREMA,C_BLANCO);
		$colors2 = array(C_VERDE,C_AZUL,C_MARRON,C_AMARILLO,C_ROJO,C_MORADO,C_NEGRO,C_BLANCO,C_GRIS,C_CREMA);
		$datosp['nombre'] = "ESPOSO-01";

		$colors1 = array(C_ROJO,C_MORADO,C_AZUL,C_VERDE,C_MARRON,C_AMARILLO,C_BLANCO,C_NEGRO,C_GRIS,C_CREMA);
		$colors2 = array(C_MORADO,C_ROJO,C_AZUL,C_VERDE,C_AMARILLO,C_MARRON,C_BLANCO,C_GRIS,C_NEGRO,C_CREMA);
		$datosp['nombre'] = "MUJER-01";
	
		$colors1 = array(C_AZUL,C_GRIS,C_MORADO,C_ROJO,C_AMARILLO,C_VERDE,C_MARRON,C_CREMA,C_BLANCO,C_NEGRO);
		$colors2 = array(C_AZUL,C_GRIS,C_MORADO,C_VERDE,C_AMARILLO,C_ROJO,C_MARRON,C_CREMA,C_BLANCO,C_NEGRO);
		$datosp['nombre'] = "JULIOCESAR";

		$datosp['apellido']		 = '';
		
		$colors = array($colors1 ,$colors2 );
		*/
		$colors = array($c_primeros ,$c_elegidos );
		
		$dim_label = array(
			'act_lab' => 'Actitud Laboral',
			'est_emo' => 'Estabilidad Emotiva',
			'act_pro' => 'Actividad Productiva',
			'com_per' => 'Comunicaci&oacute;n Personal',
			'tra_equ' => 'Trabajo en Equipo',
			'empren'  => 'Emprendedurismo',
			'perse'   => 'Perseverancia',
			'inno'    => 'Innovaci&oacute;n Productiva',
			'integra' => 'Integraci&oacute;n Organizativa',
			'control' => 'Control y Supervisi&oacute;n',
			'empatia' => 'Empat&iacute;a Laboral',
			'capa'    => 'Capacidad Anal&iacute;tica',
			'pen_cri' => 'Pensamiento Cr&iacute;tico',
			'inves'   => 'Investigaci&oacute;n'
		);

		$dimen = array();
	
		$dimen['act_lab'] = calculator($colors,array(C_AMARILLO,C_ROJO,C_VERDE,C_AZUL,C_MORADO,C_NEGRO,C_GRIS,C_BLANCO,C_GRIS,C_MARRON));
		$dimen['est_emo'] = calc_estabilidad($colors);
		
		$dimen['act_pro'] = calculator($colors,array(C_AMARILLO,C_ROJO,C_VERDE), C_AMARILLO,C_ROJO);
		$dimen['com_per'] =calculator($colors,array(C_AMARILLO,C_ROJO,C_AZUL), C_AMARILLO,C_ROJO);
		$dimen['tra_equ'] =calculator($colors,array(C_AMARILLO,C_VERDE,C_MORADO), C_AMARILLO);
		$dimen['empren'] =calculator($colors,array(C_ROJO,C_AMARILLO,C_AZUL), C_ROJO,C_AMARILLO);
		$dimen['perse'] =calculator($colors,array(C_ROJO,C_AMARILLO,C_VERDE), C_ROJO,C_AMARILLO);
		$dimen['inno'] =calculator($colors,array(C_ROJO,C_AZUL,C_MORADO), C_ROJO,C_AZUL);
		$dimen['integra'] =calculator($colors,array(C_VERDE,C_MORADO,C_AZUL), C_VERDE,C_AZUL);
		$dimen['control'] =calculator($colors,array(C_VERDE,C_AZUL,C_ROJO), C_VERDE,C_AZUL);
		$dimen['empatia'] =calculator($colors,array(C_VERDE,C_AZUL,C_AMARILLO), C_VERDE);
		$dimen['capa'] =calculator($colors,array(C_AZUL,C_VERDE,C_GRIS), C_AZUL,C_VERDE);
		$dimen['pen_cri'] =calculator($colors,array(C_AZUL,C_GRIS,C_ROJO), C_AZUL);
		$dimen['inves'] = calculator($colors,array(C_AZUL,C_GRIS,C_MORADO), C_AZUL);
		
		//echo "<pre>";var_dump($dimen);echo "</pre>";
		//$dimen['est_emo'] = 04;
		$datosi = d_DB::fetch_onerow("select adicional1 from t_informes where id='$id'");
		$recomendaciones = $datosi['adicional1'];	
		include('templates/informe_laboral.php');
	}
	



	function ocrsubmit(){
		//$_POST

		die("Diagnostico: Test Test Test <br> Puntaje: Prueba Prueba Prueba ");
	}



}


function process_scores($type,$points,$gender){
	if($gender == G_MASCULINO):	
		switch($type){
			case 1:
				if($points > 18)return CS_ALTO;
				elseif($points > 14)return CS_MEDIO;
				return CS_BAJO;
			case 2:
				if($points > 21)return CS_ALTO;
				elseif($points > 17)return CS_MEDIO;
				return CS_BAJO;
			case 3:
				if($points > 18)return CS_ALTO;
				elseif($points > 15)return CS_MEDIO;
				return CS_BAJO;
			case 4:
				if($points > 25)return CS_ALTO;
				elseif($points > 21)return CS_MEDIO;
				return CS_BAJO;
			case 5:
				if($points > 24)return CS_ALTO;
				elseif($points > 21)return CS_MEDIO;
				return CS_BAJO;
			case 6:
				if($points > 3)return CS_ALTO;
				elseif($points > 1)return CS_MEDIO;
				return CS_BAJO;
		}
	else:
		switch($type){
			case 1:
				if($points > 19)return CS_ALTO;
				elseif($points > 15)return CS_MEDIO;
				return CS_BAJO;
			case 2:
				if($points > 24)return CS_ALTO;
				elseif($points > 19)return CS_MEDIO;
				return CS_BAJO;
			case 3:
				if($points > 18)return CS_ALTO;
				elseif($points > 15)return CS_MEDIO;
				return CS_BAJO;
			case 4:
				if($points > 24)return CS_ALTO;
				elseif($points > 20)return CS_MEDIO;
				return CS_BAJO;
			case 5:
				if($points > 25)return CS_ALTO;
				elseif($points > 21)return CS_MEDIO;
				return CS_BAJO;
			case 6:
				if($points > 3)return CS_ALTO;
				elseif($points > 2)return CS_MEDIO;
				return CS_BAJO;
		}
	endif;
}

function calculator(array $colors_chosen,array $sum_colors,$multiply = false,$aux = false){
	$C_puntajes = array(
		C_AMARILLO=>array(0 =>5,1=>4,2=>3,3=>2,4=>2,5=>1,6=>0,7=>-1,8=>-2,9=>-3),
		C_ROJO  =>  array(0 =>4,1=>5,2=>3,3=>3,4=>2,5=>1,6=>0,7=>-2,8=>-3,9=>-4),
		C_VERDE =>  array(0 =>2,1=>4,2=>5,3=>4,4=>3,5=>2,6=>1,7=> 0,8=>-1,9=>-2),
		C_AZUL  =>  array(0 =>2,1=>3,2=>4,3=>5,4=>4,5=>3,6=>2,7=> 0,8=>-1,9=>-2),
		
		C_CREMA  => array(0 =>-3,1=>-2,2=>-1,3=> 0,4=> 1,5=>2,6=>3,7=> 4,8=>-1,9=>-2),
		C_MORADO => array(0 =>-1,1=> 0,2=> 1,3=> 1,4=> 2,5=>3,6=>1,7=>-1,8=>-2,9=>-3),
		C_MARRON => array(0 =>-5,1=>-4,2=>-3,3=>-2,4=> 0,5=>3,6=>4,7=> 3,8=> 2,9=> 1),
		C_NEGRO  => array(0 =>-3,1=>-2,2=>-1,3=> 0,4=> 0,5=>0,6=>1,7=> 2,8=> 3,9=> 4),
		C_GRIS   => array(0 =>-1,1=> 1,2=> 2,3=> 3,4=> 4,5=>3,6=>2,7=> 1,8=> 1,9=>-1),
		C_BLANCO => array(0 =>-4,1=>-3,2=>-2,3=>-1,4=>-1,5=>0,6=>2,7=> 4,8=> 3,9=> 0)
	);

	$points = 0;
	foreach($colors_chosen as $orden){
		foreach($orden as $order => $color){
			if(in_array($color,$sum_colors)){
				$tmp_point = $C_puntajes[$color][$order];
				if(($multiply !== false) && $color == $multiply)$tmp_point = $tmp_point*3;
				
				if(($aux !== false) && $color == $aux)$tmp_point = $tmp_point*2;
				$points += $tmp_point;
			}
		}
	}
	
	return ($points/2);	

		
}

function calc_estabilidad(array $colors_chosen){
	$C_puntajes = array(
		C_AMARILLO=>array(0 =>5,1=>4,2=>3,3=>2,4=>2,5=>1,6=>0,7=>-1,8=>-2,9=>-3),
		C_ROJO  =>  array(0 =>4,1=>5,2=>3,3=>3,4=>2,5=>1,6=>0,7=>-2,8=>-3,9=>-4),
		C_VERDE =>  array(0 =>2,1=>4,2=>5,3=>4,4=>3,5=>2,6=>1,7=> 0,8=>-1,9=>-2),
		C_AZUL  =>  array(0 =>2,1=>3,2=>4,3=>5,4=>4,5=>3,6=>2,7=> 0,8=>-1,9=>-2),
		
		C_CREMA  => array(0 =>-3,1=>-2,2=>-1,3=> 0,4=> 1,5=>2,6=>3,7=> 4,8=>-1,9=>-2),
		C_MORADO => array(0 =>-1,1=> 0,2=> 1,3=> 1,4=> 2,5=>3,6=>1,7=>-1,8=>-2,9=>-3),
		C_MARRON => array(0 =>-5,1=>-4,2=>-3,3=>-2,4=> 0,5=>3,6=>4,7=> 3,8=> 2,9=> 1),
		C_NEGRO  => array(0 =>-3,1=>-2,2=>-1,3=> 0,4=> 0,5=>0,6=>1,7=> 2,8=> 3,9=> 4),
		C_GRIS   => array(0 =>-1,1=> 1,2=> 2,3=> 3,4=> 4,5=>3,6=>2,7=> 1,8=> 1,9=>-1),
		C_BLANCO => array(0 =>-4,1=>-3,2=>-2,3=>-1,4=>-1,5=>0,6=>2,7=> 4,8=> 3,9=> 0)
	);

	$points = array();
	foreach($colors_chosen as $key => $orden){
		$points[$key] = 0;
		foreach($orden as $order => $color){
				$tmp_point = $C_puntajes[$color][$order];
				if($tmp_point < 0)continue;
				$points[$key] += $tmp_point;
		}
	}
	$dif = ($points[0] - $points[1]);
	if($dif < 0) $dif = $dif * -1;
	//$dif = 20 - $dif;
	return $dif;			
}

function color_match(array $colors,array $positions,array $chosen){
	foreach($colors as $key => $color){
		foreach($positions as $pos){
			if(isset($chosen[$pos]) && ($chosen[$pos] == $color )){
				unset($colors[$key]);
			}
		}
	}
	if(empty($colors))return true;
	return false;
}

