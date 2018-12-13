<?php

    if(isset($_POST)){
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        logar($login, $senha);

    }else{
        echo "Nenhum dado recebido, repita o login.";
    }
    // validar login
    function logar($login, $senha){

        require_once './conexao.php';

        $sqla = "SELECT * FROM funcionario WHERE login = :login AND senha = :senha";
        $stha = $pdo->prepare($sqla);
        $stha->bindValue(':login', $login);
        $stha->bindValue(':senha', $senha);
        $stha->execute();

        if(($cont = $stha->rowCount()) == 1){
            //echo "Existe";
            $rega = $stha->fetch(PDO::FETCH_OBJ);
            session_start();
            $_SESSION['id'] = $rega->id;
            //echo "Minha ID: ".$_SESSION['id'];
            header("location:principal.php?id=".base64_encode($_SESSION['id']));
            //var_dump($rega);
        }else{
            $sqlb = "SELECT * FROM cliente WHERE login = :login AND senha = :senha";
            $sthb = $pdo->prepare($sqlb);
            $sthb->bindValue(':login', $login);
            $sthb->bindValue(':senha', $senha);
            $sthb->execute();

            if(($cont = $sthb->rowCount()) == 1){
                //echo "Existe";
                $regb = $sthb->fetch(PDO::FETCH_OBJ);
                session_start();
                $_SESSION['id'] = $rega->id;
                //echo "Minha ID: ".$_SESSION['id'];
                header("location:app/index.php?id=".base64_encode($_SESSION['id']));
                //var_dump($rega);
            }else{
            //echo "Não existe";
                header("location: index.php?erro=1");
            }
        }
        
    }

?>