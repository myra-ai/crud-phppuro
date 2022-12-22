<?php include "php/read.php"; ?>
<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
<style>
.container table{
    padding: 20px;
    border-radius: 10px;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
}
</style>

</head>

<body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js">
    </script>
    <div class="container">
        <div class="box">
        <h4 class="display-4 text-center">Lista de Usuários </h4><br> <br>
        <?php if(isset($_GET['success'])){ ?>
         <div class="alert alert-success" role="alert">
             <?php echo $_GET['success'];?>
        </div>
        <?php }?>
    <?php if(mysqli_num_rows($result)){?>
        <table class="table table-striped" style="padding: 10000px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">CPF</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Telefone</th>
      <th scope="col">Endereço</th>
      <th scope="col">Cep</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    while($rows=mysqli_fetch_assoc($result)){
      $i++;
    ?>
    <tr>
      <th scope="row"><?=$i ?></th>
      <td><?=$rows['nome']?></td>
      <td><?=$rows['email']?></td>
      <td><?=$rows['CPF']?></td>
      <td><?=$rows['dataNas']?></td>
      <td><?=$rows['fone']?></td>
      <td><?=$rows['endereco']?></td>
      <td><?=$rows['cep']?></td>
      <td><?=$rows['cidade']?></td>
      <td><?=$rows['estado']?></td>
      <td>
      <a href="update.php?id=<?=$rows['id']?>" class="btn btn-success">Editar</a><br>
      <a href="php/delete.php?id=<?=$rows['id']?>" class="btn btn-danger">Deletar</a>
      <a href="informacoes.php?id=<?=$rows['id']?>" class="btn btn-dark"title="Informações do usuário">Informações</a>
    
    </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
     <div class="link-right">
     <a href="index.php" class="link-primary">Cadastrar Usuário</a>

     </div>
        </div>

    </div>


    <script src="js/scripts.js"></script>

</body>

</html>