<?php

Config::set('site_name', 'IconxLab');

/** Routes. Route name => method prefix */
Config::set('routes', array(
    'default' => '',
    'admin'   => 'admin_'
));

/** Route за замовчуванням */
Config::set('default_route', 'default');
/** Controller за замовчуванням */
Config::set('default_controller', 'students');
/** Action за замовчуванням */
Config::set('default_action', 'index');

/** Параметри підключення до БД */
Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'iconxlab');
?>
