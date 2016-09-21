<?php
	Class Application {

		//construct
		function __construct(){
			$controller = new Controller();
			$controller->setting();
		}
	}