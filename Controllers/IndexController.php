<?php
namespace Controllers;
use Logics\Category;
use Views;
use Models;

class IndexController {
	protected function view_index () {
		$view = new Views\View();
		$view->view_index();
	}

	protected function set_category () {
		$_SESSION['index']['category'] = Category::get_category();
	}

	protected function set_top_list () {
		$model = new Models\PostModel();
		$list = $model->get_top_posts('views');
		$_SESSION['index']['top'] = $list;
	}

	protected function set_new_list () {
		$model = new Models\PostModel();
		$list = $model->get_top_posts('timestamp');
		$_SESSION['index']['new'] = $list;
	}

	public function get_index_check () {
		if (!isset($_SESSION['index'])) {
			$_SESSION['index'] = array();
		}
		$this->set_new_list();
		$this->set_top_list();
		$this->set_category();
		$this->view_index();
	}
}