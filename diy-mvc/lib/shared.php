<?php

/*	##### Developer Mode ####	*/
function devMode() {
	if (DEVELOPMENT_ENVIRONMENT == true) {
		error_reporting(E_ALL);
		ini_set('display_errors','On');
	} else {
		error_reporting(E_ALL);
		ini_set('display_errors','Off');
		ini_set('log_errors', 'On');
		ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
	}
}


/*	#### Anti-Injection Cleanup ####	*/
function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function tidyMagicQuotes() {
	if ( get_magic_quotes_gpc() ) {
		$_GET    = stripSlashesDeep($_GET   );
		$_POST   = stripSlashesDeep($_POST  );
		$_COOKIE = stripSlashesDeep($_COOKIE);
	}
}

function tidyRegGlobals() {
	if (ini_get('register_globals')) {
		$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
		foreach ($array as $value) {
			foreach ($GLOBALS[$value] as $key => $var) {
				if ($var === $GLOBALS[$key]) { unset($GLOBALS[$key]); }
			}
		}
	}
}


/*	#### URL Processing	####	*/
function callHook() {
	global $url;

	$urlArray = array();
	$urlArray = explode("/",$url);

	$controller = $urlArray[0];
	array_shift($urlArray);
	$action = $urlArray[0];
	array_shift($urlArray);
	$queryString = $urlArray;

	$controllerName = $controller;
	$model = rtrim($controller, 's');
	$controller = ucfirst($controller) . 'Ctrl';
	
//	echo $controller.'</br></br>' . $model.'</br>' . $controllerName.'</br>' . 
//			$action.'</br>';																				// ### DEBUG ###
	$dispatch = new $controller($model,$controllerName,$action);

	if ((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch,$action),$queryString);
	} else {
		/* Error */
	}
}


/*	#### Load Classes	####	*/
function __autoload($className) {
	$lwrClass = strtolower($className);
//	$baseClass = rtrim($lwrClass, 'sctrl');			// XX DEPRECATED XX: replaced by L81
	$baseClass = preg_replace ( "/sctrl/", '', $lwrClass);
//	echo '$className: ' . $className . "</br>";									// ### DEBUG ###
//	echo '$lwrClass: ' . $lwrClass . "</br>";										// ### DEBUG ###
//	echo '$baseClass: ' . $baseClass . "</br>";									// ### DEBUG ###
	

/*		XXXX DEPRECATED: replaced by L101-L120 XXXX		**
	$fileClass = "ROOT . DS . 'lib' . DS . $lwrClass . '.class.php'";
	$dirApps = "ROOT . DS . 'apps-mvc' . DS";

	if (file_exists($fileClass)) {
			echo "lib Classes Loaded.";
			require_once($fileClass);
	} elseif (file_exists($dirApps . 'controllers' . DS . $lwrClass . 'ctrl.php')) {
			echo "apps-mvc_controllers Classes Loaded.";
			require_once($dirApps . 'controllers' . DS . $lwrClass . 'ctrl.php');
	} elseif (file_exists($dirApps . 'models' . DS . $lwrClass . '.php')) {
			echo "apps-mvc_models Classes Loaded.";
			require_once($dirApps . 'models' . DS . $lwrClass . '.php');
	} else {
			// Error
			echo "WARNING: No classes loaded!";
	}
**		XXXX DEPRECATED: replaced by L101-L120 XXXX		*/
	
	$classLib = ROOT . DS . 'lib' . DS . $baseClass . '.class.php';
	$dirApp = ROOT . DS . 'apps-mvc' . DS;
	$classCtrl = $dirApp . "controllers" . DS . $lwrClass . '.php';
	$classModel = $dirApp . 'models' . DS . $baseClass . '.php';
	
	$classes = array ($classLib, $classCtrl, $classModel);
//	echo $classes[0] . "</br>" . $classes[1] . "</br>" . $classes[2] . "</br></br>";
																																// ### DEBUG ###
	$j = 0;
	for ($i = 0; $i < 3; $i++){
//		echo '$i = [' . $i . "] </br>";														// ### DEBUG ###
		if ( file_exists($classes[$i]) ){
//			echo "CLASS LOADED: " . $classes[$i] . "</br>";					// ### DEBUG ###
			require_once($classes[$i]);
			$j += 1;
		} 
//		else { echo "NOT LOADED: " . $classes[$i] . "</br>"; }		// ### DEBUG ###
	}
//	echo '$j = [' . $j . "] </br>";															// ### DEBUG ###
//	echo "</br> *** End of FOR *** </br>";											// ### DEBUG ###
}


/*	#### DO ALL ABOVE	####	*/
devMode();
tidyMagicQuotes();
tidyRegGlobals();
callHook();