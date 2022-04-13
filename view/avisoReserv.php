<?php
   require_once('../controller/verifica.php');
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#8257E5">
    
    <title>Booklend | Sistema de controle de biblioteca</title>

    <link rel="shortcut icon" href="./imgs/favicon.ico" type="image/png">

    <link rel="stylesheet" href="./styles/aviso.css">
    <link rel="stylesheet" href="./styles/main.css">

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

    <main id="alert">
        <div class="info">
            <h1>Reserva feita com sucesso!!</h1>
            <h2>O empréstimo será feito assim que o livro estiver disponível.</h2>
            <a href="./home.php">OK</a>
        </div>
    </main>
    
    <footer>Copyright &copy; 2021 | Booklend Library System.</footer>
</body>
</html>