<?php

if(isset($_GET['id'])){
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data); //retirar barras invertidas
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location:read.php");
    }

} else if(isset($_POST['editar'])) {
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data); //retirar barras invertidas
        $data = htmlspecialchars($data);
        return $data;
    }

    $nome = validate($_POST['nome']);
    $id = validate($_POST['id']);
    $CPF = validate($_POST['CPF']);
    $email = validate($_POST['email']);
    $dataNas = validate($_POST['data']);
    $fone = validate($_POST['fone']);
    $endereco = validate($_POST['endereco']);
    $cep = validate($_POST['cep']);
    $cidade = validate($_POST['cidade']);
    $estado = validate($_POST['estado']);

    $sql = " UPDATE users SET nome='$nome', email='$email',CPF='$CPF',dataNas ='$dataNas', fone ='$fone', endereco ='$endereco', cep = '$cep', cidade ='$cidade', estado = '$estado' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if($result){
      header("Location:../read.php?success=Usuário editado com sucesso");
    }else{
      header("Location:../index.php?error=Email is required&$user_data");
    }
} else{
    header('Location:read.php');
}