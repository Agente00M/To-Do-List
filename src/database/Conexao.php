<?php

namespace Source\database;
use \Pdo;
use \PdoException;

class Conexao
{
    
    private $connection;

public function connect() {
     $dbHost = 'localhost';
     $dbUser = 'postgres';
     $dbName = 'PHP';
     $dbPass = '-------';
     $this->connection = null;

    if ($this->connection === null) {
        try { 
            $this->connection = new PDO(
                "pgsql:dbname=" . $dbName . ";host=" . $dbHost ,
                $dbUser,
                $dbPass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            return $e;
        }
    } else {
        return $this->connection;
    }
}
}

