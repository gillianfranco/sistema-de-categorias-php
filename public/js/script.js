$(document).ready(function () {
  // Requisição da página de registro de produtos
  $("button#create-product").click(function () {
    var product_name = $("#input-product-name").val();
    var amount_product = $("#input-amount-product").val();
    var category_id = $("#input-product-category").val();
    var price = $("#input-price").val();

    var data = new FormData();

    data.set("product-name", product_name);
    data.set("amount-product", amount_product);
    data.set("category-id", category_id);
    data.set("price", price);

    $.ajax({
      url: "/",
      type: "post",
      data: data,
      processData: false,
      contentType: false,
      async: false,
      success: function () {
        $("#input-product-name").val("");
        $("#input-amount-product").val("0");
        $("#input-product-category").val("");
        $("#input-price").val("");
      },
      error: function (error) {
        console.error("Erro na requisição: " + error);
      },
    });
  });

  // Requisição da página de criação de categorias
  $("button#create-category").click(function () {
    var nome_categoria = $("#input-category_name").val();

    var data = new FormData();

    data.set("category_name", nome_categoria);

    $.ajax({
      url: "/categoria/criar",
      type: "post",
      data: data,
      processData: false,
      contentType: false,
      async: false,
      success: function () {
        $("#input-category_name").val("");
      },
      error: function (error) {
        console.error("Erro na requisição: " + error);
      },
    });
  });

  // Requisição da página de gerenciamento de categorias
  $("button.update-category").click(function () {
    var id_categoria = $(this).val();
    var categoria = "#category-name-" + id_categoria;
    var nome_categoria = $(categoria).val();

    var data = new FormData();

    data.set("nome-categoria", nome_categoria);
    data.set("id-categoria", id_categoria);

    $.ajax({
      url: "../src/Controllers/Categorias.php",
      type: "post",
      data: data,
      processData: false,
      contentType: false,
      async: false,
      success: function () {
        $(categoria).val(nome_categoria);
      },
      error: function (error) {
        console.error("Erro na requisisção: " + error);
      },
    });
  });

  // Requisições da página de gerenciamento de Produtos

  // Visualizar produtos de uma categoria

  $("button.view-products").click(function () {
    $("table#table-categories").css("display", "none");
    $("table#table-products").css("display", "flex");
    $("div.botoes a").attr("href", "");

    $("div.botoes a").click(function () {
      $("table#table-categories").css("display", "flex");
      $("table#table-products").css("display", "none");
    });

    var id_categoria = $(this).val();

    var data = new FormData();

    data.set("id-categoria", id_categoria);

    $.ajax({
      url: "../src/Controllers/Produtos.php",
      type: "post",
      data: data,
      processData: false,
      contentType: false,
      async: false,
      success: function () {},
      error: function (error) {
        console.error("Erro na requisisção: " + error);
      },
    });
  });

  // Editar Produtos
});
