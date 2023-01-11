<?php
namespace Views;

class View {
	public function view_error () {
		require_once "Templates/error.php";
	}

	public function view_index () {
		require_once "Templates/index.php";
	}

	public function view_sign () {
		require_once "Templates/sign.php";
	}

	public function view_registration1 () {
		require_once "Templates/registration1.php";
	}

	public function view_registration2 () {
		require_once "Templates/registration2.php";
	}

	public function view_reset () {
		require_once "Templates/reset.php";
	}

	public function view_edit_auth () {
		require_once "Templates/edit_auth.php";
	}
}