<?php

/**
 * Робота з базою даних
 */
class DB{

    /** @var object З'єднання з базою даних */
    protected $connection;

    /** @param string Параметри для з'єднання з базою даних */
    public function __construct($host, $user, $password, $db_name){
        $this->connection = new mysqli($host, $user, $password, $db_name);
        $this->query('SET NAMES UTF8');
        if(mysqli_connect_error()){
            throw new Exception("Не вдалось з'єднатись з БД");
        }
    }

    /**
     * Здійснення запиту
     * @param string
     * @return mixed
     */
    public function query($sql){
        if (!$this->connection){
            return false;
        }
        $result = $this->connection->query($sql);
        if (mysqli_error($this->connection)){
            throw new Exception(mysqli_error($this->connection));
        }
        if (is_bool($result)){
            return $result;
        }
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    /** @param string Захист від SQL-ін'єкцій */
    public function escape($str){
        return mysqli_escape_string($this->connection, $str);
    }

}