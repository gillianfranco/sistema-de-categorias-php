<?php    
    function db_exists($conn, $db_name){
        $sql = "SHOW DATABASES LIKE '$db_name'";
        $result = mysqli_query($conn, $sql);

        if ($result){
            return mysqli_num_rows($result) > 0;
        }

        return false;
    }

    function create_db($conn, $db_name){
        $sql = "CREATE DATABASE $db_name";
        $result = mysqli_query($conn, $sql);
        
        if(!$result) {
            die("Erro na criação do banco de dados: " . mysqli_error($conn));
        }
    }

    function table_exists($conn, $table_name) {
        $sql = "SHOW TABLES LIKE '$table_name'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            return mysqli_num_rows($result) > 0;
        }

        return false;
    }

    function create_category_table($conn, $table_name) {
        $sql = "CREATE TABLE `$table_name` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        qtde_produtos INT
        )";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Erro ao criar a tabela: " . mysqli_error($conn));
        }
    }

    function create_product_table($conn, $table_name){
        $sql = "CREATE TABLE `$table_name` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        unidades INT,
        id_categoria INT
        )";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Erro ao criar a tabela: " . mysqli_error($conn));
        }
    }

    // Conexão com o MySQL
    $credentials = require_once "db-credentials.php";
    $connection = mysqli_connect($credentials['host'], $credentials['user'], $credentials['password']);

    if(!$connection) {
        die("A conexão falhou: " . mysqli_connect_error());
    }

    // Criação do banco de dados

    $db_name = "sistema_de_categorias_DB";

    if (!db_exists($connection, $db_name)) {
        create_db($connection, $db_name);
    }

    mysqli_select_db($connection, $db_name); // Seleciona o banco de dados para as próximas consultas

    // Criação das tabelas

    $table_categories = "categorias";
    $table_products = "produtos";

    if (!table_exists($connection, $table_categories)){
        create_category_table($connection, $table_categories);
    }
    
    if (!table_exists($connection, $table_products)) {
        create_product_table($connection, $table_products, TRUE);
    }
?>