<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carros</title>
  <script>
    function update() {
        var a = document.getElementById("cars").options[cars.selectedIndex].textContent;
        document.getElementById("text").textContent = "Selecionado: " + a;
    }
  </script>
</head>
<body>
  <h3>Selecione um Carro</h3>

    <select id="cars" name="cars" onchange="update()">
      <?php 
      $carros = array("Gol", "Corsa", "Passat", "Fusca", "Chevete", "Celta", "Fiat 147", "Brasilia", "Monza");

      for($i = 0; $i < 9; $i++) {

        echo "<option value='$i'>" . $carros[$i] . "</option>";

      }
      ?>
    </select>

  <p id="text"></p>
</body>
</html>