<?php

/**
 * Диспетчер запитів: парсинг $uri на route, controller, action, params
 */
class Router{

    /** @var string Uri-рядок для парсингу */
    protected $uri;
    /** @var mixed Назва controller */
    protected $controller;
    /** @var mixed Назва action */
    protected $action;
    /** @var mixed Список параметрів після action */
    protected $params;
    /** @var mixed Вибір роута за замовчуванням */
    protected $route;
    /** @var mixed Префікс до роута */
    protected $method_prefix;

    public function __construct($uri){

        $this->uri = urldecode(trim($uri, '/'));

        // По дефолту
        $routes = Config::get('routes');
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');

        $uri_parts = explode('?', $this->uri);

        // Розділити на частини /controller/action/param1/param2/.../...
        $path = $uri_parts[0];
        $path_parts = explode('/', $path);

        if (count($path_parts)){

            // Отримати route 1 елемента
            if (in_array(strtolower(current($path_parts)), array_keys($routes))){
                $this->route = strtolower(current($path_parts));
                $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
                array_shift($path_parts);
            } 
            // Отримати controller - наступний елемент масива
            if (current($path_parts)){
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            // Отримати action
            if (current($path_parts)){
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            // Отримуємо параметри - остатки масива
            $this->params = $path_parts;

        }    


    }

    /**
     * Перенаправлення на вказаний адрес
     * @param string
     */
    public static function redirect($location){
        header("Location: $location");
    }

    /**
     * @return mixed
     */
    public function getUri(){
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController(){
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction(){
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams(){
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getRoute(){
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix(){
        return $this->method_prefix;
    }

}

?>
