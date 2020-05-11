<?php
error_reporting(0);

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	
	function action_index() //action which is called by default
	{
		
	}

	public function action_redirect($path) { //redirect to another page

		header("location:"."/".$path);
	 
	}


	public function setSession($sessionName, $sessionValue) {

		if(!empty($sessionName) && !empty($sessionValue)) {
		   $_SESSION[$sessionName] = $sessionValue;
		}
	}
 
	public function getSession($sessionName) {
 
	  if(!empty($sessionName)) {
		return $_SESSION[$sessionName];
	  }
	}
 
	public function unsetSession($sessionName) {
 
	   if(!empty($sessionName)) {
		unset($_SESSION[$sessionName]);
	   }
 
	}
 
	public function sanitize($string) { //protection

		return trim(htmlentities($string, ENT_QUOTES, 'UTF-8'));
	}	

}
