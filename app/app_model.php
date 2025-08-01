<?php
class AppModel extends Model {

	var $render_configs = array();
	var $recursive = 0;

	var $model_custom_errors = array();
	//This will look for $value in the validation_errors.po file
	/*function invalidate($field, $value = true) {
		//return parent::invalidate($field, __d('validation_errors', $value, true));
		return parent::invalidate($field, __($value, true));
	}*/

	/*function __construct($id = false, $table = null, $ds = null) {
        if (Registry::get('installation_process')) {
            // Get saved company/database name
            $db_config = Registry::get('new_db_config');
            $dbName = 'new_config';
            // Add new config to registry
            ConnectionManager::create($dbName,  $db_config);
            // Point model to new config
            $this->useDbConfig = $dbName;
        }
       // $this->_validationRules();
        parent::__construct($id, $table, $ds);
    } */
    
		/*
	Rename the random string of a file:
	file.xdxdxdxd.php => file.hgrt4545.php
	*/
	
	function rename_random_part($name){
		if(empty($name))return '';
		$parts = explode('.',$name);
		$extension = array_pop($parts);
		$random = array_pop($parts);
		$parts[] = random_string(12);
		$parts[] = $extension;
		return implode('.',$parts);
	}

	
    protected function _validationRules() {
        //implemented on child classes
    }
   

    function validates($options = array()){
    	$this->_validationRules();
    	$this->_load_messages_rules();
    	$return = parent::validates($options);
    	$this->afterValidate();
    	
    	if(!empty($this->model_custom_errors)){
    		if(!is_array($this->validationErrors)) $this->validationErrors = array();
    		foreach($this->model_custom_errors as $key => $value){
    			if(isset($this->validationErrors[$key])){
    				$this->validationErrors[$key] .= "\n".$this->model_custom_errors;
					unset($this->model_custom_errors[$key]);									    				
    			}
    		}
    		$this->validationErrors = array_merge($this->validationErrors,$this->model_custom_errors);
    	}
    	
    	if(!empty($this->validationErrors))return false;
    	return $return;
    }
    
	function invalidate($field, $value = true) {
		if (!is_array($this->model_custom_errors)) {
			$this->model_custom_errors = array();
		}
		if(isset($this->model_custom_errors[$field])){
			$this->model_custom_errors[$field] .= "\n".$value; 
		} else {
			$this->model_custom_errors[$field] = $value;
		}
	}    
    
    function afterValidate(){
    	return true;
    }
    
    function draw_errors($options = array()){
    	$options = array_merge(array('header'=>true,'extract'=>true),$options);
    	$output = '';
    	$errors = $this->validationErrors;
    	if(empty($errors)) return '';
    	
		if($options['header']){
			$output = '<div class="form-error-title">Ocurrieron los siguientes errores : </div>';
		}
		
		if($options['extract']){
			$this->validationErrors = false;
		}
		
		$output .= $this->extract_errors_array($errors);
		$output = str_replace("\n",'<br />',$output);
    	return $output;
    }
    
    function getError($key){
		if(isset($this->validationErrors[$key])){
			return $this->validationErrors[$key];
    	}
    }
    
    function extract_errors_array($in){
    	$output = '';
    	foreach($in as $errors){
			if(is_array($errors)){
				foreach($errors as $sub_error){
					$output .= '<div class="">'.$sub_error."</div>";
				}
			} else { 
				$output .= '<div class="">'.$errors."</div>";
			}
		}
		return $output;
    }  
    
    function _load_messages_rules(){
		$this->message_rules = array(
		   	'inlist' => __('Invalid',true),
	    	'url' => __('Invalid URL',true),
	    	'range' =>__('Invalid',true),
	    	'numeric' => __('Must be numeric',true),
	    	'money' => __('Invalid number',true),
	    	'maxlength' => __('Must be less than %i characters',true),
	    	'minlength' => __('Must be at least %i characters',true),
	    	'ip' => __('Invalid',true),
	    	'extension' => __('Invalid extension',true),
	    	'email' => __('Invalid email',true),
	    	'decimal' => __('Invalid decimal',true),
	    	'time' => __('Invalid time',true),
	    	'date' => __('Invalid date',true),
	    	'custom' => __('Invalid value',true),
	    	//'comparison' => TODO
	    	'cc' => __('Invalid Credit Card number',true),
	    	'between' => __('Must be between %i and %i characters',true),
	    	'alphanumeric' => __('Letters and numbers only',true),
	    	'notempty' => __('Cannot be empty',true)
    	);
    }  

    function message_for_rule($rule,$params = false){
    	if(isset($this->message_rules[$rule])){
    		if($params !== false && !empty($params)){
    			if(is_array($params)){
    				if(count($params) == 2){
    					$params = array_values($params);
    					return sprintf($this->message_rules[$rule],$params[0],$params[1]);
    				}	else {
    					$params = array_values($params);
    					return sprintf($this->message_rules[$rule],$params[0]);
    				}
    			}
    		}
    		return $this->message_rules[$rule];
    	} else {
    		return __('Invalid',true);
    	}
    } 
    
	function set_rules($rules){
		foreach($rules as $name => $rule){
			if(is_array($rule[0])){
				foreach($rule as $sub_rule){
					$params = $sub_rule;
					array_shift($params);
					$this->validate[$name][] = array('rule'=> $sub_rule,'message'=>$this->message_for_rule($sub_rule[0],$params));
				}
			} else {
				$params = $rule;
				array_shift($params);				
				$this->validate[$name][] = array('rule'=> $rule,'message'=>$this->message_for_rule($rule[0],$params));
			}
		}
	}
	    
	function paginate_query($query,$settings){
		$controller = ClassRegistry::getObject('controller');


		$limit = $settings['limit'];
	 	$count = $settings['total'];//total

	 	$page = 1;
	 	if(isset($controller->params['named']['page'])){
	 		$page = $controller->params['named']['page'];
	 	}	
	 		
	 	$options = $controller->params['named'];
	 	$options['limit'] = $limit;
	 	$sort_query = array();
	 	
	 	if(isset($controller->params['named']['sort'])){
	 		$sort_query[] = ' '.$controller->params['named']['sort'].' '.$controller->params['named']['direction'];
	 		$options['order'][$this->name.$controller->params['named']['sort']] = $controller->params['named']['direction'];
	 	}
	 	
	 	if(isset($settings['order'])){
	 		$sort_query[] = $settings['order'];
	 	}
	 	
		$pageCount = intval(ceil($count / $limit));

		if ($page === 'last' || $page >= $pageCount) {
			$options['page'] = $page = $pageCount;
		} 
		if (intval($page) < 1) {
			$options['page'] = $page = 1;
		}
	
		$start = ($page - 1) * $limit; 

		$db= new DATABASE_CONFIG();
		$driver = $db->default['driver'];
		if($driver=='mysql' || $driver=='mysql_ex'){
			$limit_query = ' LIMIT ' . $start . ',' . $limit;
		}else {
			$limit_query = call_user_func_array('Dbo'.$driver.'::limit', array($start,$limit));			
		}
		
		if(count($sort_query)>0){
			$sort_query = ' ORDER BY '.implode(',',$sort_query);	
		} else {
			$sort_query = '';
		}

	 	$results = $this->query($query.$sort_query.$limit_query);
		
		$paging = array(
			'page'		=> $page,
			'current'	=> count($results),
			'count'		=> $count,
			'prevPage'	=> ($page > 1),
			'nextPage'	=> ($count > ($page * $limit)),
			'pageCount'	=> $pageCount,
			'defaults'	=> array('limit' => $limit, 'step' => 1),
			'options'	=> $options
		);
		
		$controller->params['paging'][$this->name] = $paging;	 	
		if (!in_array('Paginator', $controller->helpers) && !array_key_exists('Paginator', $controller->helpers)) {
			$controller->helpers[] = 'Paginator';
		}	
		return  $results;
	}

   function file_checktype($data){
        $data = array_shift($data);

		$tmp = explode(".",$data['name']);
		$ext = array_pop($tmp);

        $blacklist = array('php');
        if(in_array($ext , $blacklist)){
            return false;
        }
        return true;
    }

	function file_notempty($data,$field){
		//var_dump($this->data[$this->name]);
		if(!isset($this->data[$this->name][$field])){
			return false;
		} else {

			if(empty($this->data[$this->name][$field]["size"])){
				return false;
			}
		}
		return true;
	}

	function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
		$parameters = compact('conditions');
		$this->recursive = $recursive;
		$count = $this->find('count', array_merge($parameters, $extra));
		if (isset($extra['group'])) {
		    $count = $this->getAffectedRows();
		}
		return $count;
	}
	
	function afterSave($created = false){
		return true;
	}
	
	function afterDelete(){
		return true;
	}
	
	function unbindModelAll()
  	{
		$unbind = array();
		foreach ($this->belongsTo as $model=>$info){
		 $unbind['belongsTo'][] = $model;
		}
		foreach ($this->hasOne as $model=>$info)		{
		 $unbind['hasOne'][] = $model;
		}
		foreach ($this->hasMany as $model=>$info)		{
		 $unbind['hasMany'][] = $model;
		}
		foreach ($this->hasAndBelongsToMany as $model=>$info)		{
		 $unbind['hasAndBelongsToMany'][] = $model;
		}
		parent::unbindModel($unbind);
	} 


	
}



?>
