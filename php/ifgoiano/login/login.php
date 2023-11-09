<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login/login-style.css">
    <title>Login - IFGoiano</title>
</head>

<body>
    <header>
        <div id="logodiv">
            <a href="index.html">
                <img id="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Instituto_Federal_Marca_2015.svg/1200px-Instituto_Federal_Marca_2015.svg.png" alt="Logo IFGoiano">
            </a>
        </div>
        <ul id="menu" class="display dmenu">
            <li>
            <?php 
                if(isset($_POST['log'])){
                    
                    if($_POST['em'] == $email && $_POST['mt'] == $matricula) {
                        
                        $_SESSION['login'] = $nome; // Login Completo!
                        header('Location: ifgoiano.php');
                        
                    } else {
                        echo 'Dados Inválidos';
                    }
                    
                } else {
                    echo 'Fazer Login';
                }
            ?>
            </li>
        </ul>
    </header>
    <section id="imgfundo" class="display">
            <form method="post">
                <div class="text">
                    <label id="icon" for="email">✉</label>
                    <input type="email" id="email" name="em" placeholder="Email Acadêmico">
                </div>

                <div class="text">
                    <label id="icon" for="matricula">✎</label>
                    <input type="number" id="matricula" name="mt" placeholder="Matrícula">
                </div>

                <input id="bt" type="submit" name="log" value="Entrar">
            </form>
    </section>
</body>

</html>