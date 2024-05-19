<?php
$rule = new Controllers\RuleController();
$rule->get_rule_check();
$edit_auth = new Controllers\EditAuthController();
$edit_auth->get_edit_auth_check();