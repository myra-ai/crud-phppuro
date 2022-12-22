<?php
 if(isset($_POST['cadastrar'])){
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data); //retirar barras invertidas
        $data = htmlspecialchars($data);
        return $data;
    }

    $nome = validate($_POST['nome']);
    $CPF = validate($_POST['CPF']);
    $email = validate($_POST['email']);
    $dataNas = validate($_POST['data']);
    $fone = validate($_POST['fone']);
    $endereco = validate($_POST['endereco']);
    $cep = validate($_POST['cep']);
    $cidade = validate($_POST['cidade']);
    $estado = validate($_POST['estado']);

    $sql = "INSERT INTO users(nome,email,CPF,dataNas,fone,endereco,cep,cidade,estado)VALUES('$nome','$email','$CPF','$dataNas','$fone','$endereco', '$cep', '$cidade', '$estado')";
    $result = mysqli_query($conn, $sql);
    if($result){
      header("Location:../read.php?success=Usuário criado com sucesso");
    }else{
      header("Location:../index.php?error=Email is required&$user_data");
    }
   

 }

?>