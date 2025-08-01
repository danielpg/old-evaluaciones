<?php
class User extends AppModel {
	var $useTable = "users";
	var $name = 'User';
	var $order = "User.created DESC";
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
				
			/*'username' => array(
				'notempty'=>array('rule'=>array('notempty'),'message'=>__('Invalid Username.',true)),
				'between' => array('rule' => array('between', 4, 20),'message' => __('Username between  4-20 characters.',true)),
				'isUnique' => array('rule' => array('isUnique'),'message' => __('Username already exist.',true))
			),
			'password' => array(
				'notempty'=>array('rule'=>array('notempty'),'message'=>__('Invalid Password.',true))
			)*/
		);
	}
	
	
	function beforeSave(){
		//file_put_contents("/var/www/logs/adminer.log",json_encode($this->data['Login'])."\n",FILE_APPEND);
		if(isset($this->data['User']['password']) && !empty($this->data['User']['password'])){
			$this->data['User']['password'] = md5($this->data['User']['password']);
			//file_put_contents("/var/www/logs/adminer.log",$this->data['User']['password']."\n",FILE_APPEND);
		}
		return true;
	}
	
	function authenticate($data){

		$this->data = $data;
		$this->recursive = 0;
		$result = $this->find('first',
			array('conditions'=>
				array(
					'User.email'=>$this->data['User']['email']
					//'User.status'=> 1,
				)
			)
		);

		if($result != false && $result["User"]["status"] == 0){
			return "Usuario no habilitado";
		}
		
		if($result != false ){
			$time = 3600;
			$this->id = $result["User"]["id"];

			$is_admin = false;
			//if(in_array(ROLE_ADMIN_ID,$result['Roles']))$is_admin = true;
			$result['is_admin'] = $is_admin;
			//$result['Login']["role_id"] = $result['Login']["role_id"];
			
			//var_dump($acl->perms);exit;
			Credentials::set('logged_in',1,$time);
			//Credentials::set('remember_me',$data['Login']['remember_me'],$time);
			Credentials::set('__credentials',$result,$time);

	

			return true;
		} else {
			
			//return false;
			return "Correo Electronico incorrecto.";
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
