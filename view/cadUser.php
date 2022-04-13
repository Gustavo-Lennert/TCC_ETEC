<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#8257E5">
    
    <title>Booklend | Sistema de controle de biblioteca</title>

    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/png">

    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/forms.css">

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Unicase:wght@600&display=swap" rel="stylesheet">

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
        <main class="user">
            <form action="../controller/cadastro.php" method="POST">
                <img src="https://i.pinimg.com/originals/e1/59/25/e15925c931a81678a3c2e0c0a40db781.gif" alt="bookGif"></img>

                <h2>Digite seus dados</h2>

                <?php
                    if(isset($_SESSION['usuario_existe'])){
                ?>
                    <div class='erro_mensagem'>
                        <p>Usuário já existe!</p>
                    </div>
                <?php                   
                    }
                    unset($_SESSION['usuario_existe']);
                ?>
                
                <?php
                    if(isset($_SESSION['status_cadastro'])){
                ?>
                    <div class='mensagem_func'>
                        <p>Cadastro efetuado com sucesso!<br></p>
                        <p id='p2'>Clique<a href="./logIndex.php" id="logLink"><strong> aqui </strong></a>para logar.</p>
                    </div>
                <?php                   
                    }
                    unset($_SESSION['status_cadastro']);
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

                <input type="text" id="nome" name="nome" placeholder="Nome"><br>
                <input type="text" id="cpf" name="cpf" placeholder="CPF"><br>
                <input type="password" id="senha" name="senha" placeholder="Senha"><br>
                <input type="email" id="email" name="email" placeholder="E-mail"><br>
                <h4>Nascimento</h4>
                <input type="date" id="dataNasc" name="dataNasc" placeholder="Data Nscmt"><br>
                <input type="text" id="rua" name="rua" placeholder="Rua"><br>
                <input type="number" id="num" name="num" placeholder="Número"><br>
                <input type="text" id="bairro" name="bairro" placeholder="Bairro"><br>
                <input type="text" id="cidade" name="cidade" placeholder="Cidade"><br>
                <input type="text" id="cep" name="cep" placeholder="CEP"><br><br>

                <button type="submit">Cadastrar</button>
            </form>
            <p>
                <a href="logIndex.php">
                    <img src="./imgs/seta-retorno.png" alt="seta" id="seta"> 
                 </a>
            </p>
        </main>
    </div>

<footer>Copyright &copy; 2021 | Booklend Library System.</footer>
</body>
</html>