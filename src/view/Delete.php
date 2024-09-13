<?php

use Source\controller\ListaController;

try{
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    $controller = new ListaController;

    if($controller->delete($id)){
        header('Location: ?page=Home');
    }

}catch(Exception $excecao){
    $excecao->getMessage();
}
