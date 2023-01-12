<?php
namespace Controllers;
use Views;
use Models;

class SignController {
	protected function view_sign () {
		$view = new Views\View();
		$view->view_sign();
	}

	protected function set_id ($remember = false) {
		$model = new Models\AuthModel();
		$login = $_POST['sign_login'];
		$password = $_POST['sign_password'];
		if ( ($data = $model->get_user_data('login', $login, 'password', $password)) ) {
			if ($remember) {
				setcookie('auth_id', $data['id'], time() + 10000);
			}
			$_SESSION['auth']['id'] = $data['id'];
			header('Location: /index.php');
		} else {
			ErrorController::get_error(2);
		}
	}

	public function get_sign_check () {
		if (isset($_POST['sign_login']) and empty($_POST['sign_remember'])) {
			$this->set_id();
		} elseif (isset($_POST['sign_remember'])) {
			$this->set_id(true);
		} else {
			$this->view_sign();
		}
	}
}