<?php

class Controller_404 extends Controller
{
	
	function action_index() //creates 404 page view
	{
		$this->view->createView('404View.php');
	}

}
