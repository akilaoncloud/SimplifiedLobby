<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home_ifgoiano/home_ifgoiano.css">
    <title>Bem-vindo ao IFGoiano</title>
</head>

<body>
    <header>
        <div id="logodiv">
            <img id="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Instituto_Federal_Marca_2015.svg/1200px-Instituto_Federal_Marca_2015.svg.png" alt="Logo IFGoiano">
        </div>
        <ul id="menu" class="display dmenu">
            <a href="fotos/fotos.html">
                <li class="li-btn">Fotos</li>
            </a>
            <a href="projetos/projetos.html">
                <li class="li-btn">Projetos</li>
            </a>
            <a>
                <li class="logname">
                    <?php echo 'Olá, ' . $_SESSION['login'] . '!'; ?>
                </li>
            </a>
        </ul>
    </header>
    <section id="imgfundo" class="display">
        <div id="text-title" class="display centralizado">
            <h1 id="title">Bem-vindo ao centro de discentes do IFGoiano - Campus Morrinhos!</h1>
            <h2 id="sbtitle">Acesse todos os conteúdos no menu acima</h2>
            <a id="action" href="?logout">Sair da conta</a>
        </div>
    </section>
</body>

</html>