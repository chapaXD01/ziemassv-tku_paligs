<?php

class Database {
    public $pdo;

    //konstruktors un destruktors - izpildas vienu reizi kad objekts ir uzstaisīts
    public function __construct($config) {
       
        // data source name
        $dsn = "mysql:" . http_build_query($config, "", ";");

        //PDO - PHP data object
        // PDO ir klase
        $this->pdo = new PDO($dsn);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function query($sql) {
        
        //sagatavo vaicajumu (statement) 
        //prepare = metode
        $statement = $this->pdo->prepare($sql);

        // izpildit statement

        $statement->execute();
        return $statement;
        
    }

}