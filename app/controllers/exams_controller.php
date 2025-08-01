<?php

/*

DEBUG RADIO BUTTONS FAST

for(i=1;i< 161;i++)$("input[name=p" + i ).val(["A"]);


*/


class ExamsController extends AppController {

	var $name = 'Exams';
	var $layout = "user";
	var $paginate = array(   'limit' => 800     ); 
	var $uses = array("Ticket");
	//var $paginate = array(   'limit' => 50   ,"order" => "Account.id DESC"   );
	//var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	//var $components = array('Alaxos.AlaxosFilter');
	
	function index(){
		$this->layout = "default";
		App::import("Model","Exam");
		$this->Exams = new Exam();
		$this->set('exams', $this->Exams->find("all"));
	}

	function edit($id = null) {
		$this->layout = "default";
		App::import("Model","Exam");
		$this->Exams = new Exam();

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid laboral', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Exam->save($this->data)) {
				//$this->_flash('Examen ha sido actualizado.');
				$this->Session->setFlash('Examen ha sido actualizado.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('laboral no pudo ser actualizado', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Exam->read(null, $id);
		}
	}

	function mobile_token(){
		//App::import("Model","Push");
		$push = new Push();
		
		$servicedata = '{

		}';


		$service = json_decode($servicedata,true);
		$key = $service["private_key"];

		$time = time();

		$token = array(
		  'iat' => $time, 
		  'exp' => $time + (59*60), 
		  "iss" =>  $service["client_email"] ,
		  "scope" => "https://www.googleapis.com/auth/firebase.messaging",
		  "aud" => "https://oauth2.googleapis.com/token"
		);
		$jwt = JWT::encode($token, $key , 'RS256');

		$url = "https://oauth2.googleapis.com/token";
		$header = array('Content-Type: application/x-www-form-urlencoded');
		$ops["grant_type"] = "urn:ietf:params:oauth:grant-type:jwt-bearer";
		$ops["assertion"] = $jwt;
		$data =  http_build_query($ops, '', '&');
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header );
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data );
		//curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$json_response = curl_exec($curl);
		curl_close($curl);
		//echo $json_response;
		$tosave = ["Push" => ["vars1" => $json_response , "start_time" => time() ] ];
		$push->save($tosave);
		return $json_response;
	}



	function mobile_noti( $type = null){
		return true;
		//Uncaught Error: Class 'JWT' not found 
		$title  =  "nuyevop usuario";
		$body   = "carlos es registrado.";
		$topic  = "users";
		$project= "andronotis";

		App::import("Model","Push");
		$push = new Push();
		$data = $push->read(null,1);

		$time = time();
		if( $data["start_time"] + 3599 > $time ){
			$token = json_decode($data["Push"]["vars"] , true );
		} else {
			$token = json_decode($this->mobile_token() ,  true);
		}

		if(true){
			$url = "https://fcm.googleapis.com/v1/projects/".$project."/messages:send";

			// https://firebase.google.com/docs/reference/fcm/rest/v1/projects.messages#Message
			$data = json_encode(
				[ "validate_only" =>  false,
				   "message"  =>
					 [ 
						//"name"         => "test3",
					   	"notification" =>  
							[
								"title" => $title,
								"body"  => $body
							],
						//"token" => $regid
						"topic" => "news"
		
					]	
			]);
			$header = array('Content-Type: application/json',
			"Authorization: Bearer ".$token["access_token"] );
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $header );
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data );
			//curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$json_response = curl_exec($curl);	
		}

		echo $json_response;exit;
	}


	function user_main(){
		$list = array();
		$defs = array();
		$adv = "Usuario no habilitado";
		App::import("Model","Resultado");
		$this->Resultado = new Resultado();

		$tickets = array();
		App::import("Model","Ticket");
		$ticketobj = new Ticket();
		$ticketres = $ticketobj->find("all", array("fields" => "Ticket.exam_id","conditions" =>  array("Ticket.user_id" => Credentials::get("__credentials.User.id") )));
		if(!empty($ticketres)){
			foreach($ticketres as $item){
				$tickets[$item["Ticket"]["exam_id"]] = 1;
			}
		}

		App::import("Model","User");
		$userobj = new User();		
		$user  = $userobj->findById( Credentials::get("__credentials.User.id") );
		if($user["User"]["status"] == 1){
			$adv = "";
			App::import("Model","Exam");
			$exam = new Exam();		
			$res = $exam->find("all", array("conditions" =>  array("Exam.display" => 1 )));
			foreach($res as $item){
				$defs[$item["Exam"]["id"]] = $item["Exam"];
				if(!isset($tickets[$item["Exam"]["id"]]))continue;
				$list[$item["Exam"]["id"]] = $item["Exam"];
			}
		} 

		$this->set("adv",$adv);
		//$this->pregunta->fetch();
		$this->set("exams",$list);
		$this->set("defs",$defs);
		$this->set('resultados', $this->Resultado->find("all", array("limit" => 20, "order" => "Resultado.created DESC", "conditions" => array("Resultado.user_id" => Credentials::get("__credentials.User.id")  ) )) );
	}	


	function personalidad() {

		
		if(!empty($_POST)){

			$ref = Query::squery('SELECT id,yes,no FROM personalidad');
			$lisresults = array();
			foreach($ref as $item){
				if(isset($_POST['p'.$item["personalidad"]['id']])) $lisresults[] = $item["personalidad"][$_POST['p'.$item["personalidad"]['id']]];
			}
			$values = array_count_values($lisresults);
			unset($values['']);

			//var_dump($values);exit;

			App::import("Model","Resultado");
			$Resultado = new Resultado();
			$tosave = array(
				"user_id"  => Credentials::get("__credentials.User.id"),
				"exam_id"   => ID_TEST_PERSONALIDAD,
				"completed"    => 1,
				"duration" => (time() - $_POST["time"]),
				"vars1" => json_encode($values)
			);
			$Resultado->save($tosave);
			$this->Ticket->deleteAll(["Ticket.user_id" => Credentials::get("__credentials.User.id") , "Ticket.exam_id" => ID_TEST_PERSONALIDAD ]);
			//$this->Historic->id = null;
			$this->_flash("Examen Completado","success");
			$this->mobile_noti(ID_TEST_PERSONALIDAD);
			$this->redirect(array('controller'=>'exams','action'=>'user_main'));	
			//var_dump(json_encode($values));exit;	
	
			

		}
		App::import("Model","Personalidad");
		$this->pregunta = new Personalidad();		
		//$this->pregunta->fetch();
		$this->set('preguntas', $this->pregunta->find("all") );

	}


	function vocacional(){
		if(!empty($_POST)){
			//var_dump($_POST);
				//$vocaciones = collect('SELECT id,nombre FROM vocaciones','id','name');

			$aptitud = array();
			for($i=1; $i<111; $i++){
				$j = $i;
				if ($i>22&&$i<45)$j -= 22;
				if ($i>44&&$i<67)$j -= 44;
				if ($i>66&&$i<89)$j -= 66;
				if ($i>88)$j -= 88;
				if(!isset($aptitud[$j]))$aptitud[$j] = 0;
				$aptitud[$j] += $_POST['p'.$i];
				$j=0;
			}
			arsort($aptitud);
			$aptitud = array_slice($aptitud,0,5,true);// poner cuantas aptitudes sacar
			//var_dump($aptitud);exit;

			App::import("Model","Resultado");
			$Resultado = new Resultado();
			$tosave = array(
				'user_id'=> Credentials::get("__credentials.User.id"),
				'exam_id'=>ID_TEST_VOCACIONAL,
				"completed" => 1,
				"duration" => (time() - $_POST["time"]),
				'vars1'=>json_encode($aptitud) );
			$Resultado->save($tosave);
			$this->Ticket->deleteAll(["Ticket.user_id" => Credentials::get("__credentials.User.id") , "Ticket.exam_id" => ID_TEST_VOCACIONAL ]);
			$this->mobile_noti(ID_TEST_VOCACIONAL);
			$this->_flash("Examen Completado","success");
			$this->redirect(array('controller'=>'exams','action'=>'user_main'));	


		}
		App::import("Model","Vocacional");
		$this->pregunta = new Vocacional();		
		//$this->pregunta->fetch();
		$this->set('vocas', $this->pregunta->find("all") );

	}


	function colores(){

		if(!empty($_POST)){
			//var_dump($_POST);exit;

			$colors1 = rtrim($_POST["colors"],",");
			$colors2 = rtrim($_POST["colors2"],",");
			$list1 = explode(",",$colors1);
			$list2 = explode(",",$colors2);
			$newcolors1 = array();
			$newcolors2 = array();
			foreach($list1 as $item)$newcolors1[$item] = 1;
			foreach($list2 as $item)$newcolors2[$item] = 1;
			$list1 = array_keys($newcolors1);	
			$list2 = array_keys($newcolors2);	

			//var_dump(array("colors1" => $list1 , "colors2" => $list2)); exit;

			App::import("Model","Resultado");
			$Resultado = new Resultado();
			$tosave = array(
				'user_id'=> Credentials::get("__credentials.User.id"),
				'exam_id'=>ID_TEST_COLORES,
				"completed" => 1,
				"duration" => (time() - $_POST["time"]),
				'vars1'=>json_encode(array("colors1" => $list1 , "colors2" => $list2) ) );
			$Resultado->save($tosave);
			$this->Ticket->deleteAll(["Ticket.user_id" => Credentials::get("__credentials.User.id") , "Ticket.exam_id" => ID_TEST_COLORES ]);
			$this->mobile_noti(ID_TEST_COLORES);
			$this->_flash("Examen Completado","success");
			$this->redirect(array('controller'=>'exams','action'=>'user_main'));	
		}

		$res = Query::squery("SELECT name,value FROM settings WHERE exam_id = ".ID_TEST_COLORES);
		foreach($res as $row){
			
			list($tmp,$cid) = explode("_",$row["settings"]["name"]);
			$colors[$cid] = $row["settings"]["value"];
		}

		$this->set("colors",$colors);

	}

	function tepete($mini = null){
		$conditions = [];
		if($mini == "mini"){
			$conditions = array("conditions" => array("Tepete.seccion_id" => array(1,2,3,4,16)));
		}

		App::import("Model","Tepete");
		$this->pregunta = new Tepete();		
		$tepes = $this->pregunta->find("all",$conditions);
		$this->set('tepes', $tepes );

		if(!empty($_POST)){

			$claves = array();
			foreach($tepes as $item){
				$claves[$item["Tepete"]["id"]] = $item["Tepete"];
			}
	
			$pos = ["A" => 0 , "B" => 1 , "C" => 2 , "D" => 3 ];
			$neg = ["A" => 3 , "B" => 2 , "C" => 1 , "D" => 0 ];
			

			$results = array();
			foreach($_POST as $key => $val){
			//for($i = 1; $i < 161; $i++){
				if(strpos($key,"p") !== 0)continue;
				$i = substr($key,1);

				if(!isset($results[$claves[$i]["seccion_id"]]))$results[$claves[$i]["seccion_id"]] = 0;

				if($claves[$i]["signo"] == TPT_NEGATIVO){
					$results[$claves[$i]["seccion_id"]] += $neg[$_POST[$key]];
				} else {
					$results[$claves[$i]["seccion_id"]] += $pos[$_POST[$key]];
				}	
			}

			ksort($results);
			//var_dump($results);exit;

			App::import("Model","Resultado");
			$Resultado = new Resultado();
			$examid = ID_TEST_TEPETE;
			if($mini == "mini")$examid = ID_TEST_TEPETE_MINI;
			$tosave = array(
				'user_id'=> Credentials::get("__credentials.User.id"),
				'exam_id'=> $examid,
				"completed" => 1,
				"duration" => (time() - $_POST["time"]),
				'vars1'=>json_encode($results ));
			$Resultado->save($tosave);
			$this->Ticket->deleteAll(["Ticket.user_id" => Credentials::get("__credentials.User.id") , "Ticket.exam_id" => $examid ]);
			$this->mobile_noti( $examid);
			$this->_flash("Examen Completado","success");
			$this->redirect(array('controller'=>'exams','action'=>'user_main'));
		}

	}

	
	function laboral(){


		if(!empty($_POST)){

			$preguntas = array();
			$cuenta = array("R" => 0 , "A" => 0 , "O" => 0 , "T" => 0 , "I" => 0);
			$ref = Query::squery('select id,yes,no from laboral');
			foreach($ref as $item){
				$preguntas[$item["laboral"]['id']] =  $item["laboral"][$_POST['p'.$item["laboral"]['id']]];
			}

			for($i=1; $i<97; $i++){	
				$cuenta['I'] += $preguntas[$i];	$i += 4;
			}

			for($i=101; $i<111; $i++){	
				$cuenta['I'] += $preguntas[$i];
			}		

			for($i=2; $i<98; $i++){
				$cuenta['R'] += $preguntas[$i];	$i += 4;
			}
			for($i=3; $i<99; $i++){
				$cuenta['A'] += $preguntas[$i];	$i += 4;
			}
			for($i=4; $i<100; $i++){
				$cuenta['O'] += $preguntas[$i];	$i += 4;
			}
			for($i=5; $i<101; $i++){
				$cuenta['T'] += $preguntas[$i];	$i += 4;
			}

			//var_dump($cuenta);exit;

			App::import("Model","Resultado");
			$Resultado = new Resultado();
			$tosave = array(
				'user_id'=> Credentials::get("__credentials.User.id"),
				'exam_id'=>ID_TEST_LABORAL,
				"completed" => 1,
				"duration" => (time() - $_POST["time"]),
				'vars1'=>json_encode($cuenta) );
			$Resultado->save($tosave);
			$this->Ticket->deleteAll(["Ticket.user_id" => Credentials::get("__credentials.User.id") , "Ticket.exam_id" =>ID_TEST_LABORAL ]);
			$this->mobile_noti( ID_TEST_LABORAL );
			$this->_flash("Examen Completado","success");
			$this->redirect(array('controller'=>'exams','action'=>'user_main'));	

		}
		App::import("Model","Laboral");
		$this->pregunta = new Laboral();		
		//$this->pregunta->fetch();
		$this->set('labos', $this->pregunta->find("all") );
	
	}

	function conductual($mini = null){
		if(!empty($_POST)){

			$lies[1] = array(4=>0, 12=>0, 20=>3);
			$lies[2] = array(7=>0, 14=>0,19=>0);
			$lies[3] = array(5=>3, 11=>0,19=>0);
			$lies[4] = array(4=>3, 12=>3,17=>0);
			$lies[5] = array(4=>0, 13=>0,20=>3);
			
			$inversores = array(1,23);
			$inversores += array(5+23,9+23 ,13+23,17+23,18+23,20+23);
			$inversores += array(1+46,6+46 ,8 +46,16+46,20+46);
			$inversores += array(3+69,5+69 ,7+69 ,8+69 ,13+69,16+69,20+69);
			$inversores += array(8+92,15+92,19+92,22+92,23+92);
			
			$inv = array(0 => 3,1 => 2, 2 => 1 , 3 => 0);
			$resul = array( 1 => array("suma"=>0,"L"=>0) , 2 => array("suma"=>0,"L"=>0) , 3 => array("suma"=>0,"L"=>0) , 4 => array("suma"=>0,"L"=>0) ,5 => array("suma"=>0,"L"=>0), "L" => 0 );

			if(!empty($_POST)){
		
				for($i = 1; $i < 116; $i++){
					$qnumber = 'p'.$i;

					if($i < 24)$part = 1;
					else if($i < 47)$part = 2;
					else if($i < 70)$part = 3;
					else if($i < 93)$part = 4;
					else if($i < 116)$part = 5;

					$m = $i - ($part - 1)*23;
					if(isset($_POST[$qnumber])){
						/// si la pregunta pertecene a los inversores
						if(in_array($i,$inversores)){
							$resul[$part]['suma'] += $inv[$_POST[$qnumber]];

						// si la pregunta pertence a las falacias
						}else if(array_key_exists($m,$lies[$part])){

							if($lies[$part][$m] == $_POST[$qnumber]){ 
								$resul['L'] += 1;
								if(!isset($resul[$part]['L']))$resul[$part]['L'] = 0;
								$resul[$part]['L'] += 1; 
							}

						//puntaje normal
						}else {		
							$resul[$part]['suma'] += $_POST[$qnumber];
						}
					}
				}

				//var_dump($resul);exit;

				App::import("Model","Resultado");
				$Resultado = new Resultado();
				$examid = ID_TEST_CONDUCTUAL;
				if($mini == "mini")$examid = ID_TEST_CONDUCTUAL_MINI;
				$tosave = array(
					'user_id'=> Credentials::get("__credentials.User.id"),
					'exam_id'=> $examid,
					"completed" => 1,
					"duration" => (time() - $_POST["time"]),
					'vars1'=>json_encode($resul ));
				$Resultado->save($tosave);
				$this->Ticket->deleteAll(["Ticket.user_id" => Credentials::get("__credentials.User.id") , "Ticket.exam_id" =>$examid ]);
				$this->mobile_noti( $examid);
				$this->_flash("Examen Completado","success");
				$this->redirect(array('controller'=>'exams','action'=>'user_main'));


			} 


		}

		$conditions = array();
		if($mini == "mini"){
			//$conditions = array("conditions" => array("Conductual.tid < " => 13));
				//echo "qqqqqqqqqqq";
			$conditions = array("conditions" => array("OR" => [ 
				"Conductual.type IN (1,3,4,5) AND Conductual.tid < 13 " , 
				"Conductual.type = 2 AND (Conductual.tid < 12 OR Conductual.tid = 14 )" 
				//"Conductual.type = 2 AND Conductual.tid = 14 " 
			]));

		}

		App::import("Model","Conductual");
		$this->pregunta = new Conductual();		
		$this->set('condus', $this->pregunta->find("all", $conditions) );


	}

	function seck(){
		if(!empty($_POST)){

			$ref = Query::squery('SELECT id,question,yes,no FROM eynseck');
			$lisresults = array();
			foreach($ref as $item){
				if(isset($_POST['p'.$item["eynseck"]['id']])) $lisresults[] = $item["eynseck"][$_POST['p'.$item["eynseck"]['id']]];
			}

			$values = array_count_values($lisresults);
			unset($values['']);
			//var_dump($values);exit;

			App::import("Model","Resultado");
			$Resultado = new Resultado();
			$tosave = array(
				'user_id'=> Credentials::get("__credentials.User.id"),
				'exam_id'=>ID_TEST_EYNSECK,
				"completed" => 1,
				"duration" => (time() - $_POST["time"]),
				'vars1'=>json_encode($values) );
			$Resultado->save($tosave);
			$this->Ticket->deleteAll(["Ticket.user_id" => Credentials::get("__credentials.User.id") , "Ticket.exam_id" => ID_TEST_EYNSECK ]);
			$this->mobile_noti( ID_TEST_EYNSECK );
			$this->_flash("Examen Completado","success");
			$this->redirect(array('controller'=>'exams','action'=>'user_main'));	
			
		}

		App::import("Model","Eynseck");
		$this->pregunta = new Eynseck();		
		$this->set('secks', $this->pregunta->find("all") );

	}

	function coeficiente(){

		if(!empty($_POST)){
			//hago la operacion para sacar el resultado
			//$ref = Query::squery('SELECT id,clave FROM clavesraven');
			$sumar = 0; $apreg = '';
			/*foreach($ref as $row){
				if($_POST["p".$row["clavesraven"]['id']] == $row["clavesraven"]['clave']) {
					$sumar += 1;
					//$apreg .= $row['id'].',';
				}
			}*/
			foreach($_POST as $key => $val){
				if(strpos($key,"p") === 0){
					$sumar += $val;
				}
			}

			App::import("Model","Resultado");
			$Resultado = new Resultado();
			$tosave = array(
				'user_id'=> Credentials::get("__credentials.User.id"),
				'exam_id'=>ID_TEST_COEFICIENTE,
				"completed" => 1,
				"duration" => (time() - $_POST["time"]),
				'vars1'=>json_encode(array("total" => $sumar)) );
			$Resultado->save($tosave);
			$this->Ticket->deleteAll(["Ticket.user_id" => Credentials::get("__credentials.User.id") , "Ticket.exam_id" => ID_TEST_COEFICIENTE ]);
			$this->mobile_noti( ID_TEST_COEFICIENTE );
			$this->_flash("Examen Completado","success");
			$this->redirect(array('controller'=>'exams','action'=>'user_main'));


		}


	}


	
	

}




?>
