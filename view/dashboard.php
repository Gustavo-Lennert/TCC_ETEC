<?php
    require_once('../controller/conexao.php');
    require_once('../controller/verifica.php');
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
            <!--Usuário ADM-->
            <?php if($_SESSION['tipo_user'] == 1  ){ ?>
                <h2>Registros</h2>
                
                <div id="tblUser">
                    <h3>Usuário comum</h3>
                    <table>
                        <thead>
                            <tr id="tituloList">
                                <td>CPF</td>
                                <td>Nome</td>
                                <td>Nascimento</td>
                                <td>E-mail</td>
                                <td>CEP</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * from usuario";
                                $result = mysqli_query($conexao, $sql);
                    
                                while($row = mysqli_fetch_array($result)){
                                    if($row['tipo_user'] == 0){
                            ?>
                    
                            <tr>
                                <td><?php echo $row["cpf"]; ?></td>
                                <td><?php echo $row["user_nome"]; ?></td>
                                <td><?php echo (date('d/m/Y', strtotime($row["dataNasc"]))); ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["cep"]; ?></td>
                                <td><?php echo '<a href="../controller/excUser.php?cpf='.$row['cpf'].'"><button type="submit">Excluir</button></a>';?></td>
                    
                            </tr>
                            <?php
                                }
                            }?>
                        </tbody>
                    </table>
                    <h3>Funcionários</h3>
                    <table>
                        <thead>
                            <tr id="tituloList">
                                <td>CPF</td>
                                <td>Nome</td>
                                <td>Nascimento</td>
                                <td>E-mail</td>
                                <td>CEP</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * from usuario";
                                $result = mysqli_query($conexao, $sql);
                    
                                while($row = mysqli_fetch_array($result)){
                                    if($row['tipo_user'] == 1){
                            ?>
                    
                            <tr>
                                <td><?php echo $row["cpf"]; ?></td>
                                <td><?php echo $row["user_nome"]; ?></td>
                                <td><?php echo (date('d/m/Y', strtotime($row["dataNasc"]))); ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["cep"]; ?></td>
                                <td><?php echo '<a href="../controller/excUser.php?cpf='.$row['cpf'].'"><button type="submit">Excluir</button></a>';?></td>
                    
                            </tr>
                            <?php
                                }
                            }?>
                        </tbody>
                    </table>
                    <h3>Reservas</h3>
                    <table>
                        <thead>
                            <tr id="tituloList">
                                <td>Código</td>
                                <td>Livros</td>
                                <td>idLivro</td>
                                <td>Data</td>     
                            </tr>                
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * from reserv_liv 
                                inner join reserv_liv on reserva.id_reserva = reserv_liv.id_reserva 
                                inner join livro on reserv_liv.id_livro = livro.id_livro 
                                inner join usuario on usuario.cpf = reserv_liv.cpf_user";

                                $result = mysqli_query($conexao, $sql);            
                    
                                while($row = mysqli_fetch_array($result)){       
                            ?>
                    
                            <tr>        
                                <td><?php echo $row["id_reserva"]; ?></td>
                                <td><?php echo $row["nome_livro"]; ?></td>
                                <td><?php echo $row["id_livro"]; ?></td> 
                                <td><?php echo (date('d/m/Y', strtotime($row["data_reserva"])));?></td>                       
                            </tr>
                            <?php } ?>
                        </tbody>            
                    </table>
                </div>
            <?php } ?>
            <!--Usuário comum-->
            <?php if($_SESSION['tipo_user'] != 1){ ?>
                <h2>Perfil</h2>
                <div id="tblUser">
                    <h3>Meus dados</h3>
                    <table>
                        <thead>
                            <tr id="tituloList">
                                <td>Nome</td>
                                <td>CPF</td>
                                <td>E-mail</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * from usuario where cpf = {$_SESSION['cpf']} ";
                                $result = mysqli_query($conexao, $sql);
                    
                                while($row = mysqli_fetch_array($result)){
                            ?>
                    
                            <tr>
                                
                                <td><?php echo $row["user_nome"]; ?></td>
                                <td><?php echo $row["cpf"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                    
                            </tr>
                            <?php
                            }?>
                        </tbody>
                    </table>
                    <h3>Reservas</h3>
                    <table>
                        <thead>
                            <tr id="tituloList">
                                <td>Código</td>
                                <td>Livros</td>
                                <td>idLivro</td>
                                <td>Data</td>     
                            </tr>                
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * from reserva 
                                inner join reserv_liv on reserva.id_reserva = reserv_liv.id_reserva 
                                inner join livro on reserv_liv.id_livro = livro.id_livro 
                                inner join usuario on usuario.cpf = reserv_liv.cpf_user";

                                $result = mysqli_query($conexao, $sql);            
                    
                                while($row = mysqli_fetch_array($result)){       
                            ?>
                    
                            <tr>        
                                <td><?php echo $row["id_reserva"]; ?></td>
                                <td><?php echo $row["nome_livro"]; ?></td>
                                <td><?php echo $row["id_livro"]; ?></td> 
                                <td><?php echo (date('d/m/Y', strtotime($row["data_reserva"])));?></td>                       
                            </tr>
                            <?php } ?>
                        </tbody>            
                    </table>
                </div>                    

            <?php } ?>
        </main>

    <footer>Copyright &copy; 2021 | Booklend Library System.</footer>
    </body>
</html> 

