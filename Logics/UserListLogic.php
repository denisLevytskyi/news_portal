<?php
$rule = new Controllers\RuleController();
$rule->get_rule_check();
$user_list = new Controllers\UserListController();
$user_list->get_user_list_check();