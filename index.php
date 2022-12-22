<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD - Projeto</title>
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


        <form action="php/create.php" method="POST">

            <h4 class="display-4 text-center">Cadastrar Usuário </h4><br> <br>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="name" class="form-control" id="nome" placeholder="Digite seu nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="CPF">CPF</label>
                <input type="text" class="form-control" id="CPF" placeholder="Digite seu cpf" name="CPF" required>
            </div>

            <div class="form-group">
                <label for="data">Data Nascimento</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" class="form-control" id="fone" name="fone" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" placeholder="Informe um CEP" value="13454422" required />
                <input type="button" id="VerificarCEP" value="Buscar CEP" />
            </div>

            <select id="pais" selected="Brasil" disabled="disabled" hidden></select>

            <div class="form-group">
                <label id="campo_estado">
                    Estado
                    <select id="estado" name="estado"></select>
                </label>
            </div>
            <div class="form-group">
                <label id="campo_cidade">
                    Cidade
                    <select id="cidade" name="cidade"></select>
                </label>
            </div>

            <button type="submit" class="btn btn-primary text-center" name="cadastrar">Cadastrar</button>
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

    <script>
    function montaCidade(estado, pais) {
        $.ajax({
            type: 'GET',
            url: 'http://api.londrinaweb.com.br/PUC/Cidades/' + estado + '/' + pais + '/0/10000',
            contentType: "application/json; charset=utf-8",
            dataType: "jsonp",
            async: false
        }).done(function(response) {
            cidades = '';

            $.each(response, function(c, cidade) {

                cidades += '<option value="' + cidade + '">' + cidade + '</option>';

            });

            // PREENCHE AS CIDADES DE ACORDO COM O ESTADO
            $('#cidade').html(cidades);

        });
    }

    function montaUF(pais) {
        $.ajax({
            type: 'GET',
            url: 'http://api.londrinaweb.com.br/PUC/Estados/' + pais + '/0/10000',
            contentType: "application/json; charset=utf-8",
            dataType: "jsonp",
            async: false
        }).done(function(response) {
            estados = '';
            $.each(response, function(e, estado) {

                estados += '<option value="' + estado.UF + '">' + estado.Estado + '</option>';

            });

            // PREENCHE OS ESTADOS BRASILEIROS
            $('#estado').html(estados);

            // CHAMA A FUNÇÃO QUE PREENCHE AS CIDADES DE ACORDO COM O ESTADO
            montaCidade($('#estado').val(), pais);

            // VERIFICA A MUDANÇA NO VALOR DO CAMPO ESTADO E ATUALIZA AS CIDADES
            $('#estado').change(function() {
                montaCidade($(this).val(), pais);
            });

        });
    }

    function montaPais() {
        $.ajax({
            type: 'GET',
            url: 'http://api.londrinaweb.com.br/PUC/Paisesv2/0/1000',
            contentType: "application/json; charset=utf-8",
            dataType: "jsonp",
            async: false
        }).done(function(response) {

            paises = '';

            $.each(response, function(p, pais) {

                if (pais.Pais == 'Brasil') {
                    paises += '<option value="' + pais.Sigla + '" selected>' + pais.Pais + '</option>';
                } else {
                    paises += '<option value="' + pais.Sigla + '">' + pais.Pais + '</option>';
                }

            });

            // PREENCHE O SELECT DE PAÍSES
            $('#pais').html(paises);

            // PREENCHE O SELECT DE ACORDO COM O VALOR DO PAÍS
            montaUF($('#pais').val());

            // VERIFICA A MUDANÇA DO VALOR DO SELECT DE PAÍS
            $('#pais').change(function() {
                if ($('#pais').val() == 'BR') {
                    // SE O VALOR FOR BR E CONFIRMA OS SELECTS
                    $('#estado').remove();
                    $('#cidade').remove();
                    $('#campo_estado').append('<select id="estado"></select>');
                    $('#campo_cidade').append('<select id="cidade"></select>');

                    // CHAMA A FUNÇÃO QUE MONTA OS ESTADOS
                    montaUF('BR');
                } else {
                    // SE NÃO FOR, TROCA OS SELECTS POR INPUTS DE TEXTO
                    $('#estado').remove();
                    $('#cidade').remove();
                    $('#campo_estado').append('<input type="text" id="estado">');
                    $('#campo_cidade').append('<input type="text" id="cidade">');
                }
            })

        });
    }

    montaPais();
    </script>





    <script src="js/scripts.js"></script>



</body>

</html>