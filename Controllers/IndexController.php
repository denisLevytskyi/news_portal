<?php
namespace Controllers;
use Views;
use Models;

class IndexController {
	protected function view_index () {
		$view = new Views\View();
		$view->view_index();
	}

	public function get_index_check () {
		$this->view_index();
	}
}