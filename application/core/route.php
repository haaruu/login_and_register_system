<?php

class Route
{

	//this class determines which page is requested

	static function run()
	{
		$contrName = 'Home'; //this is default controller which works when we open an application
		$actName = 'index'; //deault action which creates view
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if ( !empty($routes[1]) ) //get controllers name
		{	
			$contrName = $routes[1];
		}
		
		if ( !empty($routes[2]) ) //get actions name
		{
			$actName = $routes[2];
		}

		$modName = 'Model_'.$contrName; //add prefikses
		$contrName = 'Controller_'.$contrName;
		$actName = 'action_'.$actName;

		$modFile = strtolower($modName).'.php'; //get model name
		$modPath = "application/models/".$modFile; //path to model file
		if(file_exists($modPath))
		{
			include "application/models/".$modFile;
		}

		$contrFile = strtolower($contrName).'.php'; //get controller file
		$contrPath = "application/controllers/".$contrFile; //get path to controller file
		if(file_exists($contrPath))
		{
			include "application/controllers/".$contrFile;
		} else { //if we don't have that controller, we'll be rediretced on 404 page
			Route::ErrorPage404();
		}
		
		$controller = new $contrName; //create controller
		$action = $actName;
		
		if(method_exists($controller, $action)) { //call action

			$controller->$action();
		} else {
			Route::ErrorPage404();
		}
	
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
