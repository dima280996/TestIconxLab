<?php

/**
 * Клас для обробки запитів до додатка, звернення в index.php
 */
class App{

    /** @var object Робота з об'єктом роутера */
    protected static $router;
    /** @var object Підключення до БД */
    public static $db;

    /**
     * @return object Отримання об'єкта $router
     */
    public static function getRouter(){
        return self::$router;
    }

    /**
     * @return object Отримання об'єкта БД
     */
    public static function getDB(){
        return self::$db;
    }

    /**
     * Обробка запитів до додатка
     * @param  string
     * @return string
     */
    public static function run($uri){
        self::$router = new Router($uri);
        
        self::$db = new DB(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'), Config::get('db.db_name'));

        $controller_class = ucfirst(self::$router->getController()).'Controller';
        $controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());
        
        // Виклик метода контролера
        $controller_object = new $controller_class();
        if (method_exists($controller_object, $controller_method)){
            $view_path = $controller_object->$controller_method();
            $view_object = new View($controller_object->getData(), $view_path);
            $content = $view_object->render();
        }else{
            throw new Exception('Метод '.$controller_method.' класу '.$controller_class.' не існує.');
        }

        $layout = self::$router->getRoute();
        $layout_path = VIEWS_PATH.DS.$layout.'.html';
        $layout_view_object = new View(compact('content'), $layout_path);
        echo $layout_view_object->render();
    }

}
?>
