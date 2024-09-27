<?php
    session_start();
?>

<!DOCTYPE html>

<html>
<head>
    <title>Usuario</title>
</head>

<body>
    <h2>Ola usuario <?php echo $_SESSION['usuarioAtual']['nome'] ?></h2>

    <form method="POST" action="">
        <input type="radio" name="opcoes" value="modificarUsuario"> Modificar nome e senha: <br>

        Novo nome:
        <input type="text" name="novoNome"> <br>
        Nova senha:
        <input type="text" name="novaSenha"> <br>

        <input type="submit" name="enviar" value="Enviar">
    </form>

    <form method="POST" action="32.php">
        <br>

        <input type="submit" name="sair" value="Sair">
    </form>

    <?php
        function modificarUsuario($antigoNome, $novoNome, $novaSenha, $usuarios) {
            foreach ($usuarios as $usuario) {
                if ($usuario['nome'] == $novoNome) {
                    return;
                }
            }

            for ($i = 0; $i < count($usuarios); $i++) { 
                if ($usuarios[$i]['nome'] == $antigoNome) {
                    if ($novoNome  != "") {
                        $usuarios[$i]['nome'] = $novoNome;
                    } 

                    if ($novaSenha != "") {
                        $usuarios[$i]['senha'] = $novaSenha;
                    } 

                    $_SESSION['usuarioAtual'] = $usuarios[$i];

                    $dados = json_encode($usuarios, JSON_PRETTY_PRINT);
                    file_put_contents(__DIR__ . '/usuarios.json', $dados);

                    break;
                }
            }
        }

        $usuarios = json_decode(file_get_contents(__DIR__ . '/usuarios.json'), true);

        if (isset($_POST['enviar']) && isset($_POST['opcoes'])) {
            switch ($_POST['opcoes']) {
                case "modificarUsuario":
                    modificarUsuario($_SESSION['usuarioAtual']['nome'], $_POST['novoNome'], $_POST['novaSenha'], $usuarios);
                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                    Exit();
            }
        }
    ?>
</body>
</html>
