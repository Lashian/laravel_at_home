<?php

class DatabaseConnection
{
    private $host;
    private $user;
    private $password;
    private $dbName;
    private $charset;

    public function connect()
    {

        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->dbName = "projectphp";
        $this->charset = "utf8mb4";

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            echo "FAILED TO CONNECT: " . $e->getMessage();
        }

    }

}