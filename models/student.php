<?php

class Student extends Model{

	public function getStudentsList(){
		$sql = 'SELECT students.id, name, surname, age, sex, groups, faculty FROM students JOIN groups ON students.group_id = groups.id';

		return $this->db->query($sql);
	}

	public function getById($id){
		$id = (int)$id;
		$sql = "SELECT * FROM students WHERE id = '{$id}' LIMIT 1";
		$result = $this->db->query($sql);
		return isset($result[0]) ? $result[0] : null;
	}

}

?>