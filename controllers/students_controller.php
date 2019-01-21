<?php

class StudentsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Student();
    }

    public function index(){
        $this->data['students'] = $this->model->getStudentsList();
    }

}

?>
