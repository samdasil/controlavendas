<?php
    if(!(isset($_SESSION))) session_start();
    isset($_SESSION['id']) ?$usuario = $_SESSION['id']: header("location:index.php");
    //echo "Minha id passada = ".$id; 
    //exit;
?>