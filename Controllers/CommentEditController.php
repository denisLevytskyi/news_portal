<?php
namespace Controllers;
use Views;
use Models;

class CommentEditController {
	protected function view_comment_edit () {
		$view = new Views\View();
		$view->view_comment_edit();
	}

	protected function set_changes () {
		$id = $_SESSION['comment_edit']['id'];
		$text = $_POST['comment_edit_text'];
		$model = new Models\CommentModel();
		if ( ($model->get_comment_update($id, $text)) ) {
			$location = 'Location: /post.php/?post_id=' . $_SESSION['post']['body']['id'];
			header($location);
		} else {
			ErrorController::get_error(27);
		}
	}

	protected function set_comment_data () {
		$model = new Models\CommentModel();
		$id = $_GET['comment_edit_id'];
		if ( ($data = $model->get_comment_by_id($id)) ) {
			$_SESSION['comment_edit'] = $data;
			$this->get_auth_check();
		} else {
			ErrorController::get_error(25);
		}
	}

	protected function get_auth_check () {
		if ($_SESSION['auth']['id'] != $_SESSION['comment_edit']['auth_id'] and $_SESSION['auth']['role'] != '2') {
			ErrorController::get_error(26);
		} else {
			$this->view_comment_edit();
		}
	}

	public function get_comment_edit_check () {
		if (isset($_GET['comment_edit_id'])) {
			$this->set_comment_data();
		} elseif (isset($_POST['comment_edit_text'])) {
			$this->set_changes();
		} else {
			ErrorController::get_error(24);
		}
	}
}