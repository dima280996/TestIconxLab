<?php

/** Модель списку студентів */
class Student extends Model{

    /**
     * Виведення списку студентів
     * @return array
     */
	public function getStudentsList(){
		$sql = "SELECT * FROM students";

		return $this->db->query($sql);
	}

    /**
     * Вибірка одного студента по id
     * @param  integer
     * @return array
     */
	public function getById($id){
		$id = (int)$id;
		$sql = "SELECT * FROM students WHERE students.id = '{$id}'";
		$result = $this->db->query($sql);

		return isset($result[0]) ? $result[0] : null;
	}

    /**
     * Додавання або редагування студента, залежно від наявності id
     * @param array
     * @param mixed
     * @return array
     */
	public function save($data, $id = null){
        if (!isset($data['name']) || !isset($data['surname']) || !isset($data['age']) || !isset($data['sex']) || !isset($data['groups']) || !isset($data['faculty'])){
            return false;
        }
        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $surname = $this->db->escape($data['surname']);
        $age = $this->db->escape($data['age']);
        $sex = $this->db->escape($data['sex']);
        $groups = $this->db->escape($data['groups']);
        $faculty = $this->db->escape($data['faculty']);

        if (!$id){ // Новий запис
            $sql = "
                insert into students
                   set name = '{$name}',
                       surname = '{$surname}',
                       age = '{$age}',
                       sex = '{$sex}',
                       groups = '{$groups}',
                       faculty = '{$faculty}'
            ";
        }else{ // Оновити наявний запис
            $sql = "
                update students
                   set name = '{$name}',
                       surname = '{$surname}',
                       age = '{$age}',
                       sex = '{$sex}',
                       groups = '{$groups}',
                       faculty = '{$faculty}'
                   where id = {$id}
            ";
        }
        return $this->db->query($sql);
    }

    /**
     * Видалення студента по id
     * @param  integer
     * @return array
     */
    public function delete($id){
    	$id = (int)$id;
    	$sql = "DELETE FROM students WHERE id = '{$id}'";
        return $this->db->query($sql);
    }
    
}

?>