<?php
class Connection {
    
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connect to the database
            $host = "daneel";
            $database = "n00134452";
            $username = "N00134452";
            $password = "N00134452";
            
            //$host = "localhost";
            //$database = "n00134452";
            //$username = "root";
            //$password = "root";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }
        
        return Connection::$connection;
    }
}
