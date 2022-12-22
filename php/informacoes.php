<?php 
if(isset($_GET['id'])){
    include "db_conn.php";
    function validar($data){
        $data = trim($data);
        $data = stripcslashes($data); //retirar barras invertidas
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validar($_GET['id']);
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location:read.php");
    }

} 