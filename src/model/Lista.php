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


    public function registerTask($db,$fields){
        
        //$pdo = $db->connect();

        $sql = "Insert into tasks (priority,task) values (:priority,:task)"; 

        $insert = $db->prepare($sql);
        foreach($fields as $key => $value){
            $insert->bindValue($key,$value);
        }
        
        $insert->execute();

    }

    public function showTask($db){
        
      

        $sql = "Select * from tasks"; 

        $select = $db->prepare($sql);

        
        $select->execute();
        return $select->fetchAll();

    }

    public function showOneTask($db,$id){
        //$pdo = $db->connect();

        $sql = "Select * from tasks Where id = :id"; 

        $select = $db->prepare($sql);
        $select->bindValue('id',$id);
        
        $select->execute();
        return $select->fetch();
    }

    public function updateOne($db,$id,$task,$priority){ 
        $sql = "UPDATE tasks SET priority = :priority, task = :task WHERE id = :id";
        $update = $db->prepare($sql);

        $update->bindValue('priority',$priority);
        $update->bindValue('task',$task);
        $update->bindValue('id',$id);

        return $update->execute();

    }

    public function deleteOne($db,$id){ 
        $sql = "DELETE FROM tasks WHERE id = :id";
        $delete = $db->prepare($sql);


        $delete->bindValue('id',$id);

        return $delete->execute();

    }

    
}