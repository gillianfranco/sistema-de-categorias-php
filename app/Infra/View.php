<?php

namespace App\Infra;

class View{
    public static function render(string $view, array $data = []): void
    {
        extract($data);

        $viewPath = __DIR__ . "/../View/{$view}/index.php";

        if (file_exists($viewPath)){
            require_once $viewPath;
        } else {
            http_response_code(404);
            echo "View '{$view}' não foi encontrada.";
        }
    }
}