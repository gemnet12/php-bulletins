<?php 
    try {
        define('DB_HOST', 'localhost');
        define('DB_USER', 'gemnet-12');
        define('DB_PASS', 'password');
        define('DB_NAME', 'bulletins');
    
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
        if($connection->connect_error) {
            die('Connction Failed' . $connection->connect_error);
        }
    } catch(Exception $e) {
        echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
    }
?>