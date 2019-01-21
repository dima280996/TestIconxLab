<?php

/**
 * Клас конфігурацій
 */
class Config{

    /** @var array Конфігурації у вигляді ключ-значення */
    protected static $settings = array();
    
    /**
     * Отримання значення по ключу
     * @param  mixed
     * @return mixed
     */
    public static function get($key){
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;
    }

    /**
     * Передача ключа => значення
     * @param string
     * @param mixed
     */
    public static function set($key, $value){
        self::$settings[$key] = $value;
    }

}


?>
