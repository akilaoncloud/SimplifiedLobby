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

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    body {
      display: flex;
    }

    div {
      width: 400px;
    }
  </style>
  <script src="script.js"></script>
</head>

<body>
  <div>
    <h1>Biblioteca</h1>
    <form action="" method="post">
      <h2>id</h2>
      <input type="text" name="id"><br>
      <h2>Nome</h2>
      <input type="text" name="nome"><br>
      <h2>Endereço</h2>
      <input type="text" name="endereco"><br>
      <h2>Bairro</h2>
      <input type="text" name="bairro"><br>
      <h2>Cidade</h2>
      <input type="text" name="cidade"><br><br>
      <input type="submit" value="Cadastrar" name="cadastrar">
      <input type="submit" value="Alterar" name="alterar">
      <input type="submit" value="Excluir" name="excluir">
    </form><br>
  </div>
  <div>
    <h1>Livros</h1>
    <form action="" method="post" onsubmit="adicionaLinha();">
      <h2>Codigo</h2>
      <input type="text" name="codigo" id="codigo"><br>
      <h2>Nome</h2>
      <input type="text" name="nome" id="nome"><br>
      <h2>Autor</h2>
      <input type="text" name="autor"><br>
      <h2>Data de Publicação</h2>
      <input type="text" name="data_pb"><br>
      <h2>Edição</h2>
      <input type="text" name="edicao"><br><br>
      <h2>Biblioteca</h2>
      <input type="text" name="id_biblioteca"><br><br>
      <input type="submit" value="Cadastrar" name="cadastrar">
      <input type="submit" value="Alterar" name="alterar">
      <input type="submit" value="Excluir" name="excluir">
    </form><br>
  </div>
  <script>
    var msg = "<?php echo $msg; ?>";

    if (msg != "") {
      retorna(msg);
    }
  </script>
</body>

</html>