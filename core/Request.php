<?php

class Request {

	// URL APELLER PAR L'UTILISATEUR
	public $url;

	function __construct() {

		if(isset($_SERVER['PATH_INFO'])){

			$this->url = $_SERVER['PATH_INFO'];

		}
		else{

			$this->url = "/pages";

		}
	}
}
