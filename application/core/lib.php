<?php
	//alert
	function alert($str){
		echo "<script>alert('{$str}')</script>";
	}

	//move
	function move($str = false){
		echo "<script>";
			echo $str ? "document.location.replace('{$str}')" : "history.back();";
		echo "</script>";
		exit;
	}

	//access
	function access($bool, $msg, $url = false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}

	//autoload
	function __autoload($className){
		$className2 = strtolower($className);
		$arr = explode("_", $className2);
		switch($arr[0]){
			case 'application' : $dir = _APP; break;
			case 'model' : $dir = _MODEL; break;
			default : $dir = _CONTROL; break;
		}
		$dir .= "{$className2}.php";
		require_once($dir);
	}