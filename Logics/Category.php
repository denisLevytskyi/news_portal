<?php
namespace Logics;

class Category {
	public static function get_category () {
		$list = array(
			0 => 'Події на фронті',
			1 => 'Екстрені новини',
			2 => 'Спорт',
			3 => 'Наука та навчання',
			4 => 'Політика',
			5 => 'Економіка',
			6 => 'Довкілля',
			7 => 'Релігія',
			8 => 'Мистецтво',
			9 => 'Історія',
			10 => 'Анонси'
		);
		return $list;
	}
}