<?php
class Admin extends AppModel {
	var $useTable = "admins";
	var $name = 'Admin';
	/*
	var $validate = array(
		'username' => array(
		'alphaNumeric'=>array('rule'=>'alphaNumeric','required'=>true,'message'=>'Username can only contains letters'),
		'between' => array('rule' => array('between', 4, 10),'message' => 'Between 4 to 10 characters')),
		'password' => array('rule'=>array('alphaNumeric'),'required'=>true,'message'=>'Password for Login the system can only contains letters and numbers'),
		'user_id' => array('numeric')
	);
*/
	
	/*
	 * 
	 * 'email' => array(
        'rule' => array('email', true),
        'message' => 'Por favor indique una dirección de correo electrónico válida.'
    )
	 */
	function _validationRules(){
		$this->validate = array(
			'name' => array(
					'notempty'=>array('rule'=>array('notempty'),'message'=>__('Nombre no válido.',true))
					//'between' => array('rule' => array('between', 4, 20),'message' => __('Nombre debe tener entre 2 a 20 caracteres.',true))
			),
			'email' => array(
						'rule' => array('email', true),
						'message' => 'Email no vàlido.'
			),
				
			'username' => array(
				'notempty'=>array('rule'=>array('notempty'),'message'=>__('Usuario Invalido.',true)),
				'between' => array('rule' => array('between', 4, 20),'message' => __('Usuario debe estar entre  4 y 20 letras',true)),
				'isUnique' => array('rule' => array('isUnique'),'message' => __('Nombre de usuario ya  existe.',true))
			),
			'password' => array(
				'notempty'=>array('rule'=>array('notempty'),'message'=>__('Contraseña invàlida.',true))
			)
		);
	}
	
	
	function beforeSave(){
		//file_put_contents("/var/www/logs/adminer.log",json_encode($this->data['Login'])."\n",FILE_APPEND);
		if(isset($this->data['Admin']['password']) && !empty($this->data['Admin']['password'])){
			$this->data['Admin']['password'] = md5($this->data['Admin']['password']);
			//file_put_contents("/var/www/logs/adminer.log",$this->data['User']['password']."\n",FILE_APPEND);
		}
		return true;
	}
	
	function authenticate($data){

		$this->data = $data;
		$this->recursive = 0;
		$result = $this->find('first',
			array('conditions'=>
				array('Admin.username'=>$this->data['Admin']['username'],
				  'Admin.password'=>md5($this->data['Admin']['password']), "Admin.status" => 1
				)
			)
		);
		
		//var_dump($result);exit;

		if($result != false){
			$time = 3600;
			$this->id = $result["Admin"]["id"];

			$is_admin = true;
			//if(in_array(ROLE_ADMIN_ID,$result['Roles']))$is_admin = true;
			$result['is_admin'] = $is_admin;
			//$result['Login']["role_id"] = $result['Login']["role_id"];
			
			//var_dump($acl->perms);exit;
			Credentials::set('logged_in',1,$time);
			//Credentials::set('remember_me',$data['Login']['remember_me'],$time);
			Credentials::set('__credentials',$result,$time);

	

			return true;
		} else {
			
			return false;
		}
		
		
	}
	

	function logout(){
		Credentials::set('__credentials',false);
		Credentials::set('perms',false);
		Credentials::set('logged_in',false);
		Credentials::set('remember_me',false);
		//Credentials::set('last_activity',false);
	}

}


?>
