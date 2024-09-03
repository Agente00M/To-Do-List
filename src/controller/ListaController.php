<?php

namespace Source\controller;

use Source\database\Conexao;
use Source\model\Lista;

class ListaController
{
    
    public function add($fields = []){
        $lista = new Lista(0,'task');
        $database = new Conexao;
        $database->connect();
        $lista->registerTask($database,'tasks',$fields);
    }
}