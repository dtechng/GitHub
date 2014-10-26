<?php namespace core;
/*
 * config - an example for setting up system settings
 * When you are done editing, rename this file to 'config.php'
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @author Edwin Hoksberg - info@edwinhoksberg.nl
 * @version 2.1
 * @date June 27, 2014
 */
class Config {

	public function __construct() {

		//turn on output buffering
		ob_start();

		//site address
		define('DIR', 'http://exolvetechnologies.com/eagleeye/');

		//set default controller and method for legacy calls
		define('DEFAULT_CONTROLLER', 'home');
		define('DEFAULT_METHOD' , 'index');

		//set a default language
		define('LANGUAGE_CODE', 'en');

		//database details ONLY NEEDED IF USING A DATABASE
		define('DB_TYPE', 'mysql');
		define('DB_HOST', '127.0.0.1');
		define('DB_NAME', 'exolvete_eagle');
		define('DB_USER', 'exolvete_gcode');
		define('DB_PASS', 'pa55w0rd');
		define('PREFIX', 'smvc_');

		//set prefix for sessions
		define('SESSION_PREFIX', 'eagleeye');

		//optionall create a constant for the name of the site
		define('SITETITLE', 'Eagle Eye Reports');

		//turn on custom error handling
		set_exception_handler('core\logger::exception_handler');
		set_error_handler('core\logger::error_handler');

		//set timezone
		date_default_timezone_set('Africa/Lagos');

		//start sessions
		\helpers\session::init();

		//set the default template
		define('TEMPLATE', 'default');
		// \helpers\session::set('template', 'default');

		//base path for resources
		define('BASEPATH', \helpers\url::get_template_path());

		define('DS',DIRECTORY_SEPARATOR);
	


		//UPLOADS DIRECTORY
		define('UPLOAD_DIR', '../app/templates/default/gallery/');
	}

}
