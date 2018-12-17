<?php

if(isset($_POST['enviar'])){
    
    $num_campos = num_campos($table,$pdo);
    $campos = '';
    $valores = '';
    //var_dump($sth);
    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($sth, $x);
        
        if($table != "itemvenda" && $x==0) continue;

		if($x<$num_campos-1){
            $campos .= "$campo, ";        
            $valores .= ":$campo, ";
		}else{
            $campos .= "$campo";
            $valores .= ":$campo";
        }
    }
    
    $sql = "INSERT INTO $table ($campos) VALUES ($valores)";
    $sth = $pdo->prepare($sql);   
    $table == "itemvenda" ? $x=0: $x=1;
    for($x;$x<$num_campos;$x++){
		$select = $pdo->query("SELECT * FROM $table");
        $campo = nome_campo($select, $x);
        
        if(($table == "produto") && ($campo == "imagem")){
        
            $target  = "assets/img/".$_FILES['imagem']['name'];
            $tamanho = $_FILES['imagem']['size'];
            $imagem  = $_FILES['imagem']['name'];
            $path    = $_FILES['imagem']['tmp_name'];
            var_dump($_FILES);
            if($imagem != "none"){
        
                /*$fp = fopen($imagem, "rb");
                $conteudo = fread($fp, $tamanho);
                $conteudo = addslashes($conteudo);
                fclose($fp);*/

                $sth->bindParam(":$campo", $imagem, PDO::PARAM_INT);
                if(move_uploaded_file($path, $target)){
                    $msg = "Sucesso ao salvar imagem";
                }else{
                    $msg = "Erro ao mover imagem";
                }

            }else{
                $sth->bindParam(":$campo", $_POST["$campo"], PDO::PARAM_INT);
            }
            
        }else{

            $sth->bindParam(":$campo", $_POST["$campo"], PDO::PARAM_INT);
            
        }
		//echo $msg;// valida se imagem foi movida ou nao
    }
    
    $executa = $sth->execute();
    
    if($executa){

        if($table == "venda"){
            $sql = "SELECT * FROM venda WHERE cliente = '".$_POST['cliente']."' AND situacao = 'aberta'";
            $res = $pdo->query($sql);
            $rs  = $res->fetch();
            print "<script>location='add-items.php?t=".base64_encode("itemvenda")."&v=".base64_encode($rs['id'])."';</script>";
        }else if($table == "itemvenda"){
            $sql = "UPDATE produto SET quantidade -= :quantidade WHERE id = :id";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(':quantidade', $_POST['quantidade'], PDO::PARAM_INT);
            $sth->bindParam(':id', $_POST['produto']);
            $executa = $sth->execute();
            if($executa){
                print "<script>location='add-items.php?t=".base64_encode("itemvenda")."&v=".base64_encode($_POST['venda'])."';</script>";
            }else{
                echo "<script type='text/javascript'>alert('Erro ao dar baixa no estoque.'); return false;</script>";
            }
            
        }else{
            print "<script>location='$table.php?t=".base64_encode($table)."&success=adic';</script>";
        }


    }else{
        echo "<br> Erro ao inserir os dados :";
    }
    
}

?>

