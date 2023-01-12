<?php
namespace Controllers;
use Views;
use Models;

class PostController {
	protected function view_post () {
		$view = new Views\View();
		$view->view_post();
	}

	protected function set_category () {
		$_SESSION['post']['category'] = \Logics\Category::get_category();
	}

	protected function set_add_views ($id, $views) {
		$model = new Models\PostModel();
		$views++;
		$model->get_post_add_views($id, $views);
	}

	protected function set_post () {
		$model = new Models\PostModel();
		$id = $_GET['post_id'];
		if ( ($data = $model->get_post_by_id($id)) ) {
			$_SESSION['post']['body'] = $data;
			$this->set_add_views($id, $data['views']);
		} else {
			ErrorController::get_error(17);
		}
	}

	protected function set_post_delete () {
		$model = new Models\PostModel();
		$post_id = $_GET['post_del_id'];
		$post_auth_id = $model->get_post_auth_id_by_id($post_id);
		if ($_SESSION['auth']['id'] != $post_auth_id and $_SESSION['auth']['role'] != '2') {
			ErrorController::get_error(18);
		} elseif ( ($model->get_post_delete($post_id)) ) {
			header('Location: /');
		} else {
			ErrorController::get_error(18);
		}
	}

	protected function set_comment_list () {
		$post_id = $_GET['post_id'];
		$model = new Models\CommentModel();
		if ( ($list = $model->get_comments_by_post_id($post_id)) ) {
			$_SESSION['post']['comments'] = $list;
		} else {
			$_SESSION['post']['comments'] = null;
		}
	}

	protected function set_comment_registration () {
		$post_id = $_POST['post_add_comment_id'];
		$auth_id = $_SESSION['auth']['id'];
		$auth_name = $_SESSION['auth']['name'];
		$auth_photo = $_SESSION['auth']['photo'];
		$timestamp = time();
		$text = $_POST['post_add_comment_text'];
		$model = new Models\CommentModel();
		if ( ($model->get_comment_registration($post_id, $auth_id, $auth_name, $auth_photo, $timestamp, $text)) ) {
			$location = 'Location: /post.php/?post_id=' . $post_id;
			header($location);
		} else {
			ErrorController::get_error(28);
		}
	}

	protected function set_comment_delete () {
		$model = new Models\CommentModel();
		$comment_id = $_GET['post_del_comment_id'];
		$comment_auth_id = $model->get_comment_auth_id_by_id($comment_id);
		if ($_SESSION['auth']['id'] != $comment_auth_id and $_SESSION['auth']['role'] != '2') {
			ErrorController::get_error(23);
		} elseif ( ($model->get_comment_delete($comment_id)) ) {
			$location = 'Location: /post.php/?post_id=' . $_SESSION['post']['body']['id'];
			header($location);
		} else {
			ErrorController::get_error(23);
		}
	}

	public function get_post_check () {
		if (!isset($_SESSION['post'])) {
			$_SESSION['post'] = array();
		}
		if (isset($_GET['post_id'])) {
			$this->set_post();
			$this->set_category();
			$this->set_comment_list();
			$this->view_post();
		} elseif (isset($_POST['post_add_comment_text'])) {
			$this->set_comment_registration();
		} elseif (isset($_GET['post_del_id'])) {
			$this->set_post_delete();
		} elseif (isset($_GET['post_del_comment_id'])) {
			$this->set_comment_delete();
		} else {
			ErrorController::get_error(16);
		}
	}
}