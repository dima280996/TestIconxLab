<?php

/**
 * Контролер для виведення списку студентів
 */
class StudentsController extends Controller{

    /**
     * Отримання даних, створення об'єкта моделі
     * @param array
     */
    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Student();
    }

    /** Контролер для шаблона students/index.html */
    public function index(){
        $this->data['students'] = $this->model->getStudentsList();
    }

    /** Контролер для шаблона students/add.html */
    public function add(){
    	if ($_POST){
            $result = $this->model->save($_POST);
            Router::redirect('/students/');
        }
    }

    /** Контролер для шаблона students/edit.html */
    public function edit(){
    	if($_POST){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            Router::redirect('/students/');
        }

    	if(isset($this->params[0])){
    		$this->data['student'] = $this->model->getById($this->params[0]);
    	}else{
    		Router::redirect('/students/');
    	}
    }

    /** Контролер для шаблона students/delete.html */
    public function delete(){
    	if(isset($this->params[0])){
            $result = $this->model->delete($this->params[0]);
        }
        Router::redirect('/students/');
    }

}

?>
