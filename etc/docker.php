<?php
/**
 * Configurações para ambiente `docker`, provido pelo `docker-compose`.
 */

$servidor = getenv("APP_DATABASE_HOST");
$usuario = getenv("APP_DATABASE_USER");
$senha = getenv("APP_DATABASE_PASSWORD");
$dbname = getenv("APP_DATABASE_NAME");

$maps_key = getenv("APP_MAPS_KEY");