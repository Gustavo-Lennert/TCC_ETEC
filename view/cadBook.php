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
        <main class="cad">
            <form method="POST" enctype="multipart/form-data" action="../controller/cadastBook.php">
                <img id="liv" src="https://media4.giphy.com/media/gjxYwnMG7Mocmc75DM/giphy.gif?cid=ecf05e472iiufshvkpqjqzl484nydsn2mpc31o9rzbgncefj&rid=giphy.gif&ct=s" alt="bookGif" width="300px" height="180px"></img>

                <h2>Adicione um novo livro ao acervo!</h2>

                <?php
                    if(isset($_SESSION['incompleto'])){
                ?>
                    <div class='erro_mensagem'>
                        <p>Preencha todos os campos!</p>
                        <br>
                    </div>
                <?php                   
                    }
                    unset($_SESSION['incompleto']);
                ?>

                <?php
                    if(isset($_SESSION['livro_acresc'])){
                ?>
                    <div class='mensagem_func'>
                        <p>Este livro foi acrescentado a seu acervo!</p>
                        <br>
                    </div>
                <?php                   
                    }
                    unset($_SESSION['livro_acresc']);
                ?>

                <?php
                    if(isset($_SESSION['livro_adc'])){
                ?>
                    <div class='mensagem_func'>
                        <p>Este livro foi adicionado a seu acervo!</p>
                        <br>
                    </div>
                <?php                   
                    }
                    unset($_SESSION['livro_adc']);
                ?>  

                <input type="text" id="nome" name="nome" placeholder="Nome"><br>
                <input type="text" id="autor" name="autor" placeholder="Autor"><br>
                <input type="number" id="numPag" name="numPag" placeholder="Numero de Páginas"><br>
                <input type="text" id="editora" name="editora" placeholder="Editora"><br>
                <input type="text" id="idioma" name="idioma" placeholder="Idioma"><br>
                <h4>Data de Publicação</h4>
                <input type="date" id="dataLiv" name="data"><br>
                <!--<input type="file" id="capa" name="capa"><br>-->
                <textarea type="text" id="resumo" name="resumo" placeholder="Resumo"></textarea><br>

                <button type="submit">Adicionar</button>
            </form>
            <br>
        </main>
    </div>

<footer>Copyright &copy; 2021 | Booklend Library System.</footer>
</body>
</html>