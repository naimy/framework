<?php

//namespace controller;

class Index extends Controller {

	function index(){

		/***** DECLARATIONS DES RESSOURCES ****/

		/**** CSS *****/
		$this->setRessources('css' , 'global');
		$this->setRessources('css' , 'index');

		/**** JS ******/
		$this->setRessources('js' , 'global');
		$this->setRessources('js' , 'index');

		$this->set('Title' , 'Title');

		$this->render('index');

	}

}