<?php

class DB
{

    private $host;
    private $username;
    private $password;
    private $dbName;

    public function connect()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbName = "phpproject";

        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
        return $conn;
    }
}

class User extends DB
{

    public function getUser()
    {
        $sql = "select * from loginuser";
        $stmt = $this->connect()->query($sql);
        if ($stmt && $stmt->num_rows > 0) {
        }
    }
}
