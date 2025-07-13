$(document).ready(function () {
  // Requisição da página de registro de produtos
  $("button#registrar-produto").click(function () {
    var nome_produto = $("#input-nome-produto").val();
    var qtde_produto = $("#input-qtde-produto").val();
    var id_categoria = $("#input-categoria-produto").val();

    var data = new FormData();

    data.set("nome-produto", nome_produto);
    data.set("qtde-produto", qtde_produto);
    data.set("id-categoria", id_categoria);

    $.ajax({
      url: "../src/Controllers/Produtos.php",
      type: "post",
      data: data,
      processData: false,
      contentType: false,
      async: false,
      success: function () {
        $("#input-nome-produto").val("");
        $("#input-qtde-produto").val("0");
        $("#input-categoria-produto").val("");
      },
      error: function (error) {
        console.error("Erro na requisição: " + error);
      },
    });
  });

  // Requisição da página de criação de categorias
  $("button#criar-categoria").click(function () {
    var nome_categoria = $("#input-nome-categoria").val();

    var data = new FormData();

    data.set("nome-categoria", nome_categoria);

    $.ajax({
      url: "../src/Controllers/Categorias.php",
      type: "post",
      data: data,
      processData: false,
      contentType: false,
      async: false,
      success: function () {
        $("#input-nome-categoria").val("");
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
});
