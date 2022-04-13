<?php
    session_start();
    require_once('conexao.php');
    
    if(empty($_POST['cpf']) || empty($_POST['senha'])){
        $_SESSION['incompleto'] = true;
        echo "<script>window.location.href='../view/logIndex.php';</script>";
        exit();
    }
    
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    
    $sql = "SELECT* from usuario where cpf='{$cpf}' and senha_user= md5('{$senha}')";

    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_array($result);

    if($row){
        $_SESSION['cpf'] = $cpf;
        $_SESSION['nome_user'] = $row['user_nome'];
        $_SESSION['tipo_user'] = $row['tipo_user'];
        $_SESSION['dataNasc'] = $row['dataNasc'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['cep'] = $row['cep'];


        echo "<script>window.location.href='../view/dashboard.php';</script>";
    } 
    else{
        $_SESSION['nao_autenticado'] = true;
        echo "<script>window.location.href='../view/logIndex.php';</script>";
    }

    
?>