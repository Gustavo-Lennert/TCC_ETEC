<?php
    session_start();
    require_once('../controller/conexao.php');
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
    <link rel="stylesheet" href="./styles/books.css">

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
    <?php require_once('./menuCab.php');

        $query = "SELECT * from livro inner join livro_autor on livro.id_livro = livro_autor.id_livro inner join autor on livro_autor.id_autor = autor.id_autor order by livro.nome_livro";

        $result = mysqli_query($conexao, $query);
        if($result){
            $qtdE = 1;
            $primeira = true;
            
            while( $row = mysqli_fetch_array($result)){
                if($primeira) {
                    echo '<div class="books">';
                    $primeira = false;
                }
                echo '<label class="book">';
                echo'<a href="./books.php?idLivro='.$row['id_livro'].'"><img src="./imgs/romance.jpg" alt=""></a>';
                echo '<h3>'.$row["nome_livro"].'</h3>';
                echo '<h4>'.$row["nome_autor"].'</h4>';
                echo '</label>';
            
                if($qtdE >= 4){
                    $primeira = true;
                    echo '</div>';
                    
                    $qtdE = 1;
                }
                else{
                    $qtdE++;
                }
                
            }
            if($qtdE >= 2) {
                echo '</div>';
            }
        }  
    ?>
  

<footer>Copyright &copy; 2021 | Booklend Library System.</footer>
</body>
</html>