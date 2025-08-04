<?php

use Dotenv\Dotenv;

require_once __DIR__ . "/../app/Infra/Helpers.php";
require_once __DIR__ . "/../vendor/autoload.php";

// Carrega variáveis do .env
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Define Timezone
date_default_timezone_set("America/Sao_Paulo");
ini_set('display_errors', $_ENV['APP_DEBUG'] === 'true' ? '1' : '0');
