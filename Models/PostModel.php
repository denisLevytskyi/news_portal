<?php
namespace Models;
use Logics;

class PostModel {
	public function get_top_posts ($order) {
		$posts = array();
		$connection = Logics\Connection::get_connection();
		$request = "SELECT id, photo, header, text_first FROM posts ORDER BY $order DESC LIMIT 5";
		$rezult = mysqli_query($connection, $request) or header('Location: /');
		while ( ($record = mysqli_fetch_assoc($rezult)) ) {
			$posts[] = $record;
		}
		return $posts;
	}

	public function get_posts_by_category ($category) {
		$posts = array();
		$connection = Logics\Connection::get_connection();
		$request = "SELECT id, photo, header, text_first FROM posts WHERE category = $category ORDER BY id DESC";
		$rezult = mysqli_query($connection, $request) or header('Location: /');
		while ( ($record = mysqli_fetch_assoc($rezult)) ) {
			$posts[] = $record;
		}
		return $posts;
	}

	public function get_all_posts () {
		$posts = array();
		$connection = Logics\Connection::get_connection();
		$request = "SELECT id, photo, header, text_first FROM posts ORDER BY id DESC";
		$rezult = mysqli_query($connection, $request) or header('Location: /');
		while ( ($record = mysqli_fetch_assoc($rezult)) ) {
			$posts[] = $record;
		}
		return $posts;
	}

	public function get_post_by_id ($id) {
		$connection = Logics\Connection::get_connection();
		$request = "SELECT * FROM posts WHERE id = '$id'";
		$rezult = mysqli_query($connection, $request) or header('Location: /');
		if ( ($record = mysqli_fetch_assoc($rezult)) ) {
			$record['time'] = date("y-m-d H:i:s", $record['timestamp']);
			return $record;
		} else {
			return false;
		}
	}

	public function get_post_add_views ($id, $views) {
		$connection = Logics\Connection::get_connection();
		$request = "UPDATE posts SET views = '$views' WHERE id = '$id'";
		return mysqli_query($connection, $request);
	}

	public function get_post_delete ($id) {
		$connection = Logics\Connection::get_connection();
		$request = "DELETE FROM posts WHERE id = '$id'";
		return mysqli_query($connection, $request);
	}

	public function get_post_update ($id, $category, $photo, $header, $text_first, $text_full) {
		$connection = Logics\Connection::get_connection();
		$request = "UPDATE posts SET category = '$category', photo = '$photo', header = '$header', text_first = '$text_first', text_full = '$text_full' WHERE id = '$id'";
		return mysqli_query($connection, $request);
	}

	public function get_post_registration ($data) {
		$i0 = $data['auth_id'];
		$i1 = $data['auth_name'];
		$i2 = $data['timestamp'];
		$i3 = $data['category'];
		$i4 = $data['photo'];
		$i5 = $data['header'];
		$i6 = $data['text_first'];
		$i7 = $data['text_full'];
		$i8 = $data['views'];
		$connection = Logics\Connection::get_connection();
		$request = "INSERT INTO posts (
			auth_id,
			auth_name,	   
			timestamp,
			category,
			photo,
			header,
			text_first,
			text_full,
			views
			)
			VALUES
			('$i0', '$i1', '$i2', '$i3', '$i4', '$i5', '$i6', '$i7', '$i8')";
		return mysqli_query($connection, $request);
	}
}