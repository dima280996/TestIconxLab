<?php

class Page extends Model{

	public function getList(){
		$sql = "SELECT * FROM pages";

		return $this->db->query($sql);
	}

	 public function getByAlias($alias){
        $alias = $this->db->escape($alias);
        $sql = "select * from pages where alias = '{$alias}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

}

?>