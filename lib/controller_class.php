<?php


class Controller{

    /** @var object Інформація, шр надходить від controller до view */
    protected $data;
    /** @var object Доступ до об'єкта моделі */
    protected $model;
    /** @var mixed Параметри рядка запиту */
    protected $params;

    /**
     * @param array
     */
    public function __construct($data = array()){
        $this->data = $data;
        $this->params = App::getRouter()->getParams();
    }

    /**
     * @return mixed
     */
    public function getData(){
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getModel(){
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getParams(){
        return $this->params;
    }
    
}

?>
