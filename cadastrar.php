<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
  <head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<title>Cadastrar</title>
	</head>
	<body>
		<a href="index.php">Mapa</a><br><br>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="processa_cad.php">
			<label>Nome: </label>
			<input type="text" name="name" placeholder="Nome da Empresa ou Filial"><br><br>
			
			<label>Endereço: </label>
			<input type="text" name="address" placeholder="Digite o número e o Logradouro"><br><br>
			
			<label>Latitude: </label>
			<input type="text" name="lat" placeholder="Digite a latitude"><br><br>
			
			<label>Longitude: </label>
			<input type="text" name="lng" placeholder="Digite a mensagem"><br><br>		
			
			<label>Tipo da Empresa: </label>
			<input type="text" name="type" placeholder="Educação, Restaurante..."><br><br>	
		
			<input type="submit" value="Cadastrar"><br><br>
		</form>
	</body>
</html>