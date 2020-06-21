<?php
	require_once realpath(__DIR__ . "/etc/desenvolvimento.php");
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);