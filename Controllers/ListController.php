<?php
namespace Controllers;
use Views;
use Models;

class ListController {
	protected function view_list () {
		$view = new Views\View();
		$view->view_list();
	}

	protected function set_category () {
		$_SESSION['list']['category'] = \Logics\Category::get_category();
	}

	protected function set_list () {
		$model = new Models\PostModel();
		$id = $_GET['list_id'];
		if ($id == '*') {
			$list = $model->get_all_posts();
		} else {
			$list = $model->get_posts_by_category($id);
		}
		$_SESSION['list']['news'] = $list;
	}

	public function get_list_check () {
		if (!isset($_SESSION['list'])) {
			$_SESSION['list'] = array();
		}
		if (isset($_GET['list_id'])) {
			$this->set_list();
			$this->set_category();
			$this->view_list();
		} else {
			ErrorController::get_error(15);
		}
	}
}