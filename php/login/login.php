<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Área de Login</title>
</head>
<body>
    <section id="php">
            <h3>
                <?php
                if ($_POST["user"] == 'Thiago') {
                    if ($_POST["pswrd"] == '12345') {
                        echo 'Acesso Garantido';
                    }
                    else {
                        echo 'Senha Incorreta';
                    }
                }
                else {
                    echo 'Usuário Não Encontrado';
                }
                ?>
            </h3>
    </section>
</body>
</html>