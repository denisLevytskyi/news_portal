<?php
namespace Models;
use Logics;

class CategoryModel {
	public function get_all_categories () {
		$categories = array();
		$connection = Logics\Connection::get_connection();
		$request = "SELECT * FROM categories ORDER BY id";
		$result = mysqli_query($connection, $request) or header('Location: /');
		while ( ($record = mysqli_fetch_assoc($result)) ) {
			$categories[$record['id']] = $record['name'];
		}
		return $categories;
	}

	public function get_category_update ($id, $name) {
		$connection = Logics\Connection::get_connection();
		$request = "UPDATE categories SET name = '$name' WHERE id = '$id'";
		return mysqli_query($connection, $request);
	}

	public function get_category_delete ($id) {
		$connection = Logics\Connection::get_connection();
		$request = "DELETE FROM categories WHERE id = '$id'";
		return mysqli_query($connection, $request);
	}

	public function get_category_registration ($name) {
		$connection = Logics\Connection::get_connection();
		$request = "INSERT INTO categories (name) VALUES ('$name')";
		return mysqli_query($connection, $request);
	}
}