<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#8257E5">
    
    <title>Booklend | Sistema de controle de biblioteca</title>

    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/png">
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/forms.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">


    

</head>
<body id="home">

    <?php require_once('./userCab.php');?>
    
    <div class="logo">
        <div class="title">
            <h1>Booklend</h1>
            <h2>Empréstimo de livros</h2>
        </div>

        <!--<img src="imgs/notbook.png" alt="Booklend">-->
    </div>
    <?php require_once('./menuCab.php');?>

    <div class="form">
        <main class="log"> 
            <!--<img src="imgs/loginpo.png" alt="imgLogin">--> 

            <h2>Login</h2>
            <form action="../controller/login.php"  method="POST">
                <input type="text" id="cpf" name="cpf" placeholder="CPF">
                <br>
                <input type="password" id="senha" name="senha" placeholder="Senha">             
                <?php
                    if(isset($_SESSION['nao_autenticado'])){
                ?>
                    <div class='erro_mensagem'>
                        <p>Usuário ou senha inválidos.</p>
                    </div>
                <?php                   
                    }
                    unset($_SESSION['nao_autenticado']);
                ?>
                <?php
                    if(isset($_SESSION['incompleto'])){
                ?>
                    <div class='erro_mensagem'>
                        <p>Preencha todos os campos!</p>
                    </div>
                <?php                   
                    }
                    unset($_SESSION['incompleto']);
                ?>
                <button type="submit">Entrar</button>
                <br>
            </form>
            <br>
            <a href="cadUser.php">
                <strong>Cadastre-se</strong>
            </a>
        </main>
    </div>

    <footer>Copyright &copy; 2021 | Booklend Library System.</footer>
</body>
</html>