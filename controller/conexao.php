<?php 
    define('host', '127.0.0.1');
    define('usuario', 'root');
    define('senha', 'FLAVITO11');
    define('db', 'biblioteca');

    $conexao = mysqli_connect(host, usuario, senha, db) or die('Não foi possível conectar-se com a base de dados!');
?>