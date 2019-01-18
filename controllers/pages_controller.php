<?php

class PagesController extends Controller{

    public function index(){
        echo "Тут буде список студентів";
    }

    public function view(){
        $params = App::getRouter()->getParams();
        if (isset($params[0])){
            $alias = strtolower($params[0]);
            
            echo "Тут буде сторінка з аліасом '{$alias}'";
        }
    }

}

?>
