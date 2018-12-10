<?php
if(isset($_POST['enviar'])){

    $num_campos = num_campos($table,$pdo);
    $campos = '';
    $valores = '';
    //var_dump($sth);
    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($sth, $x);
        //echo $campo."  ".$x.",";
        if($table != "itemvenda" && $x==0) continue;

		if($x<$num_campos-1){
            $campos .= "$campo, ";        
            $valores .= ":$campo, ";
		}else{
            $campos .= "$campo";
            $valores .= ":$campo";
        }
    }
    //var_dump($_POST);

    $sql = "INSERT INTO $table ($campos) VALUES ($valores)";
    $sth = $pdo->prepare($sql);    
    $table == "itemvenda" ? $x=0: $x=1;
    for($x;$x<$num_campos;$x++){
		$select = $pdo->query("SELECT * FROM $table");
        $campo = nome_campo($select, $x);

		$sth->bindParam(":$campo", $_POST["$campo"], PDO::PARAM_INT);
    }
    //echo $table;
    $executa = $sth->execute();

    if($executa){

        if($table == "venda"){
            $sql = "SELECT * FROM venda WHERE cliente = '".$_POST['cliente']."' AND situacao = 'aberta'";
            $res = $pdo->query($sql);
            $rs  = $res->fetch();
            print "<script>location='add-items.php?t=".base64_encode("itemvenda")."&v=".base64_encode($rs['id'])."';</script>";
        }else if($table == "itemvenda"){
            print "<script>location='add-items.php?t=".base64_encode("itemvenda")."&v=".base64_encode($rs['id'])."';</script>";
        }else{
            print "<script>location='$table.php?t=".base64_encode($table)."&success=adic';</script>";
        }


    }else{
        echo "<br> Erro ao inserir os dados <br>";
    }
}

?>

