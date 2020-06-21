<?php
	require_once realpath(__DIR__ . "/boot.php");
	
	// Criar a conexao ou termina aplicação com aviso
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) 
		or trigger_error("Impossível conectar a '${dbname}' em '{$servidor}'.", E_USER_WARNING);