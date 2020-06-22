<?php
/**
 * Este arquivo DEVE ser incluído por todos os arquivos antes de qualquer outra
 * instrução ser executada.
 */

// ----------------------------------------------------------------------------
// Detecção do ambiente da aplicação

/**
 * Retorna o nome do ambiente definido pela varíavel de ambiente "APP_AMBIENTE"
 * declarada no servidor. Se não houver valor, ou a variável não existir, considera
 * "desenvolvimento" como padrão.
 */
$nomeDoAmbiente = getenv("APP_AMBIENTE") ?? "desenvolvimento";
$arquivoDeConfiguracao = __DIR__ . "/etc/${nomeDoAmbiente}.php";

// Se um arquivo com o ambiente definido não existe
if (false === file_exists($arquivoDeConfiguracao)) {
    trigger_error("Ambiente '${nomeDoAmbiente}' não têm configuração.", E_USER_ERROR);
}
require_once "$arquivoDeConfiguracao";

// Remove variáveis que não serão mais necessárias pelo resto da aplicação
unset($nomeDoAmbiente, $arquivoDeConfiguracao);