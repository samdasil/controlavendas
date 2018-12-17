<?php

// Número de campos

function num_campos($table,$pdo){
    $sql = "SELECT * FROM $table";
    $sth = $pdo->query($sql);
    //var_dump($sth);
    $num_campos = $sth->columnCount();
    return $num_campos;
}

// Nome de campo pelo número $x
function nome_campo($sth, $x){
    $meta = $sth->getColumnMeta($x);
    $campo = $meta['name'];
    return $campo;
}

function deletarVenda($id,$pdo){

    $sql = "DELETE FROM itemvenda WHERE venda = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $executa = $sth->execute();

    if($executa){
        $sql = "DELETE FROM venda WHERE id = :id";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id', $id,PDO::PARAM_INT);
        $sth->execute();
    }
    
}
?>