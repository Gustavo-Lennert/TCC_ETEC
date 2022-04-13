<?php
    session_start();
    require_once('conexao.php');
    
    $idlivro = 0;
    if(isset($_REQUEST["idlivro"])) {
        if($_REQUEST["idlivro"] != "") {
        $idlivro = $_REQUEST["idlivro"];
        }
    }
    

    $query = "SELECT * from livro where id_livro = ".$idlivro;
    $result = mysqli_query($conexao, $query);
    $row = mysqli_fetch_array($result);
    $nomeLivro = $row['nome_livro'];
    $qtdLivro = $row['qtd_livro'];

    if($_SESSION['cpf']){
        if($row){
            $query = "SELECT count(*) as total from reserva where nome_livro = '$nomeLivro'";
            $result = mysqli_query($conexao, $query);
            $row = mysqli_fetch_array($result);

            if($row['total'] == $qtdLivro){
                echo "<script>window.location.href='../view/avisoLivroIndisp.php';</script>";
            }
            else{   
                $query = "INSERT INTO reserva(id_reserva, cpf_user, nome_livro, data_reserva) values (null, {$_SESSION['cpf']}, '$nomeLivro', CURDATE())";
                
                if($result = mysqli_query($conexao, $query)){
                    $query = "SELECT id_reserva from reserva where cpf_user = {$_SESSION['cpf']}";
                    $result = mysqli_query($conexao, $query);

                    if($row = mysqli_fetch_array($result)){
                        $idReserva = $row['id_reserva'];
                        $query = "INSERT INTO reserv_liv(cpf_user, id_reserva, id_livro) values ({$_SESSION['cpf']}, $idReserva, $idlivro)";
                        $result = mysqli_query($conexao, $query);
                        echo "<script>window.location.href='../view/avisoReserv.php';</script>";
                    }
                }
            }  
        }
    }
    else{
        echo "<script>window.location.href='../view/logIndex.php';</script>";
    }
    $conexao->close();
?>