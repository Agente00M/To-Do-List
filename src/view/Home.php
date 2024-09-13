<div class="w-100 p-3 " style="background-color: #eee;text-align: right;">
    <form method="GET" action="?page=Home">
        <input type="hidden" value="Create" name="page">
<button type="submit" class="btn btn-primary" >Cadastrar</button>
</form> 
</div>
<ul class="list-group" style="display:inline;width:100%">
<li class="list-group-item " style="display: flex; justify-content:space-around">
 
<b >Prioridade</b>
<b >Descrição</b>
<b >#</b>
  
</ul>
  <?php

use Source\controller\ListaController;

    $lista = new ListaController;

    $tasks = $lista->show();

    foreach($tasks as $value):
  ?>
  <ul class="list-group" style="display:inline;width:100%">

  <li class="list-group-item " style="display: flex; justify-content:space-around"><?php switch($value['priority']){
    case 1:
      echo "Prioridade Alta"; 
    break;
    case 2:
      echo "Prioridade Média"; 
    break;
    case 3:
      echo "Prioridade Baixa"; 
    break;
    }?> 
    <p><?php echo $value['task'] ?></p>
    <form method="GET" action="/">
      <input type="hidden" value="Update" name="page">
      <input type="hidden" value=<?php echo $value['id']?> name="id">
    <button type="submit" style="display: inline" type="button" class="btn btn-primary">Editar</button>

    <form method="GET" action="/">
      <input type="hidden" value="Delete" name="page">
      <input type="hidden" value=<?php echo $value['id']?> name="id">
    <button type="submit" style="display: inline" type="button" class="btn btn-danger">Excluir</button>
    </form>
    </li>
  </ul>
   <?php endforeach; ?>   
 