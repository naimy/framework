<?php

class Controller {

	public $request;

	private $vars 			= array();

	public $ressourcesCss 	= array();

	public $ressourcesJs 	= array();

	public $layout 			= 'default';

	private $rendered 		= false;


	function __construct($request){

		$this->request = $request;

	}

	public function render($view){

		if($this->rendered){return false;}

		extract($this->vars);

		if(strpos($view, "/") === 0){

			$view = ROOT.DS.'view'.$view.'.php';

		}else{

			$view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';

		}

		ob_start();

		require $view;

		$content_for_layout = ob_get_clean();

		require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';

		$this->rendered = true;
	}

	public function set($key, $value=null){

		if(is_array($key)){

			$this->vars += $key;

		}else{

			$this->vars[$key] = $value;

		}

	}

	public function setRessources($type , $string){


		$urlCss = ROOT.'/'.'public'.'/'.$type.'/'.$string.'.'.$type;

		$urlNeededRessource = BASE_URL.'/'.'public'.'/'.$type.'/'.$string.'.'.$type;

		if($type == "css"){

			$urlNeededRessource = "<link type='text/css' href='".$urlNeededRessource."' rel='stylesheet'/>";

			if(file_exists($urlCss)){

				array_push($this->ressourcesCss , $urlNeededRessource);

				$this->ressourcesCss =  array_unique($this->ressourcesCss);

				return $this->ressourcesCss;
			}

		} else {

			$urlNeededRessource = "<script type='text/javascript' src='".$urlNeededRessource."' />";

			if(file_exists($urlCss)){

				array_push($this->ressourcesJs , $urlNeededRessource);

				$this->ressourcesJs =  array_unique($this->ressourcesJs);

				return $this->ressourcesJs;

			}


		}

	}
}
