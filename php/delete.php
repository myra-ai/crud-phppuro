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

    $sql = "DELETE FROM users where id=$id";
    $result = mysqli_query($conn, $sql);
    if($result){
      header("Location:../read.php?success=Usuário deletado com sucesso");
    }else{
      header("Location:../index.php?error=Email is required&$user_data");
    }
} else {
    header("Location:../read.php");
}