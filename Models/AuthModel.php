<?php
namespace Models;
use Logics;

class AuthModel {
	public function get_user_data ($search_p, $search_v, $select_p, $select_v) {
		$connection = Logics\Connection::get_connection();
		$request = "SELECT * FROM users WHERE $search_p='$search_v'";
		$rezult = mysqli_query($connection, $request) or header('Location: /');
		while ( ($record = mysqli_fetch_assoc($rezult)) ) {
			if ($record[$select_p] == $select_v) {
				return $record;
			}
		}
	}

	public function get_user_registration ($login, $password, $name, $photo = '/Materials/no_photo.png', $role = '1') {
		$connection = Logics\Connection::get_connection();
		$request = "INSERT INTO users (login, password, name, photo, role) VALUES ('$login', '$password', '$name', '$photo', '$role')";
		$rezult = mysqli_query($connection, $request);
		if ( $rezult == 1 ) {
			return $this->get_user_data('login', $login, 'password', $password);
		}
	}

	public function get_update ($id, $login, $password, $name, $photo, $role) {
		$connection = Logics\Connection::get_connection();
		$request = "UPDATE users SET login = '$login', password = '$password', name = '$name', photo = '$photo', role = '$role' WHERE id = '$id'";
		return mysqli_query($connection, $request);
	}

	public function get_delete ($id) {
		$connection = Logics\Connection::get_connection();
		$request = "DELETE FROM users WHERE id = '$id'";
		return mysqli_query($connection, $request);
	}

	public function get_reset ($login, $password) {
		$connection = Logics\Connection::get_connection();
		$request = "UPDATE users SET password = '$password' WHERE login = '$login'";
		return mysqli_query($connection, $request);
	}
}