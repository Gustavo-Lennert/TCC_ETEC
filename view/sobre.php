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

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Unicase:wght@600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/forms.css">

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
    
    <main class="about">
        <h2>Booklend System</h2>
        <p>Atualmente, acabou se tornando comum a perda de livros, desorganização e falta 
        de produtividade em questões de cadastro dos clientes. Tendo isso em mente, foi elaborado a ideia de construir 
        um sistema voltado para bibliotecas menores/publicas, visando organização, praticidade, e a melhor administração 
        de entrada e saída de livros, evitando percas indesejadas.</p>
        <p>Partindo do pressuposto onde as bibliotecas no geral tenha uma certa dificuldade de organização, administração, 
        controle de cada livro e usuário. Pode haver a necessidade de um sistema que administre, solucione e torne prático 
        tanto o trabalho do bibliotecário como a utilização do usuário. </p>
        
        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/ea5d0476339699.5c6694d453222.gif" alt="">

        <p>
            O processo de ação cultural pressupõe que indivíduos participem de atividades culturais e vivenciem múltiplas experiências e potencialize o seu conhecimento. Assim, a ação cultural é uma das atividades ligadas às funções culturais de democratização da informação. 
        </p>
        <p>
            Trazendo a função educativa para a discussão, devem ser incluídas outras vertentes desta tão importante função, pois hoje as bibliotecas públicas servem também como apoio aos alunos do ensino formal, ensino médio e fundamental, educação de jovens e adulto, assim como instituição que incentiva a prática de leitura, nesse sentido, a biblioteca pública funciona como alicerce da educação formal e não formal.
        </p>

        <h3>
            O principal objetivo deste projeto é proporcionar facilidade nos empréstimos dos livros, oferecendo ao gestor
            maior controle e organização da biblioteca, além de praticidade administrativa. 
        </h3>

        <div id="teste">
            <h2>Venha conferir nosso acervo de livros!</h2>
            <a href="acervo.php">
                <img src="./imgs/celbook.png" id="add">
            </a> 
        </div>   
    </main>


<footer>Copyright &copy; 2021 | Booklend Library System.</footer>
</body>
</html>