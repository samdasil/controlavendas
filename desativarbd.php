<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];

    //FALTA ACHAR UMA MANEIRA DE DEIXAR O DESATIVAR E O EXCLUIR
    $sql = "DELETE FROM  $table WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);   
    if( $sth->execute()){
        print "<script>location='".$table.".php?t=".base64_encode($table)."&success=delt';</script>";
    }else{
        print "Erro ao desativar o registro!<br><br>";
    }
}
?>
