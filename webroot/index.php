<?php

/** Точка входу на сайт */

error_reporting(E_ALL);

/** Роздільник каталогів  */
define('DS', DIRECTORY_SEPARATOR);
/** Шлях до кореня */
define('ROOT', dirname(dirname(__FILE__)));
/** Шлях до View */
define('VIEWS_PATH', ROOT.DS.'views');

/** Включення файла ініціалізації класів */
require_once(ROOT.DS.'lib'.DS.'init.php');

/** Запит до додатка */
App::run($_SERVER['REQUEST_URI']);

?>
