<?php

use FastRoute\Dispatcher;

require_once __DIR__ . "/../config/bootstrap.php";

// Extrai a URI e método da requisição
$httpMethod = $_SERVER["REQUEST_METHOD"];
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Roteia a requisição
$dispatcher = require_once __DIR__ . "/../routes/web.php";
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]){
    case Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo "404 - Página não encontrada";
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo "405 - Método não permitido";
        break;
    case Dispatcher::FOUND:
        [$class, $method] = $routeInfo[1];
        $vars = $routeInfo[2];

        // Instacia o controller e chama o método
        $controller = new $class;
        call_user_func_array([$controller, $method], $vars);
        break;
}
