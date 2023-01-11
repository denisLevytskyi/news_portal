<?php
namespace Controllers;
use Views;
use Models;

class RuleController {
	protected function set_data_by_id () {
		$model = new Models\AuthModel();
		$id = $_SESSION['auth']['id'];
		if ( ($data = $model->get_user_data('id', $id, 'id', $id)) ) {
			$_SESSION['auth']['name'] = $data['name'];
			$_SESSION['auth']['login'] = $data['login'];
			$_SESSION['auth']['photo'] = $data['photo'];
			$_SESSION['auth']['role'] = $data['role'];
		} else {
			$this->set_disconnect();
			ErrorController::get_view_error(1);
		}
	}

	protected function get_auth_check() {
		if (isset($_SESSION['auth']['id'])) {
			$this->set_data_by_id();
		} elseif (isset($_COOKIE['auth_id'])) {
			$_SESSION['auth']['id'] = $_COOKIE['auth_id'];
			$this->set_data_by_id();
		} else {
			$_SESSION['auth']['name'] = 'Guest';
			$_SESSION['auth']['role'] = 0;
		}
	}

	protected function set_disconnect () {
		unset($_SESSION['auth']);
		setcookie('auth_id', '', time() - 100);
		header('Location: /index.php');
	}

	public function get_rule_check () {
		if (isset($_GET['auth_disconnect'])) {
			$this->set_disconnect();
			exit();
		}
		$this->get_auth_check();
	}
}