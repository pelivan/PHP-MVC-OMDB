<?php

class MySQLiDatabase {

    public $MySQLi;

    protected $queryCount = 0;

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    public function __construct($host,$user,$password,$database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connect(); // kada se instancira model odma se spaja na bazu
        $this->selectDatabase(); //dodano
    }

    public function connect()
    {
       $this->MySQLi = new MySQLi($this->host, $this->user, $this->password, $this->database);
       if(mysqli_connect_errno())
       {
           throw new DatabaseException("Connecting to MySQL server '".$this->host . "' failed ." . $this);

       }
    }

    public function selectDatabase()
    {
        if ($this->MySQLi->select_db($this->database) === false) {
            throw new DatabaseException("Cannot use database ".$this->database, $this);
        }
    }

    public function sendQuery($query, $errorReporting = true)
    {
        $this->queryCount++;
        $this->result = $this->MySQLi->query($query);
        if ($this->result === false && $errorReporting === true) {
            throw new DatabaseException("Invalid SQL: " . $query . $this);
        }

        return $this->result;
    }

}