<?php 
use Source\controller\ListaController;
$bool = !isset($_POST['verificador']) ? false : true;
try{
  //$controller = new ListaController;
  $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
  $controller = new ListaController;
  $Task = $controller->showOne($id);
  switch($Task['priority']){
    case 1:
      $Task['priority'] = "PRIORIDADE: Alta"; 
    break;
    case 2:
      $Task['priority'] = "PRIORIDADE: Média"; 
    break;
    case 3:
      $Task['priority'] = "PRIORIDADE: Baixa"; 
    break;
    }
  

}catch(Exception $e){
$e->getMessage();
}
if($bool){
    try{
      if(empty($_POST['prioridade'])){
        $prioridade = $Task['priority'];
      }else{
        $prioridade = filter_input(INPUT_POST,'prioridade',FILTER_SANITIZE_NUMBER_INT);
      }

      if(empty($_POST['description'])){
        $descricao = $Task['task'];
      }else{
        $descricao = strip_tags($_POST['description']);
      }
      
  

      if($controller->update($Task['id'],$prioridade,$descricao)){
        header('Location: ?page=Home');  
      }
      
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
  
  <h1 style="text-align: center;flex-grow: 1;">Editar</h1>  
  
  </div>
<div style="width: 100%; padding:1rem;text-align:center">  
    <input style="margin:auto;text-align:center;max-width: 50%;" class="form-control" type="text" value="ID: <?php echo $Task['id']; ?>"  disabled readonly>
    <input style="margin:auto;text-align:center;max-width: 50%;" class="form-control" type="text" value="<?php echo $Task['priority']; ?>"  disabled readonly>
    <input style="margin:auto;text-align:center;max-width: 50%;" class="form-control" type="text" value="TAREFA: <?php echo($Task['task'])?>"  disabled readonly>
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

<button style="margin-left:1rem"type="submit" class="btn btn-primary" >Editar</button>
</form>
