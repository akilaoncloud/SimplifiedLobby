<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cad-style.css">
    <title>Alunos do IFGoiano</title>
</head>

<body>
    <header>
        <div id="logodiv">
            <a href="../index.html">
                <img id="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Instituto_Federal_Marca_2015.svg/1200px-Instituto_Federal_Marca_2015.svg.png" alt="Logo IFGoiano">
            </a>
        </div>
        <ul id="menu" class="display dmenu">
            <li>
            <?php 
                if(isset($_POST['cad'])) {
                    
                    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z-' ]*$/",$_POST['nome'])) {

                        echo 'Cadastro Enviado';

                    } else {
                        echo 'Discrepância Detectada';
                    }
                    
                } else {
                    echo 'Área de Cadastro';
                }
            ?>
            </li>
        </ul>
    </header>
    <section id="imgfundo" class="display">
            <form method="post">

                <div id="text">
                    <label id="icon" for="name">⌨</label>
                    <input class="inpt" type="text" id="nome" name="nome" placeholder="Nome Completo">
                </div>

                <div id="text">
                    <label id="icon" for="email">✉</label>
                    <input class="inpt" type="email" id="email" name="email" placeholder="Email">
                </div>

                <div id="text">
                    <label id="icon" for="tel">⚥</label>
                    <select class="inpt" name="gen">
                        <?php 

                        $gen = array('Masculino','Feminino','Outros','Prefiro não dizer');

                        for( $i = 0 ; $i < 4 ; $i++ ){
                            echo '<option value="0">' . $gen[$i] . '</option>';
                        }

                        ?>
                    </select>
                </div>

                <input class="inpt" id="bt" type="submit" name="cad" value="Enviar">
            </form>
    </section>
</body>

</html>