<!DOCTYPE html>

<html>
<head>
    <title>Usuario</title>
</head>

<body>
    <h2>Pagina do usuario</h2>

    <form method="POST" action="">
        <input type="radio" name="opcoes" value="modificarUsuario"> Modificar nome e senha: <br>

        Novo nome:
        <input type="text" name="novoNome"> <br>
        Nova senha:
        <input type="text" name="novaSenha"> <br>

        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
        function modificarUsuario($antigoNome, $novoNome, $novaSenha, $usuarios) {
            foreach ($usuarios as $usuario) {
                if ($usuario['nome'] == $novoNome) {
                    return;
                }
            }

            $usuarioEncontrado = false;

            for ($i = 0; $i < count($usuarios); $i++) { 
                if ($usuarios[$i]['nome'] == $antigoNome) {
                    if ($novoNome  != "") {
                        $usuarios[$i]['nome'] = $novoNome;
                    } 

                    if ($novaSenha != "") {
                        $usuarios[$i]['senha'] = $novaSenha;
                    } 

                    $usuarioEncontrado = true;
                }
            }

            if ($usuarioEncontrado) {
                $dados = json_encode($usuarios, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . '/usuarios.json', $dados);
            }
        }

        session_start();

        $usuarios = json_decode(file_get_contents(__DIR__ . '/usuarios.json'), true);
        $usuarioAtual = $_SESSION['usuarioAtual'];

        if (isset($_POST['enviar'])) {
            switch ($_POST['opcoes']) {
                case "modificarUsuario":
                    modificarUsuario($usuarioAtual['nome'], $_POST['novoNome'], $_POST['novaSenha'], $usuarios);
                    header("Refresh: 0");
            }
        }
    ?>
</body>
</html>
