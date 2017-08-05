<?php

namespace application\controllers;


use library\Controller;

//include (ROOT ."\library\controller.class.php\\");

/**
* 
*/
class MainController extends Controller
{
	
	public function template($viewName, $data=array())
	{
		# code...
		$view = $this->view('template');
		$view->bind('viewName', $viewName);
		$view->bind('data', $data);
	}
}

?>