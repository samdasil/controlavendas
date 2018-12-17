<?php

if(isset($_POST['enviar'])){
    
    if((isset($_POST['venda'])) && (isset($_POST['produto']))){
        $venda   = $_POST['venda'];
        $produto = $_POST['produto'];
        $sql = "DELETE FROM  $table WHERE venda = :venda AND produto = :produto";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':venda', $venda, PDO::PARAM_INT);   
        $sth->bindParam(':produto', $produto, PDO::PARAM_INT);   

    }else if($table == 'venda'){
        
        require_once 'funcoes.php';
        deletarVenda($_GET['id'],$pdo);
        print "<script>location='".$table.".php?t=".base64_encode($table)."&success=delt';</script>";

    }else if(isset($_GET['id'])){
    
        $id = $_POST['id'];
        $sql = "DELETE FROM  $table WHERE id = :id";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);   

    }else{
        echo "Nenhum parâmetro recebido";
    }

    //FALTA ACHAR UMA MANEIRA DE DEIXAR O DESATIVAR E O EXCLUIR
    
    
    if( $sth->execute()){
        if($table == "itemvenda"){
            print "<script>location='add-items.php?t=".base64_encode("itemvenda")."&v=".base64_encode($venda)."';</script>";
        }else{
            print "<script>location='".$table.".php?t=".base64_encode($table)."&success=delt';</script>";
        }

    }else{
        print "Erro ao desativar o registro!<br><br>";
    }
}
?>
