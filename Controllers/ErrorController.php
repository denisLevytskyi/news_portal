<?php
namespace Controllers;
use Views;
use Models;

class ErrorController {
	protected function view_error () {
		$view = new Views\View();
		$view->view_error();
	}

	public function get_error_check () {
		if (isset($_SESSION['error']['n'])) {
			$this->view_error();
		} else {
			header('Location: /index.php');
		}
	}

	public static function get_view_error ($n = 0) {
		$error_desc = array(
			0 => 'Unknown error!',
			1 => 'Дані по цьому користувачу не знайдені!',
			2 => 'Невірний логін або пароль!',
			3 => 'Введені паролі не співпадають!',
			4 => 'Невірний ПІН!',
			5 => 'Помилка під час реєстрації!',
			6 => 'Помилка під час відновлення паролю!',
			7 => 'Введені паролі не співпадають!',
			8 => 'Помилка під час онвлення даних',
			9 => 'Помилка заповнення карти користувача, зверніться до Адміністратора!',
			10 => 'Проблеми з видаленням облікового запису!',
			11 => '',
			12 => '',
			13 => '',
			14 => '',
			15 => '',
			16 => ''
		);
		session_start();
		$_SESSION['error']['n'] = $n;
		$_SESSION['error']['desc'] = $error_desc[$n];
		header('Location: /error.php');
	}
}