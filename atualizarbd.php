<?php
    
    /*echo "<pre>";
    print_r($_FILES['imagem']['name']);
    echo "</pre>";
    exit;*/

if(isset($_POST['enviar'])){
	
	$set='';
    $num_campos = num_campos($table,$pdo);
    
    // laço para setar os valores dos campos da view e do banco
    for($x=0;$x<$num_campos;$x++){

        $campo = nome_campo($sth, $x);
        
        if($campo == "imagem"){

            if(!empty($_FILES['imagem']['name'])){
                
                $$campo = $_FILES['imagem']['name'];

            }else{

                $$campo = $_POST['foto'];
                $foto   = $_POST['foto'];
                
            }            

        }else{

            $$campo = $_POST[$campo];    
            
        }

		if($x<$num_campos-1){
			if($x==0 && $table != "produto") continue;
			$set .= "$campo=:$campo,";
		}else{
			if($x==0 && $table != "produto") continue;
			$set .= "$campo=:$campo";
        }
        
        /*echo "<pre>";
        print_r($set);
        echo "</pre>";*/

    }

    $sql = "UPDATE $table SET $set WHERE id = :id";
    $sth = $pdo->prepare($sql);

    for($x=0;$x<$num_campos;$x++){
		$sth2 = $pdo->query("SELECT * FROM $table");
		$campo = nome_campo($sth2, $x);
        
		if(($table == "produto") && ($campo == "imagem")){
           
            if(!empty($_FILES['imagem']['name'])){
                
                $target  = "assets/img/".$_FILES['imagem']['name'];
                $tamanho = $_FILES['imagem']['size'];
                $imagem  = $_FILES['imagem']['name'];
                $path    = $_FILES['imagem']['tmp_name'];

                if(file_exists($target)){
                    
                    $date = time();
                    $img  = $date."-".$imagem;
                    $caracteres = array("/",";",";",",");
                    $img = str_replace($caracteres,"",$img);
                    $sth->bindParam(":$campo", $img, PDO::PARAM_INT);
                    $target = "assets/img/".$img;

                    if(move_uploaded_file($path, $target)){
                        $msg = "Sucesso ao salvar imagem";
                    }else{
                        $msg = "Erro ao mover imagem";
                    }

                }else{

                    $sth->bindParam(":$campo", $imagem, PDO::PARAM_INT);
                    $target = "assets/img/".$imagem;

                    if(move_uploaded_file($path, $target)){
                        $msg = "Sucesso ao salvar imagem";
                    }else{
                        $msg = "Erro ao mover imagem";
                    }

                }

            }else{

                $sth->bindParam(":$campo", $foto, PDO::PARAM_INT);

            }
               
        }else{

            $sth->bindParam(":$campo", $_POST["$campo"], PDO::PARAM_INT);

        }
		
	}

   if($sth->execute()){
        echo "<script>location='".$table.".php?t=".base64_encode($table)."&success=edit';</script>";
    }else{
		echo "<script>location='".$table.".php?t=".base64_encode($table)."&success=erro';</script>";
		$id = $_POST['id'];
    }
}

?>
