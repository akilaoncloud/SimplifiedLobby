<?php

include "conexao.php";
include "livro.php";
include "livro_dao.php";
include "biblioteca.php";
include "bibliotecaDAO.php";

$msg = "";

if (!empty($_POST)) {
  if (sizeof($_POST) == 7) {
    $objeto = new Livro();
    $objeto->set("codigo", $_POST["codigo"]);
    $objeto->set("nome", $_POST["nome"]);
    $objeto->set("autor", $_POST["autor"]);
    $objeto->set("data_pb", $_POST["data_pb"]);
    $objeto->set("edicao", $_POST["edicao"]);
    $objeto->set("id_biblioteca", $_POST["id_biblioteca"]);
  } else {
    $objeto = new Biblioteca();
    $objeto->set("id", $_POST["id"]);
    $objeto->set("nome", $_POST["nome"]);
    $objeto->set("endereco", $_POST["endereco"]);
    $objeto->set("bairro", $_POST["bairro"]);
    $objeto->set("cidade", $_POST["cidade"]);
  }

  foreach ($_POST as $chave => $botao) {
    if ($botao == "Cadastrar") {
      $msg = $objeto->cadastrar();
    }
    if ($botao == "Alterar") {
      $msg = $objeto->alterar();
    }
    if ($botao == "Excluir") {
      $msg = $objeto->excluir();
    }
    if ($botao == "Pesquisar") {
      $msg = $objeto->pesquisar();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="wcodigoth=device-wcodigoth, initial-scale=1.0">
  <title>Livros</title>
  <script src="script.js"></script>
</head>

<body>
  <div>
    <h1>Pesquisar Livro</h1>
    <form>
      <h2>Codigo</h2>
      <input type="text" name="codigo"><br>
      <h2>Nome</h2>
      <input type="text" name="nome"><br>
      <h2>Autor</h2>
      <input type="text" name="autor"><br>
      <h2>Data de Publicação</h2>
      <input type="text" name="data_pb"><br>
      <h2>Edição</h2>
      <input type="text" name="edicao"><br><br>
      <h2>Biblioteca</h2>
      <input type="text" name="id_biblioteca"><br><br>
      <input type="submit" value="Pesquisar" name="pesquisar">
    </form><br>
  </div>

  <button onclick="abrir('filho.php')">Cadastrar Livro</button>
  <input name="codigo" id="codigo" type="text">

  <table id="tbl" border="1">
  </table>
</body>

</html>