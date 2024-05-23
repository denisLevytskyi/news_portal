<?php
namespace Controllers;
use Views;
use Models;

class CategoryController {
	public static function get_categories () {
		$model = new Models\CategoryModel();
		return $model->get_all_categories();
	}
}