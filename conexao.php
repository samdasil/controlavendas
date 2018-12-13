<?php
$host = 'localhost';
$db   = 'cadastro'; // Dica: auto-crud não foi aceito
$user = 'root';
$pass = '';
$sgbd = 'mysql';      // Opções: pgsql ou mysql
//$table = 'clientes';

$script = 'scripts/clientes_my.sql';

// Criar banco e importar script. Disponível somente para MySQL

// Conectar para um banco interno
if($sgbd == 'mysql'){
	try{
		$pdo0 = new PDO("$sgbd:host=$host;dbname=information_schema;", $user, $pass);
	}catch(PDOException $e){
		echo '<br><br><b>Mensagem</b>: '. $e->getMessage().'<br>';// Usar estas linhas no catch apenas em ambiente de testes/desenvolvimento
    	echo '<b>Arquivo</b>: '.$e->getFile().'<br>';
    	echo '<b>Linha</b>: '.$e->getLine().'<br>';	
	}

	// Caso não exista o banco $db será criado
	$ret = $pdo0->query('create database if not exists '.$db);

	// Se for criado o banco o script $script será importado para o mesmo
	if($ret){
		$pdo0->query('use '.$db);
		$sqlSource = file_get_contents($script);
		$pdo0->exec($sqlSource);
		$pdo0 = null;
	}

}

// Conectar ao banco com PDO
try {
    $pdo = new PDO("$sgbd:host=$host;dbname=$db;", $user, $pass);
	
    //echo "Conectado para o banco de dados <br>";

    // Fechar conexão com o banco de dados
    // $pdo = null;
}catch(PDOException $e){
    echo '<b>Mensagem</b>: '. $e->getMessage().'<br>';// Usar estas linhas no catch apenas em ambiente de testes/desenvolvimento
    echo '<b>Arquivo</b>: '.$e->getFile().'<br>';
    echo '<b>Linha</b>: '.$e->getLine().'<br>';
}
//recebe a url digitada pelo usuario e separa tudo que vem depois o index.php

if(isset($_GET['t'])){
	$table = base64_decode($_GET['t']);
	//echo $table;
}else{
	
	$url = explode("Git/lenemodas/", $_SERVER['PHP_SELF']);
	$url = end($url);
	$url = explode(".php", $url);

	$table = $url[0];
	//var_dump($table);
}


// Incluir o funcoes.php
require_once('./funcoes.php');
