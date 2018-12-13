<?php

if(isset($_POST['enviar'])){
	
	$set='';
    $num_campos = num_campos($table,$pdo);
        
    for($x=0;$x<$num_campos;$x++){
		$campo = nome_campo($sth, $x);
		if(($table == "produto") && ($campo == "imagem")){
	    	$campo = $_FILES['tmp_name'];
		}else{
			$campo = $_POST[$campo];
		}
		
		if($x<$num_campos-1){
			if($x==0) continue;
			$set .= "$campo=:$campo,";
		}else{
			if($x==0) continue;
			$set .= "$campo=:$campo";
		}
    }
    
    var_dump($campo);

    $sql = "UPDATE $table SET $set WHERE id = :id";
    $sth = $pdo->prepare($sql);

    for($x=0;$x<$num_campos;$x++){
		$sth2 = $pdo->query("SELECT * FROM $table");
		$campo = nome_campo($sth2, $x);
		
		if(($table == "produto") && ($campo == "imagem")){
        
            $target  = "assets/img/".$_FILES['imagem']['name'];
            $tamanho = $_FILES['imagem']['size'];
            $imagem  = $_FILES['imagem']['name'];
            $path    = $_FILES['imagem']['tmp_name'];
			//var_dump($_FILES);
			
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
		echo $msg;// valida se imagem foi movida ou nao
		//$sth->bindParam(":$campo", $_POST["$campo"], PDO::PARAM_INT);
	}

   if($sth->execute()){
        echo "<script>location='".$table.".php?t=".base64_encode($table)."&success=edit';</script>";
    }else{
		echo "<script>location='".$table.".php?t=".base64_encode($table)."&success=erro';</script>";
		$id = $_POST['id'];
    }
}

?>
