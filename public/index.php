<?php
require "../vendor/autoload.php";
use Dotenv\Dotenv;
use Source\controller\ListaController;
$dotenv = Dotenv::createImmutable(dirname(__DIR__,1));
$dotenv->load();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>To Do List</title>
</head>
<body>
    
    <?php 
    
        $view = new ListaController();
        try{
        $page = $view->findPage();
        require "../src/view/" . $page;
        }catch(Exception $e){
            echo $e->getMessage();
        }

    ?>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>