<?php
namespace Controllers;
use Views;
use Models;

class PostEditController {
	protected function view_post_edit () {
		$view = new Views\View();
		$view->view_template('postEdit');
	}

	protected function set_move_photo ($file) {
		$new_name_short = "/Materials/" . time() . $file['name'];
		$new_name = $_SERVER['DOCUMENT_ROOT'] . $new_name_short;
		move_uploaded_file($file['tmp_name'], $new_name);
		return $new_name_short;
	}

	protected function set_changes () {
		$id = $_POST['post_edit_id'];
		$category = $_POST['post_edit_category'];
		$photo = $_POST['post_edit_photo_old'];
		$header = $_POST['post_edit_header'];
		$text_first = mb_substr($_POST['post_edit_text'], 0, 90) . '...';
		$text_full = $_POST['post_edit_text'];
		$model = new Models\PostModel();
		if ( (is_uploaded_file($_FILES['post_edit_photo']['tmp_name'])) ) {
			$file = $_FILES['post_edit_photo'];
			$photo = $this->set_move_photo($file);
		}
		if ( ($model->get_post_update($id, $category, $photo, $header, $text_first, $text_full)) ) {
			header('Location: /');
		} else {
			ErrorController::get_error(22);
		}
	}

	protected function get_auth_check () {
		if ($_SESSION['auth']['id'] != $_SESSION['post_edit']['auth_id'] and $_SESSION['auth']['role'] != 2) {
			ErrorController::get_error(21);
		} else {
			$this->view_post_edit();
		}
	}

	protected function set_post_data () {
		$model = new Models\PostModel();
		$id = $_GET['post_edit_id'];
		if ( ($data = $model->get_post_by_id($id)) ) {
			$_SESSION['post_edit'] = $data;
			$this->get_auth_check();
		} else {
			ErrorController::get_error(20);
		}
	}

	public function get_post_edit_check () {
		if (isset($_GET['post_edit_id'])) {
			$this->set_post_data();
		} elseif (isset($_POST['post_edit_text'])) {
			$this->set_changes();
		} else {
			ErrorController::get_error(19);
		}
	}
}