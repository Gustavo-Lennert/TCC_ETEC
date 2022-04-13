<html>
    <ul>
        <?php
            if(isset($_SESSION['cpf'])){     
                $nomePerfil = $_SESSION['nome_user'];
                echo "<li id='nomeUser'> <a href='dashboard.php'> $nomePerfil </a></li>"; 
                echo "<li><a href='../controller/logout.php'>Sair</a></li> ";
                
            }
        ?>
    </ul>
    
</html>