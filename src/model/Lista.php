<?php

namespace Source\model;

class Lista
{
    private $priority;
    private $task;

    public function __construct($priority,$task)
    {
        $this->priority = $priority;
        $this->task = $task;
    }


    public function registerTask($db,$table,$fields){
        
        $pdo = $db->connect();

        $sql = "Insert into {$table} (" . implode(",",array_keys($fields)) .") values (:" . implode(",:",array_keys($fields)) .")"; 

        $insert = $pdo->prepare($sql);

        $insert->execute($fields);

    }
}