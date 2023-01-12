<?php
namespace Controllers;
use Views;
use Models;

class ResetController {
	protected function view_reset () {
		$view = new Views\View();
		$view->view_reset();
	}

	protected function set_user_reset ($password) {
		$login = $_POST['reset_login'];
		$model = new Models\AuthModel();
		if ( ($model->get_user_reset($login, $password)) ) {
			header('Location: /');
		} else {
			ErrorController::get_error(6);
		}
	}

	protected function get_new_password () {
		$password = rand(1000000, 9999999);
		$this->set_user_reset($password);
		$text = 'Шановний користувач, це Ваш новий пароль: ' . $password;
		$mail1_to = $_POST['reset_login'];
		$headers="From: News Portal <news@news.ua>\nReply-to:news@news.ua\nContent-Type: text/html; charset=\"utf-8\"\n";
		mail($mail1_to, 'Відновлення доступу', $text, $headers);
	}

	protected function get_email_check () {
		$login = $_POST['reset_login'];
		$model = new Models\AuthModel();
		if ( ($model->get_user_data('login', $login, 'login', $login)) ) {
			$this->get_new_password();
		} else {
			ErrorController::get_error(12);
		}
	}

	public function get_reset_check () {
		if (isset($_POST['reset_login'])) {
			$this->get_email_check();
		} else {
			$this->view_reset();
		}
	}
}