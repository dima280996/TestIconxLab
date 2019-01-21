<?php

class Model{

    /** @var object Звернення до бази даних */
	protected $db;

	public function __construct(){
		$this->db = App::$db;
	}
	
}

?>