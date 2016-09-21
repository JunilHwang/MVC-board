<?php
	//define
	define("_ROOT", dirname(dirname(__FILE__))."/");
	define("_PUBLIC", _ROOT."public/");
	define("_APP", _ROOT."application/");
	define("_MODEL", _APP."model/");
	define("_VIEW", _APP."view/");
	define("_CONTROL", _APP."controller/");
	define("_CORE", _APP."core/");
	define("_PAGE", _VIEW."page/");

	//require
	require_once(_CORE."lib.php");
	new Application();