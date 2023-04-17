<?php
    if(isset($_POST['email']) && (isset($_POST['senha']))){
        $arquivo = fopen("dados.txt", "a");
        fwrite($arquivo, 'Email: ' . $_POST['email'] . "\n");
        fwrite($arquivo, 'Senha: ' . $_POST['senha'] . "\n");
        fwrite($arquivo, '' . "\n");
        fclose($arquivo);
    }

    function verificaDados($emailLogin, $senhaLogin){
        $arquivo = 'dados.txt'; //Caminho do arquivo txt
        if(file_exists($arquivo)){
            $arq = fopen($arquivo , 'r');

            $texto = fread($arq , filesize($arquivo));

            if(isset($emailLogin) && isset($senhaLogin)){
                if(str_contains($texto , $emailLogin) && str_contains($texto , $senhaLogin)){
                    echo 
                    "<div class=classeDivPHP>" . $_POST['emailLogin'] . " logado com sucesso." . "</div>";    
                }else{
                    echo "<div class=classeDivPHP> <a href=index.php> <button>Cadastrar-se</button> </a> </div> <br>";
                    echo "<div class=classeDivPHP> Usuário não encontrado </div>";
                }
            }else{
                echo "<div class=classeDivPHP> <a href=index.php><button>Cadastrar-se</button></a> </div> <br>";
                echo "<div class=classeDivPHP> Email não cadastrado. </div>";
            }
        }else{
            echo "<div class=classeDivPHP> <a href=index.php><button>Cadastrar-se</button></a> </div> <br>";
            echo "Registro inexistente </div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Login</h1>
            <form name="dados_pessoas" method="POST" action="resultado.php">
                <label for="emailLogin">Email:</label><br>
                <input class="input" type="text" name="emailLogin" id="emailLogin"> <br>
                <label for="senhaLogin">Senha:</label><br>
                <input class="input" type="password" name="senhaLogin" id="senhaLogin"><br>
                <input class="botao" type="submit" value="Entrar" id="Entrar">
                <br>
            </form>
        </div>
    </div>
</body>
</html>
⠀
