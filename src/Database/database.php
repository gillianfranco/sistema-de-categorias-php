<?php
    function table_exists($conn, $table_name) {
        $sql = "SHOW TABLES LIKE '$table_name'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            return mysqli_num_rows($result) > 0;
        }

        return false;
    }

    // Registro de Categorias

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

    function register_category($conn, $table_name, $category_name) {
        $sql = "INSERT INTO $table_name (nome, qtde_produtos) VALUES ('$category_name', 0)";

        $register = mysqli_query($conn, $sql);

        if(!$register){
            die("Falha ao registrar a categoria: " . mysqli_error($conn));
        }else{
            echo "<script>window.alert('Categoia registrada com sucesso!');</script>";
        }
    }

    // Registro de Produtos

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

    function register_produtct($conn, $table_name, $product_name, $amount=0, $id_category){
        $sql = "INSERT INTO $table_name (nome, unidades, id_categoria) VALUES ('$product_name', $amount, $id_category)";

        $register = mysqli_query($conn, $sql);

        if(!$register){
            die("Falha ao registrar o produto: " . mysqli_error($conn));
        }
    }
?>