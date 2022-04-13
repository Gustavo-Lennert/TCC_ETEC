<html>
    <ul>
        <li ><a href="home.php" id = "sair">Home</a></li>
        <li><a href="acervo.php">Acervo</a></li>
        <li><a href="sobre.php">Sobre</a></li>
        <?php 
            if(isset($_SESSION['tipo_user'])){
                if($_SESSION['tipo_user'] == 1){
                    echo '<li>
                            <div class="dropdown">
                                <button class="dropbtn"><img src="./imgs/iconMenu.png" alt=""></button>
                                <div class="dropdown-content">
                                    <a href="dashboard.php">Registros</a>
                                    <a href="cadUserADM.php">Cadastro</a>
                                    <a href="cadBook.php">CadBook</a>
                                </div>
                            </div>
                        </li>';
                }  
            }
            if(!isset($_SESSION['cpf'])){
                echo '<li><a href="logIndex.php">Login</a></li>';
            }
        ?>      
    </ul>
    
</html>