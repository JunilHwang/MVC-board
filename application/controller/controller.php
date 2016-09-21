<?php
	// Controller Class
	Class Controller {
		//construct
		function setting(){
			session_start();
			$param = $this->getParam();
			$model = "Model_".$this->menu_type;
			$controller = new $this->menu_type();
			$controller->db = new $model();
			$controller->index($param);
		}

		//getParam
		function getParam(){
			if(isset($_GET['param'])) $get = explode("/", $_GET['param']);
			$this->page_type = isset($get[0]) ? $get[0] : 'page';
			$this->menu_type = isset($get[1]) ? $get[1] : 'board';
			$this->action = isset($get[2]) ? $get[2] : NULL;
			$this->idx = isset($get[3]) ? $get[3] : NULL;
			$this->page_num = isset($get[3]) ? $get[3] : 1;
			$this->get_page = "{$this->page_type}/{$this->menu_type}";
			$this->require_file = isset($this->action) ? $this->action : $this->menu_type;
			$this->getTitle();
			return $this;
		}

		//getTitle
		function getTitle(){
			$this->page_title = "게시판";
		}

		function content(){

		}

		//index
		function index($param){
			if($param->page_type != 'ajax') require_once(_VIEW."header.php");
			$this->content();
			if($param->page_type != 'ajax') require_once(_VIEW."footer.php");
		}
	}