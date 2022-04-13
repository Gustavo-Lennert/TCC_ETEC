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
     
    <link rel="stylesheet" href="styles/Fontes/FuturaPT.otf">
    <link rel="stylesheet" href="styles/Fontes/museosans.ttf">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Roboto:wght@300&display=swap" 
    rel="stylesheet"> 
    
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
    
    <main class="home">

        <div class="info">
            <h2>Bem Vindo a Biblioteca Luz do Saber!!</h2>

            <p>Inaugurada em 8 de fevereiro de 2010, é uma instituição da Secretaria de Cultura e Economia
            Criativa do Governo do Estado de São Paulo, gerida pela Organização Social SP Leituras, eleita pelo terceiro ano consecutivo uma das 100 Melhores ONGs do Brasil.</p>
            <p>Situado na Zona Norte da capital, o espaço está localizado dentro do Parque da Juventude e visa promover o incentivo à cultura, à leitura e à literatura e tem estrutura planejada para oferecer conforto e autonomia aos frequentadores, que são o elemento central da biblioteca.</p>
            <p>Com entrada gratuita e programação diversificada, a BSP oferece conteúdo em formatos variados, como livros tradicionais ou em 
            braille e audiolivro, DVDs, CDs, além de jogos. Ocupa uma área de 4.257 metros quadrados para atender ao público – crianças,
            jovens, adultos, idosos com e sem deficiência. A biblioteca conta com recursos tecnológicos como computadores,
            rede wireless e terminal de autoatendimento, além de sala de jogos eletrônicos, ludoteca e auditório.</p>

            <h4>Contato</h4>
            <p>Telefone: +55 (11) 4002-8922</p>
            <p>Email: contato@biblioteca.org.br</p>
        
        </div>

        <div class="star">
            <h2 >Favoritos do mês </h2>
            <img src="./imgs/favorite.png" alt="favorite" height="35px" width="35px">
        </div>

        <div class="fav">
            <img align = "left" src="./imgs/ex.jpg" alt="">
            <h4>O Colecionador</h4>
            <p>É um romance de suspense de 1963 escrito pelo autor inglês John Fowles.
            Foi o seu primeiro livro e estreia literária. A trama se passa em Londres e segue Frederick Clegg, um jovem banqueiro solitário
            e psicótico que decidi perseguir e sequestrar Miranda Grey, uma jovem estudante de arte que a mantém em cativeiro no porão de 
            sua casa rural que comprou com o dinheiro da loteria. Dividido em duas seções, o romance contém ambas as perspectiva do captor, 
            Frederick e da prisioneira, Miranda. A porção do livro é contado da perspectiva da Miranda que é apresentado de forma epistolar. 
            A obra se tornou um grande sucesso.</p>
            <h5><em>Lido por 30 pessoas.</em></h5>
        </div>

        <div class="fav">
            <img align="left" src="./imgs/glass.PNG" alt="">
            <h4>A Lâmina da Assassina</h4>
            <p>Conheça o caminho da assassina. Pavimentado com sangue, lágrimas e suor Implacável, sedutora, letal. Poucos conhecem seu
            rosto, menos ainda sobrevivem à sua fúria. Não à toa Celaena Sardothian é sinônimo de morte. Suas lâminas são certeiras,
            assim como seu estranho código de honra e seu aguçado senso de justiça.
            Acompanhe Celaena vencer seu treinamento com o Mestre Mudo, senhor dos assassinos silenciosos, nas dunas do deserto Vermelho; 
            a prisão nas Minas de Sal de Endovier; ou, ainda, sua luta contra o mais escorregadio e traiçoeiro dos adversários — o próprio coração.</p>
            <h5><em>Lido por 27 pessoas.</em></h5>
        </div>

    </main>

<footer>Copyright &copy; 2021 | Booklend Library System.</footer>
</body>
</html> 