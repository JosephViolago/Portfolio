<?php
class Template {

	protected $variables = array();
	protected $_controller;
	protected $_action;

	function __construct($controller,$action) {
		$this->_controller = $controller;
		$this->_action = $action;
	}


	/** Set Variables **/
	function set($name,$value) {
		$this->variables[$name] = $value;
	}

	
	/** Display Template **/
	function render() {
		extract($this->variables);
		$dirViews = ROOT . DS . 'apps-mvc' . DS . 'views' . DS;

		if (file_exists($dirViews . $this->_controller . DS . 'header.php')) {
			include ($dirViews . $this->_controller . DS . 'header.php');
		} else {
			include ($dirViews . 'header.php');
		}
		
		include ($dirViews . $this->_controller . DS . $this->_action . '.php');		 
		
		if (file_exists($dirViews . $this->_controller . DS . 'footer.php')) {
			include ($dirViews . $this->_controller . DS . 'footer.php');
		} else {
			include ($dirViews . 'footer.php');
		}
	}

}