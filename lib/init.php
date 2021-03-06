<?php

require_once(ROOT.DS.'config'.DS.'config.php');

/**
 * Автопідключення усіх класів
 */
function __autoload($class_name){
	$lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'_class.php';
    $controllers_path = ROOT.DS.'controllers'.DS.str_replace('controller', '', strtolower($class_name)).'_controller.php';
    $model_path = ROOT.DS.'models'.DS.strtolower($class_name).'.php';

    if(file_exists($lib_path)){
    	require_once($lib_path);
    }elseif(file_exists($controllers_path)){
    	require_once($controllers_path);
    }elseif(file_exists($model_path)){
    	require_once($model_path);
    }else {
        throw new Exception('Не вдалося підключити class: '.$class_name);
    }

}

?>
