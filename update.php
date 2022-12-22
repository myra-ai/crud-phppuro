<?php include 'php/update.php' ;?>

<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
    .container {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .container form {
        width: 500px;
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
        <form action="php/update.php" method="POST">
        <h4 class="display-4 text-center">Editar </h4><br> <br>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="name" class="form-control" id="nome" name="nome" value="<?=$row['nome'];?>" required>
            </div>

            <div class="form-group">
                <label for="CPF">CPF</label>
                <input type="text" class="form-control" id="CPF" name="CPF" value="<?=$row['CPF'];?>" required>
            </div>

            <div class="form-group">
                <label for="data">Data Nascimento</label>
                <input type="date" class="form-control" id="data" name="data"  value="<?=$row['dataNas'];?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?=$row['email'];?>" required>
            </div>

            <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" class="form-control" id="fone" name="fone"  value="<?=$row['fone'];?>" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$row['endereco'];?>" required> 
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" placeholder="Informe um CEP" value="13454422" value="<?=$row['cep'];?>" required/>
                <input type="button" id="VerificarCEP" value="Buscar CEP" />
            </div>

            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" value="<?=$row['cidade'];?>" required />
            </div>
            <div class="form-group">
                <label for="cidade">Estado</label>
                <input type="text" id="estado" name="estado" value="<?=$row['estado'];?>"  required />
            </div>

            <input type="text" name="id" value="<?=$row['id']?>" hidden>
             <button type="submit" class="btn btn-primary text-center" name="editar">Editar</button>
             <a href="read.php" class="link-primary">Lista de usuários</a>
             
    </form>

    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js">

   
    </script>
    <script>
    $(document).ready(function() {
        var $seuCampoCpf = $("#CPF");
        $seuCampoCpf.mask('000.000.000-00', {
            reverse: true
        });
    });
    </script>



<script src="js/scripts.js"></script>



</body>

</html>
