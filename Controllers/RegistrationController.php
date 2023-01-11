<?php
namespace Controllers;
use Views;
use Models;

class RegistrationController {
	protected function view_registration1 () {
		$view = new Views\View();
		$view->view_registration1();
	}

	protected function view_registration2 () {
		$view = new Views\View();
		$view->view_registration2();
	}

	protected function send_pin () {
		// $pin = rand(1000, 9999);
		$pin = 1;
		$text = 'Шановний ' . $_POST['registration_name'] .', це Ваш код для підтвердження реєстрації: ' . $pin;
		$mail1_to = $_POST['registration_login'];
		$headers="From: News Portal <news@news.ua>\nReply-to:news@news.ua\nContent-Type: text/html; charset=\"utf-8\"\n";
		mail($mail1_to, 'Реєстрація на порталі новин', $text, $headers);
		session_start();
		$_SESSION['registration_pin'] = $pin;
	}

	protected function set_registration () {
		$login = $_POST['registration_login'];
		$password = $_POST['registration_password_1'];
		$name = $_POST['registration_name'];
		$model = new Models\AuthModel();
		if ( ($data = $model->get_user_registration($login, $password, $name)) ) {
			session_start();
			$_SESSION['auth']['id'] = $data['id'];
			header('Location: /');
		} else {
			ErrorController::get_view_error(5);
		}
	}

	protected function get_email_check () {
		$login = $_POST['registration_login'];
		$model = new Models\AuthModel();
		if ( ($model->get_user_data('login', $login, 'login', $login)) ) {
			ErrorController::get_view_error(11);
		} else {
			$this->send_pin();
		}
	}

	protected function get_check_pin () {
		if ($_POST['registration_pin'] == $_SESSION['registration_pin']) {
			$this->set_registration();
			unset($_SESSION['registration_pin']);
		} else {
			ErrorController::get_view_error(4);
		}
	}

	public function get_reg_check () {
		if (isset($_POST['registration_2'])) {
			$this->get_check_pin();
			exit;
		} elseif (empty($_POST['registration_1'])) {
			$this->view_registration1();
		} elseif ($_POST['registration_password_1'] == $_POST['registration_password_2']) {
			$this->get_email_check();
			$this->view_registration2();
		} else {
			ErrorController::get_view_error(3);
		}
	}
}