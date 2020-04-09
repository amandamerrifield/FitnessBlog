<?php

class DB {
    
    private static $instance = NULL;

    //Singleton Design Pattern
    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO(
            'mysql:host=127.0.0.1;dbname=exercises',
            'trainer',
            'trainer#4',
            $pdo_options);
      }
      return self::$instance;
    }
}
