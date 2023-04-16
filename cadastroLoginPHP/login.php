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
                    echo $_POST['emailLogin'] . " logado com sucesso.";    
                }else{
                    echo "<a href=index.php><button>Cadastrar-se</button></a> <br>";
                    echo "Usuário não encontrado";
                }
            }else{
                echo "<a href=index.php><button>Cadastrar-se</button></a> <br>";
                echo "Email não cadastrado.";
            }
        }else{
            echo "<a href=index.php><button>Cadastrar-se</button></a> <br>";
            echo "Registro inexistente";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form name="dados_pessoas" method="POST" action="resultado.php">
        <label for="emailLogin">Email:</label><input type="text" name="emailLogin" id="emailLogin"> <br>
        <label for="senhaLogin">Senha:</label><input type="password" name="senhaLogin" id="senhaLogin"><br>  
        <input type="submit" value="entrar" id="Entrar">
        <br>
    </form>
</body>
</html>