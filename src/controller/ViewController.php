<?php

namespace Source\controller;

class ViewController
{
    public function findPage(){
        
        $page = isset($_GET['page']) ? $_GET['page'] : 'Home';
        
        if(empty($page)){
            $page = 'Home';
        }
        return $page . ".php";

    }
}