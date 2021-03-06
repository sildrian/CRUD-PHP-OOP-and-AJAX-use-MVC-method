<?php

namespace library;

class View{

public $viewName = NULL;
public $isRender = FALSE;
public $data = array();


public function __construct($view){
	$this->viewName = $view;
} 


public function bind($name, $value=''){
	$this->data[$name] = $value;
}


public function render(){
	$this->isRender = TRUE;
	extract($this->data);
	$view = ROOT .'\application\views\\' .$this->viewName. ".view.php";

	//var_dump($view);

	if($view){
		require_once $view;
	}else{
		echo "view not found!";
	}
}


public function __destruct(){
	if(!$this->isRender) $this->render();
}


}

?>