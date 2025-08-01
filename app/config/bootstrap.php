<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php
 *
 * This is an application wide file to load any function that is not used within a class
 * define. You can also use this to include or require any files in your application.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 * This is related to Ticket #470 (https://trac.cakephp.org/ticket/470)
 *
 * App::build(array(
 *     'plugins' => array('/full/path/to/plugins/', '/next/full/path/to/plugins/'),
 *     'models' =>  array('/full/path/to/models/', '/next/full/path/to/models/'),
 *     'views' => array('/full/path/to/views/', '/next/full/path/to/views/'),
 *     'controllers' => array('/full/path/to/controllers/', '/next/full/path/to/controllers/'),
 *     'datasources' => array('/full/path/to/datasources/', '/next/full/path/to/datasources/'),
 *     'behaviors' => array('/full/path/to/behaviors/', '/next/full/path/to/behaviors/'),
 *     'components' => array('/full/path/to/components/', '/next/full/path/to/components/'),
 *     'helpers' => array('/full/path/to/helpers/', '/next/full/path/to/helpers/'),
 *     'vendors' => array('/full/path/to/vendors/', '/next/full/path/to/vendors/'),
 *     'shells' => array('/full/path/to/shells/', '/next/full/path/to/shells/'),
 *     'locales' => array('/full/path/to/locale/', '/next/full/path/to/locale/')
 * ));
 *
 */

/**
 * As of 1.3, additional rules for the inflector are added below
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */


date_default_timezone_set('America/Lima');

define('ID_TEST_AUTOCONOCIMIENTO',1);
define('ID_TEST_PERSONALIDAD',1);
define('ID_TEST_VOCACIONAL',2);

define('ID_TEST_RAVEN',3);
define('ID_TEST_COEFICIENTE',3);

define('ID_TEST_COLORES',4);
define('ID_TEST_LABORAL',5);
define('ID_TEST_CONDUCTUAL',6);
define('ID_TEST_UMBVOCACIONAL',7);
define('ID_TEST_PEN_EYNSECK',8);
define('ID_TEST_EYNSECK',8);
define('ID_TEST_TEPETE',9);
define('ID_TEST_TEPETE_MINI',10);
define('ID_TEST_CONDUCTUAL_MINI',11);

define("C_CREMA",0);
define("C_AZUL",1);
define("C_VERDE",2);
define("C_ROJO",3);
define("C_AMARILLO",4);
define("C_MORADO",5);
define("C_MARRON",6);
define("C_NEGRO",7);
define("C_GRIS",8);
define("C_BLANCO",9);

define("TPT_NEGATIVO",0);
define("TPT_POSITIVO",1);

define("USER_ENABLED", 1);
define("USER_DISABLED", 0);

define("TPT_OPTIMO", 1);
define("TPT_BUENO", 2);
define("TPT_PRO", 3);
define("TPT_OBS", 4);
define("TPT_BAJO", 5);


define('G_MASCULINO',1);
define('G_FEMENINO',2);

define('CS_ALTO','alto');
define('CS_MEDIO','medio');
define('CS_BAJO','bajo');

define("CD_AUTONOMICA",1);
define("CD_EMOCIONAL",2);
define("CD_MOTOR",3);
define("CD_SOCIAL",4);
define("CD_COGNITIVO",5);
define("CD_L",6);

Inflector::rules('singular', array( 'uninflected' => array('.*l','.*f','.*k','.*d') , 
'irregular' => array("clavesraven" => "clavesraven","vocaciones" => "vocacion" , "secciones" => "seccion" ) ));

Inflector::rules('plural', array('uninflected' => array('.*l','.*f','.*k','.*d') , 
'irregular' => array("clavesraven" => "clavesraven","vocacion" => "vocaciones" , "seccion" => "secciones" ) ));

ini_set('include_path', implode(array( ini_get('include_path'), PATH_SEPARATOR, '/var/www/evalua/cake/libs/')));


?>
