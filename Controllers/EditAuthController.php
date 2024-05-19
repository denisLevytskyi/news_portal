<?php
namespace Controllers;
use Views;
use Models;

class EditAuthController {
	protected function view_edit_auth () {
		$view = new Views\View();
		$view->view_edit_auth();
	}

	protected function set_move_photo ($file) {
		$new_name_short = "/Materials/" . time() . $file['name'];
		$new_name = $_SERVER['DOCUMENT_ROOT'] . $new_name_short;
		move_uploaded_file($file['tmp_name'], $new_name);
		return $new_name_short;
	}

	protected function set_changes () {
		$id = $_POST['edit_auth_id'];
		$login = $_POST['edit_auth_login'];
		$password = $_POST['edit_auth_password_1'];
		$name = $_POST['edit_auth_name'];
		$photo = $_SESSION['auth']['photo'];
		$model = new Models\AuthModel();
		if ( (is_uploaded_file($_FILES['edit_auth_photo']['tmp_name'])) ) {
			$file = $_FILES['edit_auth_photo'];
			$photo = $this->set_move_photo($file);
		}
		if ( ($model->get_user_update($id, $login, $password, $name, $photo)) ) {
			header('Location: /');
		} else {
			ErrorController::get_error(8);
		}
	}

	protected function set_login_check () {
		if ($_SESSION['auth']['role'] == 0) {
			ErrorController::get_error(9);
		}
	}

	protected function set_delete () {
		$model = new Models\AuthModel();
		$id = $_SESSION['auth']['id'];
		if ( ($model->get_user_delete($id)) ) {
			header('Location: /?auth_disconnect=1');
		} else {
			ErrorController::get_error(10);
		}
	}

	public function get_edit_auth_check () {
		if (isset($_GET['edit_auth_delete'])) {
			$this->set_delete();
		} elseif (empty($_POST['edit_auth_id'])) {
			$this->set_login_check();
			$this->view_edit_auth();
		} elseif ($_POST['edit_auth_password_1'] == $_POST['edit_auth_password_2']) {
			$this->set_changes();
		} else {
			ErrorController::get_error(7);
		}
	}
}