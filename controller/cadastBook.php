<?php
    require_once('conexao.php');
    require_once('verifica.php');

    $nomeLivro = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
    $numPag = mysqli_real_escape_string($conexao, trim($_POST['numPag']));
    $editora = mysqli_real_escape_string($conexao, trim($_POST['editora']));
    $data = mysqli_real_escape_string($conexao, date('Y-m-d', strtotime($_POST['data'])));
    $idioma = mysqli_real_escape_string($conexao, trim($_POST['idioma']));
    $resumo = mysqli_real_escape_string($conexao, trim($_POST['resumo']));
    
    //$capa = mysqli_real_escape_string($conexao, ($_FILES['capa']));
 
    if(empty($_POST['nome']) || empty($_POST['autor']) || empty($_POST['numPag']) || empty($_POST['numPag']) || empty($_POST['editora']) || empty($_POST['data']) || empty($_POST['resumo']) || empty($_POST['idioma'])){
        $_SESSION['incompleto'] = true;
        echo "<script>window.location.href='../view/cadBook.php';</script>";
        exit;
    }

    /*1 - Se já existe o livro*/ 
    $query = "SELECT * from livro inner join livro_autor on livro.id_livro = livro_autor.id_livro inner join autor on livro_autor.id_autor = autor.id_autor where livro.nome_livro = '{$nomeLivro}' && livro.num_pag = '{$numPag}' && autor.nome_autor = '{$autor}'";

    $result = mysqli_query($conexao, $query);

    $row = mysqli_fetch_array($result);

    if($row){
        $_SESSION['livro_acresc'] = true;
        $_SESSION['id_livro'] = $row['id_livro'];

        $sql = "UPDATE livro SET qtd_livro = qtd_livro + 1 where id_livro = '{$_SESSION['id_livro']}'";

        $result = mysqli_query($conexao, $sql);

        echo "<script>window.location.href='../view/cadBook.php';</script>";
    }

    /*2 - Se o livro não existir, cadastro do livro*/
    else{
        $sql = "INSERT INTO  livro (id_livro, nome_livro, num_pag, ano_lanc, editora, resumo, idioma, capa, qtd_livro) values (null, '$nomeLivro', $numPag, '$data', '$editora', '$resumo', '$idioma', null, 1)";

        /* 2.1 - Se a execução da inserção do livro deu certo*/
        if(mysqli_query($conexao, $sql)){

            /* 2.1.1 - Conferir se o autor já existe*/
            $sql = "SELECT * from autor where nome_autor = '{$autor}'";

            $result = mysqli_query($conexao, $sql);

            $row = mysqli_fetch_array($result);

            /* 2.1.2 - Se existir o autor, inserção do id_autor e id_livro na tabela de relacionamento livro_autor*/
            if($row){
                
                $sql = "SELECT id_livro from livro where nome_livro = '$nomeLivro'";

                $result = mysqli_query($conexao, $sql);

                $row = mysqli_fetch_array($result);

                if($row){
                    $idLivro = $row['id_livro'];

                    $sql = "SELECT id_autor from autor where nome_autor = '$autor'";

                    $result = mysqli_query($conexao, $sql);

                    $row = mysqli_fetch_array($result);

                    if($row){
                        $idAutor = $row['id_autor'];

                        $sql = "INSERT INTO  livro_autor (id_livro, id_autor) values ($idLivro, $idAutor)";

                        $result = mysqli_query($conexao, $sql);

                        $_SESSION['livro_adc'] = true;
                        echo "<script>window.location.href='../view/cadBook.php';</script>";
                    }
                }
            }

            /*2.2 - Caso o autor não exista, inserção do autor e do id_autor e id_livro na tabela de relacionamento livro_autor */
            else{
                $sql = "INSERT INTO  autor (id_autor, nome_autor) values (null, '$autor')"; 

                if(mysqli_query($conexao, $sql)){
                    /*
                    1- Consultar o id do livro cadastrado;
                    2- Recuperar o id do livro;
                    3- Consultar o id do autor;
                    4- Recuperar o id do autor;
                    5- Incluir os dados na tabela livro_autor;
                    */
    
                    $sql = "SELECT id_livro from livro where nome_livro = '{$nomeLivro}'";
    
                    $result = mysqli_query($conexao, $sql);
    
                    $row = mysqli_fetch_array($result);
    
                    if($row){
                        $idLivro = $row['id_livro'];
    
                        $sql = "SELECT id_autor from autor where nome_autor = '{$autor}'";
    
                        $result = mysqli_query($conexao, $sql);
    
                        $row = mysqli_fetch_array($result);
    
                        if($row){
                            $idAutor = $row['id_autor'];
    
                            $sql = "INSERT INTO  livro_autor (id_livro, id_autor) values ($idLivro, $idAutor)";


                            $result = mysqli_query($conexao, $sql);
    
                            $_SESSION['livro_adc'] = true;
                            echo "<script>window.location.href='../view/cadBook.php';</script>";
                        }
    
                    }
    
                }
                else{
                    $_SESSION['erro_cadBook'] = true;
                    echo "<script>window.location.href='../view/cadBook.php';</script>";
                }
            }
         
        }
        else{
            $_SESSION['erro_cadBook'] = true;
            echo "<script>window.location.href='../view/cadBook.php';</script>";
        }  
    }

    $conexao->close();
?>