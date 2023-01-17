<?php
namespace Models;
use Logics;

class CommentModel {
	public function get_comments_by_post_id ($post_id) {
		$comments = array();
		$connection = Logics\Connection::get_connection();
		$request = "SELECT * FROM comments WHERE post_id = $post_id ORDER BY id DESC";
		$result = mysqli_query($connection, $request) or header('Location: /');
		while ( ($record = mysqli_fetch_assoc($result)) ) {
			$record['time'] = date("y-m-d H:i:s", $record['timestamp']);
			$comments[] = $record;
		}
		return $comments;
	}

	public function get_comment_by_id ($id) {
		$connection = Logics\Connection::get_connection();
		$request = "SELECT * FROM comments WHERE id = '$id'";
		$result = mysqli_query($connection, $request) or header('Location: /');
		if ( ($record = mysqli_fetch_assoc($result)) ) {
			$record['time'] = date("y-m-d H:i:s", $record['timestamp']);
			return $record;
		} else {
			return false;
		}
	}

	public function get_comment_auth_id_by_id ($id) {
		$connection = Logics\Connection::get_connection();
		$request = "SELECT auth_id FROM comments WHERE id = '$id'";
		$result = mysqli_query($connection, $request) or header('Location: /');
		if ( ($record = mysqli_fetch_assoc($result)) ) {
			return $record['auth_id'];
		} else {
			return false;
		}
	}

	public function get_comment_update ($id, $text) {
		$connection = Logics\Connection::get_connection();
		$request = "UPDATE comments SET text = '$text' WHERE id = '$id'";
		return mysqli_query($connection, $request);
	}

	public function get_comment_delete ($id) {
		$connection = Logics\Connection::get_connection();
		$request = "DELETE FROM comments WHERE id = '$id'";
		return mysqli_query($connection, $request);
	}

	public function get_comment_registration ($post_id, $auth_id, $auth_name, $auth_photo, $timestamp, $text) {
		$connection = Logics\Connection::get_connection();
		$request = "INSERT INTO comments (post_id, auth_id, auth_name, auth_photo, `timestamp`, `text`) VALUES ('$post_id', '$auth_id', '$auth_name', '$auth_photo', '$timestamp', '$text')";
		return mysqli_query($connection, $request);
	}
}