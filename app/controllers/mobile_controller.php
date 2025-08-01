<?php
class MobileController extends AppController {

	var $name = 'Mobile';
	var $uses = array();

	function users(){
		$this->layout = false;
		$this->render = false;
		App::import("Model","User");
		$userobj = new User();
		$data = $userobj->find("all",array("limit"=> 30));
		die(json_encode($data));
	}

	function admin_login(){
		App::import("Model","Admin");
		$obj = new Admin();
		$found = $obj->find("first",["conditions" => [ "Admin.username" => $_POST["user"],  "Admin.password" => md5($_POST["pass"]) ] ]);
		if(empty($found)){
			die(json_encode(["status" => 0 , "message" => "Datos incorrectos."  ]));
		} else {
			if($found["Admin"]["status"] == 1){
				die(json_encode(["status" => 1 , "admin_id" => $found["Admin"]["id"] ,"name" => $found["Admin"]["name"]   ]));
			} else {
				die(json_encode(["status" => 0 , "message" => "Usuario no habilitado."  ]));
			}
		}
	}

	function resultados(){
		App::import("Model","Resultado");
		$resobj = new Resultado();
		$data = $resobj->find("all",array("limit"=> 30 , "fields" => array(
			"Resultado.exam_id","Resultado.vars1","Resultado.duration","Resultado.created","User.name","Exam.name")));
		die(json_encode($data));
	}

	function tickets( $id = null ){
		$tickets = [];
		$completed = [];
		App::import("Model","Ticket");
		$ticketobj = new Ticket();

		if(!empty($_POST)){
			
			$data = array();
			$user_id = (int)$_POST["user_id"];
			$ticketobj->deleteAll(array("Ticket.user_id" => $user_id));

			foreach($_POST as $key => $val){
				if(strpos($key,"ticket") !== false){
					list($dummy , $examid ) =  explode("_",$key);	
					if($val > 0){
						$data[] = array("Ticket" => array("exam_id" => (int)$examid , "user_id" => $user_id));
					}
				}
			}
			//var_dump($data);exit;

			$ticketobj->saveAll($data);
			//$this->_flash(__('Datos Guardados.', true));
			//$this->redirect(array('action' => 'index'));
			die(json_encode(["status" => "ok"]));	
		}



		App::import("Model","Resultado");
		$resobj = new Resultado();
		$res = $resobj->find("all",array("fields" => "Resultado.exam_id",  "conditions" => ["Resultado.user_id" => $id ] , "limit" => 30));
		if(!empty($res)){
			foreach($res as $item){
				$completed[$item["Resultado"]["exam_id"]] = 1;
			}
		}

		$ticketsres = $ticketobj->find("all",array("conditions" => ["Ticket.user_id" => $id ]));
		if(!empty($ticketsres)){
			foreach($ticketsres as $item){
				$tickets[$item["Ticket"]["exam_id"]] = 1;
			}
		}


		//var_dump($completed);
		App::import("Model","Exam");
		$examobj = new Exam();
		$exams = $examobj->find("list");
	
		$data = array();
		foreach($exams as $id => $name){
			$data[] = array("exam_id" => $id, "name" => $name, "ticket" => (isset($tickets[$id]) ? 1 : 0 ) , "completed" =>  (isset($completed[$id]) ? 1 : 0 )  );
		}
		die(json_encode($data));
	}

	function user_status(){
		App::import("Model","User");
		$userobj = new User();

	}

	function mobile_token(){

		//App::import("Model","Push");
		$push = new Push();
		
		$servicedata = '{
		  "type": "service_account",
		  "project_id": "andtis",
		  "private_key_id": "1b9984c",
		  "private_key": "-----BEGjOk8yVhg6ATE KEY-----\n",
		  "client_email": "andris@appspot.gserviceaccount.com",
		  "client_id": "110348",
		  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
		  "token_uri": "https://oauth2.googleapis.com/token",
		  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
		  "client_x509_cert_url": "httppot.gserviceaccount.com"
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
		//$jwt = JWT::encode($token, $key , 'RS256');
		$arr = array('alg' => 'RS256', 'typ' => 'JWT');
		$encoded_header = base64_encode( json_encode($arr) );
		$encoded_payload = base64_encode(  json_encode( $token ) );
		$header_payload = $encoded_header . '.' . $encoded_payload;
		$signature = '';
                openssl_sign($header_payload, $signature, $key, 'SHA256');
		$jwt = $header_payload . '.' . base64_encode($signature);

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
		//echo $json_response;exit;
		$tosave = ["Push" => ["vars1" => $json_response , "start_time" => time() ] ];
		$push->id = 1;
		$push->save($tosave);
		return $json_response;
	}



	function mobile_noti( $type = null){

		$title  =  "nuyevop usuario";
		$body   = "kddd es registrado.";
		$topic  = "users";
		$project= "andronotis";

		App::import("Model","Push");
		$push = new Push();
		$row = $push->read(null,1);

		$time = time();
		if( $row["Push"]["start_time"] + 3599 > $time ){
			$token = json_decode($row["Push"]["vars1"] , true );
		} else {
			//die("expired");
			$token = json_decode($this->mobile_token() ,  true);
		}

		if(true){
			$url = "https://fcm.googleapis.com/v1/projects/".$project."/messages:send";
			$regid = 'ftzYc';

			// https://firebase.google.com/docs/reference/fcm/rest/v1/projects.messages#Message

			$data = json_encode(
				[ "validate_only" =>  false,
				   "message"  =>
					 [ 
					   	"notification" =>  
							[
								"title" => $title,
								"body"  => $body , 
						//		"image"   => "www/image/pushw.png"
							],
						//"token" => $regid,
						"topic" => "users",
						"data" => [ "users" => "refresh" ]
					]	
			]);


/*
			$data = json_encode(
				[ "validate_only" =>  false,
				   "message"  =>
					 [ 
						"android" => [
							//"name"         => "test3",
						   	"notification" =>  
								[
									"title" => $title,
									"body"  => $body , 
							//		"image"   => "www/image/pushw.png"
									"icon" => "push",
									"color"        => "#e73439"
								],

						
						],	
						"data" => [ "users" => "refresh" ],
						"topic" => "users"
					]
			]);
*/


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

}
