<?php

namespace App\Controller;

use App\Infra\View;
use App\Infra\Database;

class ProdutoController{
    // Verifica se o produto existe
    private static function product_exists(string $name){
        $name = Database::cleanString($name);

        $sql = "SELECT 1 FROM produtos WHERE nome = ? LIMIT 1";

        $stmt = Database::query($sql, [$name]);

        if ($stmt->fetchColumn() !== false) {
            return true;
        } else{
            return false;
        }
    }

    private static function updateProductsCategory(int $id, int $amount, float $total_price){
        $sql = "UPDATE categorias SET total_estoque = total_estoque + ?, total_dinheiro = total_dinheiro + ?, updated_at = CURRENT_TIMESTAMP  WHERE id = ?";
        Database::query($sql, [$amount, $total_price, $id]);
    }
    
    // Renderiza a view Home
    public function home(){
        $categories = Database::query("SELECT * FROM categorias")->fetchAll();

        View::render("home", ["categories" => $categories]);
    }

    // Registra o produto
    public function create(){
        $name = $_POST["product-name"];
        $amount_product = $_POST["amount-product"];
        $category_id = $_POST["category-id"];
        $price = $_POST["price"];

        if(!empty($name) && !empty($amount_product) && !empty($category_id) && !empty($price)){
            $total_price = $price * $amount_product;
        
            $name = Database::cleanString($name);

            if(!(self::product_exists($name))){
                $sql = "INSERT INTO produtos (nome, qtde_total, preco_unitario, preco_total, id_categoria) VALUES (?, ?, ?, ?, ?)";
                Database::query($sql, [$name, $amount_product, $price, $total_price, $category_id]);
                self::updateProductsCategory($category_id, $amount_product, $total_price);
            }
        }
    }
}