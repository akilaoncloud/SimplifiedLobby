function abrir(pagina, janela) {
  if (janela == "") {
    janela == "janela";
  }
  window.open(pagina, janela, "height=700, width=640");
}

function retorna(retorno) {
  // Verifica se o opener existe e não está fechado
  if (window.opener && !window.opener.closed) {
    window.opener.document.getElementById("codigo").value = retorno;
    window.close();
  } else {
    alert("Janela Pai não Existente");
  }
}

function adicionaLinha() {
  var tabela = window.opener.document.getElementById("tbl");
  var numeroLinhas = tabela.rows.length;
  var linha = tabela.insertRow(numeroLinhas);

  var celula1 = linha.insertCell(0);
  var celula2 = linha.insertCell(1);
  var celula3 = linha.insertCell(2);
  var celula4 = linha.insertCell(3);

  celula1.innerHTML = document.getElementById("codigo").value;
  celula2.innerHTML = document.getElementById("nome").value;
  celula3.innerHTML = "<button onclick='altereLinha(this)'>Alterar</button>";
  celula4.innerHTML = "<button onclick='removaLinha(this)'>Remover</button>";
}
