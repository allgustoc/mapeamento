<?php
/**
 * Inclui arquivo que configura ambiente e disponibiliza variáveis de
 * configuração.
 */
require_once __DIR__ . '/boot.php';

// Obtêm os valores, passados na URL, para o endereço a ser convertido (se nada for passado fica em branco)
$endereco = filter_input(INPUT_GET, "endereco", FILTER_SANITIZE_ENCODED);

// Variáveis para exibição quando um endereço for buscado
$latitude = "";
$longitude = "";

/**
 * Busca lat/long a partir de um endereço.
 */
function consultaLatLongDe(string $endereco):array
{
    // Importa variável contendo chave do Maps (declarada em `boot.php`)
    global $maps_key;
    // Utilizar para retornar um objeto quando a chamada der erro
    $respostaVazia = ["", ""];

    // Executa consulta na API Geocoding do Google Maps
    $corpo_json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$endereco}&key={$maps_key}");
    // Se a requisição falhar, interromper a aplicação com mensagem
    if (false === $corpo_json) {
        trigger_error("Erro ao converter endereço para latitude de longitude.", E_USER_ERROR);
        return $respostaVazia;
    }
    // Converte a resposta vinda em JSON num objeto, para facilitar manipulação
    $resposta = json_decode($corpo_json);
    // Se a resposta parseada não for a mesma esparada, por erro ou mudança na API do Google, interrompe aplicação com erro
    if (isset($resposta->error_message)) {
        trigger_error("Resposta desconhecida, e imparseável, da API do Google: {$resposta->error_message}.", E_USER_ERROR);
        return $respostaVazia;
    }
    // Se, pelo menos, um endereço não for encontrado exibir uma mensagem de erro
    if (count($resposta->results) <= 0) {
        trigger_error("Endereço não encontrado.", E_USER_WARNING);
        return $respostaVazia;
    }
    // Popula variáveis para exibição com a resposta do Google
    $latitude = $resposta->results[0]->geometry->location->lat;
    $longitude = $resposta->results[0]->geometry->location->lng;

    return [
        $latitude,
        $longitude
    ];
}
// Se alguns dos valores passados não for em branco (zero, ou string vazia)
if (false === empty($endereco)) {
    list($latitude, $longitude) = consultaLatLongDe($endereco);
}

?>
<fieldset>
    <legend>Endereço convertido:</legend>

    <label for="latitude">Latitude:</label> <span name="latitude"><?=$latitude;?></span>
    <label for="longitude">Longitude:</label> <span name="longitude"><?=$longitude;?></span>
</fieldset>
<form method="GET" action="">
    <label for="endereco">Nome: </label>
    <input type="text" name="endereco" placeholder="Rua..." value="<?=urldecode($endereco);?>"><br><br>
    
    <input type="submit" value="Pesquisar"><br><br>
</form>