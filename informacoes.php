<?php include 'php/update.php' ;?>
<?php include 'php/informacoes.php' ;?>
<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Informações do usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


</head>

<body>
    <h4 class="display-4 text-center">Informações da Conta </h4><br>
    <div class="container bg-dark p-5 text-white">
        <label for="nome">Nome</label>
        <input type="name" class="form-control" id="nome" name="nome" value="<?=$row['nome'];?>" disabled="disabled">

        <label for="CPF">CPF</label>
        <input type="text" class="form-control" id="CPF" name="CPF" value="<?=$row['CPF'];?>" disabled="disabled">

        <label for="data">Data Nascimento</label>
        <input type="date" class="form-control" id="data" name="data" value="<?=$row['dataNas'];?>" disabled="disabled">

        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?=$row['email'];?>" disabled="disabled">

        <label for="fone">Telefone:</label>
        <input type="text" class="form-control" id="fone" name="fone" value="<?=$row['nome'];?>" disabled="disabled">

        <label for="endereco">Endereço:</label>
        <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$row['endereco'];?>" disabled="disabled">

        <label for="cep">Cep:</label>
        <input type="text" class="form-control" id="cep" name="cep" value="<?=$row['cep'];?>" disabled="disabled">

        <label for="cidade">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" value="<?=$row['cidade'];?> " disabled="disabled">

        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" value="<?=$row['estado'];?>" disabled="disabled">
    </div>




    <script src="js/scripts.js"></script>



</body>

</html>