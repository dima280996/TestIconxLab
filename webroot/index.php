<?php

error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');

require_once(ROOT.DS.'lib'.DS.'init.php');

App::run($_SERVER['REQUEST_URI']);

/*
$test = App::$db->query('SELECT students.id, name, surname, age, sex, groups, faculty FROM students JOIN groups ON students.group_id = groups.id');
echo "<pre>";

print_r($test);
*/
?>
