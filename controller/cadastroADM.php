<?php
    session_start();
    include('conexao.php');
    
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $dataNasc = mysqli_real_escape_string($conexao, date('Y-m-d', strtotime($_POST['dataNasc'])));
    $tel = mysqli_real_escape_string($conexao, trim($_POST['tel']));
    $rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
    $num = mysqli_real_escape_string($conexao, trim($_POST['num']));
    $bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
    $cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
    $cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));


    if(empty($_POST['cpf']) || empty($_POST['senha'])){
        $_SESSION['incompleto'] = true;
        echo "<script>window.location.href='../view/cadUserADM.php';</script>";
        exit();
    }
    
    $query = "select count(*) as total from usuario where cpf = '{$cpf}' or senha_user = md5('{$senha}') ";

    $result = mysqli_query($conexao, $query);

    $row = mysqli_fetch_array($result);

    if($row['total'] > 0){
        $_SESSION['usuario_existe'] = true;
        echo "<script>window.location.href='../view/cadUserADM.php';</script>";
    }
    else{
        $sql = "INSERT INTO  usuario (cpf, user_nome, senha_user, tipo_user, dataNasc, email, rua, num, cep, cidade, bairro) values ($cpf, '$nome', '$senha', 1, '$dataNasc', '$email', '$rua', $num, $cep, '$cidade', '$bairro')";
        echo "<script>window.location.href='../view/cadUserADM.php';</script>";
    }

    if($conexao->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
    }

    $conexao->close();
    exit();
    echo "<script>windo.location.href='../view/cadUserADM.php';</script>";
    
?>