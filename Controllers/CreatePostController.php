<?php
namespace Controllers;
use Views;
use Models;

class CreatePostController {
	protected function view_create_post () {
		$view = new Views\View();
		$view->view_template('createPost');
	}

	protected function set_move_photo ($file) {
		$new_name_short = "/Materials/" . time() . $file['name'];
		$new_name = $_SERVER['DOCUMENT_ROOT'] . $new_name_short;
		move_uploaded_file($file['tmp_name'], $new_name);
		return $new_name_short;
	}

	protected function set_post_registration () {
		$data = array(
			'auth_id' => $_SESSION['auth']['id'],
			'auth_name' => $_SESSION['auth']['name'],
			'timestamp' => time(),
			'category' => $_POST['create_post_category'],
			'photo' => '/Materials/no_photo_post.png',
			'header' => $_POST['create_post_header'],
			'text_first' => mb_substr($_POST['create_post_text'], 0, 90) . '...',
			'text_full' => $_POST['create_post_text'],
			'views' => 0
		);
		$model = new Models\PostModel();
		if ( (is_uploaded_file($_FILES['create_post_photo']['tmp_name'])) ) {
			$file = $_FILES['create_post_photo'];
			$data['photo'] = $this->set_move_photo($file);
		}
		if ( ($model->get_post_registration($data)) ) {
			header('Location: /');
		} else {
			ErrorController::get_error(14);
		}
	}

	protected function get_auth_check () {
		if ($_SESSION['auth']['role'] == 0) {
			ErrorController::get_error(13);
		} else {
			$this->view_create_post();
		}
	}

	public function get_create_post_check () {
		$this->get_auth_check();
		if (isset($_POST['create_post_header'])) {
			$this->set_post_registration();
		}
	}
}