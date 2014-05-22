<?php

class Dispatcher {

	var $request;

	function __construct() {

		$this->request = new Request();

		if($this->checkUrl($this->request->url)){

			Router::parse($this->request->url, $this->request);

			$controller = $this->loadController();

			if(!in_array($this->request->action, array_diff(get_class_methods($controller),get_class_methods('Controller')))){

				$this->error('404');

			}

			call_user_func_array(array($controller, $this->request->action), $this->request->params);

			$controller->render($this->request->action);

		}else{

			$this->error('probleme');

		}

	}

	function loadController(){

		$name = ucfirst($this->request->controller).'Controller';

		$file = ROOT.DS.'controller'.DS.$name.'.php';

		if(file_exists($file)){

			require $file;

			return new $name($this->request);
		}
		else{

			$this->error('probleme');

		}

	}

	function checkUrl($url){

		return true;

	}

	function error($message){

		header("HTTP/1.0 404 not Found");

		$controller = new controller($this->request);

		$controller->render('/errors/404');

		die();
	}

}