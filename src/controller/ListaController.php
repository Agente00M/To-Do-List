<?php

namespace Source\controller;

use Source\database\Conexao;
use Source\model\Lista;

class ListaController
{
    
    public function add($fields = []){
        $lista = new Lista(0,'task');
        $database = new Conexao;
        $database = $database->connect();
        $lista->registerTask($database,$fields);
    }

    public function show(){
        $lista = new Lista(0,'task');
        $database = new Conexao;
        $database = $database->connect();

        return $lista->showTask($database);
    }

    public  function showOne($id){
        $lista = new Lista(0,'task');
        $database = new Conexao;
        $database = $database->connect();
        return $lista->showOneTask($database,$id);
    }

    public function update($id,$priority,$task){
        $lista = new Lista(0,'task');
        $database = new Conexao;
        $database = $database->connect();
        return $lista->updateOne($database,$id,$task,$priority);
    }

    public function delete($id){
        $lista = new Lista(0,'task');
        $database = new Conexao;
        $database = $database->connect();
        return $lista->deleteOne($database,$id);
    }

    

    public function findPage(){
        
        $page = isset($_GET['page']) ? $_GET['page'] : 'Home';
        
        if(empty($page)){
            $page = 'Home';
        }
        return $page . ".php";

    }
}