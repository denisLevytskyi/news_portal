<?php
namespace Controllers;
use Views;
use Models;

class CategoryEditController {
	protected function view_category_edit () {
		$view = new Views\View();
		$view->view_category_edit();
	}

	protected function set_category_list () {
		$model = new Models\CategoryModel();
		if ( ($data = $model->get_all_categories()) ) {
			$_SESSION['category_edit'] = $data;
			$this->view_category_edit();
		} else {
			ErrorController::get_error(34 );
		}
	}

	protected function set_category_registration () {
		$name = $_POST['category_edit_new'];
		$model = new Models\CategoryModel();
		if ( ($model->get_category_registration($name)) ) {
			header('Location: /categoryEdit.php');
		} else {
			ErrorController::get_error(37);
		}
	}

	protected function set_changes () {
		$id = $_POST['category_edit_id'];
		$name = $_POST['category_edit_name'];
		$model = new Models\CategoryModel();
		if ( ($model->get_category_update($id, $name)) ) {
			header('Location: /categoryEdit.php');
		} else {
			ErrorController::get_error(36);
		}
	}

	protected function set_category_delete () {
		$model = new Models\CategoryModel();
		$id = $_GET['category_edit_del_id'];
		if ( ($model->get_category_delete($id)) ) {
			header('Location: /categoryEdit.php');
		} else {
			ErrorController::get_error(35);
		}
	}

	protected function get_auth_check () {
		if ($_SESSION['auth']['role'] != 2) {
			ErrorController::get_error(33);
			exit();
		}
	}

	public function get_category_edit_check () {
		$this->get_auth_check();
		if (isset($_GET['category_edit_del_id'])) {
			$this->set_category_delete();
		} elseif (isset($_POST['category_edit_id'])) {
			$this->set_changes();
		} elseif (isset($_POST['category_edit_new'])) {
			$this->set_category_registration();
		}
		$this->set_category_list();
	}
}