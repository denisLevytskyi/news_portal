<?php
namespace Controllers;
use Views;
use Models;

class UserListController {
	protected function view_user_list () {
		$view = new Views\View();
		$view->view_user_list();
	}

	protected function set_user_list () {
		$model = new Models\AuthModel();
		if ( ($data = $model->get_all_users()) ) {
			$_SESSION['user_list'] = $data;
			$this->view_user_list();
		} else {
			ErrorController::get_error(30);
		}
	}

	protected function set_changes () {
		$id = $_POST['user_list_id'];
		$login = $_POST['user_list_login'];
		$name = $_POST['user_list_name'];
		$role = $_POST['user_list_role'];
		$model = new Models\AuthModel();
		if ( ($model->get_user_update_short($id, $login, $name, $role)) ) {
			header('Location: /userList.php');
		} else {
			ErrorController::get_error(32);
		}
	}

	protected function set_user_delete () {
		$model = new Models\AuthModel();
		$id = $_GET['user_list_del_id'];
		if ( ($model->get_user_delete($id)) ) {
			header('Location: /userList.php');
		} else {
			ErrorController::get_error(31);
		}
	}

	protected function get_auth_check () {
		if ($_SESSION['auth']['role'] != 2) {
			ErrorController::get_error(29);
			exit();
		}
	}

	public function get_user_list_check () {
		$this->get_auth_check();
		if (isset($_GET['user_list_del_id'])) {
			$this->set_user_delete();
		} elseif (isset($_POST['user_list_id'])) {
			$this->set_changes();
		}
		$this->set_user_list();
	}
}