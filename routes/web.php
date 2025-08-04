<?php

namespace routes;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use App\Controller\ProdutoController;
use App\Controller\CategoriaController;

require_once __DIR__ . "/../config/bootstrap.php";

return simpleDispatcher(function(RouteCollector $r){
    // View home (ou registro de produtos)
    $r->addRoute("GET", "/", [ProdutoController::class, "home"]);
    $r->addRoute("POST", "/", [ProdutoController::class, "create"]);
    // View de criação de categorias
    $r->addRoute("GET", "/categoria/criar", [CategoriaController::class, "create_view"]);
    $r->addRoute("POST", "/categoria/criar", [CategoriaController::class, "create"]);
    // View de gerenciamento de categorias
    $r->addRoute("GET", "/categoria/gerenciar", [CategoriaController::class, "manager_view"]);
    $r->addRoute("UPDATE", "/categoria/gerenciar", [CategoriaController::class, "update"]);
    $r->addRoute("DELETE", "/categoria/gerenciar", [CategoriaController::class, "delete"]);
    // View de gerenciamento de produtos
    $r->addRoute("GET", "/produtos/gerenciar", [ProdutoController::class, "manager_view"]);
    // View de gerenciamento de produtos de determinada categoria
    $r->addRoute("GET", "/produtos/gerenciar/{categoria}", [ProdutoController::class, "manager_products_view"]);
    $r->addRoute("UPDATE", "/produtos/gerenciar/{categoria}", [ProdutoController::class, "update"]);
    $r->addRoute("DELETE", "/produtos/gerenciar/{categoria}", [ProdutoController::class, "delete"]);
    
});
