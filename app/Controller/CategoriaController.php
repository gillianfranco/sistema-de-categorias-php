<?php

namespace App\Controller;

use App\Infra\View;
use App\Infra\Database;

class CategoriaController{
    // Verifica se a categoria existe
    private static function category_exists(string $name) {
        $name = Database::cleanString($name);

        $sql = "SELECT 1 FROM categorias WHERE nome = ? LIMIT 1";

        $stmt = Database::query($sql, [$name]);

        if ($stmt->fetchColumn() !== false) {
            return true;
        } else{
            return false;
        }
    }

    // Renderiza a view Registro de Categorias
    public function create_view(){
        View::render("categoria/criar");
    }

    // Renderiza a view Gerenciar Categorias
    public function manager_view(){
        $categories = Database::query("SELECT * FROM categorias");
        View::render("categoria/gerenciar", ["categories" => $categories]);
    }

    // Registra a categoria
    public function create(){
        $name = $_POST['category_name'];
        
        if(!empty($name)){
            $name = Database::cleanString($name);

            if(!(self::category_exists($name))){
                $sql = "INSERT INTO categorias (nome) VALUES (?)";
                Database::query($sql, [$name]);
            }
        }
    }
}