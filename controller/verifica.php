<?php
session_start();
if(isset($_SESSION['cpf'])){
    if($_SESSION['cpf'] == ''){
        echo "<script>window.location.href='../view/logIndex.php';</script>";
    }
}
else{
    echo "<script>window.location.href = '../view/logIndex.php';</script>";  
}