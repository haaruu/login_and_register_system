<?php

class Database {

    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'test';

    public function __construct($servername, $username, $password, $database) {

        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() { //connection to database
        try{
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
    } catch(Exception $e){
        echo "There are problems with: ".$e;
    }
        return $this->conn;
    }
}

