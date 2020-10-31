<?php
class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbName = "prowebif";

    protected function connect(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    protected function getMysqli(){
        return new mysqli($this->host, $this->user, $this->pass, $this->dbName);
    }
}
