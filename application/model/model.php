<?php
	Class Model {

		//variable
		var $db;
		var $column;

		//construct
		function __construct(){
			$this->db = new PDO("mysql:host=127.0.0.1;dbname=0920;charset=utf8","root","");
		}

		//sql
		function sql($str){
			if(isset($this->column)){
				$res = $this->db->prepare($str);
				$res->execute($this->column);
			} else {
				$res = $this->query($str);
			}
			return $res;
		}

		//fetch
		function fetch($str){
			return $this->sql($str)->fetch(PDO::FETCH_OBJ);
		}

		//fetch
		function fetchAll($str){
			return $this->sql($str)->fetchAll(PDO::FETCH_OBJ);
		}

		//fetch
		function cnt($str){
			return $this->sql($str)->rowCount();
		}

		//getColumn
		function getColumn($arr, $cacnel){
			$cancel = explode("/", $cancel);
			$column = "";
			foreach($arr as $key=>$val){
				if(!in_array($key, $cancel)){
					$column .= ", {$key}=:{$key}";
					$this->column[":{$key}"] = $val;
				}
			}
			$column = substr($column, 2);
			return $column;
		}

		//query
		function query($table, $action, $column, $bool = true){
			switch($action){
				case 'insert' : $sql = "insert into {$table} set "; break;
				case 'update' : $sql = "update {$table} set "; break;
				case 'delete' : $sql = "delete from {$table} "; break;
			}
			$sql .= $column;
			if($bool){
				$this->sql($sql);
			} else {
				exit($sql);
			}
		}
	}