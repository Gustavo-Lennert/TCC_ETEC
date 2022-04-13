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

    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/books.css">

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Unicase:wght@600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

  </head>
  <body id="home">
      <?php 
        require_once('./userCab.php');
        $idlivro = 0;
        if(isset($_REQUEST["idLivro"])) {
          if($_REQUEST["idLivro"] != "") {
            $idlivro = $_REQUEST["idLivro"];
          }
        }
      ?>

      <div class="logo">
          <div class="title">
              <h1>Booklend</h1>
              <h2>Empréstimo de livros</h2>
          </div>
      </div>
      
      <?php require_once('./menuCab.php');?>
      <main class="library">
     
      <?php
      $query = "SELECT * from livro_autor inner join livro on livro_autor.id_livro = livro.id_livro inner join autor on livro_autor.id_autor = autor.id_autor where livro_autor.id_livro =".$idlivro;

        $result = mysqli_query($conexao, $query);
        $row = mysqli_fetch_array($result);
        if($row){
          echo '<h2>'.$row['nome_livro'].'</h2>';
          echo '<hr>';
          echo '<div class="corpo">';
          echo '<div class="box">';
          echo '<img src="./imgs/romance.jpg" alt="">';
          echo '</div>';
          echo '<div class="box">';
          echo '<p><span>Resumo do Livro : </span></p>';
          echo '<p>'.$row["resumo"].'</p>';
          echo '</div>';
          echo '</div>';
          echo '<div class="infoLivro">';
          echo '<p><span>Autor : </span>'.$row["nome_autor"].' </p> ';
          echo '<p><span>Editora : </span>'.$row["editora"].' </p>';
          echo '<p><span>Data da publicação : </span>'.$row["ano_lanc"].' </p> ';
          echo '<p><span>Número de páginas : </span>'.$row["num_pag"].'</p>';
          echo '</div>';

          if(isset($_SESSION['nao_autenticado'])){
          echo"<div class='erro_mensagem'>";
          echo"<p>Livro indisponível no momento.</p>";
          echo"</div>";
          }
          unset($_SESSION['nao_autenticado']);

          echo '<div class="botao">';
          echo '<a href="../controller/reserva.php?idlivro='.$idlivro.'"><button type="submit">Reservar</button></a>';
          echo '</div>';
        }
        ?>
        <!-- <div class="avaliacao">
          <h2>Avaliações do livro</h2>

          <div class="coment">
            <img align = "left" src="./imgs/pngwing.com (1).png" alt="">
            <h4>Jorgina Silva</h4>
            <img id="star" src="./imgs/estrelas.png" alt=""><br>
            <p>"O livro é muito bem escrito. O autor consegue imprimir ritmo, ação, suspense à sua trama. Achei o livro muito bom... 
            Até que começaram a vir os últimos capítulos e me bateu uma pressa, uma insegurança. Me deu a impressão de que ficaram faltando 
            alguns capítulos, alguns esclarecimentos, algumas respostas. Se eu soubesse que teria um Volume 2, eu teria dado 5 estrelas."</p>
            <h5><em>15/03/2020</em></h5>
          </div>

          <div class="coment">
            <img align = "left" src="./imgs/pngwing.com (1).png" alt="">
            <h4>Miller Sacagucci</h4>
            <img id="star" src="./imgs/estrelas.png" alt=""><br>
            <p>"O livro tem momentos de tensão e suspense bem construídos, mas o final deixa a desejar na minha opinião, você tende a criar
            expectativas ou ideias sobre o que vai acontecer e provavelmente é diferente do final escolhido pelo autor. A edição em si é linda,
            como de costume dos livros da darkside, há alguns pigmentos que dão textura aos dentes presentes na capa e o livro possui um marca-página próprio."</p>
            <h5><em>07/02/2021</em></h5>
          </div>

        </div> -->

        <a class="user" href="./acervo.php">
          <img src="./imgs/seta-retorno.png" alt="seta" id="seta"> 
        </a>
      </main>

      <footer>Copyright &copy; 2021 | Booklend Library System.</footer>
  </body>
</html>