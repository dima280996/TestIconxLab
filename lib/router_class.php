<?php
class Router{

    protected $uri;
    protected $controller;
    protected $action;
    protected $params;
    protected $route;
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

    public function getUri(){
        return $this->uri;
    }

    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }

    public function getParams(){
        return $this->params;
    }

    public function getRoute(){
        return $this->route;
    }

    public function getMethodPrefix(){
        return $this->method_prefix;
    }

}

?>
