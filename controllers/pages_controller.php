<?php

class PagesController extends Controller{

    public function index(){
        $this->data['test_content'] = "Тут буде список студентів";
    }

    public function view(){
        $params = App::getRouter()->getParams();
        if (isset($params[0])){
            $alias = strtolower($params[0]);
            
            $this->data['content'] = "Тут буде сторінка з аліасом '{$alias}'";
        }
    }

}

?>
