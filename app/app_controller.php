<?php
//if($_SERVER['SERVER_ADDR']=='192.168.1.60'){
if (version_compare(PHP_VERSION, '5.2.0', '<')) {
	require_once APP . "vendors/JSON.php";
	function json_encode($input){
		$json = new Services_JSON();
		return $json->encode($input);
	}
	
	function json_decode($input){
		$json = new Services_JSON();
		return $json->decode($input);
	}
}
//adsasd
App::import('Sanitize');
//    ./../cake/console/cake bake model all //view all
// cd ./../cake/console/cake // ./cake -app /var/www/evalua/app bake view



//Configure::write('debug',2);
class AppController extends Controller {
	var $helpers = array('Html','Form','Ajax','Javascript','Session');      
	var $components = array('RequestHandler',"Session",'Cookie');//
	var $menu_items;
	var $additional_menu_links = '';
	var $redirect_url = null;
	var $javascripts = array();
	//var $layout = "default2";
	public $perm_filters = array();
	private $perm_relations = array();
	private $exclude_actions = array();
	private $perm_custom_key = false;

    var $paginate = array(   'limit' => 50    );

	function beforeFilter(){
		//Registry::set('controller',$this);

		ClassRegistry::addObject('controller',$this);
		
		Credentials::session_connect($this->Session);//$this->Cookie);
		
		$new_params = array();
		$params = $this->params['url'];
		if(!empty($this->params['form']))$params = $this->params['form']; 
		unset($params['url']);
		foreach($params as $key => $value){
			if(is_array($value))continue;
			$new_params[str_replace('amp;','',$key)] = $value; 			
		}
		$this->params['get_params'] =  $new_params;

		$this->set('title_for_layout', $this->params['controller']."/".$this->params['action']);

		$tmp = $this->params["url"];
		unset($tmp["url"]);
		$this->params["url_filtered"] = $tmp;
		
		App::import('Model','Query');

		Query::singleton();
		Query::squery('select 1');


		//if($this->RequestHandler->isAjax())Configure::write('debug',0);
		

		//$this->load_restrictions();

		if($this->params['controller'] != 'mobile'){
			if( Credentials::hasCredentials()==false){
				if($this->params['controller'] != 'authentication'){
					$this->redirect(array('controller'=>'authentication','action'=>'register'));
					exit;
				}
			}
		}

	}


	function _deny_access_message(){
		if($this->RequestHandler->isAjax()){
			$this->renderJson(array("error"=>1,"validation_errors"=>__('You don\'t have permissions to perform that action', true)));	
		} else {
			$this->Session->setFlash(__('You don\'t have permissions to perform that action', true),'default',array('class'=>'box_warning'));
			//var_dump($this->referer());exit;
			//$this->redirect($this->referer());
			$this->redirect(array('controller'=>'pages','action'=>'empty'));			
		}
		exit;		
	}

	function load_restrictions(){
		$definiciones = array();

		if(Credentials::hasCredentials()){
				$role = Credentials::get("__credentials.Login.role_id");
				if($role == 1){ // permiso para todo

				}elseif($role == 2){ //supervisor

				}elseif($role == 3){ //solo consulta
					if(in_array($this->params['controller'],array('organos','campos','logins'))){
						$this->flash("Acceso denegado.","error");					
						$this->redirect(array('controller'=>'registros','action'=>'index'));
						exit;
					}

					if(in_array($this->params['action'],array('edit','delete','add'))){
						$this->flash("Acceso denegado.","error");					
						$this->redirect(array('controller'=>'registros','action'=>'index'));
						exit;
					}

				}elseif($role == 4){ //ingresa registros
					if(in_array($this->params['controller'],array('organos','campos','logins'))){
						$this->flash("Acceso denegado.","error");					
						$this->redirect(array('controller'=>'registros','action'=>'index'));
						exit;
					}

					if(in_array($this->params['action'],array('edit','delete','add'))){
						$this->flash("Acceso denegado.","error");					
						$this->redirect(array('controller'=>'registros','action'=>'index'));
						exit;
					}
				}

		}
	}

	function draw_errors(){
		$output = '';
		$args = func_get_args();
		foreach($args as $model){
			$output .= $model->draw_errors(array('header'=>false));
		}
		if(!empty($output)){
			return '<div class="form-error-title">'.__('The following errors happened',true).' : </div>'.$output;
		}		
		return '';
	}
	    
    function get_errors($in){
    	$output = '';
    	foreach($in as $errors){
			if(is_array($errors)){
				foreach($errors as $sub_error){
					$output .= '<div class="error-message">'.$sub_error."</div>";
				}
			} else { 
				$output .= '<div class="error-message">'.$errors."</div>";
			}
		}
		return $output;
    }
    
    function get_fields($file){
		$fields = array();
		$content = file_get_contents($file);
		$content = str_replace("\r",'',$content);
		$content = explode("\n",$content);
		foreach($content as $line){
			if( strpos($line,'=') !== false ){
				$temp = explode('=',$line);
				$fields[trim($temp[0])] = trim($temp[1]);
			}else {
				if(!empty($line))$fields[trim($line)] = '';
			}
		}
		return $fields;
	}
    
    /* function to set multiple flash messages.
     * available types: box_notice,box_error,box_warning,box_success
     * how to use:
     * $this->_flash(__('Hello World',true));
     * $this->_flash(__('Hello World',true),'box_error');
     */

	function _flash($message,$type='notice') {
		if(strpos($message,"could not be saved") !== false ){
			$message = "No se pudieron guardar los datos.";
			$type = "error";
		}elseif(strpos($message,"has been saved") !== false ){
			//$message = "El formulario ha sido guardado.";
			$type = "success";
		}elseif(strpos($message,"was not deleted") !== false ){
			$message = "No se pudo eliminar el registro.";
			$type = "error";
		}elseif(strpos($message,"deleted") !== false ){
			$message = "Se elimino el registro.";
			$type = "success";
		}

    	$messages = (array)$this->Session->read('Message.multiFlash');
        $messages[] = array('message'=>$message,  'class'=>$type );
        $this->Session->write('Message.multiFlash', $messages);
    }

	function renderJson($str){
		Configure::write('debug',0);
		$this->set('string_content',json_encode($str));
		$this->render('/elements/empty',null);
	}
	
	function renderAjax($str){
		Configure::write('debug',0);
		$this->set('string_content',$str);
		$this->render('/elements/empty',null);		
	}
    
    function redirect($url, $status = null, $exit = true) {
		if(defined('SIMPLE_TEST')){
			$this->redirect_url = $url;
			$this->autoRender = false;
			return;
		}    	
		//$url['language'] = CURRENT_LANG;
		parent::redirect($url,$status,$exit);
	}

	function log($msg,$type = LOG_ERROR,$file = false,$line = false){
		if($file !== false && $line !== false)
			$msg = $msg.' in ['.$line.', line '.$line.']';
		
		parent::log($msg,$type);
	}


}


class Credentials{
	static $session;
	
	static $session_obj;
	
	/*function can($action, $__set_permissions_hack = false)
    {
    	static $_permissions;
    	//var_dump($_permissions,"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXxxxx");
    	if($__set_permissions_hack != false){
    		$_permissions = $__set_permissions_hack;
    		return true;
    	} 

		if(empty($_permissions)){
			$_permissions = Credentials::get("__perms");
		}    	

    	if(@array_key_exists('admin_access', $_permissions)) return true;
    	if(@array_key_exists($action, $_permissions)) return true;
        if( @$_SESSION['__credentials']['is_admin'] == 1 ) return true;
        //if(!isset($_SESSION['__permissions'])) return false;
        return false;
    }
    */
    function can($key){
    	if( Credentials::get('__credentials.Login.role_id') ==1)return true;
    	
    	switch($key){
    		case "testdata":
    			//company,manage
    			//developer
    			//admin.manage
    			//
    			//
    			if( Credentials::get('__credentials.Login.role_id') ==1){
    				return true;
    			}
    			
    			break;
    		default:

    			
    	}
    	
    	return false;
    	
    	
    	
    }
    
   /*	function canDo($action,$controller = null, $__set_permissions_hack = false)
    {
    	static $_permission;
    	if($__set_permissions_hack != false){
    		$_permission = $__set_permissions_hack;
    		return true;
    	}
    	//var_Dump('---------',$_permission,$action);
    	
    	if(Credentials::get('__credentials.is_admin'))return true;

		if($controller !== null){
			$uperms = Credentials::getPerms();
			if(isset($uperms[$controller])){
				if($uperms[$controller]['value'] >= $action)return true;
			}
			if(strpos($controller,'/')!==false){
				$parts = explode('/',$controller);
				if(isset($uperms[$parts[0]])){
					if($uperms[$controller]['value'] >= $action)return true;
				}
			}
			return false;		
		}

		
    	
    	if($_permission == 0)return false;
    	if($_permission >= $action)return true;
        return false;
    }*/
    
    
    function setPerms($value,$expire = null){
    	return Credentials::$session->write('perms',gzdeflate(serialize($value),5),$expire);	
    }
    
    function getPerms(){
    	return unserialize(gzinflate(Credentials::$session->read('perms')));
    }
    
    function session_connect($session){
    	//var_dump($session);
     	Credentials::$session = $session;
    }
    
      function setSessionObject($session_obj){
     	Credentials::$session_obj = $session_obj;
    }
    
    function setCredentials($data){
    	$_SESSION[$data];
    }
    
    function set($field,$value,$expire = null){
    	return Credentials::$session->write($field,$value,$expire);
	}
    
    function get($field){
    	return Credentials::$session->read($field);
	}
	
	function hasCredentials(){
		if(empty(Credentials::$session))return false;
		//return false;
		$value = Credentials::$session->read('logged_in');
		if(empty($value))
			return false;
		
	/*	$now = time();
		$last = Credentials::$session->read('last_activity');
		if(Credentials::get('remember_me') && (($now-$last) > LOGIN_TIMEOUT_RM)){
			return false;
		} else if(($now-$last) > LOGIN_TIMEOUT){
			return false;
		}*/
		/*
		if(!Credentials::get('remember_me')){
			Credentials::set('perms',$acl->perms,$time);
			Credentials::set('logged_in',1,$time);
			Credentials::set('__credentials',$result,$time);
			Credentials::set('last_activity',time(),$time);
		}
*/
		return true;
	}
}

function dev_dump($var){
	ob_start();
	var_dump($var);
	$c = ob_get_contents();
	ob_end_clean();
	return $c;
}

function makeRequest($url, $params = false, $ch=null,$useragent = false,$post = false, $header = array()) {
		if (!$ch) {
		  $ch = curl_init();
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION , 1);
		if($post){
			curl_setopt($ch, CURLOPT_POST, 1);
		} else {
			curl_setopt($ch, CURLOPT_POST, 0);
		}	

		if($params !== false){
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, null, '&'));
		}

		//curl_setopt($ch, CURLOPT_POSTFIELDS, $cadenaparametros);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		if($useragent){
			//$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
			//$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
			$header[0] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
			//$header[] = "Accept-Encoding: gzip, deflate";
			//$header[] = "Accept-Language: es-es,es;q=0.8,en-us;q=0.5,en;q=0.3";
			$header[] = "Accept-Language: en-us,en;q=0.5";
			$header[] = "Cache-Control: max-age=0";
			$header[] = "Connection: keep-alive";
			$header[] = "Keep-Alive: 300";
			$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
			
			//$header[] = "Pragma: "; // browsers keep this blank. 
			//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1");
			//curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');

			curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
			curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
		}

		if(!empty($header)){
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		}

		//curl_setopt($ch, CURLOPT_HEADER, true);

		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_URL,$url);  
		$response = curl_exec($ch);
		//$info = curl_getinfo($ch);		
		//echo 'http_code ' . $info['http_code'] ; 
		//echo 'redirect_count ' . $info['redirect_count'] ;

		//echo $url."<br>";
		//echo html_dump($response);
		//list($tmphead,$response) = explode("\r\n\r\n",$response);

		if(curl_errno($ch)){
			//echo 'Curl error: '.curl_error($ch).";URL:".$url;
			if(function_exists("error_extraction_log")){
				error_extraction_log(null,'Curl error: '.curl_error($ch).";URL:".$url);
			}
		}
		curl_close($ch);
		return $response;
}	



function tpt_diag($seccion_id, $total){
	$escala = array(
	1 => [TPT_OPTIMO => [ 0,1], TPT_BUENO => [2,3],TPT_PRO => [4,5], TPT_OBS => [6,6],TPT_BAJO => [7,30] ],
	2 => [TPT_OPTIMO => [ 0,5], TPT_BUENO => [6,6],TPT_PRO => [7,8], TPT_OBS => [9,10],TPT_BAJO => [11,30] ],
	3 => [TPT_OPTIMO => [ 0,4], TPT_BUENO => [5,6],TPT_PRO => [7,8], TPT_OBS => [9,10],TPT_BAJO => [11,30] ],
	4 => [TPT_OPTIMO => [ 23,30], TPT_BUENO => [21,22],TPT_PRO => [19,20], TPT_OBS => [17,18],TPT_BAJO => [0,16] ],
	5 => [TPT_OPTIMO => [ 25,30], TPT_BUENO => [23,24],TPT_PRO => [21,22], TPT_OBS => [19,20],TPT_BAJO => [0,18] ],
	6 => [TPT_OPTIMO => [ 22,30], TPT_BUENO => [20,21],TPT_PRO => [18,19], TPT_OBS => [16,17],TPT_BAJO => [0,15] ],
	7 => [TPT_OPTIMO => [ 21,30], TPT_BUENO => [19,20],TPT_PRO => [17,18], TPT_OBS => [14,16],TPT_BAJO => [0,13] ],
	8 => [TPT_OPTIMO => [ 27,30], TPT_BUENO => [24,26],TPT_PRO => [22,23], TPT_OBS => [18,21],TPT_BAJO => [0,17] ],
	9 => [TPT_OPTIMO => [ 25,30], TPT_BUENO => [23,24],TPT_PRO => [21,22], TPT_OBS => [19,20],TPT_BAJO => [0,18] ],
	10 => [TPT_OPTIMO => [ 24,30], TPT_BUENO => [22,23],TPT_PRO => [20,21], TPT_OBS => [17,19],TPT_BAJO => [0,16] ],
	11 => [TPT_OPTIMO => [ 26,30], TPT_BUENO => [24,25],TPT_PRO => [22,23], TPT_OBS => [19,21],TPT_BAJO => [0,18] ],
	12 => [TPT_OPTIMO => [ 27,30], TPT_BUENO => [26,26],TPT_PRO => [24,25], TPT_OBS => [22,23],TPT_BAJO => [0,21] ],
	13 => [TPT_OPTIMO => [ 27,30], TPT_BUENO => [25,26],TPT_PRO => [22,24], TPT_OBS => [20,21],TPT_BAJO => [0,19] ],
	14 => [TPT_OPTIMO => [ 23,30], TPT_BUENO => [21,22],TPT_PRO => [20,20], TPT_OBS => [17,19],TPT_BAJO => [0,16] ],
	15 => [TPT_OPTIMO => [ 27,30], TPT_BUENO => [25,26],TPT_PRO => [24,24], TPT_OBS => [21,23],TPT_BAJO => [0,20] ],
	16 => [TPT_OPTIMO => [ 18,30], TPT_BUENO => [16,17],TPT_PRO => [14,15], TPT_OBS => [12,13],TPT_BAJO => [0,11] ]
	);

	$def[TPT_OPTIMO] = "Optimo";
	$def[TPT_BUENO] = "Bueno";
	$def[TPT_PRO] = "Promedio";
	$def[TPT_OBS] = "Observable";
	$def[TPT_BAJO] = "Bajo";


	foreach($escala[$seccion_id] as $diag => $rango){
		if($total >= $rango[0] && $total <= $rango[1]){
			return $def[$diag];
		}
	}
	return $def[TPT_BAJO];
	

}


function cd_mini_diag($seccion_id, $total){
	// +10 por siacaso se sale de la escala
	$escala = array(
	CD_AUTONOMICA  => [TPT_OPTIMO => [ 17,18 + 10], TPT_BUENO => [15,16],TPT_PRO => [13,14], TPT_OBS => [10,12],TPT_BAJO => [7,9] ],
	CD_EMOCIONAL   => [TPT_OPTIMO => [ 21,22 + 10], TPT_BUENO => [19,20],TPT_PRO => [17,18], TPT_OBS => [15,16],TPT_BAJO => [12,14] ],
	CD_MOTOR       => [TPT_OPTIMO => [ 17,18 + 10], TPT_BUENO => [16,16],TPT_PRO => [14,15], TPT_OBS => [10,13],TPT_BAJO => [8,9] ],
	CD_SOCIAL      => [TPT_OPTIMO => [ 23,24 + 10], TPT_BUENO => [21,22],TPT_PRO => [19,20], TPT_OBS => [17,18],TPT_BAJO => [15,16] ],
	CD_COGNITIVO   => [TPT_OPTIMO => [ 23,24 + 10], TPT_BUENO => [21,22],TPT_PRO => [20,20], TPT_OBS => [18,19],TPT_BAJO => [16,17] ],
	CD_L           => [TPT_OPTIMO => [ 4,4 + 10], TPT_BUENO => [3,3],TPT_PRO => [2,2], TPT_OBS => [1,1],TPT_BAJO => [0,0] ]
	);

	$def[TPT_OPTIMO] = "Muy Alto";
	$def[TPT_BUENO] = "Alto";
	$def[TPT_PRO] = "Medio";
	$def[TPT_OBS] = "Bajo";
	$def[TPT_BAJO] = "Muy Bajo";


	foreach($escala[$seccion_id] as $diag => $rango){
		if($total >= $rango[0] && $total <= $rango[1]){
			return $def[$diag];
		}
	}
	return $def[TPT_BAJO];

}

function say_conductual($q){
	$names = array(
		CD_AUTONOMICA => "Autonòmica",
		CD_EMOCIONAL => "Emocional",
		CD_MOTOR => "Motora",
		CD_SOCIAL => "Social",
		CD_COGNITIVO => "Cognitiva",
		CD_L => "L",
		"L" => "L" ,

	);
	return $names[$q];
		
}

?>
