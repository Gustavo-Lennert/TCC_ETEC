<?php
    session_start();
    require_once('conexao.php');
   
    $cpf = 0;
    if(isset($_REQUEST["cpf"])) {
        if($_REQUEST["cpf"] != "") {
        $cpf = $_REQUEST["cpf"];
        }
    }
    $query = "SELECT * from usuario where cpf =".$cpf;
    $result = mysqli_query($conexao, $query);
    $row = mysqli_fetch_array($result);

    if($row){
      $query = "DELETE from usuario where cpf =".$cpf;
      $result = mysqli_query($conexao, $query);
      echo "<script>window.location.href='../view/dashboard.php';</script>";
    }

