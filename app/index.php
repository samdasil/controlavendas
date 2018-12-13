<?php
    if(!(isset($_SESSION))) session_start();

    $id = $_SESSION['id'];

    echo "Cliente $id logado com sucesso.";
?>