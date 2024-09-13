<?php 
use Source\controller\ListaController;
$bool = !isset($_POST['verificador']) ? false : true;

if($bool){
    try{
      $controller = new ListaController;
      $prioridade = filter_input(INPUT_POST,'prioridade',FILTER_SANITIZE_NUMBER_INT);
      $descricao = filter_input(INPUT_POST,'description',FILTER_SANITIZE_SPECIAL_CHARS);
      $array = [
        'priority' => $prioridade,
        'task' => $_POST['description']];
      $controller->add($array);
      echo "<script>alert('Task cadastrada');</script>";  
    }catch(Exception $e){
        $e->getMessage();
    }
    
}


?>

  
  <div class="w-100 p-3 " style="background-color: #eee; display: flex;align-items: center;justify-content: space-between;">
  <form  method="GET" action="?page=Home">
        <input type="hidden" value="Home" name="page">
        <button type="submit" class="btn btn-primary" >Voltar</button>
  </form>
  
  <h1 style="text-align: center;flex-grow: 1;">Cadastro</h1>  
  
  </div>

<form  method="POST">
    <input type="hidden" name="verificador" value="false">
<label   style="margin-left:1rem" class="form-label ">Prioridade</label>
<select name="prioridade" class="form-select" style="margin: 1rem;max-width:95%">

  <option selected value="1">Alta</option>
  <option value="2">Intermediaria</option>
  <option value="3">Baixa</option>
</select>
  <div class="mb-3">
  <label   style="margin-left:1rem" class="form-label ">Tarefa</label>
  <textarea name="description" style="margin: 1rem;max-width:95%" class="form-control" rows="3"></textarea>
</div>

<button style="margin-left:1rem"type="submit" class="btn btn-primary" >Cadastrar</button>
</form>