<?php

namespace App\Infra;

use PDO;
use PDOException;

require_once __DIR__ . "/../../config/bootstrap.php";

class Database{
    private static ?PDO $connection = null;

    private static function getConnection(): PDO
    {
        if(self::$connection === null){
            $dns = "mysql:host=" . $_ENV["DB_HOST"] . ";port=" . $_ENV["DB_PORT"] . ";dbname=" . $_ENV["DB_DATABASE"] . ";charset=utf8mb4";
            
            try{
                self::$connection = new PDO(
                    $dns, 
                    $_ENV["DB_USERNAME"], 
                    $_ENV["DB_PASSWORD"],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false
                    ]
                );
            } catch (PDOException $e){
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }

        return self::$connection;
    }

    public static function cleanString($str){
        return str_replace(str_split(",.|/\\()*&^%$#@!?><{}[]_+="), "", strtr(trim(strtolower($str)), " ", "-"));
    }

    public static function query(string $sql, array $params = []): bool|\PDOStatement
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}