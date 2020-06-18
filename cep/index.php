<!DOCTYPE html>
<html>
<head>
	<title>Busca Endereço</title>
</head>
<body>

<form method="get">
	<input type="text" name="cep" required>
</form>

</body>
</html>

<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

$cep = "35420000";
$cep = $_GET['cep'];

function get_endereco($cep){
    
    //Formata o cep para caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";
    
    $xml = simplexml_load_file($url);
    return $xml;
    
}


$endereco = (get_endereco("$cep"));

    echo "CEP:      $endereco->cep <br>";
    echo "Rua:      $endereco->logradouro <br>" ;
    echo "Bairro:   $endereco->bairro <br>" ;
    echo "cidade:   $endereco->localidade <br>" ;
    echo "UF:       $endereco->uf <br>" ;
    echo "Número:   $endereco->complemento <br>" ;

 /*   
 echo "<pre>";
var_dump(get_endereco("01310932"));
echo "</pre>";
 
*/
?>